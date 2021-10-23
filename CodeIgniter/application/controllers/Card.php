<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card extends CI_Controller 
{
	public function __construct() { 
         parent::__construct();
      } 
    public function register()
      {
       if($this->input->post('submit'))
       {

        $this->form_validation->set_rules('frm[fname]','First Name','required');
        $this->form_validation->set_rules('frm[lname]','Last Name','required');
        $this->form_validation->set_rules('frm[email]','Email','required|is_unique[ecard.email]');
        $this->form_validation->set_rules('frm[password]','Password');
         $this->form_validation->set_rules('frm[gender]', 'Gender', 'required');

         if($this->form_validation->run())
         {
          //echo "Form validate";
            $data = $this->input->post('frm');
            
            $this->Master_model->save($data,'ecard');
            $this->session->set_flashdata('message','Data inserted successfully.');
            redirect('Card/login');

        }
      
      }  
       $this->load->view('ecard_registration');
    }
    public function login() 
    {
        if($this->input->post("submit"))
        {
        $this->form_validation->set_rules('frm[email]', 'Email', 'required');
        $this->form_validation->set_rules('frm[password]', 'Password', 'required');
        if($this->form_validation->run())
        {
          $this->load->model('Logedin_model');
          $return= $this->Logedin_model->login();
          echo $this -> db -> last_query(); die;
          if(!empty($return))
          {
            $sess_data = array(
                    'id' => $return[0]->id,
                    'email' => $return[0]->email,
                    'logged_in' => TRUE
            );
            //print_r($newdata); die;
            $this->session->set_userdata('login',$sess_data);
           //print_r($_SESSION); die;
            redirect('Card/ecard_details');
          } 
        }else 
          {
            $this->session->set_flashdata('message', 'Invalid user & password.');
            redirect('Card/login');
          }
        
      }

        $this->load->view('ecard_login');
    }

    public function ecard_details()
    {
       $data["list"] = $this->Master_model->listAll('ecard');
      $login = $this->session->userdata('login');
      if (!$login['id']) 
         {
          $this->session->set_flashdata('message', 'Session is not working.');
         redirect('Card/login');
         }
        $this->load->view('ecaed_dashboard',$data);
    }
     public function approve($id){
      $data  = array('status'=>  1);
      $res = $this->Message_model->approve($id, $data);
      //echo $this -> db -> last_query(); die;
      if($res >0){
        //Redirect
        redirect('Card/ecard_details');
      }else{
       //some error accured 
      }
  }

    public function disapprove($id)
    {
      $data  = array('status'=>  0);
      $res = $this->Message_model->disapprove($id, $data);
      //echo $this -> db -> last_query(); die;
      if($res >0){
        //Redirect
        redirect('Card/ecard_details');
      }else{
       //some error accured 
      }
  }
}