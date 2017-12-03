<?php
	class MY_Model extends CI_model {
		//mine
		public function __construct(){
			$this->load->database();
		}

		public function insert ($data) {
			return $this->db->insert($this::DB_TABLE, $data);
		}

		//$where is an array of where, affectedFields is an array that represents updated fields
		public function update ($id, $affectedFields) {
			return $this->db->update($this::DB_TABLE, $affectedFields, array ($this::DB_TABLE_PK=>$id));
		}

		//$where is an array of where, affectedFields is an array that represents updated fields
		public function update1 ($where, $affectedFields) {
			return $this->db->update($this::DB_TABLE, $affectedFields, $where);
		}

		public function read_all(){
      $query = $this->db->get($this::DB_TABLE);
			return $query->result();
   	}

   		//$data is an array of where clause
		public function read_where($where){
			$query = $this->db->get_where($this::DB_TABLE, $where);
			return $query->result();
		}

		//read is a function that returns a row given its pk
		public function read ($id) {
			$query = $this->db->get_where($this::DB_TABLE, array ($this::DB_TABLE_PK=>$id));
			return $query->result();
		}

		//update status to 1 given its pk
		public function delete ($id) {
			return $this->db->delete($this:: DB_TABLE, array ($this::DB_TABLE_PK=>$id));
		}

		//update status to 1 given array of $where clause
		public function delete1 ($where) {
			return $this->db->delete($this:: DB_TABLE, $where);
		}

	}
?>
