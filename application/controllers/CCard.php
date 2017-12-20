<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cCard extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('MCardLoad');
  }

  public function index(){
		
  }
    
  //Retrieve inputs from view
  public function card (){
    $amount = array(100, 200, 500, 1000);
    $qty = array( $this->input->post('qty1'),
		 		  $this->input->post('qty2'),
                  $this->input->post('qty3'),
                  $this->input->post('qty4'),
                );

    for($i = 0; $i < 4; $i++){
      $this->card1($amount[$i], $qty[$i]);
    }
  }

  //Process inputs from view with its amount
  public function card1 ($amount, $qty){
    for ($i = 0; $i < $qty; $i++) {
      $this->addCard($amount);
    }
  }

  //Generates random card code
  public function randomCode (){
    $rand = '';
    $c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for($i = 0; $i < 10; $i++){
      $rand .= $c[rand (0, strlen($c)-1)];
    }

    return $rand;
  }

  //Checks if the cardcodes does not yet exist in the database
  public function isCodeUnique ($rand){
    $card = new MCardLoad();
    $data = array('cardCode' => $rand);

    if($card->read_where($data) == null){
      return true;
    }else{
      return false;
    }
  }

  //Insert newly generated card on the database
  public function addCard($amount){
    $card = new MCardLoad();
    $random = '';

    do{
      $random = $this->randomCode();
    }while($this->isCodeUnique($random) != true);

    $data = array ('cardId' => null,
                   'cardCode' => $random,
                   'cardAmount' => $amount,
                   'cardStatus' => 1,
                   'addedBy' => $this->session->userdata["userSession"]->userID,
                   'updatedBy' => $this->session->userdata["userSession"]->userID
                  );

    $query = $card->insert($data);
  }
}
