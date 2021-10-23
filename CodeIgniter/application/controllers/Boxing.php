<?php
  
class Boxing extends CI_Controller {
   
  public function __construct() { 
     parent::__construct(); 
     $this->load->database();
     
  } 
  public function index() {		
      
      $this->load->view('boxing_form'); 
  }
  public function mail(){
  	$this->load->library('email');
    //print_r(expression)
  	$name= $this->input->post('name');
  	$email= $this->input->post('email');
  	$message= $this->input->post('message');

  	$this->email->from($email, $name);
  	$this->email->to('jyoti@mycoders.in');
  	$this->email->subject('Email Test');
  	$this->email->message($message);

  	$rsult=$this->email->send();
  	if($rsult){
      echo "Mail sent";
    } else{
      echo "Sorry mail not sent";
    }
  }
}
?>