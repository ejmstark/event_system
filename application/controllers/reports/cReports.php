<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CReports extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('user/MUser');
      $this->load->model('user/MEvent');
      $this->load->model('user/MPreference');
      $this->load->model('user/MTicketType');
      $this->load->model('user/MTicket');
      $this->load->model('user/MReports');
     	
  	}

	public function index()
	{	
		$data['events'] = $this->MEvent->getAllEvents();
		// print_r($data);
		$this->load->view('imports/vHeader');
		$this->load->view('reports/vReports.php', $data);
		$this->load->view('imports/vFooter');
	}


	public function generateRevenue($id)
	{
		$data['revenue'] = $this->MTicket->generateRevenue($id);

		$this->load->view('imports/vHeader');
		$this->load->view('reports/vRevenue.php', $data);
		$this->load->view('imports/vFooter');

		# code...
	}

	public function generatePerformance()
	{
		$data['perfs'] = $this->MEvent->Performance();
		//print_r(expression)
		$this->load->view('imports/vHeader');
		$this->load->view('reports/vPerformance.php', $data);
		$this->load->view('imports/vFooter');


	}


	public function generateAttendance()
	{
		$data['perfs'] = $this->MUser->Attendance();
		//print_r(expression)
		$this->load->view('imports/vHeader');
		$this->load->view('reports/vAttendance.php', $data);
		$this->load->view('imports/vFooter');


	}

	public function generateHistory()
	{
		$id = $this->$data['perfs'] = $this->MUser->Attendance();
		//print_r(expression)
		$this->load->view('imports/vHeader');
		$this->load->view('reports/vHistory.php', $data);
		$this->load->view('imports/vFooter');


	}

	public function eventsGraph(){
			$year = "2017"
			$data['events'] = $this->MReports->numEventPerMonth($year);
			return $data['events'];
	}
}
