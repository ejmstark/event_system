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
    //$qty = $this->input->post('qty1')
    $qty= 5;
    $id = 1; //ticket id
    $cartId = 0;

    //check if ticket already exist!
    $data = $this->MCart->read_where(array ('cartTicId'=>$id));
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

      if ($this->MCart->insert($data) > 0) {
        echo 'Success!';
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
      $qty = $datum->cartQty;
    }
    $qty += $qty1;

    $affectedFields = array ('cartQty'=>$qty);
    $where = array ('cartId'=>$id);

    if ($this->MCart->update1($where, $affectedFields) > 0) {
      echo 'Sucess!';
    } else {
      echo 'Failed!';
    }
  }

  public function viewCart(){
    $result = $this->MCart->getCart();
    $this->load->view('vCart');
  }
  //add 1 qty to the cart
  public function addQty () {
    $id = 1; //cart id here
    $qty = 0;

    //get the current ticket qty
    $data = $this->MCart->read($id);
    foreach ($data as $datum) {
      $qty = $datum->cartQty;
    }
    $qty++;

    $affectedFields = array ('cartQty'=>$qty);
    $where = array ('cartId'=>$id);

    if ($this->MCart->update1($where, $affectedFields) > 0) {
      echo 'Sucess!';
    } else {
      echo 'Failed!';
    }
  }

  //minus 1 qty to the cart
  public function minusQty () {
    $id = 1; //cart id here
    $qty = 0;

    //get the current ticket qty
    $data = $this->MCart->read($id);
    foreach ($data as $datum) {
      $qty = $datum->cartQty;
    }
    $qty--;

    //delete the item in the cart if 0
    if ($qty == 0) {
      //delete here
      $this->MCart->delete($id);
    } else {
      $affectedFields = array ('cartQty'=>$qty);
      $where = array ('cartId'=>$id);

      if ($this->MCart->update1($where, $affectedFields) > 0) {
        echo 'Sucess!';
      } else {
        echo 'Failed!';
      }
    }
  }
}