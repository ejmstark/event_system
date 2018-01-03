<?php
	class MCard extends MY_Model {
		private $card_id;

		const DB_TABLE = "card";
    	const DB_TABLE_PK = "card_id";

   
		/* GETTER AND SETTERS */
			

		public function getCard_id(){
			return $this->card_id;
		}

		public function setCard_id($card_id){
			$this->card_id = $card_id;
		}

	} 
?>
