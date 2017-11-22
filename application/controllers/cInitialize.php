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
			$result_data = $this->MEvent->getAllApprovedEvents();
			//////////////////////////////////////////////////////////////////////////////
			//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
			/////////////////////////////////////////////////////////////////////////////
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->event_id = $value->event_id;
					$arrObj->event_name = $value->event_name;
					$arrObj->dateStart = $value->dateStart;
					$arrObj->event_category = $value->event_category;
					$array[] = $arrObj;
			}
			////////////STOPS HERE///////////////////////////////////////////////////
			$data['events'] = $array;
			$this->load->view('imports/vHeaderHomepage');
			$this->load->view('vHomepage',$data);
			$this->load->view('imports/vFooterHomepage');
			// $this->load->view('vLogin');
			//redirect('cInitialize');
		}
	}
}
