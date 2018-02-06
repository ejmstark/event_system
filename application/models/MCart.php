<?php
	class MCart extends MY_Model{
		const DB_TABLE = "cart";
		const DB_TABLE_PK = "cart_id";

		public function __construct(){
			
		}

		public function getCart(){
			$arr =array();
			$events = $this->getEvents();
			foreach ($events as $event) {
				$arr[$event->event_id] = array();
					$this->db->select("c.cart_id,tt.ticket_type_id,ei.event_name, tt.ticket_name, c.quantity , tt.price");
				$this->db->from("cart as c");
				$this->db->join("ticket_type as tt","tt.ticket_type_id = c.ticket_id","left");
				$this->db->join("event_info as ei","tt.event_id = ei.event_id","left");
				$this->db->where("ei.event_id",$event->event_id);
				$this->db->group_by("tt.ticket_type_id");
				$arr[$event->event_id] =  new stdClass;
				
				$query = $this->db->get();
				$res = $query->result();
				// $arrObj->user_status = $value->user_status;
// echo "<pre>";
// 				var_dump($res);
// 				die();
				// $arrObj->event_name = $res->event_name;
				$arr[$event->event_id] = $res;
				
				
			
			}
// echo "<pre>";
// 				var_dump($arr);
// 				die();
			return $arr;
			// $query = $this->db->get();
			// return $query->result();
			// $this->db->join()
			// $query = $this->read_all();
			
			// return $query;


		}
		public function getEvents(){
			$this->db->select("ei.event_id");
			$this->db->from("cart as c");
			$this->db->join("ticket_type as tt","tt.ticket_type_id = c.ticket_id","left");
			$this->db->join("event_info as ei","tt.event_id = ei.event_id","left");
			$this->db->group_by("ei.event_id");
			
			$query = $this->db->get();
			return $query->result();
			// $this->db->join()
			// $query = $this->read_all();
			
			// return $query;


		}
			
	}
?>
