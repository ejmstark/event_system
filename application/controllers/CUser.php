<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CUser extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('MUser');
      $this->load->model('MEvent');
      $this->load->model('MCard');
	  $this->load->model('MAnnouncement'); //admin module functionality
      $this->load->library('session');
      $this->data = null;
  	}

  	public function redeemCode(){

		$code = $this->input->post('ccode');
		echo "Code ID: ".$code;
		$card = $this->MCard->read_where(array('cardCode'=> $code));

		if($card){
			$card = json_decode(json_encode($card));
			$u =  $this->MUser->read($this->session->userdata['userSession']->userID);
			if($card[0]->cardStatus==1){
				$cardNew = $u[0]->load_amt + $card[0]->cardAmount;
				$res = $this->MUser->update($this->session->userdata["userSession"]->userID,array('load_amt'=>$cardNew));

				if($res){
					$code = $card[0]->cardId;
					$res1 = $this->MCard->update($code, array('cardStatus'=>0));
				}
			}
		}

		redirect("CEvent/viewEvents");
	}
	public function index()
	{
		$this->data['custom_js']= '<script type="text/javascript">
                              $(function(){
                              	$("#user").addClass("active");
                              });
                        </script>';

        $data['users'] = $this->MUser->getAllUsers();

		$this->load->view('imports/vHeader');
		$this->load->view('user/vUser',$data);
		$this->load->view('imports/vFooter',$this->data);
	}

	public function signuppage()
	{

		$this->load->view('user/vSignup.php');

	}


	public function signup()
	{
		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		$data = array('user_name' => $this->input->post('uname'),
					  'password' => hash('sha512',$this->input->post('password')),
					  'first_name' => $this->input->post('fname'),
					  'last_name' => $this->input->post('lname'),
					  'middle_initial' => $this->input->post('miname'),
					  'email' => $this->input->post('email'),
					  'birthdate' => $this->input->post('bdate'),
					  'gender' => $this->input->post('gender'),
					  'contact_no' => $this->input->post('contact'),
					  'user_type' => 'Regular',
					  'date_account_created' => $now->format('Y-m-d H:i:s')
					);


		$res = $this->MUser->read_where(array('user_name' => $data['user_name']));
		$res1 = $this->MUser->read_where(array('email' => $data['email']));

    	if($res){
    			$this->session->set_flashdata('error_msg','Username taken');
    			$this->data = $data;
    			$this->viewSignUp();
<<<<<<< HEAD
    			
				

		}else if($res1){
			$this->session->set_flashdata('error_msg','Email taken');
			$this->data = $data;
				$this->viewSignUp();

=======
    			// redirect('user/cUser/viewSignUp',"refresh");
				//echo "INVALID, EXISTING USERNAME, PLS TRY AGAIN";

		}else if($res1){
			$this->session->set_flashdata('error_msg','Email taken');
			$this->data = $data;
				$this->viewSignUp();
				//echo "INVALID, EXISTING EMAIL, PLS TRY AGAIN";
<<<<<<< HEAD
>>>>>>> 77844816e5a736c8e5d47b48b31ecefea720fbd0
=======

>>>>>>> 6ff22e6e417227c7ba6da06817194cc297954bbe
		}else{

			$result = $this->MUser->insert($data);

			if($result){
<<<<<<< HEAD
			redirect('CEvent/viewEvents');
		}

=======
			//$this->index();
<<<<<<< HEAD
				redirect('CEvent/viewEvents');
			}
>>>>>>> 77844816e5a736c8e5d47b48b31ecefea720fbd0
=======
			redirect('CEvent/viewEvents');
		}

>>>>>>> 6ff22e6e417227c7ba6da06817194cc297954bbe
		}

		# code...
	}

	public function eventregister()
	{
		$this->load->view('imports/vHeader');
		$this->load->view('user/vEventRegistration.php');
		$this->load->view('imports/vFooter');
	}

	public function displayEvent()
	{

		$data['events'] = $this->MEvents->getAllEvents();
		$this->load->view('imports/vHeader');
		$this->load->view('user/vListEvents.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}

	public function displayEventDetails($id)
	{

		$uid = null;

		$data1 ['events']= $this->MEvents->loadEventDetails($id);
		$gID = $this->MEvents->loadEventDetails($id);
		foreach ($gID as $k) {
			$uid = $k->user_id;
		}
		$data2['users']	= $this->MUser->loadUserDetails($uid);

		$data = array_merge($data1,$data2);
		$this->load->view('imports/vHeader');
		$this->load->view('user/vEventRegistration.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}

	public function search(){
		$data['events'] = $this->MEvents->getAllEvents();

		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('user/vSearch.php');
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

	public function viewAnnouncements()
	{
		$data['announcements'] = $this->MAnnouncement->loadAllAnnouncementDetails();
		$this->load->view('imports/vHeaderSignUpPage');
		$this->load->view('user/vAnnouncementPage.php', $data);
		$this->load->view('imports/vFooterLandingPage');

	}
}
