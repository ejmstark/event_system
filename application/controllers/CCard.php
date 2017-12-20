<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCard extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('MCard');
  }

  public function index()
  {
   
  }

  public function card () {
    $amount = array (100, 200, 500, 1000);
    $qty = array ( $this->input->post('qty1'),
               $this->input->post('qty2'),
             $this->input->post('qty3'),
             $this->input->post('qty4'),
           );
    echo 'qty'.$qty[0];
    for ($i = 0; $i < 4; $i++) {

      $this->card1($amount[$i], $qty[$i]);
    }
  }

  public function card1 ($amount, $qty) {
    for ($i = 0; $i < $qty; $i++) {
      $this->addCard($amount);
    }
  }

  //generates and returns random alpha numeric strings
  public function randomCode () {
    $rand = '';
    $c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for ($i = 0; $i < 10; $i++) {
      $rand .= $c[rand (0, strlen($c)-1)];
    }

    return $rand;
  }

  //checks if the code is unique in the database
  public function isCodeUnique ($rand) {
    ///////////////////////////////////////
    ///////Interface New Implementation////
    ///////////////////////////////////////
    $data = array('cardCode' => $rand);

    if ($this->MCard->read_where($data) == null) {
      return true;
    } else {
      return false;
    }
    ///////////////////////////////////////
    ///////////////////////////////////////
  }

  public function addCard($amount) {
    ///////////////////////////////////////
    ///////Interface New Implementation////
    ///////////////////////////////////////
    $random = '';

    //the loop will not stop until it make sure that the code is unique
    do {
      $random = $this->randomCode();
    } while ($this->isCodeUnique($random) != true);

    $data = array('cardId' => null,
          'cardCode' => $random,
          'cardAmount' => $amount,
          'cardCreatedOn' => null,
          'cardStatus' => 1);

    $query = $this->MCard->insert($data);
    ///////////////////////////////////////
    ///////////////////////////////////////
  }
}
