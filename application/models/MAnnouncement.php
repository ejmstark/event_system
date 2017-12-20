<?php
	class MAnnouncement extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $announcementID;
		private $announcementID;
		private $announcementDetails;
		private $announcementStatus;

		private $addedBy;
		private $updatedBy;
		private $addedAt;
		private $updatedAt;

		const DB_TABLE = "announcement"; //Table Name
    	const DB_TABLE_PK = "announcementID"; // Primary Key

    	public function __construct(){

		}
		/* GETTER AND SETTERS */


		public function getAnnouncementID(){
			return $this->announcementID;
		}
		public function getAnnouncementDetails(){
			return $this->announcementDetails;
		}

		public function getAnnouncementStatus(){
			return $this->announcementStatus;
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
			return $this->updatedAt;
		}

		public function setAnnouncementID($announcementID){
			$this->announcementID = $announcementID;
		}

		public function setAnnouncementDetails($announcementDetails){
			$this->announcementDetails = $announcementDetails;
		}

		public function setAnnouncementStatus($announcementStatus){
			$this->announcementStatus = $announcementStatus;
		}

		public function set($addedBy){
			$this->addedBy = $addedBy;
		}

		public function set($updatedBy){
			$this->updatedBy = $updatedBy;
		}

		public function set($addedAt){
			$this->addedAt = $addedAt;
		}

		public function set($updatedAt){
			$this->updatedAt = $updatedAt;
		}

		/* ****************** */


		/* QUERY FUNCTIONS */

			/* ADMIN MODULE FUNCTIONS */
			public function updateAnnouncementStatus($id, $status) {
				$data = array('announcementStatus' => $status );

				return $this->update($id,$data);
			}
			public function loadAllAnnouncementDetails(){
				$this->db->select('*');
				$this->db->from($this::DB_TABLE);
				$this->db->join('user_account', $this::DB_TABLE . '.addedBy = user_account.account_id');
				$query = $this->db->get();

				return $query->result();
			}

			/* *************** */

			/* USER MODULE FUNCTIONS */


			/* *************** */

			/* CALENDAR MODULE FUNCTIONS */



			/* *************** */

			/* FINANCE MODULE FUNCTIONS */



			/* *************** */

			/* REPORTS MODULE FUNCTIONS */



			/* *************** */

		/* ************** */
	}
?>
