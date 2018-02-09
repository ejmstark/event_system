<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEvent extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();
    	$this->load->model('user/MEvent');
    	$this->load->model('user/MUser');
    	$this->load->model('user/MTicketType');
    	$this->load->model('user/MTicket');
    	$this->load->model('MNotification');
	  $this->load->model('MAnnouncement'); //admin module functionalit
    	$this->load->helper('date');
		$this->load->model('MEventInfo');
		$this->load->model('location/MLocation');
    	$this->error = "";
    	$this->success = "";
    }


	public function index()
	{

	}

	public function displayMunicipal(){
		if(isset($_POST['region_code'])){
			$code = $_POST['region_code'];
			$where = array("region_code" => $code);
			$result = $this->MLocation->read_where($where);
			// foreach($result as $muni){
			// 	var_dump($muni->location_name);
			// }
			echo json_encode($result);
			die();
		}else{
			echo false;
		}
	}

		//This function gets the date from the Calendar Module and sends in to the VCreateEvent.php
	public function viewCreateFromCalendar(){


		if(isset($_POST['startDate']) && isset($_POST['startTime']) && isset($_POST['endDate']) && isset($_POST['endTime']) ){
			$data['start_date'] = $_POST['startDate'];
			$data['start_time'] = $_POST['startTime'];
			$data['end_date'] = $_POST['endDate'];
			$data['end_time'] = $_POST['endTime'];
			$this->load->view('imports/vHeaderSignUpPage');
			$result = $this->load->view('vEventForCalendar',$data,TRUE);
			$this->load->view('imports/vHeaderSignUpPage');
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

		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$strEventSelect = "*, DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart, DATE_FORMAT(event_info.event_date_end,'%d-%b-%y %H:%m') as dateEnd";
		$strEventWhere = array("user_id" => $userid,
													 "event_isActive" => TRUE
													);
		$result = $this->MEvent->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray($strEventSelect,
							$strEventWhere,FALSE,FALSE,FALSE,FALSE);
		// echo"<pre>";
		// var_dump($result);
		$array = array();
		foreach ($result as $value) {
			$arrObj = new stdClass;
			$arrObj->data = $value;
			$arrObj->data->tix = $this->MEvent->getTicketsOfEvent($value->event_id);

			//Adding of location
			$arrObj->data->location = $this->MLocation->read_where("location_id = ".$value->location_id."");

			$array[] = $arrObj;
		}

		$val = array();
		foreach ($array as $key) {
			$arrObj = new stdClass;
			$arrObj = $key->data;
			$val[] = $arrObj;
		}
		$data['events']  = $val;
		////////////STOPS HERE///////////////////////////////////////////////////



		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['user'] = $this->MUser->read($this->session->userdata['userSession']->userID);
		////////////STOPS HERE///////////////////////////////////////////////////


		$data['info'] = $this->MUser->loadUserDetails($userid);
		//////////////////////////////////////////////////////////////////////////////
		//================Sprint 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['hist']   = $this->MEventInfo->getTransHistory($this->session->userdata['userSession']->userID);
		////////////STOPS HERE///////////////////////////////////////////////////

		$data['userid'] = $userid;

		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('vEvents',$data);
		$this->load->view('imports/vFooterLandingPage');
	}

	public function displayEventDetails($id)
	{

		$uid = null; //to get organize name
		$eid = null;
		$location_id = null; //get location ID
		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$gID = $data1 ['events']  = $this->MEvent->read_where('event_id = '.$id.'');
		////////////STOPS HERE///////////////////////////////////////////////////

		foreach ($gID as $k) {
			$eid = $k->event_id;
			$uid = $k->user_id; //retrieve
			$location_id = $k->location_id;
		}



		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data2['organizer'] = $this->MUser->read_where('account_id = '.$uid.'');
		////////////STOPS HERE////////////////////////////////////////////////////

		$result_data = $this->MTicketType->loadType($eid);
		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data3['types'] = $this->MTicketType->read_where('event_id = '.$eid.'');
		////////////STOPS HERE////////////////////////////////////////////////////

		// $data4['tixStat'] = $this->MTicketType->getTicketStatus($eid);
		// if(isset($data4['tixStat'])){
		// 	$data = array_merge($data1,$data2,$data3,$data4);
		// }else{

		// }
		$data = array_merge($data1,$data2,$data3);
		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['going'] = $this->MEvent->getGoingToEvent($id);
		////////////STOPS HERE////////////////////////////////////////////////////

		//================SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['user'] = $this->MUser->read_where( array('account_id' =>$this->session->userdata['userSession']->userID));
		$data['location'] = $this->MLocation->read_where('location_id ='.$location_id.'');
		////////////STOPS HERE////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////////////////////////
		$data['id'] = $this->session->userdata['userSession']->userID;
		if($this->error != ""){
			$data['errorMsg']= $this->error;
		 // print_r($data);
		}

		if($this->success != ""){
			$data['successMsg']= $this->success;
		 // print_r($data);
		}
		$result = $this->MPreference->checkIfInterestedAlready($this->session->userdata['userSession']->userID,$eid);

		if($result){
			$data['interested']	= TRUE;
			$data['user_event_preference_id'] = $result[0]->user_event_preference_id;
		}else{
			$data['interested']	= FALSE;
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

		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$gID = $data1 ['events']  = $this->MEvent->read_where('event_id = '.$id.'');
		////////////STOPS HERE///////////////////////////////////////////////////

		foreach ($gID as $k) {
			$eid = $k->event_id;
			$uid = $k->user_id; //retrieve
		}

		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data2['organizer'] = $this->MUser->read_where('account_id = '.$uid.'');
		////////////STOPS HERE////////////////////////////////////////////////////

		$result_data = $this->MTicketType->loadType($eid);
		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data3['types'] = $this->MTicketType->read_where('event_id = '.$eid.'');
		////////////STOPS HERE////////////////////////////////////////////////////

		// $data4['tixStat'] = $this->MTicketType->getTicketStatus($eid);
		// if(isset($data4['tixStat'])){
		// 	$data = array_merge($data1,$data2,$data3,$data4);
		// }else{

		// }
		$data = array_merge($data1,$data2,$data3);
		//////////////////////////////////////////////////////////////////////////////
		//================SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['going'] = $this->MEvent->getGoingToEvent($id);
		////////////STOPS HERE////////////////////////////////////////////////////

		//================SPRINT 3 INTERFACE MODULE============//
		/////////////////////////////////////////////////////////////////////////////
		$data['user'] = $this->MUser->read_where( array('account_id' =>$this->session->userdata['userSession']->userID));
		////////////STOPS HERE////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////////////////////////
		$data['id'] = $this->session->userdata['userSession']->userID;
		if($this->error != ""){
			$data['errorMsg']= $this->error;
		 // print_r($data);
		}

		if($this->success != ""){
			$data['successMsg']= $this->success;
		 // print_r($data);
		}
		$data['color'] = $_POST['color'];

		$result = $this->load->view("vEventDetailsFromCalendar",$data,true);

		echo $result;
	}



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
					// $this->success = "Bought ticket for ".$res1[0]->price;
					// $this->displayEventDetails($eid);

					$uid = $this->session->userdata['userSession']->userID;
					$res = $this->MNotification->insertNotif($uid, $eid, NULL);

					redirect('event/cEvent/displayEventDetails/'.$eid);
				}else{
					$this->session->set_flashdata('error_msg','Insufficient balance!');
					$this->displayEventDetails($eid);
				}

			}

			// echo $this->MTicket->db->last_query();

			// $this->load->view('imports/vHeader');

			// $this->load->view('imports/vFooter');

			# code...
		}
		public function createEvent(){
			// $this->load->model('events/mEvent','event');
			$flag = true;

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
			// $data['event_picture'] = null;
			$data['event_venue'] = $this->input->post('event_venue');
			$data['addedAt'] = date('Y-m-d H:i:s');


			//Added location
			$data['location_id'] = $this->input->post('municipal-name');

			$constraint = array('event_venue' => $data['event_venue'], 'location_id' => $data['location_id'], 'event_date_start' => $data['event_date_start'], 'event_date_end' => $data['event_date_end']);
			$res = $this->MEvent->read_where($constraint);
		
			if(count($res) > 0){
				$flag = false;
			}else{
				$affectedRows = $this->MEvent->insert($data);
				$evt_id = $this->MEvent->db->insert_id();
				// print_r($evt_id);
				$photo = $this->MEvent->do_upload_event($evt_id);
				// $this->MEvent->do_upload_event($evt_id);

				if(!$photo) {
					$photo = $this->MEvent->insertPhotoEvent("events1.jpg",$evt_id);
				}
				var_dump($photo);

					// print_r($photo);

				$totalNumTix = 0;
				$data1['ticket_name'] = $this->input->post('ticketType1');
				$data1['ticket_count'] = $this->input->post('no_tickets_total1');
				$data1['price'] = $this->input->post('price_tickets_total1');

				$data1['event_id'] = $evt_id;
				$totalNumTix += $data1['ticket_count'];
				$this->MTicketType->insert($data1);

				$datetime1 = new DateTime($this->input->post('dateStart'));
				$datetime2 = new DateTime($this->input->post('dateEnd'));
				$interv = date_diff($datetime2, $datetime1);
	
				$no = $interv->format('%H:%I:%S');
				if($no > 0){
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
					$res = $this->MEvent->update($evt_id,$where);
					$flag = $res;
				}else{
					$this->load->view('error_404');
				}
			}
			if($flag){
				echo'
					<div id="addAdmin" class="modal fade"  data-header-color="#34495e">
						<div class="modal-header">
								<h1 class="modal-title" align="center">Create Event Successful</h1>
						</div>
					</div>
				';
				header( "refresh:1; viewEvents" );
			}else{
				echo'
					<div id="addAdmin" class="modal fade"  data-header-color="#34495e">
						<div class="modal-header">
								<h1 class="modal-title" align="center">Create Event Not Successful</h1>
						</div>
					</div>
				';
				header( "refresh:1; viewCreateEvent" );
			}
		  }



		public function deleteEvent($id){
			// $event_id = $this->input>post('event_id');
			$data = array('event_isActive'=> 0);
			$v = $this->MUser->updateSpecificEvent($id,$data);
			if($v){
				redirect('event/cEvent/viewEvents');
			}else{
				echo "Error...";
			}
			//code for tests purposes
			/*
			$this->event->deleteEvent(18);
			*/
		}

	public function updateEvent(){
		$this->load->model('events/mEvent','event');

		$event_id = $this->input->post('event_id');
		$event_date_start = $this->input->post('event_date_start');
		$event_date_end = $this->input->post('event_date_end');
		$event_name = $this->input->post('event_name');
		$event_details = $this->input->post('event_details');
		$event_category = $this->input->post('event_category');
		$event_venue = $this->input->post('event_venue');

		//code for tests purposes
		/*
		$event_id = 18;
		$event_date_start = '2017-10-01 12:12:12';
		$event_date_end = '2017-10-01 12:12:12';
		$no_tickets_total = 15;
		$event_status = 'Approved';
		$event_name = 'Suntukan ng mga SHS sa Bunzel Lobby';
		$event_details = 'Bak-bakan na!';
		$event_category = 'Training';
		$event_venue = 'Consolacion Central Elementary School, Consolacion, Central Visayas, Philippines';
		*/
		//end of code snippet

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
			redirect('cLogin', 'refresh');
		}else{
			echo "Error...";
		}


	}

	public function updateProfile(){
		$user = new MUser();

		/* $data = array('event_date_start'=>$event_date_start,
					  'event_date_end'=>$event_date_end,
					  'event_name'=>$event_name,
					  'event_details'=>$event_details,
					  'event_category'=>$event_category,
					  'event_venue'=>$event_venue); */

		$user->setAccount_id($this->input->post('$sessionData->userID'));
		$user->setUser_name($this->input->post('uname'));
		$user->setUser_password(hash('sha512',$this->input->post('password')));
		$user->setFirst_name($this->input->post('fname'));
		$user->setMiddle_initial($this->input->post('midname'));
		$user->setLast_name($this->input->post('lname'));
		$user->setEmail($this->input->post('email'));
		$user->setBirthdate($this->input->post('bdate'));
		$user->setGender($this->input->post('gender'));
		$user->setContact_no($this->input->post('contact'));

		if(isset($user)){
			$user->updateUser();

			//$this->load->view('imports/vHeaderLandingPage');
			

		}else{

		}

		$this->load->view('event/cEvent/viewEvents');



	}




		public function upcomingEvents(){
			$this->load->model('events/mEvent','Event');
			$data['events'] = $this->Event->showUpcomingEvents();

			// print_r($data);
			$this->load->view('imports/vHeader');
			$this->load->view('user/vUpcoming.php', $data);
			$this->load->view('imports/vFooter');

		// $this->output->set_content_type('application/json')->set_output(json_encode($result));
		}

		public function editEvent($id){
			$v['ev'] = $this->MUser->getEventDetails($id)->row();
			$v['ti'] = $this->MUser->getTicketDetails($id)->result();

			$this->load->view('imports/vHeaderSignUpPage');
			$this->load->view('user/vEditEvent', $v);
			$this->load->view('imports/vFooterLandingPage');
		}
		public function interested($id)
		{
			$uid = $this->session->userdata['userSession']->userID;
			$pref = new MPreference();

			$now = NEW DateTime(NULL, new DateTimeZone('UTC'));
			$data = array('preference_date' => $now->format('Y-m-d H:i:s'),
						  'user_id' => $uid ,
						  'event_id' => $id
		 				  );

			$result = $pref->insert($data);

			if($result){
				redirect("event/cEvent/viewPreferenceEvents");
				// $this->viewPreferenceEvents();
			}

			# code...
		}
		public function interestedRemove($id)
		{
			// $uid = $this->session->userdata['userSession']->userID;
			// $pref = new MPreference();

			// $now = NEW DateTime(NULL, new DateTimeZone('UTC'));
			// $data = array('preference_date' => $now->format('Y-m-d H:i:s'),
			// 			  'user_id' => $uid ,
			// 			  'event_id' => $id
		 // 				  );

			$result = $this->MPreference->delete($id);

			if($result){
				redirect("event/cEvent/viewPreferenceEvents");
				// $this->viewPreferenceEvents();
			}

			# code...
		}
		public function viewPreferenceEvents()
		{
			$uid = $this->session->userdata['userSession']->userID;
			$result_data = $this->MPreference->joinEventPrefs($uid);
			//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$array = array();
		if($result_data){
			foreach ($result_data as $value) {
					$arrObj = new stdClass;
					$arrObj->event_id = $value->event_id;
					$arrObj->event_name = $value->event_name;
					$arrObj->event_picture = $value->event_picture;
					$arrObj->dateStart = $value->dateStart;
					$arrObj->dateEnd = $value->event_date_end;
					$arrObj->event_category = $value->event_category;
					$arrObj->event_venue = $value->event_venue;
					//Location
					$arrObj->location_name =$value->location_name;
					$arrObj->region_code = $value->region_code;
					$arrObj->tix = $this->MEvent->getTicketsOfEvent($value->event_id);
					$array[] = $arrObj;
			}
		}
		////////////STOPS HERE///////////////////////////////////////////////////
		$data['events'] = $array;
		$data['announcements'] = $this->MAnnouncement->getUnviewedOfUser($this->session->userdata['userSession']->userID);
		$data['announcementCount'] = count($data['announcements']);
		if(count($data['announcements']) == 0){
			$data['announcements'] = NULL;
		}

			$array1 = array();
			if($data['announcements']){
				foreach ($data['announcements'] as $value) {
						$arrObj = new stdClass;
						$arrObj->announcementID = $value->announcementID;
						$arrObj->announcementDetails = $value->announcementDetails;
						$arrObj->first_name = $value->first_name;
						$arrObj->last_name = $value->last_name;
						if($value->sec){
							$arrObj->ago =$value->sec;
							$arrObj->agoU ="seconds ago";
						}else if($value->min){
							$arrObj->ago =$value->min;
							$arrObj->agoU ="minutes ago";
						}else if($value->hr){
							$arrObj->ago =$value->hr;
							$arrObj->agoU ="hours ago";
						}else if($value->day){
							$arrObj->ago =$value->day;
							$arrObj->agoU ="days ago";
						}
						$array1[] = $arrObj;
				}
			}
			$data['announcements'] = $array1;

			$this->data['custom_js']= '<script type="text/javascript">

                              $(function(){

                              	$("#dash").addClass("active");

                              });

                        </script>';
			$this->load->view('imports/vHeaderLandingPage');
			$this->load->view('user/vPrefEvents', $data);

			$this->load->view('imports/vFooterLandingPage');
			# code...
		}
}
?>
