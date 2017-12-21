<?php
	class MEvents extends MY_Model {
		/*Declare Entities*/
		//Ex.: private $event_id;
		private $event_id;
		private $event_date_start;
		private $event_date_end;
		private $no_tickets_total;
		private $event_status;
		private $event_name;
		private $event_details;
		private $event_category;
		private $event_venue;
		private $date_created;
		private $user_id

		const DB_TABLE = "event_info"; //Table Name
    	const DB_TABLE_PK = "event_id"; // Primary Key

    	public function __construct(){

		}
		/* GETTER AND SETTERS */


		public function getEvent_id(){
			return $this->event_id;
		}
		public function getEvent_date_start(){
			return $this->event_date_start;
		}
		public function getEvent_date_end(){
			return $this->event_date_end;
		}
		public function getNo_tickets_total(){
			return $this->no_tickets_total;
		}
		public function getEvent_status(){
			return $this->event_status;
		}
		public function getEvent_name(){
			return $this->event_name;
		}
		public function getEvent_details(){
			return $this->event_details;
		}
		public function getEvent_category(){
			return $this->event_category;
		}
		public function getEvent_venue(){
			return $this->event_venue;
		}
		public function getDate_created(){
			return $this->date_created;
		}
		public function getUser_id(){
			return $this->user_id;
		}

		public function setEvent_id($event_id){
			$this->event_id = $event_id;
		}
		public function setEvent_date_start($event_date_start){
			$this->event_date_start = $event_date_start;
		}
		public function setEvent_date_end($event_date_end){
			$this->event_date_end = $event_date_end;
		}
		public function setNo_tickets_total($no_tickets_total){
			$this->no_tickets_total = $no_tickets_total;
		}
		public function setEvent_status($event_status){
			$this->event_status = $event_status;
		}
		public function setEvent_name($event_name){
			$this->event_name = $event_name;
		}
		public function setEvent_details($event_details){
			$this->event_details = $event_details;
		}
		public function setEvent_category($event_category){
			$this->event_category = $event_category;
		}
		public function setEvent_venue($event_venue){
			$this->event_venue = $event_venue;
		}
		public function setDate_created($date_created){
			$this->date_created = $date_created;
		}
		public function setUser_id($user_id){
			$this->user_id = $user_id;
		}
		/* ****************** */


		/* QUERY FUNCTIONS */

			/* ADMIN MODULE FUNCTIONS */
			public function updateEventStatus($id, $status)
			{
				$data = array('event_status' => $status );

				return $this->update($id,$data);

			}
			public function getAllEvents(){
				//Sample code
				//find read_all function at application/core/MY_Model.php
				$query = $this->read_all();
				return $query;
			}
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
