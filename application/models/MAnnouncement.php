<?php
	class MAnnouncement extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $announcementID;
		private $announcementID;

		const DB_TABLE = "announcement"; //Table Name
    	const DB_TABLE_PK = "announcementID"; // Primary Key

    	public function __construct(){

		}
		/* GETTER AND SETTERS */
			

		public function getAnnouncementID(){
			return $this->announcementID;
		}

		public function setAnnouncementID($announcementID){
			$this->announcementID = $announcementID;
		}

		/* ****************** */


		/* QUERY FUNCTIONS */

			/* ADMIN MODULE FUNCTIONS */
			

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
