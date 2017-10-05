<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSecurity extends CI_Controller {


	public function index()
	{
		$this->data['custom_js']= '<script type="text/javascript">
                              $(function(){
                              	$("#sec").addClass("active");
                              });
                        </script>';
		$this->load->view('imports/vHeader');
		$this->load->view('security/vSecurity.php');
		$this->load->view('imports/vFooter',$this->data);
	}
}
