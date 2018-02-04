<?php
	class MUser extends MY_Model {
		private $account_id;
		private $user_name;
		private $user_password;
		private $first_name;
		private $last_name;
		private $middle_initial;
		private $email;
		private $birthdate;
		private $gender;
		private $contact_no;

		const DB_TABLE = "user_account";
    	const DB_TABLE_PK = "account_id";

    	public function __construct(){

		}

		public function Attendance()
		{	
			
			$this->db->select("ei.event_name as event_id, user_account.user_name as name , count(*) as total");
			$this->db->from('user_account ');
			$this->db->join('ticket as t', 'user_account.account_id = t.user_id');
			$this->db->join('ticket_type as tt', 'tt.ticket_type_id = t.ticket_type_id');
			$this->db->join('event_info as ei', 'tt.event_id = ei.event_id');
			$this->db->group_by('user_account.user_name');
			$query = $this->db->get();

			return $query->result();

		}

		public function attemptLogin(){

			$query= $this->db->get_where($this::DB_TABLE,array('user_name'=>$this->user_name,'password'=>$this->user_password));

			if($query->num_rows() == 1){
			    return $query->result();
			}else{
         		return false;
            }
		}

		public function loadUserDetails($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('account_id', $id);

			$query = $this->db->get();

			return $query->result();
		}

		public function getAllUsers(){
			$query = $this->read_all();
			return $query;			             
		}
		public function checkAllUsers($username){
			$query= $this->db->get_where($this::DB_TABLE,array('user_name'=>$username));
			return $query->num_rows();
			         
		}
		

		public function updateSpecificEvent($id, $data){
			$this->db->where('event_id', $id);
			return $this->db->update('event_info', $data);
		}
		public function getEventDetails($id){
			$this->db->select('event_id, event_name, event_venue, event_date_start, event_date_end, event_category, event_details');
			$this->db->from('event_info');
			$this->db->where('event_info.event_id', $id);

			return $this->db->get();
		}

		public function getTicketDetails($id){
			$this->db->select('ticket_name, price, ticket_count, ticket_type_id');
			$this->db->from('ticket_type');
			$this->db->where('event_id', $id);

			return $this->db->get();
		}
		
		public function getAccount_id(){
			return $this->account_id;
		}

		public function setAccount_id($account_id){
			$this->account_id = $account_id;
		}

		public function getUser_name(){
			return $this->user_name;
		}

		public function setUser_name($user_name){
			$user_name = trim($user_name);
			$user_name = filter_var($user_name,FILTER_SANITIZE_STRING);
			$this->user_name = $user_name;
		}

		public function setUser_password($user_password){
			$user_password = trim($user_password);
			$user_password = filter_var($user_password,FILTER_SANITIZE_STRING);
			$this->user_password = $user_password;
		}

		public function getUser_password(){
			return $this->user_password;
		}

		public function getFirst_name(){
			return $this->first_name;
		}

		public function setFirst_name($first_name){
			$first_name = trim($first_name);
			$first_name = filter_var($first_name,FILTER_SANITIZE_STRING);
			$this->first_name = $first_name;
		}


		public function getLast_name(){
			return $this->last_name;
		}

		public function setLast_name($last_name){
			$last_name = trim($last_name);
			$last_name = filter_var($last_name,FILTER_SANITIZE_STRING);
			$this->last_name = $last_name;
		}

		public function getMiddle_initial(){
			return $this->middle_initial;
		}

		public function setMiddle_initial($middle_initial){
			$middle_initial = trim($middle_initial,FILTER_SANITIZE_STRING);
			$this->middle_initial = $middle_initial;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$email = trim($email);
			$email = filter_var($email,FILTER_SANITIZE_STRING);
			$this->email = $email;
		}


		public function getBirthdate(){
			return $this->birthdate;
		}

		public function setBirthdate($birthdate){
			$this->birthdate = $birthdate;
		}

		public function getGender(){
			return $this->gender;
		}

		public function setGender($gender){
			$gender = trim($gender);
			$gender = filter_var($gender,FILTER_SANITIZE_STRING);
			$this->gender = $gender;
		}

		public function getContact_no(){
			return $this->contact_no;
		}

		public function setContact_no($contact_no){
			$contact_no = trim($contact_no);
			$contact_no = filter_var($contact_no,FILTER_SANITIZE_STRING);
			$this->contact_no = $contact_no;
		}

	}
?>