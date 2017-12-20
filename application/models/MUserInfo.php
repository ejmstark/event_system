<?php
	class MUserInfo extends MY_Model {
		private $account_id;
		private $user_name;
		private $password;
		private $user_type;
		private $upgradedBy; 
		private $user_status;
		private $first_name;
		private $last_name;
		private $middle_initial;
		private $user_imgpath; 	
		private $email;
		private $birthdate;
		private $gender;
		private $contact_no;
		private $addedBy; 
		private $updatedBy; 
		private $addedAt; 
		private $updateAt; 

		const DB_TABLE = "user_account";
    	const DB_TABLE_PK = "account_id";

    	public function __construct(){

		}

		public function getAccount_id(){
			return $this->account_id;
		}
		public function getUsername(){
			return $this->usernamedated;
		}
		public function getPassword(){
			return $this->password;
		}
		public function getUser_type(){
			return $this->user_type;
		}
		public function getUser_status(){
			return $this->user_status;
		}
		public function getFirstName(){
			return $this->first_name;
		}
		public function getLastName(){
			return $this->last_name;
		}
		public function getMiddleInit(){
			return $this->middle_initial;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getBirthDate(){
			return $this->birthdate;
		}
		public function getGender(){
			return $this->gender;
		}
		public function getContactNo(){
			return $this->contact_no;
		}
		public function getLoad(){
			return $this->load_amt;
		}

		public function getUpgradedBy(){
			return $this->upgradedBy;
		}

		public function getUser_imgPath(){
			return $this->user_imgPath;
		}

		public function getAddedBy(){
			return $this->addedBy;
		}

		public function getUpdatedBy(){
			return $this->updatedBy;
		}

		public function getAddedAt(){
			return $this->addedAt;
		}

		public function getUpdatedAt(){
			return $this->updateAt;
		}
		

		public function setAccount_id($account_id){
			$this->account_id = $account_id;
		}
		public function setUsername($username){
			$this->username = $username;
		}
		public function setPassword($password){
			$this->password = $password;
		}
		public function setUser_type($user_type){
			$this->user_type = $user_type;
		}
		public function setUser_status($user_status){
			$this->user_status = $user_status;
		}
		public function setFirstName($first_name){
			$this->first_name = $first_name;
		}
		public function setLastName($last_name){
			$this->last_name = $last_name;
		}
		public function setMiddleIni($middle_initial){
			$this->middle_initial = $middle_initial;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setBirthDate($birthdate){
			$this->birthdate = $birthdate;
		}
		public function setGender($gender){
			$this->gender = $gender;
		}
		public function setContactNo($contact_no){
			$this->contact_no = $contact_no;
		}
		public function setLoad($load_amt){
			$this->load_amt = $load_amt;
		}
		public function setUpgradedBy($upgradedBy){
			$this->upgradedBy = $upgradedBy;
		}

		public function setUser_imgPath($user_imgpath){
			$this->user_imgPath = $user_imgpath;
		}

		public function setAddedBy($addedAt){
			$this->addedBy = $addedAt;
		}

		public function setUpdatedBy($upgradedAt){
			$this->updatedBy = $upgradedAt;
		}

		public function setAddedAt($addedBy){
			$this->addedBy = $addedBy;
		}

		public function setUpdateddBy($updateddBy){
			$this->upgdatedBy = $upgdatedBy;
		}
		

		//End of class getters and setters.

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
