<?php 

    require('assets/CustomizationManager.php');
    CustomizationManager::SetTheme("configurations 0");
    
    class cError404 extends CI_Controller {
        
        public function __construct() {
            parent::__construct(); 
        } 

        public function index() { 
            $this->output->set_status_header('404'); 
            $data['content'] = 'error_404'; // View name 
            if(CustomizationManager::$currentConfigName == 'configurations 1'){
                $this->load->view('error404_1.php');
            }else if(CustomizationManager::$currentConfigName == 'configurations 2'){

            }else{
                $this->load->view('error_404.php');//loading in my template 
            }
        } 
    } 
?>