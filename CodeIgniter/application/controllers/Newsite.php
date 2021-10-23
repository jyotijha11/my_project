<?php
  
class Newsite extends CI_Controller {
   
  public function __construct() { 
     parent::__construct(); 
     $this->load->database();
     
  } 
  public function index() {		
      
      $this->load->view('form_seanding'); 
  }
  public function mail(){
  	$this->load->library('email');

  	$name= $this->input->post('demo-name');
  	$email= $this->input->post('demo-email');
  	$message= $this->input->post('demo-message');

	$this->email->from($email, $name);
	$this->email->to('jyoti@mycoders.in');

	$this->email->subject('Email Test');
	$this->email->message($message);

	$this->email->send();
  	
  }
}
?>