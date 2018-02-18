<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCalendar extends CI_Controller {

	function __construct() {
		parent::__construct();
	 	$this->load->model('calendar/MCalendar');
		$this->load->model('user/MUser');
	 	$this->load->model('user/MEvent');
	}

	public function index()
	{
		$this->displayCalendar();
	}

	public function displayCalendar()
	{
		$data['user'] = $this->MUser->read($this->session->userdata['userSession']->userID);
		$this->data['custom_js']= '<script type="text/javascript">
                              $(function(){
                              	$("#cal").addClass("active");
                              });
                        </script>';

		//////////////////////////////////////////////////////////////////////////////
		//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
		/////////////////////////////////////////////////////////////////////////////
		$strCalSelect = "*, DATE_FORMAT(event_info.event_date_start,'%d-%b-%y %H:%m') as dateStart, DATE_FORMAT(event_info.event_date_end,'%d-%b-%y %H:%m') as dateEnd";
		$strCalWhere = array(
													"user_id" => $this->session->userdata['userSession']->userID,
													"event_isActive" => TRUE
												);
		$data['event_data'] = $this->MEvent->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray($strCalSelect,$strCalWhere,false,false,false,false);
		////////////STOPS HERE///////////////////////////////////////////////////
		$this->load->helper('url');
		$this->load->view('imports/vHeaderLandingPage');
		$this->load->view('calendar/vCalendar',$data);
		$this->load->view('imports/vFooterLandingPage',$this->data);
	}
	public function AddEvent()
	{
		if (isset($_POST['title']) && isset($_POST['event_detail']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['event_category']) && isset($_POST['event_venue']) && isset($_POST['event_ticket_price']) && isset($_POST['event_ticket_type']) && isset($_POST['event_ticket_total_no']) && isset($_POST['event_ticket_discount'])
		){

			$title = $_POST['title'];
			$event_detail = $_POST['event_detail'];
			$start = $_POST['start'];
			$end = $_POST['end'];
			$event_category= ($_POST['event_category']==-1)?"Other":$_POST['event_category'];
			$event_venue= $_POST['event_venue'];
			$event_ticket_price= $_POST['event_ticket_price'];
			$event_ticket_type =$_POST['event_ticket_type'];
			$event_ticket_total_no= $_POST['event_ticket_total_no'];
			$event_ticket_discount= $_POST['event_ticket_discount'];
			$color=$_POST['color'];

			$data = array(
				'event_date_start'=>$start,
				'event_date_end'=>$end,
				'color'=>$color,
				'no_tickets_total'=>$event_ticket_total_no,
				'event_status'=>"Approved",
				'event_name'=>$title,
				'event_details'=>$event_detail,
				'event_category'=>$event_category,
				'event_venue'=>$event_venue,
				'user_id'=>3
			);
			$this->MCalendar->insert($data);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function ajaxUpdate()
	{
		if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){

			$id = $_POST['Event'][0];
			$start = $_POST['Event'][1];
			$end = $_POST['Event'][2];
			$data = array(
				'event_date_start'=>$start,
				'event_date_end'=>$end,
			);
			if($this->MCalendar->update($id,$data)){
				echo "OK";

			}else{
				echo "Error";
			}
		}
		redirect($_SERVER['HTTP_REFERER']);

	}

	public function displayEventUpdate()
	{
		if (isset($_POST['title']) && isset($_POST['id'])){
			$id = $_POST['id'];
			$title = $_POST['title'];
			$result = $this->MCalendar->read($id);
			foreach ($result as $row) {
				if($row!=NULL){
					$HTML='<div class="modal-dialog" role="document">
						<div class="modal-content">
						<form class="form-horizontal" method="POST" action="'.site_url().'/calendar/cCalendar/ajaxUpdateAndDelete">
						  <div class="modal-header" style="background-color:'.$row->color.';">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
						  </div>
						  <div class="modal-body">
							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
								  <input type="text" value="'.$row->event_name.'" name="title" class="form-control" id="title" placeholder="Title" required="true">
								</div>
							  </div>
							  <div class="form-group">
								<label for="event_detail" class="col-sm-2 control-label">Details</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="5" name="event_detail" id="event_detail" placeholder="Event Details" required="true">'.$row->event_details.'</textarea>
									</div>
							  </div>
							  <div class="form-group">
								<label for="color" class="col-sm-2 control-label">Color</label>
								<div class="col-sm-10">
								  <select name="color" class="form-control" id="color">
									  <option value="">Choose</option>
									  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
									  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
									  <option style="color:#008000;" value="#008000">&#9724; Green</option>
									  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
									  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
									  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
									  <option style="color:#000;" value="#000">&#9724; Black</option>
									</select>
								</div>
							  </div>
							  <div class="form-group">
								<label for="start" class="col-sm-2 control-label">Start date</label>
								<div class="col-sm-10">
								  <input type="text" value="'.$row->event_date_start.'" name="start" class="form-control" id="start" readonly>
								</div>
							  </div>
							  <div class="form-group">
								<label for="end" class="col-sm-2 control-label">End date</label>
								<div class="col-sm-10">
								  <input type="text" value="'.$row->event_date_end.'" name="end" class="form-control" id="end" readonly>
								</div>
							  </div>
							  <div class="form-group">
								<label for="event_category" class="col-sm-2 control-label">Category</label>
								<div class="col-sm-10">
								  <select name="event_category" class="form-control"  id="event_category" required="true">
									  <option value="-1">Choose Event Category ...</option>
									  <option value="Appearance" '.(($row->event_category=='Appearance')?'selected="selected"':"").'>Appearance</option>
									  <option value="Attraction" '.(($row->event_category=='Attraction')?'selected="selected"':"").'>Attraction</option>
									  <option value="Retreat" '.(($row->event_category=='Retreat')?'selected="selected"':"").'>Retreat</option>
									  <option value="Training" '.(($row->event_category=='Training')?'selected="selected"':"").'>Training</option>
									  <option value="Concert" '.(($row->event_category=='Concert')?'selected="selected"':"").'>Attraction</option>
									  <option value="Conference" '.(($row->event_category=='Conference')?'selected="selected"':"").'>Conference</option>
									  <option value="Convention" '.(($row->event_category=='Convention')?'selected="selected"':"").'>Convention</option>
									  <option value="Gala" '.(($row->event_category=='Gala')?'selected="selected"':"").'>Gala</option>
									  <option value="Festival" '.(($row->event_category=='Festival')?'selected="selected"':"").'>Festival</option>
									  <option value="Competition" '.(($row->event_category=='Competition')?'selected="selected"':"").'>Competition</option>
									  <option value="Meeting" '.(($row->event_category=='Meeting')?'selected="selected"':"").'>Meeting</option>
									  <option value="Party" '.(($row->event_category=='Party')?'selected="selected"':"").'>Party</option>
									  <option value="Rally" '.(($row->event_category=='Rally')?'selected="selected"':"").'>Rally</option>
									  <option value="Screening" '.(($row->event_category=='Screening')?'selected="selected"':"").'>Screening</option>
									  <option value="Seminar" '.(($row->event_category=='Seminar')?'selected="selected"':"").'>Seminar</option>
									  <option value="Tour" '.(($row->event_category=='Tour')?'selected="selected"':"").'>Tour</option>
									  <option value="Other" '.(($row->event_category=='Other')?'selected="selected"':"").'>Other</option>
									</select>
								</div>
							  </div>
							<div class="form-group">
								<label for="event_venue" class="col-sm-2 control-label">Venue</label>
								<div class="col-sm-10">
								  <input type="text" value="'.$row->event_venue.'" name="event_venue" class="form-control" id="event_venue" placeholder="Venue" required="true">
								</div>
							</div>
							<hr>
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Ticket Details</h4>
						  	</div>
						  	<br>
							<div class="form-group">
								<label for="event_ticket_price" class="col-sm-2 control-label">Price</label>
								<div class="col-sm-10">
								  <input type="number" value="" name="event_ticket_price" class="form-control" id="event_ticket_price" placeholder="Ticket Price" required="true">
								</div>
							</div>
							<div class="form-group">
								<label for="event_ticket_type" class="col-sm-2 control-label">Type</label>
								<i>(e.g. Genral Admission, Gold, Silver, VIP)</i>
								<div class="col-sm-10">
								  <input type="text"  value="" name="event_ticket_type" class="form-control" id="event_ticket_type" placeholder="Ticket Type (optional)">
								</div>
							</div>

							<div class="form-group">
								<label for="event_ticket_total_no" class="col-sm-2 control-label">Total Number</label>
								<div class="col-sm-10">
								  <input type="number" value="'.$row->no_tickets_total.'" name="event_ticket_total_no" class="form-control" id="event_ticket_total_no" placeholder="Ticket Total Number" required="true">
								</div>
							</div>

							<div class="form-group">
								<label for="event_ticket_discount" class="col-sm-2 control-label">Discount</label>
								<div class="col-sm-10">
								  <input type="number" value="" name="event_ticket_discount" class="form-control" id="event_ticket_discount" placeholder="Ticket Discount" required="true">
								</div>
							</div>
							  <input type="hidden" name="id" class="form-control" id="id" value="'.$id.'">
						  </div>
						  <div class="modal-footer">
						  	<button type="submit" name="action" value="delete" class="btn btn-danger pull-left">Delete Event</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" name="action" value="update" class="btn btn-primary">Save changes</button>
						  </div>
						</form>
						</div>
					  </div>';
					echo $HTML;
				}else{
					echo "error";
				}
			}
		}
	}

	public function ajaxUpdateAndDelete()
	{
		$data;
		$id;

		if($_POST['action']=='update'){
			if (isset($_POST['title']) && isset($_POST['id']) && isset($_POST['event_detail']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['event_category']) && isset($_POST['event_venue']) && isset($_POST['event_ticket_price']) && isset($_POST['event_ticket_type']) && isset($_POST['event_ticket_total_no']) && isset($_POST['event_ticket_discount'])
			){
				$title = $_POST['title'];
				$id=$_POST['id'];
				$event_detail = $_POST['event_detail'];
				$start = $_POST['start'];
				$end = $_POST['end'];
				$event_category= ($_POST['event_category']==-1)?NULL:$_POST['event_category'];
				$event_venue= $_POST['event_venue'];
				$event_ticket_price= $_POST['event_ticket_price'];
				$event_ticket_type =$_POST['event_ticket_type'];
				$event_ticket_total_no= $_POST['event_ticket_total_no'];
				$event_ticket_discount= $_POST['event_ticket_discount'];

				$data = array(
					'event_date_start'=>$start,
					'event_date_end'=>$end,
					'no_tickets_total'=>$event_ticket_total_no,
					'event_name'=>$title,
					'event_details'=>$event_detail,
					'event_category'=>$event_category,
					'event_venue'=>$event_venue,
					'user_id'=>3
				);



			}
		}else{
			if (isset($_POST['id'])){


				$id = $_POST['id'];

				$data = array(
					'event_status'=>"Rejected"
				);

				// echo "Delete".$id;
				// die();

				//$sql = "UPDATE `register_event` SET petition_status='Inactive' WHERE petition_id=".$id." ";


				// $sql = "DELETE FROM events WHERE id = $id";
				// $query = $bdd->prepare( $sql );
				// if ($query == false) {
				//  print_r($bdd->errorInfo());
				//  die ('Erreur prepare');
				// }
				// $res = $query->execute();
				// if ($res == false) {
				//  print_r($query->errorInfo());
				//  die ('Erreur execute');
				// }

			}
		}

		if($this->MCalendar->update($id,$data)){
			echo "OK";
		}else{
			echo "Error";
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}
