<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAdmin extends CI_Controller {

	function __construct() {
		parent::__construct();
	 // 	$this->load->model('MAdmin');
		// $this->load->model('MAdminUsers');
		$this->load->model('MUserInfo');
		$this->load->model('MEventInfo');
		// $this->load->model('MUserInfo');
	}

		
		
	public function index()
	{
		$this->data['custom_js']= '<script type="text/javascript">
                              $(function(){
                              	$("#admin").addClass("active");
                              });
                        </script>';

        $data2['row']=$this->readAllEvents();
         $data3['users']=$this->getUserCount();
		$this->load->view('imports/vHeaderAdmin');
		$this->load->view('admin/vAdmin', $data2);
		$this->load->view('admin/vReport', $data3);
	}

	public function getUserCount(){
		$result = $this->MReports->getUserCountMonthly("2017");
		if($result){
			return $result;
		}else{
			return false;
		}
		
	}

	// view all events
	public function readAllEvents(){
		$result= $this->MEventInfo->read_all();
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public function viewAllUsers() {
        $data2['users']=$this->readAllUsers();
	}

	public function viewAllAdmin() {
        $data2['users']=$this->readAllUsers();
	}

	public function approveEvent($id){
		$event_module = new MEventInfo();

		$data = array('event_id' => $id);
		$results = $this->MEventInfo->read_where($data);

		if($results){
			$response = $event_module-> updateEventStatus($id, "Approved");

			if ($response) {
 				redirect('admin/cAdmin');
 			}
		}
	}

	public function rejectEvent($id){
		$event_module = new MEventInfo();

		$data = array('event_id' => $id);
		$results = $this->MUserInfo->read_where($data);

		if($results){
			$response = $event_module-> updateEventStatus($id, "Rejected");

			if ($response) {
 				echo redirect('admin/cAdmin');
 			}
		}
	}
	
	// view all users
	public function readAllUsers(){
		$user_module = new MUserInfo();
		
		$data = array('user_type' => 'Regular');
		$result= $this->MUserInfo->read_where($data);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	//view all searched user
	public function searchUsers(){
		$user_module = new MUserInfo();
		
		$data = array('user_type' => 'Regular');
		//$result= $this->MUserInfo->read_where($data);
		

		$con=mysqli_connect('localhost','root','','event_db');

		// mysqli_select_db('event_db');
		$search_val = $_POST['search_val'];
		$search_options = "user_name";
		//$search_val = false;
		// if(isset($_POST['search_val'])){
		// 	//$search_val = $_POST['search_val'];
		// 	$search_val = $_POST['search_val'];
			
		// }else{
		// 	$search_val = "";
		// }
		// if(isset($search_val)){
		// 	echo '<b>Results for: <b>'.'<b>'. $search_val;
		// }
		$query="SELECT account_id, user_type, user_name, first_name, middle_initial, last_name, email, gender, contact_no, load_amt, date_account_created, user_status FROM user_account WHERE $search_options LIKE '%$search_val%'";
		if(!$query){
			echo 'MySQL Error: '. mysqli_error();
			exit;
		}
		$result = array('user_type' => 'Regular');
		$result=mysqli_query($con,$query);

		if($result){
			return $result;
		}else{
			return false;
		}
	}
	
	public function Ban($id,$frm){
		$user_module = new MUserInfo();

		$data = array('account_id' => $id);
		$results = $this->MUserInfo->read_where($data);

		if($results){
			$response = $user_module-> updateUserStatus($id, "Banned");

			if ($response) {
				if($frm=="admin"){
					redirect('admin/cAdmin/viewAdminAccountMgt');
				}else if($frm=="user"){
					redirect('admin/cAdmin/viewUserAccountMgt');
				}
 				
 			}
		}
	}
	
	public function Unban($id,$frm){
		$user_module = new MUserInfo();

		$data = array('account_id' => $id);
		$results = $this->MUserInfo->read_where($data);

		if($results){
			$response = $user_module-> updateUserStatus($id, "Active");

			if ($response) {
 				if($frm=="admin"){
					redirect('admin/cAdmin/viewAdminAccountMgt');
				}else if($frm=="user"){
					redirect('admin/cAdmin/viewUserAccountMgt');
				}
 			}
		}
	}
	
	// view all admin
	public function readAllAdmin(){
		$user_module = new MUserInfo();
		
		$data = array('user_type !=' => 'Regular');
		$result = $this->MUserInfo->read_where($data);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	
	// view all Superadmin
	public function readAllSuperAdmin(){
		$user_module = new MUserInfo();
		
		$data = array('user_type' => 'Superadmin');
		$result= $this->MUserInfo->read_where($data);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	
	public function Admin($id){
		$user_module = new MUserInfo();

		$data = array('account_id' => $id);
		$results = $this->MUserInfo->read_where($data);

		if($results){
			$response = $user_module-> updateUserType($id, "Admin");

			if ($response) {
 				redirect('admin/cAdmin/viewAdminAccountMgt');
 			}
		}
	}
	
	public function SuperAdmin($id){
		$user_module = new MUserInfo();

		$data = array('account_id' => $id);
		$results = $this->MUserInfo->read_where($data);

		if($results){
			$response = $user_module-> updateUserType($id, "Superadmin");

			if ($response) {
 				redirect('admin/cAdmin/viewAdminAccountMgt');
 			}
		}
	}

	public function addAdmin()
	{
		$user = new MUserInfo();

		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		$data = array('user_name' => $this->input->post('uname'), 
					  'password' => $this->input->post('password'),
					  'first_name' => $this->input->post('fname'),
					  'last_name' => $this->input->post('lname'),
					  'middle_initial' => $this->input->post('miname'),
					  'email' => $this->input->post('email'),
					  'birthdate' => $this->input->post('bdate'),
					  'gender' => $this->input->post('gender'),					  
					  'contact_no' => $this->input->post('contact'),
					  'user_type' =>  $this->input->post('userType'),
					  'date_account_created' => $now->format('Y-m-d H:i:s')	
					);

		$result = $user->insert($data);

		if($result){
			//$this->index();
			redirect('admin/cAdmin/viewAdminAccountMgt');
		}

		# code...
	}

	public function viewUserAccountMgt() {
		$data2['users']=$this->readAllUsers();
		$this->load->view('imports/vHeaderAdmin');
		$this->load->view('admin/vUserAccountMgt', $data2);
	}
	//Roald Code
	//this function will show the search results coming from viewUserAccountMgt()
	public function viewSearchUserAccountMgt() {
		$data2['users']=$this->searchUsers();
		$this->load->view('imports/vHeaderAdmin');
		$this->load->view('admin/vUserAccountMgt', $data2);
	}

	public function viewAdminAccountMgt() {
		$data2['admin']=$this->readAllAdmin();
		$this->load->view('imports/vHeaderAdmin');
		$this->load->view('admin/vAdminAccountMgt', $data2);
	}

	public function viewFinance() {

		$this->load->view('imports/vHeaderAdmin');
		$this->load->view('admin/vFinance');
	}

	public function viewReport() {
		$this->load->view('imports/vHeaderAdmin');
		$this->load->view('admin/vReport');
	}

}
