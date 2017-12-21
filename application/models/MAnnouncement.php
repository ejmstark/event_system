<?php
	class MAnnouncement extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $announcementID;
		private $announcementID;
		private $announcementDetails;
		private $announcementStatus;
		private $postedBy;
		private $datePosted;

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

		public function getPostedBy(){
			return $this->postedBy;
		}

		public function getDatePosted(){
			return $this->datePosted;
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

		public function setPostedBy($postedBy){
			$this->postedBy = $postedBy;
		}

		public function setDatePosted($datePosted){
			$this->datePosted = $datePosted;
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
				$this->db->join('user_account', $this::DB_TABLE . '.postedBy = user_account.account_id');
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
