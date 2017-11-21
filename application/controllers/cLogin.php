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

		$user->setUser_password($this->input->post('Password'));





		// print_r($user->getUser_name());

		// print_r($user->getUser_password());



		$result = $user->attemptLogin();



		if ($result) {

			if($result[0]->user_status == "Active"){

				$this->createSession($result);

				$this->viewDashBoard();

			}else {

				$this->load->view('vLogin');

				// redirect('cInitialize','refresh');

			}



		} else {

			$this->load->view('vLogin');

			// redirect('cInitialize','refresh');

		}



	}



	public function createSession($result)

    {

      foreach ($result as $row) {

        $sessionData = array('userID' => $row->account_id,

                             'userLogName' => $row->user_name,

                             'userPassword' => $row->password,

                             'userFName' => $row->first_name,

                             'userLevel' => $row->user_type,

							 'userSuperior' => $row->upgraded_by,
                      );



        $this->session->set_userdata('userSession', $sessionData);

      }

    //   print_r($sessionData);

    }



	public function viewDashBoard(){

		$this->session->userdata['userSession'] = json_decode(json_encode($this->session->userdata['userSession']));

		if($this->session->userdata['userSession']->userLevel != "Regular"  ){

					redirect('admin/CAdmin');

			}

		//use the loded MUserModel



		$data['users'] = $this->MUser->getAllUsers();

		$data['events'] = $this->MEvent->getAllApprovedEvents();

		$this->data['custom_js']= '<script type="text/javascript">

                              $(function(){

                              	$("#dash").addClass("active");

                              });

                        </script>';

		$this->load->view('imports/vHeaderLandingPage');

		$this->load->view('vLandingPage',$data);

		$this->load->view('imports/vFooterLandingPage',$this->data);

	}



	public function userLogout()

	{



		$this->session->unset_userdata('userSession');

// 		session_destroy();

    // print_r(redirect('cInitialize','refresh'))		;

        // $this->load->('')

        $this->index();

		# code...

	}



	public function login()

	{

		if ($this->session->userdata('userSession')) {

			redirect('cLogin/viewDashBoard');

		} else {

			$this->load->view('vLogin');

		}

		# code...

	}





}

?>
