<?php
	class MCart extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $event_id;
		private $cart_id;

		const DB_TABLE = "cart"; //Table Name
    	const DB_TABLE_PK = "cart_id"; // Primary Key

    	public function __construct(){

		}
		/* GETTER AND SETTERS */
			

		public function getCart_id(){
			return $this->cart_id;
		}

		public function setCart_id($cart_id){
			$this->cart_id = $cart_id;
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
