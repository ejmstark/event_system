<?php
	class MPreference extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $event_id;
		private $user_preference_id;

		const DB_TABLE = "user_event_preference"; //Table Name
    	const DB_TABLE_PK = "user_preference_id"; // Primary Key

    	
		/* GETTER AND SETTERS */
			

		public function getUser_preference_id(){
			return $this->user_preference_id;
		}

		public function setUser_preference_id($user_preference_id){
			$this->user_preference_id = $user_preference_id;
		}

		/* ****************** */


		/* QUERY FUNCTIONS */

		public function loadAllPrefEvents(){
			//Sample code
			//find read_all function at application/core/MY_Model.php
			$query = $this->read_all();
			return $query;			             
		}

		public function viewAllPrefEvents($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('account_id', $id);

			$query = $this->db->get();

			return $query->result();
			# code...
		}

		public function joinEventPrefs($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->join('event_info as e', $this::DB_TABLE.'.event_id = e.event_id');
			$this->db->join('user_account as ua', $this::DB_TABLE.'.user_id = ua.account_id');
			$this->db->where( array($this::DB_TABLE.'.user_id' => $id, ));

			$query = $this->db->get();
			 return $query->result();
			# code...
		}
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
