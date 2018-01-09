<?php
	class MCalendar extends MY_model {
		private $event_id;
		private $event_date_start;
		private $event_date_end;
		private $no_tickets_total;
		private $event_status;
		private $event_name;
		private $event_details;
		private $event_category;
		private $event_venue;
		private $date_created;
		private $user_id;

		const DB_TABLE = "event_info";
    	const DB_TABLE_PK = "event_id";

    	public function __construct(){
			$this->DB_TABLE = "event_info";
			$this->DB_TABLE_PK = "event_id";
		}
		
		public function getAllApprovedEvents(){
			$where = array('event_status'=>"Approved");
			$query = $this->read_where($where);
			return $query;			             
		}
		
		public function getAllEventsCreatedByRegularUser(){
			$query = "SELECT * FROM event_info ei, user_account ua WHERE ei.user_id = ua.account_id AND ua.user_type = 'Regular'";
			$db_result = $this->db->query($query);
			$result_object = $db_result->result();
			
			return $result_object;
		}
		
		public function insertNewEvent(){
			
		}

	}
?>