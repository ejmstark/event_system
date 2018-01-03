<?php
	class MPreference extends MY_Model {
		private $user_preference_id;
		private $preference_date;
		private $user_id;
		private $event_id;
		private $addedBy; 
		private $updatedBy; 
		private $addedAt; 
		private $updateAt; 

		const DB_TABLE = "user_event_preference";
    	const DB_TABLE_PK = "user_preference_id";

    	public function __construct(){

		}

		public function loadAllPrefEvents(){
			$query = $this->read_all();
			return $query;			             
		}

		public function viewAllPrefEvents($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('account_id', $id);

			$query = $this->db->get();

			return $query->result();
		}

		public function joinEventPrefs($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->join('event_info as e', $this::DB_TABLE.'.event_id = e.event_id');
			$this->db->join('user_account as ua', $this::DB_TABLE.'.user_id = ua.account_id');
			$this->db->where( array($this::DB_TABLE.'.user_id' => $id, ));

			$query = $this->db->get();
			 return $query->result();
		}


		

		//Class getters and setters.

		public function getUser_preference_id(){
			return $this->user_preference_id;
		}

		public function setUser_preference_id($user_preference_id){
			$this->user_preference_id = $user_preference_id;
		}

		public function getPreference_date(){
			return $this->preference_date;
		}

		public function setPreference_date($preference_date){
			$this->preference_date = $preference_date;
		}

		public function getUser_id(){
			return $this->user_id;
		}

		public function setUser_id($user_id){
			$this->user_id = $user_id;
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
		//End of class getters and setters.

		
	}
?>