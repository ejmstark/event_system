<?php
	class MCart extends MY_Model{
		const DB_TABLE = "cart";
		const DB_TABLE_PK = "cartId";

		public function __construct(){
			//$this->DB_TABLE = "card";
		}

		public function getCart(){
			$query = $this->read_all();
			 return $query;
		}
	}
?>
