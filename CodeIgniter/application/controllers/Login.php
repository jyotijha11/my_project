<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   class Login extends CI_Controller {
   
      public function __construct() { 
         parent::__construct();
      } 
      public function index() 
      {
         $this->load->library('form_validation');
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
         $this->form_validation->set_rules('password', 'Password', 'required');

         if($this->form_validation->run()==TRUE)
         { 
            $result = $this->Login_model->login();
            if ($result > 0)
            redirect('login/dashboard');
         } 
         $this->load->view('login_form'); 
      }
      public function dashboard()
     {
       $this->load->view('dashboard'); 
     }
} 
?>