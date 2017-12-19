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
		$qty= 5;
		$id = 1; 
		$cartId = 0;

		
		$data = $cart->read_where(array ('cartTicId'=>$id));
		foreach ($data as $datum) {
			$cartId = $datum->cartId;
		}

		
		if ($cartId != 0) {
			
			echo $cartId;
			$this->addToExisting($cartId, $qty);
		} else { 
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

	
	public function addToExisting ($id, $qty1) {
		$cart = new MCart();
		$qty = 0;

		
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
		$this->load->view('vCart');
	}
	
	public function addQty () {
		$cart = new MCart();
		$id = 1; 
		$qty = 0;

		
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

	
	public function minusQty () {
		$cart = new MCart();
		$id = 1; 
		$qty = 0;

		$data = $cart->read($id);
		foreach ($data as $datum) {
			$qty = $datum->cartQty;
		}
		$qty--;

		if ($qty == 0) {
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