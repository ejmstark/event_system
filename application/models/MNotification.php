<?php
	class MNotification extends MY_Model{
		const DB_TABLE = "notification";
		const DB_TABLE_PK = "notif_id";

		public function __construct(){
		
		}

		public function getNotifUser($user_id){
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('user_id', $user_id);
			$this->db->order_by('notif_id', 'desc');

			$query = $this->db->get();
			return $query->result();
		}

		public function updateStatus($notif_id){
			$data = array(
						'notif_status' => 'Read' 
					);

			return $this->update($notif_id,$data);
		}

		public function insertNotif($user_id, $event_id, $description){
			$data = array(
						'user_id'  => $user_id,
						'event_id' => $event_id
					);
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where($data);

			$query = $this->db->get();
			$count = $query->num_rows();

			if($count === 0){
				$this->db->insert('notification', $data);	
			}
		}

	}
?>
