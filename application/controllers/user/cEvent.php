<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cEvent extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('user/MUser');
      $this->load->model('user/MEvent');
      $this->load->model('user/MPreference');
      $this->load->model('user/MTicketType');
      $this->load->model('user/MTicket');
     	
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
		$this->load->view('user/vUser.php',$data);
		$this->load->view('imports/vFooter',$this->data);
	}

	public function displayEvent()
	{

		$data['events'] = $this->MEvent->getAllEvents();
		// print_r($data);
		$this->load->view('imports/vHeader');
		$this->load->view('user/vListEvents.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}
	public function searchEvent()
	{
		$data['users'] = $this->MUser->getAllUsers();
		$result_data = $this->MEvent->getSearchEvents($_POST['searchWord'], $_POST['searchDateYear'], $_POST['searchDateMonth']);
		// print_r($data);
		$array = array();
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->event_id = $value->event_id;
					$arrObj->event_name = $value->event_name;
					$arrObj->dateStart = $value->event_date_start;
					$arrObj->dateEnd = $value->event_date_end;
					$arrObj->event_category = $value->event_category;
					$array[] = $arrObj;
			}
		}
		$data['events'] = $array;

		$this->data['custom_js']= '<script type="text/javascript">

                              $(function(){

                              	$("#dash").addClass("active");

                              });

                        </script>';
		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('vLandingPage', $data);
		//$this->load->view('user/vListEvents', $data['events']);
		$this->load->view('imports/vFooterLandingPage');
		# code...
	}

	public function displayEventDetails($id)
	{
		
		$uid = null; //to get organize name
		
		$data1 ['events'] = $this->MEvent->loadEventDetails($id);
		$gID = $this->MEvent->loadEventDetails($id);
		foreach ($gID as $k) {
			$uid = $k->user_id; //retrieve
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

	public function displayEventDetails2($id)
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
		$this->load->view('user/vER.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}


	public function interested($id)
	{
		$uid = $this->session->userdata['userSession']['userID'];
		$pref = new MPreference();
		
		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));
		$data = array('preference_date' => $now->format('Y-m-d H:i:s'), 
					  'user_id' => $uid ,
					  'event_id' => $id
	 				  );

		$result = $pref->insert($data);

		if($result){
			$this->viewPreferenceEvents();
		}
		
		# code...
	}

	public function going($id)
	{
		// print_r($id);
		$type = new MTicketType();
		$where = array('event_id' => $id );
		$data['tickets'] = $type->loadType($id);


		$this->load->view('imports/vHeader');
		$this->load->view('user/vGoing.php', $data);
		$this->load->view('imports/vFooter');
		
		# code...
	}


	public function buyTickets()
	{

		$uid = $this->session->userdata['userSession']->userID;
		$var = $this->input->post('qty');
		$tck = new MTicket();
		
		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		for ($i=0; $i < $var ; $i++) { 
			$data = array('date_sold' => $now->format('Y-m-d H:i:s'), 
					  'user_id' => $uid ,
					  'ticket_type_id' => $this->input->post('type')
	 				  );
			$result = $tck->insert($data);

		}

		
		if($result){
			$this->viewAllTickets($uid);
		}
		
		# code...
	}


	public function viewAllTickets($id)
	{

		$data['tickets'] = $this->MTicket->joinTicketEventType($id);

		$this->load->view('imports/vHeader');
		$this->load->view('user/vAllTickets.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}



	public function viewPreferenceEvents()
	{

		$uid = $this->session->userdata['userSession']['userID'];

		$data['prefs'] = $this->MPreference->joinEventPrefs($uid);

		$this->load->view('imports/vHeader');
		$this->load->view('user/vPrefEvents.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}

}
