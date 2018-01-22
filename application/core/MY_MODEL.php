<?php
	class MY_Model extends CI_model {
		//mine
		public function __construct(){
			$this->load->database();
		}

		//This method is used for complex queries. To make sure that this method will work fill out each parameter!
		public function select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray($select_str, $where, $is_Distinct = FALSE, $has_orderBy = FALSE,
																																				$has_groupBy = FALSE, $returnAs_objectORarray = FALSE)
		{
			//$select_str is passed as a String for selection of certain data
			$this->db->select($select_str);
			//From db table name
			$this->db->from($this::DB_TABLE);
			//$where could be passed as an Array or String
			$this->db->where($where);

			//If 3rd parameter is blank then $is_Distinct is set to Default: False
			//By default, if $is_Distinct is FALSE, there is no distinct
			//Else, if TRUE, there is distinct
			if($is_Distinct){
				$this->db->distinct();
			}

			//If 4th parameter is blank then $has_orderBy is set to Default: False
			//By default, if $has_orderBy is FALSE, there is no order_by defined
			//Else, if TRUE, order_by should be defined as a String
			if($has_orderBy){
				$this->db->order_by($has_orderBy);
			}

			//If 5th parameter is blank then $has_groupBy is set to Default: False
			//By default, if $has_groupBy is FALSE, there is no group_by defined
			//Else, if TRUE, group_by should be defined as a String
			if($has_groupBy){
				$this->db->group_by($has_groupBy);
			}

			//If 6th parameter is blank then $returnAs_objectORarray is set to Default: False
			//By default, if $returnAs_objectORarray is FALSE, $result is returned as an Object
			//Else, if TRUE, $result is returned as an Array
			$result = ($returnAs_objectORarray)? $this->db->get()->num_rows(): $this->db->get()->result();
			return $result;

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
