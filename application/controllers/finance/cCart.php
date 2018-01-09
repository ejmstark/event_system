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
		$qty= 5;
		$id = 1; //ticket id
		$cartId = 0;

		//check if ticket already exist!
		$data = $cart->read_where(array ('cartTicId'=>$id));
		foreach ($data as $datum) {
			$cartId = $datum->cartId;
		}

		//check if cartId != 0, if the data exist!
		if ($cartId != 0) {
			//add to existing
			echo $cartId;
			$this->addToExisting($cartId, $qty);
		} else { //add new cart item
			$data = array ('cartId'=>null,
				'cartTicId'=>$id,
				'cartQty'=>$qty);

			if ($cart->insert($data) > 0) {
				echo 'Success!';
			} else {
				echo 'Failed!';
			}
		}
	}

	//add to existing cart item
	public function addToExisting ($id, $qty1) {
		$cart = new MCart();
		//$id = 1; //cart id here
		$qty = 0;

		//get the current ticket qty
		$data = $cart->read($id);
		foreach ($data as $datum) {
			$qty = $datum->cartQty;
		}
		$qty += $qty1;

		$affectedFields = array ('cartQty'=>$qty);
		$where = array ('cartId'=>$id);

		if ($cart->update1($where, $affectedFields) > 0) {
			echo 'Sucess!';
		} else {
			echo 'Failed!';
		}
	}

	public function viewCart(){
		$result = $this->MCart->getCart();
		if($result){
			$this->load->view('vCart.php');
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
		$where = array ('cartId'=>$id);

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
			$where = array ('cartId'=>$id);

			if ($cart->update1($where, $affectedFields) > 0) {
				echo 'Sucess!';
			} else {
				echo 'Failed!';
			}
		}
	}
}