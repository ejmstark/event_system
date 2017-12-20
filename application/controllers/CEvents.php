<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEvent extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();
    	$this->load->model('MEvents');
    	$this->load->model('MUser');
    	$this->load->model('MTicketType');
    	$this->load->model('MTicket');
    	$this->load->model('MPreference');
    	$this->load->helper('date');
    	$this->error = "";
    	$this->success = "";
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

		$data['events'] = $this->MEvents->getAllEvents();
		// print_r($data);
		$this->load->view('imports/vHeader');
		$this->load->view('user/vListEvents.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}
	public function searchEvent()
	{
		$data['users'] = $this->MUser->getAllUsers();
		$result_data = $this->MEvents->getSearchEvents($_POST['searchWord']);
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
		
		$data1 ['events'] = $this->MEvents->loadEventDetails($id);
		$gID = $this->MEvents->loadEventDetails($id);
		foreach ($gID as $k) {
			$uid = $k->user_id; //retrieve
		}
		$data2['users']	= $this->MUser->loadUserDetails($uid);

		$data = array_merge($data1,$data2); 
		$this->load->view('imports/vHeader');
		$this->load->view('user/vEventRegistration.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}

	public function displayEventDetails2($id)
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
		$this->load->view('user/vER.php', $data);
		$this->load->view('imports/vFooter');
		# code...
	}


	public function interested($id)
	{
		$uid = $this->session->userdata['userSession']['userID'];
		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));
		$data = array('preference_date' => $now->format('Y-m-d H:i:s'), 
					  'user_id' => $uid ,
					  'event_id' => $id
	 				  );

		$result = $this->MPreference->insert($data);

		if($result){
			$this->viewPreferenceEvents();
		}
		
		# code...
	}

	public function going($id)
	{
		$type = new MTicketType();
		$where = array('event_id' => $id );
		$data['tickets'] = $this->MTicketType->loadType($id);


		$this->load->view('imports/vHeader');
		$this->load->view('user/vGoing.php', $data);
		$this->load->view('imports/vFooter');
		
		# code...
	}


	public function buyTickets()
	{

		$uid = $this->session->userdata['userSession']->userID;
		$var = $this->input->post('qty');
		
		$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

		for ($i=0; $i < $var ; $i++) { 
			$data = array('date_sold' => $now->format('Y-m-d H:i:s'), 
					  'user_id' => $uid ,
					  'ticket_type_id' => $this->input->post('type')
	 				  );
			$result = $this->MTicket->insert($data);

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

		//This function gets the date from the Calendar Module and sends in to the VCreateEvent.php
	public function viewCreateFromCalendar(){


		if(isset($_POST['startDate']) && isset($_POST['startTime']) && isset($_POST['endDate']) && isset($_POST['endTime']) ){
			$data['start_date'] = $_POST['startDate'];
			$data['start_time'] = $_POST['startTime'];
			$data['end_date'] = $_POST['endDate'];
			$data['end_time'] = $_POST['endTime'];
			$result = $this->load->view('vEventForCalendar',$data,TRUE);
			//$this->viewCreateEvent();
			echo $result;
		}



	}

	public function viewEditFromCalendar(){


		$data1['start'] = $_POST['start'];
		$data1['end'] = $_POST['end'];
		$data1['title'] = $_POST['title'];
		$data1['details'] = $_POST['details'];
		$data1['category'] = $_POST['category'];
		$data1['venue'] = $_POST['venue'];

		$id = $_POST['id'];

		$tid = $this->MEvents->joinEventTicketType($id);


		$data2['ticket_info'] = null;
		if($tid){
			$data2['ticket_info'] = $tid;
		}


        $data = array_merge($data1, $data2);

		$result = $this->load->view('vEditEvent',$data,TRUE);
		echo $result;

	}

	public function viewCreateEvent()
	{
		$this->data['custom_js']= '<script type="text/javascript">
                              	$("#user").addClass("active");
                        </script>';

        $this->load->view('imports/vHeaderSignUpPage');
		$this->load->view('vNewEvent');
		$this->load->view('imports/vFooterLandingPage');

	}

	public function viewEvents()
	{
		$userid = $this->session->userdata['userSession']->userID;
		$result_data = $this->MEvents->getAllEventsByUser($userid);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = $array1 = $array2 = array();
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->event_id = $value->event_id;
					$arrObj->event_name = $value->event_name;
					$arrObj->dateStart = $value->dateStart;
					$arrObj->dateEnd = $value->dateEnd;
					$arrObj->event_details = $value->event_details;
					$arrObj->event_status = $value->event_status;
					$arrObj->event_venue = $value->event_venue;
					$arrObj->event_category = $value->event_category;
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$data['events']  = $array;

		$result_data = $this->MUser->read($this->session->userdata['userSession']->userID);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->load_amt = $value->load_amt;
					$array1[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$data['user']   = $array1;

		$result_data = $this->MEvents->getTransHistory($this->session->userdata['userSession']->userID);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->Event = $value->Event;
					$arrObj->Paid = $value->Paid;
					$arrObj->DatePaid = $value->DatePaid;
					$array2[] = $arrObj;
			}

		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$data['hist']   = $array1;
		$data['userid'] = $userid;

		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('vEvents',$data);
		$this->load->view('imports/vFooterLandingPage');
	}
	public function displayEventDetails($id)
	{

		$uid = null; //to get organize name
		$eid = null;

		$result_data = $this->MEvents->loadEventDetails($id);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = $array1 = $array2 = $array3 = $array4 = array();
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->event_id = $value->event_id;
					$arrObj->event_date_start = $value->event_date_start;
					$arrObj->event_name = $value->event_name;
					$arrObj->event_date_end = $value->event_date_end;
					$arrObj->event_details = $value->event_details;
					$arrObj->event_status = $value->event_status;
					$arrObj->event_venue = $value->event_venue;
					$arrObj->event_category = $value->event_category;
					$arrObj->user_id = $value->user_id;
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$data1 ['events']  = $array;

		$gID = $this->MEvents->loadEventDetails($id);

		foreach ($gID as $k) {
			$eid = $k->event_id;
			$uid = $k->user_id; //retrieve
		}

		$result_data = $this->MUser->loadUserDetails($uid);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->account_id = $value->account_id;
					$arrObj->user_name = $value->user_name;
					$arrObj->first_name = $value->first_name;
					$arrObj->middle_initial = $value->middle_initial;
					$arrObj->last_name = $value->last_name;
					$arrObj->email= $value->email;
					$arrObj->contact_no= $value->contact_no;
					$arrObj->birthdate= $value->birthdate;
					$arrObj->date_account_created = $value->date_account_created;
					$arrObj->gender = $value->gender;
					$arrObj->user_type = $value->user_type;
					$arrObj->user_status = $value->user_status;
					$arrObj->load_amt = $value->load_amt;
					$array1[] = $arrObj;
			}
		}
		////////////STOPS HERE////////////////////////////////////////////////////
		$data2['organizer'] = $array1;

		$result_data = $this->MTicketType->loadType($eid);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->ticket_name = $value->ticket_name;
					$arrObj->price = $value->price;
					$arrObj->ticket_type_id = $value->ticket_type_id;
					$array2[] = $arrObj;
			}
		}
		////////////STOPS HERE////////////////////////////////////////////////////
		$data3['types'] = $array2;

		$data = array_merge($data1,$data2,$data3);
		$result_data= $this->MEvents->getGoingToEvent($id);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->account_id = $value->account_id;
					$arrObj->first_name = $value->first_name;
					$arrObj->middle_initial = $value->middle_initial;
					$arrObj->last_name = $value->last_name;
					$array3[] = $arrObj;
			}
		}
		////////////STOPS HERE////////////////////////////////////////////////////
		$data['going'] = $array3;

		$result_data = $this->MUser->read_where( array('account_id' =>$this->session->userdata['userSession']->userID  ));
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->account_id = $value->account_id;
					$arrObj->user_name = $value->user_name;
					$arrObj->first_name = $value->first_name;
					$arrObj->middle_initial = $value->middle_initial;
					$arrObj->last_name = $value->last_name;
					$arrObj->email= $value->email;
					$arrObj->contact_no= $value->contact_no;
					$arrObj->birthdate= $value->birthdate;
					$arrObj->date_account_created = $value->date_account_created;
					$arrObj->gender = $value->gender;
					$arrObj->user_type = $value->user_type;
					$arrObj->user_status = $value->user_status;
					$arrObj->load_amt = $value->load_amt;
					$array4[] = $arrObj;
			}
		}
		////////////STOPS HERE////////////////////////////////////////////////////
		$data['user'] = $array4;
		$data['id'] = $this->session->userdata['userSession']->userID;
		if($this->error != ""){
			$data['errorMsg']= $this->error;
		}

		if($this->success != ""){
			$data['successMsg']= $this->success;
		}

		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('vEventDetails',$data);
		$this->load->view('imports/vFooterLandingPage');


		// $this->load->view('imports/vHeader');
		// $this->load->view('user/vEventRegistration', $data);
		// $this->load->view('imports/vFooter');
		# code...
	}

	public function displayEventDetailsFromCalendar()
	{

		$uid = null; //to get organize name
		$eid = null;
		$id = $_POST['id'];

		$result_data = $this->MEvents->loadEventDetails($id);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = $array1 = $array2 = $array3 = $array4 = array();
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->event_id = $value->event_id;
					$arrObj->event_date_start = $value->event_date_start;
					$arrObj->event_name = $value->event_name;
					$arrObj->event_date_end = $value->event_date_end;
					$arrObj->event_details = $value->event_details;
					$arrObj->event_status = $value->event_status;
					$arrObj->event_venue = $value->event_venue;
					$arrObj->event_category = $value->event_category;
					$arrObj->user_id = $value->user_id;
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$data1 ['events']  = $array;

		$gID = $this->MEvents->loadEventDetails($id);

		foreach ($gID as $k) {
			$eid = $k->event_id;
			$uid = $k->user_id; //retrieve
		}

		$result_data = $this->MUser->loadUserDetails($uid);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->account_id = $value->account_id;
					$arrObj->user_name = $value->user_name;
					$arrObj->first_name = $value->first_name;
					$arrObj->middle_initial = $value->middle_initial;
					$arrObj->last_name = $value->last_name;
					$arrObj->email= $value->email;
					$arrObj->contact_no= $value->contact_no;
					$arrObj->birthdate= $value->birthdate;
					$arrObj->date_account_created = $value->date_account_created;
					$arrObj->gender = $value->gender;
					$arrObj->user_type = $value->user_type;
					$arrObj->user_status = $value->user_status;
					$arrObj->load_amt = $value->load_amt;
					$array1[] = $arrObj;
			}
		}
		////////////STOPS HERE////////////////////////////////////////////////////
		$data2['organizer'] = $array1;

		$result_data = $this->MTicketType->loadType($eid);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->ticket_name = $value->ticket_name;
					$arrObj->price = $value->price;
					$arrObj->ticket_type_id = $value->ticket_type_id;
					$array2[] = $arrObj;
			}
		}
		////////////STOPS HERE////////////////////////////////////////////////////
		$data3['types'] = $array2;

		$data = array_merge($data1,$data2,$data3);
		$result_data= $this->MEvents->getGoingToEvent($id);
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->account_id = $value->account_id;
					$arrObj->first_name = $value->first_name;
					$arrObj->middle_initial = $value->middle_initial;
					$arrObj->last_name = $value->last_name;
					$array3[] = $arrObj;
			}
		}
		////////////STOPS HERE////////////////////////////////////////////////////
		$data['going'] = $array3;

		$result_data = $this->MUser->read_where( array('account_id' =>$this->session->userdata['userSession']->userID  ));
		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->account_id = $value->account_id;
					$arrObj->user_name = $value->user_name;
					$arrObj->first_name = $value->first_name;
					$arrObj->middle_initial = $value->middle_initial;
					$arrObj->last_name = $value->last_name;
					$arrObj->email= $value->email;
					$arrObj->contact_no= $value->contact_no;
					$arrObj->birthdate= $value->birthdate;
					$arrObj->date_account_created = $value->date_account_created;
					$arrObj->gender = $value->gender;
					$arrObj->user_type = $value->user_type;
					$arrObj->user_status = $value->user_status;
					$arrObj->load_amt = $value->load_amt;
					$array4[] = $arrObj;
			}
		}
		////////////STOPS HERE////////////////////////////////////////////////////
		$data['user'] = $array4;
		$data['id'] = $this->session->userdata['userSession']->userID;
		if($this->error != ""){
			$data['errorMsg']= $this->error;
		}

		if($this->success != ""){
			$data['successMsg']= $this->success;
		}
		$data['color'] = $_POST['color'];
		
		$result = $this->load->view("vEventDetailsFromCalendar",$data,true);
	 
		echo $result;
	}



	public function buyTicket($tId,$eid)
		{
			
			$res = $this->MUser->read_where( array('account_id' =>$this->session->userdata['userSession']->userID  ));
			if($res){
				$res1 = $this->MTicketType->read_where( array('ticket_type_id' =>$tId  ));
				$result = $res[0]->load_amt - $res1[0]->price;

				if($result >= 0){
					$now = NEW DateTime(NULL, new DateTimeZone('UTC'));


					$data = array('date_sold' => $now->format('Y-m-d H:i:s'),
					  'user_id' => $this->session->userdata['userSession']->userID ,
					  'ticket_type_id' => $tId
	 				  );
					$res = $this->MTicket->insert($data);

					$result = $this->MUser->update1(array("account_id"=>$this->session->userdata['userSession']->userID),array("load_amt"=>$result));
					$this->success = "Bought ticket for ".$res1[0]->price;
					// $this->displayEventDetails($eid);
					redirect('CEvent/displayEventDetails/'.$eid);
				}else{
					$this->error = "Insufficient balance!";
					$this->displayEventDetails($eid);
				}

			}

		

			# code...
		}
		public function createEvent(){
			$event = new mEvent();
			$data['event_date_start'] = $this->input->post('dateStart');
			$data['event_date_end'] = $this->input->post('dateEnd');
	
			$date2=explode(" ", $data['event_date_start']);
			$d = explode ("/", $date2[0]);
			$ts = strtotime($d[2]."-".$d[0]."-".$d[1]." ".$date2[1].":00 ".$date2[2]);
			$data['event_date_start'] = mdate("%Y-%m-%d %H:%i:%s", $ts);
	
			$date2=explode(" ", $data['event_date_end']);
			$d = explode ("/", $date2[0]);
			$ts = strtotime($d[2]."-".$d[0]."-".$d[1]." ".$date2[1].":00 ".$date2[2]);
			$data['event_date_end'] = mdate("%Y-%m-%d %H:%i:%s", $ts);
	
			$data['no_tickets_total'] = 0;
			$data['event_status'] = 'pending';
			$data['event_name'] = $this->input->post('event_name');
			$data['event_details'] = $this->input->post('event_details');
			$data['event_category'] = $this->input->post('event_category');
			$data['event_venue'] = $this->input->post('event_venue');
			$data['date_created'] = date('Y-m-d H:i:s');
	
			$data['user_id'] = $this->session->userdata['userSession']->userID;
	
			$affectedRows = $this->MEvents->insert($data);
	
			$evt_id = $this->MEvents->db->insert_id();
			$photo = $this->MEvents->do_upload_event($evt_id);
			
			if(!$photo) {
				$photo = $this->MEvents->insertPhotoEvent("events1.jpg",$evt_id);
			}
			var_dump($photo);
	
	
			$totalNumTix = 0;
			$data1['ticket_name'] = $this->input->post('ticketType1');
			$data1['ticket_count'] = $this->input->post('no_tickets_total1');
			$data1['price'] = $this->input->post('price_tickets_total1');
	
			$data1['event_id'] = $evt_id;
			$totalNumTix += $data1['ticket_count'];
			$this->MTicketType->insert($data1);
	
			if($this->input->post('ticketType2')||$this->input->post('no_tickets_total2')||$this->input->post('no_tickets_total2')){
				$data1['ticket_name'] = $this->input->post('ticketType2');
				$data1['ticket_count'] = $this->input->post('no_tickets_total2');
				$data1['price'] = $this->input->post('price_tickets_total2');
	
				$data1['event_id'] = $evt_id;
				$totalNumTix += $data1['ticket_count'];
				$this->MTicketType->insert($data1);
			}
	
			if($this->input->post('ticketType3')||$this->input->post('no_tickets_total3')||$this->input->post('no_tickets_total3')){
				$data1['ticket_name'] = $this->input->post('ticketType3');
				$data1['ticket_count'] = $this->input->post('no_tickets_total3');
				$data1['price'] = $this->input->post('price_tickets_total3');
	
				$data1['event_id'] = $evt_id;
				$totalNumTix += $data1['ticket_count'];
				$this->MTicketType->insert($data1);
			}
	
			$where =  array('no_tickets_total' => $totalNumTix );
			$res = $this->MEvents->update($evt_id,$where);
	
			
	
			if($res){
				redirect('CEvent/viewEvents');
			}else{
				redirect('CEvent/viewCreateEvent');
			}
	
		}
	

		public function deleteEvent($id){
			$data = array('event_isActive'=> 0);
			$v = $this->MUser->updateSpecificEvent($id,$data);
			if($v){
				redirect('CEvent/viewEvents');
			}else{
				echo "Error...";
			}
		
		}
		
	public function updateEvent(){
		$event_id = $this->input->post('event_id');
		$event_date_start = $this->input->post('event_date_start');
		$event_date_end = $this->input->post('event_date_end');
		$event_name = $this->input->post('event_name');
		$event_details = $this->input->post('event_details');
		$event_category = $this->input->post('event_category');
		$event_venue = $this->input->post('event_venue');

		

		$data = array('event_date_start'=>$event_date_start,
					  'event_date_end'=>$event_date_end,
					  'event_name'=>$event_name,
					  'event_details'=>$event_details,
					  'event_category'=>$event_category,
					  'event_venue'=>$event_venue);

		$v = $this->MUser->updateSpecificEvent($event_id,$data);

		if($v){
			for($temp = 0; $temp < $this->input->post('totalshit'); $temp++){
				$data = array(
					'ticket_name' => $this->input->post('ticketType'.$temp),
					'price' => $this->input->post('price_tickets_total'.$temp),
					'ticket_count' => $this->input->post('no_tickets_total'.$temp)
				);
				$var = $this->MUser->updateSpecificTicketType($data, $this->input->post('ticketID'.$temp));
				if(!$var){
					echo "Error shit";
					break;
				}
			}
			redirect('CLogin', 'refresh');
		}else{
			echo "Error...";
		}
		
		
	}


		public function upcomingEvents(){
			$this->load->model('events/mEvent','Event');
			$data['events'] = $this->MEvents->showUpcomingEvents();

			$this->load->view('imports/vHeader');
			$this->load->view('user/vUpcoming.php', $data);
			$this->load->view('imports/vFooter');

		}

		public function editEvent($id){
			$v['ev'] = $this->MUser->getEventDetails($id)->row();
			$v['ti'] = $this->MUser->getTicketDetails($id)->result();

			$this->load->view('imports/vHeaderSignUpPage');
			$this->load->view('user/vEditEvent', $v);
			$this->load->view('imports/vFooterLandingPage');
		}
}
?>
