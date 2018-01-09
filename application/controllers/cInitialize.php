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
			//////////////////////////////////////////////////////////////////////////////
			//================INTERFACE MODULE - SPRINT 3 Implementation============//
			/////////////////////////////////////////////////////////////////////////////
			$stringSelect = "*, DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart, DATE_FORMAT(event_info.event_date_end,'%d-%b-%y %H:%m') as dateEnd";
			$stringWhere = "event_info.event_status = 'Approved'";
			$data['events'] = $this->MEvent->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray($stringSelect,$stringWhere,false,false,false,false);
			////////////STOPS HERE///////////////////////////////////////////////////

			$this->load->view('imports/vHeaderHomePage');
			$this->load->view('vHomePage',$data);
			$this->load->view('imports/vFooterHomePage');
			// $this->load->view('vLogin');
			//redirect('cInitialize');
		}
	}
}
