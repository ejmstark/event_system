<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCart extends CI_Controller {

	function __construct() {
		parent::__construct();
	 	$this->load->model('MCart');
	 	$this->load->model('MTicket');
	}

	public function index() {
	}

	public function addToCart () {
		$cart = new MCart();
		//$qty = $this->input->post('qty1')
		$qty= $this->input->post('qty1');
		$id = $this->input->post('ticket'); //ticket id
		$cart_id = 0;


		
		//check if ticket already exist!
		$data = $cart->read_where(array ("ticket_id"=>$id,
										 "account_id"=>$this->session->userdata['userSession']->userID,
										 "status"=>'active'
										)
								);
		foreach ($data as $datum) {
			$cart_id = $datum->cart_id;
		}

		//check if cart_id != 0, if the data exist!
		if ($cart_id != 0) {
			//add to existing
			echo $cart_id;
			$this->addToExisting($cart_id, $qty);
		} else { //add new cart item
			$data = array ('cart_id'=>null,
				'ticket_id'=>$id,
				'quantity'=>$qty,
				"account_id"=>$this->session->userdata['userSession']->userID);

			if ($cart->insert($data) > 0) {
				redirect("finance/cCart/viewCart");
			} else {
				echo 'Failed!';
			}
		}
	}

	//add to existing cart item
	public function addToExisting ($id, $qty1) {
		
		//$id = 1; //cart id here
		$qty = 0;

		//get the current ticket qty
		$data = $this->MCart->read($id);
		foreach ($data as $datum) {
			$qty = $datum->quantity;
		}
		$qty += $qty1;

		$affectedFields = array ('quantity'=>$qty);
		$where = array ('cart_id'=>$id);

		if ($this->MCart->update1($where, $affectedFields) > 0) {
			redirect("finance/cCart/viewCart");
		} else {
			echo 'Failed!';
		}
	}

	public function viewCart(){

		$data['events'] = $this->MCart->getCart();
		if($data['events']){
			$this->load->view('imports/vHeaderLandingPage');
			$this->load->view('vCart',$data);	
			$this->load->view('imports/vFooterLandingPage');
		}else{
			redirect('cError404');
		}
	}
	//add 1 qty to the cart
	public function addQty () {
		$cart = new MCart();
		$id = 1; //cart id here
		$qty = 0;

		//get the current ticket qty
		$data = $cart->read($id);
		foreach ($data as $datum) {
			$qty = $datum->cartQty;
		}
		$qty++;

		$affectedFields = array ('cartQty'=>$qty);
		$where = array ('cart_id'=>$id);

		if ($cart->update1($where, $affectedFields) > 0) {
			echo 'Sucess!';
		} else {
			echo 'Failed!';
		}
	}

	//minus 1 qty to the cart
	public function minusQty () {
		$cart = new MCart();
		$id = 1; //cart id here
		$qty = 0;

		//get the current ticket qty
		$data = $cart->read($id);
		foreach ($data as $datum) {
			$qty = $datum->cartQty;
		}
		$qty--;

		//delete the item in the cart if 0
		if ($qty == 0) {
			//delete here
			$cart->delete($id);
		} else {
			$affectedFields = array ('cartQty'=>$qty);
			$where = array ('cart_id'=>$id);

			if ($cart->update1($where, $affectedFields) > 0) {
				echo 'Sucess!';
			} else {
				echo 'Failed!';
			}
		}
	}
}