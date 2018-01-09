<?php
	class MCart extends MY_Model{
		const DB_TABLE = "cart";
		const DB_TABLE_PK = "cartId";

		public function __construct(){
			
		}

		public function getCart(){
			if($this->db->table_exists(DB_TABLE)){
				$query = $this->read_all();
			 	return $query;
			}else{
				redirect('cError404');
			}
		}
			
	}
?>
