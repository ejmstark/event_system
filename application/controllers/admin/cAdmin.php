	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAdmin extends CI_Controller {

	function __construct() {
		parent::__construct();
	 // 	$this->load->model('MAdmin');
		// $this->load->model('MAdminUsers');
		$this->load->model('MUserInfo');
		$this->load->model('MEventInfo');
		$this->load->model('MReports');
		$this->load->model('MUser');
		$this->load->model('MAnnouncement');
		$this->load->model('MCardLoad');
		// $this->load->model('MUserInfo');
	}

	public function index()
	{
		redirect('admin/cAdmin/viewReport');

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
 				redirect('admin/cAdmin/viewAllEvents');
 			}
		}
	}

	public function rejectEvent($id){
		$event_module = new MEventInfo();

		$data = array('event_id' => $id);
		$results = $event_module->read_where($data);

		if($results){
			$response = $event_module-> updateEventStatus($id, "Rejected");

			if ($response) {
 				echo redirect('admin/cAdmin/viewAllEvents');
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
		if(isset($_POST['search_val'])){
			if (trim($_POST['search_val']) == ""){
				$result = $this->readAllUsers();
				if($result){
					return $result;
				}else{
					return false;
				}
			}
			$data = array('user_name' => $_POST['search_val']);
			$result= $this->MUserInfo->read_where($data);
			if($result){
				return $result;
			}else{
				return false;
			}
		} else {
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
			// echo "<pre>";
			// var_dump($result);
			// die();
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
				$response2 = $user_module->updateUpgradedBy($id,NULL);
				if($response2){
 					redirect('admin/cAdmin/viewAdminAccountMgt');
				}
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
				$response2 = $user_module->updateUpgradedBy($id,$this->session->userdata['adminSession']->userID);
				if($response2){
 					redirect('admin/cAdmin/viewAdminAccountMgt');
				}
 			}
		}
	}

	public function addAdmin()
	{
		$user = new MUserInfo();

		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		if($this->input->post('userType')=="Superadmin") {
			$data = array('user_name' => $this->input->post('uname'),
					  'password' => hash('sha512',$this->input->post('password')),
					  'first_name' => $this->input->post('fname'),
					  'last_name' => $this->input->post('lname'),
					  'middle_initial' => $this->input->post('miname'),
					  'email' => $this->input->post('email'),
					  'birthdate' => $this->input->post('bdate'),
					  'gender' => $this->input->post('gender'),
					  'contact_no' => $this->input->post('contact'),
					  'user_type' =>  $this->input->post('userType'),
					  'upgradedBy' => $this->session->userdata['adminSession']->userID,
					  'addedAt	' => $now->format('Y-m-d H:i:s')
					);
		} else {
			$data = array('user_name' => $this->input->post('uname'),
					  'password' => hash('sha512',$this->input->post('password')),
					  'first_name' => $this->input->post('fname'),
					  'last_name' => $this->input->post('lname'),
					  'middle_initial' => $this->input->post('miname'),
					  'email' => $this->input->post('email'),
					  'birthdate' => $this->input->post('bdate'),
					  'gender' => $this->input->post('gender'),
					  'contact_no' => $this->input->post('contact'),
					  'user_type' =>  $this->input->post('userType'),
					  'addedAt	' => $now->format('Y-m-d H:i:s')
					);
		}



		$res = $this->MUser->read_where(array('user_name' => $data['user_name']));
		$res1 = $this->MUser->read_where(array('email' => $data['email']));

    	if($res){
    			$this->session->set_flashdata('error_msg','Username taken');
    			$this->viewAdminAccountMgt();
    			// redirect('user/cUser/viewSignUp',"refresh");
				//echo "INVALID, EXISTING USERNAME, PLS TRY AGAIN";

		}else if($res1){
			$this->session->set_flashdata('error_msg','Email taken');
				$this->viewAdminAccountMgt();
				//echo "INVALID, EXISTING EMAIL, PLS TRY AGAIN";

		}else{

			$result = $user->insert($data);


			if($result){
				//$this->index();
				redirect('admin/cAdmin/viewAdminAccountMgt');
			}
		}

		# code...
	}

	public function viewUserAccountMgt() {
		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$data2['users']=$this->readAllUsers();
		////////////STOPS HERE////////////////////////////////////////////////////
		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vUserAccountMgt', $data2);
		$this->load->view('imports/admin_vFooter');

	}
	//Roald Code
	//this function will show the search results coming from viewUserAccountMgt()
	public function viewSearchUserAccountMgt() {
		$result_data=$this->searchUsers();
		if($result_data != false){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->account_id = $value->account_id;
					$arrObj->user_name = $value->user_name;
					$arrObj->first_name = $value->first_name;
					$arrObj->middle_initial = $value->middle_initial;
					$arrObj->last_name = $value->last_name;
					$arrObj->email= $value->email;
					$arrObj->contact_no= $value->contact_no;
					$arrObj->birthdate= $value->birthdate;
					$arrObj->addedAt	 = $value->addedAt	;
					$arrObj->gender = $value->gender;
					$arrObj->user_type = $value->user_type;
					$arrObj->user_status = $value->user_status;
					$arrObj->load_amt = $value->load_amt;
					$array[] = $arrObj;
			}
			$data2['users']=$array;
		} else {
			$data2['users']=array();
		}

		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vUserAccountMgt', $data2);
		$this->load->view('imports/admin_vFooter');

	}

	public function viewAdminAccountMgt() {
		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$data2['admin']=$this->readAllAdmin();
		$data2['ownAdminAccount']=$this->readOwnAdminAccount();
		////////////STOPS HERE///////////////////////////////////////////////////


		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vAdminAccountMgt', $data2);
		$this->load->view('imports/admin_vFooter');

	}

	public function viewFinance() {

		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vFinance');
		$this->load->view('imports/admin_vFooter');

	}

	public function viewReport() {

		//$data['data']=$array;
		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vReport');
		$this->load->view('imports/admin_vFooter');

	}

	public function adminSettings() {
		$result_data = array();//
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
			foreach ($result_data as $value) {
					 $arrObj = new stdClass;
					//Only interface filtering
					// $arrObj->account_id = $value->account_id;
					// $arrObj->user_name = $value->user_name;
					// $arrObj->first_name = $value->first_name;
					// $arrObj->middle_initial = $value->middle_initial;
					// $arrObj->last_name = $value->last_name;
					// $arrObj->email= $value->email;
					// $arrObj->contact_no= $value->contact_no;
					// $arrObj->birthdate= $value->birthdate;
					// $arrObj->date_account_created = $value->date_account_created;
					// $arrObj->gender = $value->gender;
					// $arrObj->user_type = $value->user_type;
					// $arrObj->user_status = $value->user_status;
					// $arrObj->load_amt = $value->load_amt;
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vSettings');
		$this->load->view('imports/admin_vFooter');

	}

	public function generateCard() {
		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vCards');
		$this->load->view('imports/admin_vFooter');

	}

	public function updateAdmin() {
		$user = new MUserInfo();

		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		$data = array('user_name' => $this->input->post('uuname'),
					  'password' => $this->input->post('upassword'),
					  'first_name' => $this->input->post('ufname'),
					  'last_name' => $this->input->post('ulname'),
					  'middle_initial' => $this->input->post('uminame'),
					  'email' => $this->input->post('uemail'),
					  'birthdate' => $this->input->post('ubdate'),
					  'gender' => $this->input->post('ugender'),
					  'contact_no' => $this->input->post('ucontact'),
					  'user_type' =>  $this->input->post('uuserType'),
					  'addedAt	' => $now->format('Y-m-d H:i:s')
					);

		$result = $user->update($this->session->userdata['adminSession']->userID, $data);

		if($result){
			$message = "Succesful update";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header('refresh:1;viewAdminAccountMgt');
		}else{
			$message = "Update fail";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header('refresh:;viewAdminAccountMgt');
		}

	}

	public function Delete($id,$frm){
		$user_module = new MUserInfo();

		$data = array('account_id' => $id);
		$results = $this->MUserInfo->read_where($data);

		if($results){
			$response = $user_module-> updateUserStatus($id, "Deleted");

			if ($response) {
				if($frm=="admin"){
					redirect('cLogin/userLogout');
				}else if($frm=="user"){
					redirect('cLogin/userLogout');
				}

 			}
		}
	}

	public function readOwnAdminAccount() {
		$user_module = new MUserInfo();
		$data = array('account_id' => $this->session->userdata['adminSession']->userID);
		$result= $this->MUserInfo->read_where($data);

		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public function numEvents($startDate, $endDate){
		$result = $this->MReports->numEvents($startDate, $endDate);
		if($result){
			return $result;
		}else{
			return false;
		}
	}


	public function getActiveUsers($startDate, $endDate){
		$result = $this->MReports->countUsers($startDate, $endDate);
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public function getUserMonthly(){
		///////////////////////////////////////
		///////Interface New Implementation////
		///////////////////////////////////////
		$year = $_GET['years'];
		$userModel = new MUser();
		$where = array('YEAR(user_account.addedAt	)' => $year,
									 'user_account.user_status' => 'Active',
									 'user_account.user_type' => 'Regular'
								 );
		$result = $userModel->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray('COUNT(*) as UserCount,
							MONTHNAME(user_account.addedAt	) as monthname',
							$where,FALSE,FALSE,"MONTH(user_account.addedAt	)",FALSE);
		$arr_data = array();
		foreach ($result as $value) {
			$arr_data[] = [$value->UserCount, $value->monthname];
		}
		echo json_encode($arr_data);
		//////////////////////////////////////
		//////////////////////////////////////
	}

	public function getCardsMonthly(){
		///////////////////////////////////////
		///////Interface New Implementation////
		///////////////////////////////////////
		// $year = $_GET['years'];
		// $userModel = new MUser();
		// $where = array('YEAR(user_account.addedAt	)' => $year,
		// 							 'card.cardStatus' => 1,
		// 						 );
		// $result = $userModel->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray('COUNT(*) as UserCount,
		// 					MONTHNAME(user_account.addedAt	) as monthname',
		// 					$where,FALSE,FALSE,"MONTH(user_account.addedAt	)",FALSE);
		// $arr_data = array();
		// foreach ($result as $value) {
		// 	$arr_data[] = [$value->UserCount, $value->monthname];
		// }
		// echo json_encode($arr_data);

		// $this->db->select('COUNT(*) as CardCount');
		// $this->db->select('MONTHNAME(card.cardCreatedOn) as monthname');
		// $this->db->from('card');
		// $this->db->where("cardStatus = 1");
		// $this->db->group_by("monthname");
		// $this->db->order_by("monthname", "desc");

		$strSelect = "COUNT(*) as CardCount, MONTHNAME(card.cardCreatedOn) as monthname";
		$strWhere = "cardStatus = 1";


		$result = $this->MCardLoad->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray($strSelect,
							$strWhere,FALSE,'monthname DESC',"monthname",FALSE);

		$arr_data = array();
		foreach ($result as $value) {
			$arr_data[] = [$value->CardCount, $value->monthname];
		}
		// //////////////////////////////////////
		echo json_encode($arr_data);
		//////////////////////////////////////
	}

	public function getEvents(){
		///////////////////////////////////////
		///////Interface New Implementation////
		///////////////////////////////////////
		$year = $_GET['years'];
		$eventModel = new MEventInfo();
		$where = array("event_status" => "APPROVED",
										"YEAR(addedAt)" => $year
								 );
		$result = $eventModel->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray('COUNT(*) as EventCount',
							$where,FALSE,FALSE,FALSE,FALSE);
		$arr_data = array();
		foreach ($result as $value) {
			$arr_data[] = [$value->EventCount];
		}
		echo json_encode($arr_data);
		//////////////////////////////////////
		//////////////////////////////////////
	}


	//ANNOUNCEMENT FUNCTIONALITY - also added MAnnouncement in models/admin and autoload.php (12/04/17)
	public function viewAnnouncements() {
		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////

		$data2['admin']=$this->readAllAdmin();
		$data2['ownAdminAccount']=$this->readOwnAdminAccount();
		$data2['announcements']=$this->readAllAnnouncements();
		////////////STOPS HERE///////////////////////////////////////////////////


		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vAnnouncements', $data2);
		$this->load->view('imports/admin_vFooter');
	}

	public function createAnnouncement() {
		$announcement = new MAnnouncement();

		// $now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		$data = array('announcementDetails' => $this->input->post('announcementDetails'),
					  'announcementStatus' => 'OnGoing',
					  'addedBy' => $this->input->post('postedBy'),
					  // 'addedAt' => $now->format('Y-m-d H:i:s')
					);

		$result = $announcement->insert($data);
		 $id= $announcement->db->insert_id();
		if($result){
			//$this->index();
			//$this->index();
			$notif = new MNotificationItem();
			$user = $this->MUser->getAllUsers();
			foreach ($user as $key) {
				$data = array('user' => $key->account_id,
							  'announcement' => $id
							);

				$result = $notif->insert($data);	
			}
			
			redirect('admin/cAdmin/viewAnnouncements');
		}
	}

	// view all announcements
	public function readAllAnnouncements(){
		$result= $this->MAnnouncement->read_all();
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public function deleteAnnouncement($id){
		$announcement = new MAnnouncement();

		$data = array('announcementID' => $id);
		$results = $this->MAnnouncement->read_where($data);

		if($results){
			$response = $announcement->updateAnnouncementStatus($id, "Finished");

			if ($response) {
				redirect('admin/cAdmin/viewAnnouncements');
 			}
		}
	}

	public function viewAllEvents(){
		$this->data['custom_js']= '<script type="text/javascript">
                              $(function(){
                              	$("#admin").addClass("active");
                              });
                        </script>';
		// //////////////////////////////////////////////////////////////////////////////
		// //================Sprint 3 INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		// /////////////////////////////////////////////////////////////////////////////
		$data2['row'] = $this->MEventInfo->read_all();
		////////////STOPS HERE///////////////////////////////////////////////////

		$data3['users']=$this->getUserCount();
		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vAdmin', $data2);
		$this->load->view('imports/admin_vFooter');
	}

public function updateAccount() {
	$data2['admin']=$this->readAllAdmin();
		$data2['ownAdminAccount']=$this->readOwnAdminAccount();
		////////////STOPS HERE///////////////////////////////////////////////////


		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vUpdateAccount', $data2);
		$this->load->view('imports/admin_vFooter');



	}
}


