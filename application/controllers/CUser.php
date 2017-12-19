<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CUser extends CI_Controller {

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
				

			/* *************** */

			/* USER MODULE FUNCTIONS */


			/* *************** */

			/* CALENDAR MODULE FUNCTIONS */



			/* *************** */

			/* FINANCE MODULE FUNCTIONS */
        public function redeemCode(){

		  $code = $this->input->post('ccode');
		  echo "Code ID: ".$code;
		  $card = $this->MCardLoad->read_where(array('cardCode'=> $code));

		  if($card){
			$card = json_decode(json_encode($card));
			$u =  $this->MUser->read($this->session->userdata['userSession']->userID);
			if($card[0]->cardStatus==1){
				$cardNew = $u[0]->load_amt + $card[0]->cardAmount;
				$res = $this->MUser->update($this->session->userdata["userSession"]->userID,array('load_amt'=>$cardNew));

				if($res){
					$code = $card[0]->cardId;
					$res1 = $this->MCardLoad->update($code, array('cardStatus'=>0));
				}
			}
		  }

		  redirect("event/cEvent/viewEvents");
	    }


			/* *************** */

			/* REPORTS MODULE FUNCTIONS */



			/* *************** */
		/**********************************************/

	    }
?>
