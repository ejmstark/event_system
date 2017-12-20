<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cNotification extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('MNotification');
     	
  	}


	public function displayAllNotification()
	{
		$uid = $this->session->userdata['userSession']['userID'];
		$data['notif'] = $this->MNotification->getNotifUser($uid);
		// print_r($data);
		// $this->load->view('imports/vHeader');
		// $this->load->view('vListEvents.php', $data);
		// $this->load->view('imports/vFooter');
		echo json_encode($data);
		# code...
	}
	public function updateStatus()
	{
		$nid = $this->input->post('notif_id');
		$data['status'] = $this->MNotification->updateStatus($nid);
		
		// $this->load->view('imports/vHeaderLandingPage');
		// $this->load->view('vLandingPage', $data);
		// $this->load->view('user/vListEvents', $data['events']);
		// $this->load->view('imports/vFooterLandingPage');
		# code...
	}

}
