<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cUser extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('user/MUser');
      $this->load->model('user/MEvent');
      $this->load->model('MCardLoad');
	  $this->load->model('MAnnouncement'); //admin module functionality
	  $this->load->model('MNotificationItem');
	  $this->load->model('location/MLocation');
      $this->load->library('session');
      $this->data = null;
  	}
  	public function index()
	{
		$data['users'] = $this->MUser->getAllUsers();
		$result_data = $this->MEvent->getAllApprovedEvents();
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->event_id = $value->event_id;
					$arrObj->event_name = $value->event_name;
					$arrObj->event_picture = $value->event_picture;
					$arrObj->dateStart = $value->dateStart;
					$arrObj->dateEnd = $value->event_date_end;
					$arrObj->event_category = $value->event_category;
					$arrObj->event_venue = $value->event_venue;
					//Location
					$arrObj->location_name =$value->location_name;
					$arrObj->region_code = $value->region_code;
					
					$arrObj->tix = $this->MEvent->getTicketsOfEvent($value->event_id);
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$data['events'] = $array;
		$data['announcements'] = $this->MAnnouncement->getUnviewedOfUser($this->session->userdata['userSession']->userID);
		$data['announcementCount'] = count($data['announcements']);
		if(count($data['announcements']) == 0){
			$data['announcements'] = NULL;
		}
		
			$array1 = array();
			if($data['announcements']){
				foreach ($data['announcements'] as $value) {
						$arrObj = new stdClass;
						$arrObj->announcementID = $value->announcementID;
						$arrObj->announcementDetails = $value->announcementDetails;
						$arrObj->first_name = $value->first_name;
						$arrObj->last_name = $value->last_name;
						if($value->sec){
							$arrObj->ago =$value->sec;  
							$arrObj->agoU ="seconds ago";  
						}else if($value->min){
							$arrObj->ago =$value->min; 
							$arrObj->agoU ="minutes ago";   
						}else if($value->hr){
							$arrObj->ago =$value->hr;  
							$arrObj->agoU ="hours ago";  
						}else if($value->day){
							$arrObj->ago =$value->day; 
							$arrObj->agoU ="days ago";   
						}
						$array1[] = $arrObj;
				}
			}
			$data['announcements'] = $array1;
			
		$this->data['custom_js']= '<script type="text/javascript">

                              $(function(){

                              	$("#dash").addClass("active");

                              });

                        </script>';

		$this->load->view('imports/vHeaderLandingPage');

		$this->load->view('vLandingPage',$data);

		$this->load->view('imports/vFooterLandingPage',$this->data);
	}

  	public function redeemCode(){

		$code = $this->input->post('ccode');
		echo "Code ID: ".$code;
		$card = $this->MCardLoad->read_where(array('cardCode'=> $code));

		if($card){
			$card = json_decode(json_encode($card));
			$u =  $this->MUser->read($this->session->userdata['userSession']->userID);
			if($card[0]->cardStatus==1){
				$cardNew = $u[0]->load_amt + $card[0]->cardAmount;
				$res = $this->MUser->update($this->session->userdata["userSession"]->userID,array('load_amt'=>$cardNew));

				if($res){
					$code = $card[0]->cardId;
					$res1 = $this->MCardLoad->update($code, array('cardStatus'=>0));
				}
			}
		}

		redirect("event/cEvent/viewEvents");
	}
	

	public function signuppage()
	{

		$this->load->view('user/vSignup.php');

	}


	public function signup()
	{
		$user = new MUser();

		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		$data = array('user_name' => $this->input->post('uname'),
					  'password' => $this->input->post('password'),
					  'cpassword' => $this->input->post('cpassword'),
					  'first_name' => $this->input->post('fname'),
					  'last_name' => $this->input->post('lname'),
					  'middle_initial' => $this->input->post('miname'),
					  'email' => $this->input->post('email'),
					  'birthdate' => $this->input->post('bdate'),
					  'gender' => $this->input->post('gender'),
					  'contact_no' => $this->input->post('contact'),
					  'user_type' => 'Regular'
					);

		if($this->checkIfEmptyFields($data)){

			$res = $this->MUser->read_where(array('user_name' => $data['user_name']));
			$res1 = $this->MUser->read_where(array('email' => $data['email']));

			if($res){
					$this->session->set_flashdata('error_msg','Username taken');
					$this->data = $data;
					$this->viewSignUp();
					// redirect('user/cUser/viewSignUp',"refresh");
					//echo "INVALID, EXISTING USERNAME, PLS TRY AGAIN";

			}else if($res1){
				$this->session->set_flashdata('error_msg','Email taken');
				$this->data = $data;
					$this->viewSignUp();
					//echo "INVALID, EXISTING EMAIL, PLS TRY AGAIN";

			}else if($this->input->post('password') != $this->input->post('cpassword')){
				$this->session->set_flashdata('error_msg','Password does not match');
				$this->data = $data;
				$this->viewSignUp();
			}else{
				
				$data['password'] = hash('sha512',$data['password']);
				unset($data['cpassword']);
				$result = $user->insert($data);

				if($result){
					//$this->index();
					redirect('user/cUser/viewRegistrationConfirmation');
				}	

			}
		}else{
			$this->session->set_flashdata('error_msg','Do not leave the fields to be empty.');
			$this->data = $data;
			$this->viewSignUp();
		}
		
		

		# code...
	}

	public function eventregister()
	{
		$this->load->view('imports/vHeader');
		$this->load->view('user/vEventRegistration.php');
		$this->load->view('imports/vFooter');
	}

	public function checkAllUsername()
	{
		$username = $this->input->post('username');
		if($username == ''){
			echo '';
		}else{
			$check  = $this->MUser->checkAllUsers($username);
			if($check == 0){
				echo "<h4 style='color:green'>Username is available<h4>";
			}else{
				echo "<h4 style='color:red'>Username is taken</h4>";
			}
		}
	}

	public function displayEvent()
	{

		$data['events'] = $this->MEvent->getAllEvents();
		$this->load->view('imports/vHeader');
		$this->load->view('user/vListEvents.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}

	public function displayEventDetails($id)
	{

		$uid = null;

		$data1 ['events']= $this->MEvent->loadEventDetails($id);
		$gID = $this->MEvent->loadEventDetails($id);
		foreach ($gID as $k) {
			$uid = $k->user_id;
		}
		// print_r($uid);
		$data2['users']	= $this->MUser->loadUserDetails($uid);

		$data = array_merge($data1,$data2);
		// print_r($data);
		$this->load->view('imports/vHeader');
		$this->load->view('user/vEventRegistration.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}

	public function search(){
		$data['events'] = $this->MEvent->getAllEvents();

		$this->load->view('imports/vHeaderLandingPage');
		//$this->load->view('imports/vHeader');
		$this->load->view('user/vSearch.php');
		// $this->load->view('user/vListEvents.php', $data);
		$this->load->view('imports/vFooter');
	}
	
	public function viewSignUp()
	{
		if(!$this->data){
		$this->load->view('imports/vHeaderSignUpPage');
		$this->load->view('vSignUp');
		$this->load->view('imports/vFooterLandingPage');
		}else{
			$this->load->view('imports/vHeaderSignUpPage');
		$this->load->view('vSignUp',$this->data);
		$this->load->view('imports/vFooterLandingPage');
		}

	}

	private function checkIfEmptyFields($data){

		if(count($data) > 0){
			foreach($data as $key => $value){
				if(empty(trim($value))){
					return false;
				}
			}
		}

		return true;
	}

	public function viewClickedAnnouncement($announcementID)
	{
		$this->updateAnnounce1($announcementID);
		$data['announcements'] = $this->MAnnouncement->loadAllAnnouncementDetails();
		$data['clickedAnnouncement'] = $announcementID;
		$this->load->view('imports/vHeaderSignUpPage');
		$this->load->view('user/vAnnouncementPage.php', $data);
		$this->load->view('imports/vFooterLandingPage');

	}

	public function viewAnnouncements()
	{
		$data['announcements'] = $this->MAnnouncement->loadAllAnnouncementDetails();
		$this->load->view('imports/vHeaderSignUpPage');
		$this->load->view('user/vAnnouncementPage.php', $data);
		$this->load->view('imports/vFooterLandingPage');

	}


	public function updateAnnounce($id)
	{
		$result = $this->MAnnouncement->getUnviewedOfUser($id);

		foreach ($result as $key) {
			$where = array('isViewed' => 1);
			$query = $this->MNotificationItem->update($key->notifID, $where);
		}
		
		echo $key->notifID;
  }
  public function updateAnnounce1($id)
	{	
		$where = array('isViewed' => 1);
		$query = $this->MNotificationItem->update1(array("announcement"=>$id,"user"=>$this->session->userdata['userSession']->userID), $where);
		// echo  $this->MNotificationItem->db->last_query();
		// die();
  }
  public function viewRegistrationConfirmation() {
		  $this->load->view('imports/vHeaderSignUpPage');
	  	$this->load->view('vRegistrationConfirmation.php');
  		$this->load->view('imports/vFooterLandingPage');
	 }
}
