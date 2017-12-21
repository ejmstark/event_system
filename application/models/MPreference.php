<?php
	class MPreference extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $event_id;
		private $user_preference_id;

		const DB_TABLE = "user_event_preference"; //Table Name
    	const DB_TABLE_PK = "user_preference_id"; // Primary Key

    	public function __construct(){

		}
		/* GETTER AND SETTERS */
			

		public function getUser_preference_id(){
			return $this->user_preference_id;
		}

		public function setUser_preference_id($user_preference_id){
			$this->user_preference_id = $user_preference_id;
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
