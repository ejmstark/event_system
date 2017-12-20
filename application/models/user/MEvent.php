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

		public function createEvent($data){
			$this->db->trans_begin();
			$this->insert($data);
			if ($this->db->trans_status() === FALSE){
        		$this->db->trans_rollback();
			}else{
        		$this->db->trans_commit();
			} 	
			return $this->db->insert_id();
		}
		public function getGoingToEvent($eId){
			$this->db->select("ua.account_id,ua.first_name, ua.last_name,ua.middle_initial");
			$this->db->from("event_info as ei");
			$this->db->join('ticket_type  as tt ', "tt.event_id = ei.event_id");
			$this->db->join('ticket as t', 't.ticket_type_id = tt.ticket_type_id');
			
			$this->db->join("user_account as ua", "ua.account_id = t.user_id");
			$this->db->where("ei.event_id",$eId);

			$query = $this->db->get();

			return $query->result();
		}
		public function joinEventTicketType($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->join('ticket_type as t', $this::DB_TABLE.'.event_id = t.event_id');
			$this->db->where( array($this::DB_TABLE.'.event_id' => $id, ));

			$query = $this->db->get();
			 return $query->result();
			# code...
		}
		public function Performance()
		{
			$select = array('event_info.event_name as Event_Name' , 'count(*) as Total_No_Of_Attendees');
			$this->db->select($select);
			$this->db->from($this::DB_TABLE);
			$this->db->join('ticket_type as tt', $this::DB_TABLE.'.event_id = tt.event_id');
			$this->db->join('ticket as t', 't.ticket_type_id = tt.ticket_type_id');
			$this->db->group_by($this::DB_TABLE.'.event_name');

			$query = $this->db->get();

			return $query->result();	
			# code...
		}

		public function getAllEventsByUser($id){
			//Sample code
			//find read_all function at application/core/MY_Model.php
			$this->db->select("*");
			$this->db->select("DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart");
			$this->db->from("event_info");
			$this->db->where("user_id = $id");
			$query = $this->db->get();
			return $query->result();			             
		}
		public function getAllEvents(){
			//Sample code
			//find read_all function at application/core/MY_Model.php
			$this->db->select("*");
			$this->db->select("DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart");
			$this->db->from("event_info");
			$query = $this->db->get();
			return $query->result();			             
		}

		public function getSearchEvents($searchWord, $searchDateYear, $searchDateMonth){
			//Sample code
			//find read_all function at application/core/MY_Model.php
			$this->db->select("*");
			$this->db->from("event_info");
			if(!$searchDateMonth == '0'){
				$this->db->where("event_name LIKE '%".$searchWord."%' AND DATE_FORMAT(event_info.event_date_start,'%c-%Y') = '".$searchDateMonth."-".$searchDateYear."'");
			} else { 
				$this->db->where("event_name LIKE '%".$searchWord."%'");
			}

			$query = $this->db->get();
			return $query->result();			             
		}

		public function getAllApprovedEvents(){
			//Sample code
			//find read_all function at application/core/MY_Model.php
			$this->db->select("*");
			$this->db->select("DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart");
			$this->db->from("event_info");
			$this->db->where("event_info.event_status = 'Approved'");
			$query = $this->db->get();
			return $query->result();			             
		}


		public function loadEventDetails($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('event_id', $id);

			$query = $this->db->get();

			return $query->result();
			# code...
		}

		//Class getters and setters.

		public function getEvent_id(){
			return $this->event_id;
		}

		public function setEccount_id($event_id){
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
			$this->event_name = $event_name;
		}

		public function getEvent_details(){
			return $this->event_details;
		}

		public function setEvent_details($event_details){
			$this->event_details = $event_details;
		}

		public function getEvent_category(){
			return $this->event_category;
		}

		public function setEvent_category($event_category){
			$this->event_category = $event_category;
		}

		public function getEvent_venue(){
			return $this->event_venue;
		}

		public function setEvent_venue($event_venue){
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
			$this->user_id = $user_id;
		}

		//End of class getters and setters.

		
	}
?>