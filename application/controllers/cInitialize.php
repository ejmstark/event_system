<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CInitialize extends CI_Controller {


	public function index()
	{	
		if ($this->session->userdata('userSession')) {
			redirect('cLogin/viewDashBoard');
		} else {
			$this->load->view('imports/vHeaderHomepage');
			$this->load->view('vHomepage');
			$this->load->view('imports/vFooterHomepage');
			// $this->load->view('vLogin');
			//redirect('cInitialize');
		}
	}
}
