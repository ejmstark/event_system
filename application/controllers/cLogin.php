<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class CLogin extends CI_Controller {



	function __construct() {

		parent::__construct();

	 	$this->load->model('user/MUser');

	 	$this->load->library('session');

	 	$this->load->model('user/MEvent');

	 	$this->load->helper('url');

// 	 	$this->load->library('../controllers/CInitialize');



	}

	public function index(){
		$this->load->view('vLogin');
	}



	public function userLogin()

	{



		$user = new MUser();

		$user->setUser_name($this->input->post('Username'));

		$user->setUser_password(hash('sha512',$this->input->post('Password')));



		$result = $user->attemptLogin();



		if ($result) {

			if($result[0]->user_status == "Active"){

				$this->createSession($result);

				$this->viewDashBoard();

			}else {
				$data = array(
					"errorTitle" => "Account not yet activated!",
					"errorMessage" => "Check your email to activate your account."
				);

				$this->load->view('vLogin', $data);

				// redirect('cInitialize','refresh');

			}



		} else {
			$data = array(
				"errorTitle" => "User not found!",
				"errorMessage" => "Incorrect username or password! Please make sure you have signed up."
			);

			$this->load->view('vLogin', $data);

			// redirect('cInitialize','refresh');

		}



	}



	public function createSession($result)

    {

      foreach ($result as $row) {
$sessionData = new stdClass;
					$sessionData->userID =  $row->account_id;
					$sessionData->userLogName =  $row->user_name;
					$sessionData->userPassword =  $row->userPassword;
					$sessionData->userFName =  $row->first_name;
					$sessionData->userLName = $row->last_name;
					$sessionData->userLevel =  $row->user_type;
					$sessionData->userSuperior =  $row->upgradedBy;
        // $sessionData = array('userID' => $row->account_id,

        //                      'userLogName' => $row->user_name,

        //                      'userPassword' => $row->password,

        //                      'userFName' => $row->first_name,

        //                      'userLevel' => $row->user_type,

							 // 'userSuperior' => $row->upgradedBy
        //               );

        if($row->user_type == "Regular"){
        	$this->session->set_userdata('userSession', $sessionData);
        }else{
        	$this->session->set_userdata('adminSession', $sessionData);
        }
      }
    }



	public function viewDashBoard(){
		if(isset($this->session->userdata['adminSession'])){
			redirect('admin/CAdmin');
		}else if(isset($this->session->userdata['userSession'])){
			redirect('user/cUser');
		}else{
			$this->index();
		}
	}



	public function userLogout()

	{
		if(isset($this->session->userdata['adminSession'])){
			$this->session->unset_userdata('adminSession');
		}else if(isset($this->session->userdata['userSession'])){
			$this->session->unset_userdata('userSession');
		}
        redirect("cLogin");
	}



	public function login()

	{
		if (isset($this->session->userdata['adminSession']) || isset($this->session->userdata['userSession'])) {
			redirect('cLogin/viewDashBoard');
		} else {
			$this->index();

		}
	}

	public function forgotPassword()

	{
		if (isset($this->session->userdata['adminSession']) || isset($this->session->userdata['userSession'])) {
			redirect('cLogin/viewDashBoard');
		}else{
			$this->load->view('imports/vHeaderSignUpPage');
			$this->load->view('vForgotPassword');
			$this->load->view('imports/vFooterLandingPage');
		}
		

	}


	




}

?>
