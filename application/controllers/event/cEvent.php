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
    	$this->load->helper('date');
    	$this->load->model('MEventInfo');
    	$this->error = "";
    	$this->success = "";
    }


	public function index()
	{

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

		$data['events']  = $this->MEvent->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray($strEventSelect,
							$strEventWhere,FALSE,FALSE,FALSE,FALSE);
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

			 $data['user_id'] = $this->session->userdata['userSession']->userID;

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
			if($res){
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
}
?>
