<?php
	class MRegisterEvent extends MY_Model {
		private $petition_id;
		private $petition_status;
		private $petition_name;
		private $petition_details;
		private $petition_date_start;
		private $petition_date_end;
		private $petition_category;
		private $petition_venue;
		private $petition_ticket_price;
		private $petition_ticket_type;
		private $total_no_tickets;
		private $petition_discount;
		private $time_requested;
		private $user_id;
		private $event_id;

		const DB_TABLE = "register_event";
    	const DB_TABLE_PK = "petition_id";

    	public function __construct(){

		}

		public function getPetition_id(){
			return $this->petition_id;
		}

		public function setPetition_id($petition_id){
			$this->petition_id = $petition_id;
		}

		public function getPetition_status(){
			return $this->petition_status;
		}

		public function setPetition_status($petition_status){
			$this->petition_status = $petition_status;
		}

		public function getPetition_name(){
			return $this->petition_name;
		}

		public function setPetition_name($petition_name){
			$this->petition_name = $petition_name;
		}

		public function getPetition_details(){
			return $this->petition_details;
		}

		public function setPetition_details($petition_details){
			$this->petition_details = $petition_details;
		}

		public function getPetition_date_start(){
			return $this->petition_date_start;
		}

		public function setPetition_date_start($petition_date_start){
			$this->petition_date_start = $petition_date_start;
		}

		public function getPetition_date_end(){
			return $this->petition_date_end;
		}

		public function setPetition_date_end($petition_date_end){
			$this->petition_date_end = $petition_date_end;
		}

		public function getPetition_category(){
			return $this->petition_category;
		}

		public function setPetition_category($petition_category){
			$this->petition_category = $petition_category;
		}

		public function getPetition_venue(){
			return $this->petition_venue;
		}

		public function setPetition_venue($petition_venue){
			$this->petition_venue = $petition_venue;
		}

		public function getPetition_ticket_price(){
			return $this->petition_ticket_price;
		}

		public function setPetition_ticket_price($petition_ticket_price){
			$this->petition_ticket_price = $petition_ticket_price;
		}

		public function getPetition_ticket_type(){
			return $this->petition_ticket_type;
		}

		public function setPetition_ticket_type($petition_ticket_type){
			$this->petition_ticket_type = $petition_ticket_type;
		}

		public function getTotal_no_tickets(){
			return $this->total_no_tickets;
		}

		public function setTotal_no_tickets($total_no_tickets){
			$this->total_no_tickets = $total_no_tickets;
		}

		public function getPetition_discount(){
			return $this->petition_discount;
		}

		public function setPetition_discount($petition_discount){
			$this->petition_discount = $petition_discount;
		}

		public function getTime_requested(){
			return $this->time_requested;
		}

		public function setTime_requested($time_requested){
			$this->time_requested = $time_requested;
		}

		public function getUser_id(){
			return $this->user_id;
		}

		public function setUser_id($user_id){
			$this->user_id = $user_id;
		}

		public function getEvent_id(){
			return $this->event_id;
		}

		public function setEvent_id($event_id){
			$this->event_id = $event_id;
		}
	}
?>