<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CInitialize extends CI_Controller {
	function __construct() {
		parent::__construct();
	 	$this->load->library('session');
	 	$this->load->model('user/MEvent');
	}

	public function index()
	{	
		if ($this->session->userdata('userSession')) {
			redirect('cLogin/viewDashBoard');
		} else {
			$data['events'] = $this->MEvent->getAllApprovedEvents();
			$this->load->view('imports/vHeaderHomepage');
			$this->load->view('vHomepage',$data);
			$this->load->view('imports/vFooterHomepage');
			// $this->load->view('vLogin');
			//redirect('cInitialize');
		}
	}
}
