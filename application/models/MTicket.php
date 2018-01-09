<?php
	class MTicket extends MY_Model {
		private $ticket_id;
		private $date_sold;
		private $user_id;
		private $ticket_type_id;
		private $addedBy; 
		private $updatedBy; 
		private $addedAt; 
		private $updateAt; 


		const DB_TABLE = "ticket";
    	const DB_TABLE_PK = "petition_id";

    	public function __construct(){

		}

		public function Attendance($id)
		{
			$this->db->select("count(*), event_info.event_id as Event ID, event_info.event_name as Event Name ");
			$this->db->from('ticket');
			$this->db->join('ticket_type as tt', 'ticket.ticket_type_id = tt.ticket_type_id');
			$this->db->join('event_info', 'tt.event_id = event_info.event_id');
			$this->db->where('ticket.user_id', $id);

			$query = $this->db->get();

			return $query->result();
		}

		public function joinTicketEventType($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->join('ticket_type as tt', $this::DB_TABLE.'.ticket_type_id = tt.ticket_type_id');
			$this->db->join('event_info as e', 'tt.event_id = e.event_id');
			$this->db->where( array($this::DB_TABLE.'.user_id' => $id, ));

			$query = $this->db->get();
			 return $query->result();
		}

		public function generateRevenue($id)
		{
			$this->db->select('count(*) as TOTAL_TICKET_SOLD' );
			$this->db->select_sum('price', 'REVENUE');
			$this->db->from($this::DB_TABLE);
			$this->db->join('ticket_type as tt', $this::DB_TABLE.'.ticket_type_id = tt.ticket_type_id');
			$this->db->where( array('tt.event_id' => $id ));
			$query = $this->db->get();

			return $query->result();
		}




		public function getTicket_id(){
			return $this->ticket_id;
		}

		public function setTicket_id($ticket_id){
			$this->ticket_id = $ticket_id;
		}

		public function getPrice(){
			return $this->price;
		}

		public function setPrice($price){
			$this->price = $price;
		}

		public function getType(){
			return $this->type;
		}

		public function setType($type){
			$this->type = $type;
		}

		public function getEvent_id(){
			return $this->event_id;
		}

		public function setEvent_id($event_id){
			$this->event_id = $event_id;
		}

		public function getPetition_id(){
			return $this->petition_id;
		}

		public function setPetition_id($petition_id){
			$this->petition_id = $petition_id;
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

		public function setUpdateddBy($updateddBy){
			$this->upgdatedBy = $upgdatedBy;
		}
	}
?>
