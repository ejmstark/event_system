<?php
	class MTicket extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $event_id;
		private $ticket_id;

		const DB_TABLE = "ticket"; //Table Name
    	const DB_TABLE_PK = "ticket_id"; // Primary Key

    	public function __construct(){

		}
		/* GETTER AND SETTERS */
			

		public function getTicket_id(){
			return $this->ticket_id;
		}

		public function setTicket_id($ticket_id){
			$this->ticket_id = $ticket_id;
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
