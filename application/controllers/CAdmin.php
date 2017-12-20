	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAdmin extends CI_Controller {

	function __construct() {
		parent::__construct();
;
		$this->load->model('MUser');
		$this->load->model('MEvents');
		$this->load->model('MTicket');
		$this->load->model('MAnnouncement');
	}

	public function index()
	{
		redirect('CAdmin/viewReport');

	}

	public function getUserCount(){
		$result = $this->MTicket->getUserCountMonthly("2017");
		if($result){
			return $result;
		}else{
			return false;
		}

	}


	// view all events
	public function readAllEvents(){
		$result= $this->MEvents->read_all();
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
		$results = $this->MEvents->read_where($data);

		if($results){
			$response = $this->MEvents->updateEventStatus($id, "Approved");

			if ($response) {
 				redirect('CAdmin/viewAllEvents');
 			}
		}
	}

	public function rejectEvent($id){
		$data = array('event_id' => $id);
		$results = $this->MEvents->read_where($data);

		if($results){
			$response = $this->MEvents->updateEventStatus($id, "Rejected");

			if ($response) {
 				echo redirect('CAdmin/viewAllEvents');
 			}
		}
	}

	// view all users
	public function readAllUsers(){
		$data = array('user_type' => 'Regular');
		$result= $this->MEvents->read_where($data);
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	//view all searched user
	public function searchUsers(){
		if(isset($_POST['search_val'])){
			$data = array('user_name' => $_POST['search_val']);
			$result= $this->MEvents->read_where($data);
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
		$data = array('account_id' => $id);
		$results = $this->MEvents->read_where($data);

		if($results){
			$response = $this->MEvents->updateUserStatus($id, "Banned");

			if ($response) {
				if($frm=="admin"){
					redirect('CAdmin/viewAdminAccountMgt');
				}else if($frm=="user"){
					redirect('CAdmin/viewUserAccountMgt');
				}

 			}
		}
	}

	public function Unban($id,$frm){
		$data = array('account_id' => $id);
		$results = $this->MEvents->read_where($data);

		if($results){
			$response = $this->MEvents->updateUserStatus($id, "Active");

			if ($response) {
 				if($frm=="admin"){
					redirect('CAdmin/viewAdminAccountMgt');
				}else if($frm=="user"){
					redirect('CAdmin/viewUserAccountMgt');
				}
 			}
		}
	}

	// view all admin
	public function readAllAdmin(){
		$data = array('user_type !=' => 'Regular');
		$result = $this->MEvents->read_where($data);
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	// view all Superadmin
	public function readAllSuperAdmin(){
		$data = array('user_type' => 'Superadmin');
		$result= $this->MEvents->read_where($data);
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public function Admin($id){
		$data = array('account_id' => $id);
		$results = $this->MEvents->read_where($data);

		if($results){
			$response = $this->MEvents->updateUserType($id, "Admin");

			if ($response) {
				$response2 = $this->MEvents->updateUpgradedBy($id,NULL);
				if($response2){
 					redirect('CAdmin/viewAdminAccountMgt');
				}
			}
		}
	}

	public function SuperAdmin($id){
		

		$data = array('account_id' => $id);
		$results = $this->MEvents->->read_where($data);

		if($results){
			$response = $this->MEvents->updateUserType($id, "Superadmin");

			if ($response) {
				$response2 = $this->MEvents->updateUpgradedBy($id,$this->session->userdata['userSession']->userID);
				if($response2){
 					redirect('CAdmin/viewAdminAccountMgt');
				}
 			}
		}
	}

	public function addAdmin()
	{
		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		if($this->input->post('userType')=="Superadmin") {
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
					  'upgradedBy' => $this->session->userdata['userSession']->userID,
					  'date_account_created' => $now->format('Y-m-d H:i:s')
					);
		} else {
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

			$result = $this->MUser->insert($data);


			if($result){
				//$this->index();
				redirect('CAdmin/viewAdminAccountMgt');
			}
		}

		# code...
	}

	public function viewUserAccountMgt() {
		$result_data=$this->readAllUsers();
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
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
					$arrObj->date_account_created = $value->date_account_created;
					$arrObj->gender = $value->gender;
					$arrObj->user_type = $value->user_type;
					$arrObj->user_status = $value->user_status;
					$arrObj->load_amt = $value->load_amt;
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE////////////////////////////////////////////////////
		$data2['users']=$array;
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
					$arrObj->date_account_created = $value->date_account_created;
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
		$result_data=$this->readAllAdmin();
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
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
					$arrObj->date_account_created = $value->date_account_created;
					$arrObj->gender = $value->gender;
					$arrObj->user_type = $value->user_type;
					$arrObj->user_status = $value->user_status;
					$arrObj->upgraded_by = $value->upgradedBy;//Added by admin module
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$data2['admin']=$array;
		$data2['ownAdminAccount']=$this->readOwnAdminAccount();

		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vAdminAccountMgt', $data2);
		$this->load->view('imports/admin_vFooter');

	}

	public function viewFinance() {
		$result_data = array();//Replace with query
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
			foreach ($result_data as $value) {
					 $arrObj = new stdClass;
					//Only interface filtering
					//$arrObj->price
					//$arrObj->ticket_count
					 $array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vFinance');
		$this->load->view('imports/admin_vFooter');

	}

	public function viewReport() {
		$result_data = array();//
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
			foreach ($result_data as $value) {
					 $arrObj = new stdClass;
					
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		//$data['data']=$array;
		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vReport');
		$this->load->view('imports/admin_vFooter');

	}

	public function generateCard() {
		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vCards');
		$this->load->view('imports/admin_vFooter');

	}

	public function updateAdmin() {
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
					  'date_account_created' => $now->format('Y-m-d H:i:s')
					);

		$result = $this->MUser->update($this->session->userdata['userSession']->userID, $data);

		if($result){
			redirect('CAdmin/viewAdminAccountMgt');
		}
	}

	public function Delete($id,$frm){
		

		$data = array('account_id' => $id);
		$results = $this->MEvents->->read_where($data);

		if($results){
			$response = $this->MEvents->updateUserStatus($id, "Deleted");

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
		

		$data = array('account_id' => $this->session->userdata['userSession']->userID);
		$result= $this->MEvents->read_where($data);

		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public function numEvents($startDate, $endDate){
		$result = $this->MEvents->numEvents($startDate, $endDate);
		if($result){
			return $result;
		}else{
			return false;
		}
	}


	public function getActiveUsers($startDate, $endDate){
		$result = $this->MEvents->countUsers($startDate, $endDate);
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
		$where = array('YEAR(user_account.date_account_created)' => $year,
									 'user_account.user_status' => 'Active',
									 'user_account.user_type' => 'Regular'
								 );
		$result = $this->Muser->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray('COUNT(*) as UserCount,
							MONTHNAME(user_account.date_account_created) as monthname',
							$where,FALSE,FALSE,"MONTH(user_account.date_account_created)",FALSE);
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


		$this->db->select('COUNT(*) as CardCount');
		$this->db->select('MONTHNAME(card.cardCreatedOn) as monthname');
		$this->db->from('card');
		$this->db->where("cardStatus = 1");
		$this->db->group_by("monthname");
		$this->db->order_by("monthname", "desc");

		$query = $this->db->get();
		$result = $query->result();
		
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
		$where = array("event_status" => "APPROVED",
										"YEAR(date_created)" => $year
								 );
		$result = $this->MEvents->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray('COUNT(*) as EventCount',
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
		$result_data=$this->readAllAdmin();
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
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
					$arrObj->date_account_created = $value->date_account_created;
					$arrObj->gender = $value->gender;
					$arrObj->user_type = $value->user_type;
					$arrObj->user_status = $value->user_status;
					$arrObj->upgraded_by = $value->upgradedBy;//Added by admin module
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////

		$data2['admin']=$array;
		$data2['ownAdminAccount']=$this->readOwnAdminAccount();
		$data2['announcements']=$this->readAllAnnouncements();

		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vAnnouncements', $data2);
		$this->load->view('imports/admin_vFooter');
	}

	public function createAnnouncement() {
		$announcement = new MAnnouncement();

		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		$data = array('announcementDetails' => $this->input->post('announcementDetails'),
					  'announcementStatus' => 'OnGoing',
					  'postedBy' => $this->input->post('postedBy'),
					  'datePosted' => $now->format('Y-m-d H:i:s')
					);

		$result = $this->MAnnouncement->insert($data);

		if($result){
			redirect('CAdmin/viewAnnouncements');
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
		$data = array('announcementID' => $id);
		$results = $this->MAnnouncement->read_where($data);

		if($results){
			$response = $this->MAnnouncement->updateAnnouncementStatus($id, "Finished");

			if ($response) {
				redirect('CAdmin/viewAnnouncements');
 			}
		}
	}

	public function viewAllEvents(){
		$this->data['custom_js']= '<script type="text/javascript">
                              $(function(){
                              	$("#admin").addClass("active");
                              });
                        </script>';


    	$result_data=$this->readAllEvents();
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->event_id = $value->event_id;
					$arrObj->event_date_start = $value->event_date_start;
					$arrObj->event_date_end = $value->event_date_end;
					$arrObj->event_name = $value->event_name;
					$arrObj->no_tickets_total = $value->no_tickets_total;
					$arrObj->event_status = $value->event_status;
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////

		$data2['row'] = $array;

   		$data3['users']=$this->getUserCount();
		$this->load->view('imports/admin_vHeader');
		$this->load->view('admin/vAdmin', $data2);
		$this->load->view('imports/admin_vFooter');
	}

}
