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
			# code...
		}

		public function attemptLogin(){
				//$hashPass=hash('sha512',$this->agentPassword);

			$query= $this->db->get_where($this::DB_TABLE,array('user_name'=>$this->user_name,'password'=>$this->user_password));
			// $query= $this->db->get_where($this::DB_TABLE,array("user_name like binary"=>$this->user_name,"password like binary"=>$this->user_password));
			if($query -> num_rows() == 1){
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
			# code...
		}

		public function getAllUsers(){
			//Sample code
			//find read_all function at application/core/MY_Model.php
			$query = $this->read_all();
			return $query;			             
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
			$this->user_name = $user_name;
		}

		public function setUser_password($user_password){
			$this->user_password = $user_password;
		}

		public function getUser_password(){
			return $this->user_password;
		}

		public function getFirst_name(){
			return $this->first_name;
		}

		public function setFirst_name($first_name){
			$this->first_name = $first_name;
		}

		public function getLast_name(){
			return $this->last_name;
		}

		public function setLast_name($last_name){
			$this->last_name = $last_name;
		}

		public function getMiddle_initial(){
			return $this->middle_initial;
		}

		public function setMiddle_initial($middle_initial){
			$this->middle_initial = $middle_initial;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
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
			$this->gender = $gender;
		}

		public function getContact_no(){
			return $this->contact_no;
		}

		public function setContact_no($contact_no){
			$this->contact_no = $contact_no;
		}	


		public function updateUserStatus($id, $status)
		{
			$data = array('user_status' => $status );

			return $this->update($id,$data);
		}

		public function updateUserType($id, $type)
		{
			$data = array('user_type' => $type );

			return $this->update($id,$data);

		}

		public function updateUpgradedBy($id,$toUpgrade)
		{
			$data = array('upgradedBy' => $toUpgrade);

			return $this->update($id, $data);
		}

	}
?>