<?php 
    class cError404 extends CI_Controller {
        public function __construct() {
            parent::__construct(); 
        } 

        public function index() { 
            $data['content'] = 'feedback'; // View name 
            $this->load->view('imports/vHeaderLandingPage');
            $this->load->view('vFeedBack.php');//loading in my template
            $this->load->view('imports/vFooterHomepage');
        } 
    } 
?>