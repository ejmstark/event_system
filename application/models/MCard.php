<?php
	class MCard extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $event_id;
		private $card_id;

		const DB_TABLE = "card"; //Table Name
    	const DB_TABLE_PK = "card_id"; // Primary Key

   
		/* GETTER AND SETTERS */
			

		public function getCard_id(){
			return $this->card_id;
		}

		public function setCard_id($card_id){
			$this->card_id = $card_id;
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
