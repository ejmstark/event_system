<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CEvents extends CI_Controller {

		function __construct() {
			parent::__construct();
		 	/* LOAD MODELS HERE */
		 	//Ex: $this->load->model('MCalendar');
			$this->load->model('user/MEvent');
    	$this->load->model('user/MUser');
    	$this->load->model('user/MTicketType');
    	$this->load->model('user/MTicket');
    	$this->load->helper('date');
    	$this->load->model('MEventInfo');
    	$this->error = "";
    	$this->success = "";
		}

		public function index()
		{
			# code...
		}

		/* FUNCTIONS RELATED TO USERS (PUT IT BELOW) */
			/* ADMIN MODULE FUNCTIONS */
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

		$tid = $this->MEvent->joinEventTicketType($id);


		$data2['ticket_info'] = null;
		if($tid){
			$data2['ticket_info'] = $tid;
		}


        $data = array_merge($data1, $data2);

		$result = $this->load->view('vEditEvent',$data,TRUE);
		//$this->viewCreateEvent();
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
		$result_data = $this->MEvent->getAllEventsByUser($userid);
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

		$result_data = $this->MEventInfo->getTransHistory($this->session->userdata['userSession']->userID);
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

		$result_data = $this->MEvent->loadEventDetails($id);
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

		$gID = $this->MEvent->loadEventDetails($id);

		foreach ($gID as $k) {
			$eid = $k->event_id;
			$uid = $k->user_id; //retrieve
		}

		// print_r($uid);
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

		// $data4['tixStat'] = $this->MTicketType->getTicketStatus($eid);
		// if(isset($data4['tixStat'])){
		// 	$data = array_merge($data1,$data2,$data3,$data4);
		// }else{

		// }
		$data = array_merge($data1,$data2,$data3);
		$result_data= $this->MEvent->getGoingToEvent($id);
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
		 // print_r($data);
		}

		if($this->success != ""){
			$data['successMsg']= $this->success;
		 // print_r($data);
		}

		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('vEventDetails',$data);
		$this->load->view('imports/vFooterLandingPage');


		// $this->load->view('imports/vHeader');
		// $this->load->view('user/vEventRegistration', $data);
		// $this->load->view('imports/vFooter');
		# code...
	}

			/* *************** */

			/* USER MODULE FUNCTIONS */


			/* *************** */

			/* CALENDAR MODULE FUNCTIONS */



			/* *************** */

			/* FINANCE MODULE FUNCTIONS */
        public function buyTicket($tId,$eid)
		{
			// print_r($id);
			// $type = new MTicketType();
			// $where = array('event_id' => $id );
			// $data['tickets'] = $type->loadType($id);
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
					redirect('event/cEvent/displayEventDetails/'.$eid);
				}else{
					$this->error = "Insufficient balance!";
					$this->displayEventDetails($eid);
				}

			}

			// echo $this->MTicket->db->last_query();

			// $this->load->view('imports/vHeader');

			// $this->load->view('imports/vFooter');

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

			/* *************** */

			/* REPORTS MODULE FUNCTIONS */



			/* *************** */
		/**********************************************/

	}
?>
