<?php
	class MEventInfo extends MY_Model {
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
		private $addedBy; 
		private $updatedBy; 
		private $addedAt; 
		private $updateAt; 

		const DB_TABLE = "event_info";
    	const DB_TABLE_PK = "event_id";

    	public function __construct(){

		}
		public function getRevenue($eid){
			
			$this->db->select("ei.event_name, tt.ticket_name, COUNT(t.ticket_id) as cnt , tt.price");
			$this->db->from("event_info as ei");
			$this->db->join("ticket_type as tt","tt.event_id = ei.event_id","left");
			$this->db->join("ticket as t","t.ticket_type_id  = tt.ticket_type_id","left");
			$this->db->where("ei.event_id ",$eid);
			$this->db->group_by("tt.ticket_type_id");
			
			$query = $this->db->get();
			return $query->result();

		}
		public function getAllEvents(){
			$query = $this->read_all();
			return $query;			             
		}

		public function getTransHistory($id){
			$this->db->select('e.event_name AS  "Event", y.price AS "Paid", DATE_FORMAT(t.date_sold, "%d-%b-%y") AS "DatePaid"');
        	$this->db->from("event_info AS e");
	        $this->db->join("ticket_type as y","e.event_id = y.event_id");
	        $this->db->join("ticket AS t","t.ticket_type_id = y.ticket_type_id");
	        $this->db->join("user_account AS u","u.account_id = t.user_id");
	        $this->db->where(" u.account_id = '$id'");
	        $query = $this->db->get();
			return $query->result();
		}
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

		public function getAddedBy(){
			return $this->addedBy;
		}

		public function getUpdatedBy(){
			return $this->updatedBy;
		}

		public function getAddedAt(){
			return $this->addedAt;
		}

		public function getUpdatedAt(){
			return $this->updateAt;
		}

		public function setAddedBy($addedAt){
			$this->addedBy = $addedAt;
		}

		public function setUpdatedBy($upgradedAt){
			$this->updatedBy = $upgradedAt;
		}

		public function setAddedAt($addedBy){
			$this->addedBy = $addedBy;
		}

		public function setUpgradedBy($updatedBy){
			$this->updatedBy = $updatedBy;
		}


		public function updateEventStatus($id, $status)
		{
			$data = array('event_status' => $status );

			return $this->update($id,$data);

		}
	}
?>