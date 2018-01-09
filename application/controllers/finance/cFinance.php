<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CFinance extends CI_Controller {


	public function index()
	{
		$this->data['custom_js']= '<script type="text/javascript">
                              $(function(){
                              	$("#fin").addClass("active");
                              });
                        </script>';
		$this->load->view('imports/vHeader');
		$this->load->view('finance/vFinance.php');
		$this->load->view('imports/vFooter',$this->data);
	}
}
