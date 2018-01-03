<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CAnnouncements extends CI_Controller {

		function __construct() {
			parent::__construct();
		 	/* LOAD MODELS HERE */
		 	//Ex: $this->load->model('MCalendar');
		}

		public function index()
		{
			# code...
		}

		/* FUNCTIONS RELATED TO USERS (PUT IT BELOW) */
			/* ADMIN MODULE FUNCTIONS */
			//ANNOUNCEMENT FUNCTIONALITY - also added MAnnouncement in models/admin and autoload.php (12/04/17)
			public function viewAnnouncements() {
				$result_data=$this->readAllAdmin();
				//////////////////////////////////////////////////////////////////////////////
				//================INTERFACE MODULE - DATA-LAYOUT FILTERING CODE============//
				/////////////////////////////////////////////////////////////////////////////
				$array = array();
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
							$arrObj->upgraded_by = $value->upgradedBy;//Added by admin module
							$array[] = $arrObj;
					}
				}
				////////////STOPS HERE///////////////////////////////////////////////////

				$data2['admin']=$array;
				$data2['ownAdminAccount']=$this->readOwnAdminAccount();
				$data2['announcements']=$this->readAllAnnouncements();

				$this->load->view('imports/admin_vHeader');
				$this->load->view('admin/vAnnouncements', $data2);
				$this->load->view('imports/admin_vFooter');
			}
			
			public function createAnnouncement() {
				$announcement = new MAnnouncement();

				$now = NEW DateTime(NULL, new DateTimeZone('UTC'));

				$data = array('announcementDetails' => $this->input->post('announcementDetails'),
							  'announcementStatus' => 'OnGoing',
							  'postedBy' => $this->input->post('postedBy'),
							  'datePosted' => $now->format('Y-m-d H:i:s')
							);

				$result = $announcement->insert($data);

				if($result){
					redirect('CAdmin/viewAnnouncements');
				}
			}

			// view all announcements
			public function readAllAnnouncements(){
				$result= $this->MAnnouncement->read_all();
				if($result){
					return $result;
				}else{
					return false;
				}
			}

			public function deleteAnnouncement($id){
				$announcement = new MAnnouncement();

				$data = array('announcementID' => $id);
				$results = $this->MAnnouncement->read_where($data);

				if($results){
					$response = $announcement->updateAnnouncementStatus($id, "Finished");

					if ($response) {
						redirect('CAdmin/viewAnnouncements');
					}
				}
			}

			/* *************** */

			/* USER MODULE FUNCTIONS */


			/* *************** */

			/* CALENDAR MODULE FUNCTIONS */



			/* *************** */

			/* FINANCE MODULE FUNCTIONS */



			/* *************** */

			/* REPORTS MODULE FUNCTIONS */



			/* *************** */
		/**********************************************/

	}
?>
