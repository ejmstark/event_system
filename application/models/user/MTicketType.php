
<?php
	class MTicketType extends MY_Model {
		private $ticket_type_id;
		private $ticket_name;
		private $price;
		private $event_id;
		private $addedBy; 
		private $updatedBy; 
		private $addedAt; 
		private $updateAt; 


		const DB_TABLE = "ticket_type";
    	const DB_TABLE_PK = "ticket_type_id";

    	public function __construct(){

		}



		public function loadType($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('event_id', $id);

			$query = $this->db->get();
			return $query->result();
		}


		public function getTicket_type_id(){
			return $this->ticket_id;
		}

		public function setTicket_type_id($ticket_id){
			$this->ticket_id = $ticket_id;
		}

		public function getPrice(){
			return $this->price;
		}

		public function setPrice($price){
			$this->price = $price;
		}

		public function getTicket_name(){
			return $this->ticket_name;
		}

		public function setTicket_name($ticket_name){
			$this->ticket_name = $ticket_name;
		}

		public function getEvent_id(){
			return $this->event_id;
		}

		public function setEvent_id($event_id){
			$this->event_id = $event_id;
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

	}
?>
