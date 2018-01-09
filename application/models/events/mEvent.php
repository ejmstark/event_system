<?php
	class MEvent extends MY_model {
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

		}

		public function getAllEvents(){
			$this->db->select("*,asdasd");
			$this->db->select("DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart");
			$this->db->from($this::DB_TABLE);
			$query = $this->db->get();
			return $query;
		}

		public function getEvent_id(){
			return $this->event_id;
		}

		public function setEccount_id($event_id){
			$no_tickets_total = filter_var($no_tickets_total, FILTER_SANITIZE_NUMBER_INT);
			$this->event_id = $event_id;
		}

		public function getEvent_date_start(){
			return $this->event_date_start;
		}

		public function setEvent_date_start($event_date_start){
			$this->event_date_start = $event_date_start;
		}

		public function getEvent_date_end(){
			return $this->event_date_end;
		}

		public function setEvent_date_end($event_date_end){
			$this->event_date_end = $event_date_end;
		}

		public function getNo_tickets_total(){
			return $this->no_tickets_total;
		}

		public function setNo_tickets_total($no_tickets_total){
			$no_tickets_total = filter_var($no_tickets_total, FILTER_SANITIZE_NUMBER_INT);
			$this->no_tickets_total = $no_tickets_total;
		}

		public function getEvent_status(){
			return $this->event_status;
		}

		public function setEvent_status($event_status){
			$this->event_status = $event_status;
		}

		public function getEvent_name(){
			return $this->event_name;
		}

		public function setEvent_name($event_name){
			$event_name = filter_var($event_name,FILTER_SANITIZE_STRING);
			$event_name = trim($event_name,"!@#$%^&*(){}[]");
			$this->event_name = $event_name;
		}

		public function getEvent_details(){
			return $this->event_details;
		}

		public function setEvent_details($event_details){
			$event_details = filter_var($event_details,FILTER_SANITIZE_STRING);
			$event_details = trim($event_details,"!@#$%^&*(){}[]");
			$this->event_details = $event_details;
		}

		public function getEvent_category(){
			return $this->event_category;
		}

		public function setEvent_category($event_category){
			$event_category = filter_var($event_category,FILTER_SANITIZE_STRING);
			$event_category = trim($event_category,"!@#$%^&*(){}[]");
			$this->event_category = $event_category;
		}

		public function getEvent_venue(){
			return $this->event_venue;
		}

		public function setEvent_venue($event_venue){
			$event_venue = filter_var($event_venue,FILTER_SANITIZE_STRING);
			$event_venue = trim($event_venue,"!@#$%^&*(){}[]");
			$this->event_venue = $event_venue;
		}

		public function getDate_created(){
			return $this->date_created;
		}

		public function setDate_created($date_created){
			$this->date_created = $date_created;
		}

		public function getUser_id(){
			return $this->user_id;
		}

		public function setUser_id($user_id){
			$user_id = filter_var($user_id, FILTER_SANITIZE_NUMBER_INT);
			$this->user_id = $user_id;
		}

		public function deleteEvent($event_id){
			$this->db->trans_begin();
			$this->delete($event_id);
			if ($this->db->trans_status() === FALSE){
        		$this->db->trans_rollback();
			}else{
        		$this->db->trans_commit();
			}
		}

		public function updateEvent($event_id,$data){
			$this->db->trans_begin();
			$this->update($event_id,$data);
			if ($this->db->trans_status() === FALSE){
        		$this->db->trans_rollback();
			}else{
        		$this->db->trans_commit();
			}
		}

		public function showUpcomingEvents(){
			$date = date('Y-m-d H:i:s');
			// $query = $this->db->get_where($this::DB_TABLE,array('event_date_start >' =>date('Y-m-d H:i:s')));

			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('event_date_start >', $date);

			$query = $this->db->get();
			// $query = $this->db->get();

			return $query->result();

		}
	}
?>
