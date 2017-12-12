<?php
	class MUser extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $event_id;
		private $account_id;

		const DB_TABLE = "user_account"; //Table Name
    	const DB_TABLE_PK = "account_id"; // Primary Key

    	public function __construct(){

		}
		/* GETTER AND SETTERS */
			

		public function getAccount_id(){
			return $this->account_id;
		}

		public function setAccount_id($account_id){
			$this->account_id = $account_id;
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
