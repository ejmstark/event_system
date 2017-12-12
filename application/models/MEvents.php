<?php
	class MEvents extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $event_id;
		private $event_id;

		const DB_TABLE = "event_info"; //Table Name
    	const DB_TABLE_PK = "event_id"; // Primary Key

    	public function __construct(){

		}
		/* GETTER AND SETTERS */
			

		public function getEvent_id(){
			return $this->event_id;
		}

		public function setEvent_id($event_id){
			$this->event_id = $event_id;
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
