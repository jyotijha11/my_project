<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller 
{
  public function __construct() { 
         parent::__construct();
      } 
    public function register()
      {
      if($this->input->post('submit'))
       {
        // echo "Form Submit"; die();
        $this->form_validation->set_rules('frm[fname]','First Name','required');
        $this->form_validation->set_rules('frm[lname]','Last Name','required');
        $this->form_validation->set_rules('frm[email]','Email','required|is_unique[contacts.email]');
         $this->form_validation->set_rules('frm[mobile]','Mobile','required|is_unique[contacts.model]');
         $this->form_validation->set_rules('frm[address]', 'Address', 'required');
          $this->form_validation->set_rules('frm[password]', 'Password', 'required');
         //echo "Form validate";
         if($this->form_validation->run()==TRUE)
         {
          // echo "Form validate";die();
            $data = $this->input->post('frm');
            $this->Master_model->save($data,'contacts');
            //print_r($data); die();
            $this->session->set_flashdata('message','Data inserted successfully.');
            redirect('Contact/login');

        }
      
      }  
       $this->load->view('form');
    }
    public function login() 
    {
        if($this->input->post("submit"))
        {
        $this->form_validation->set_rules('frm[email]', 'Email', 'required');
        $this->form_validation->set_rules('frm[password]', 'Password', 'required');
        if($this->form_validation->run())
        {
          $this->load->model('Log_model');
          $return= $this->Log_model->login();
          //echo $this -> db -> last_query(); die;
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
            redirect('Contact/Contact_details');
          } 
        }else 
          {
            $this->session->set_flashdata('message', 'Invalid user & password.');
            redirect('Contact/login');
          }
        
      }

        $this->load->view('Contact_login');
    }

    public function Contact_details()
    {
       $data["record"] = $this->Master_model->listAll('contacts');
      $login = $this->session->userdata('login');
      if (!$login['id']) 
         {
          $this->session->set_flashdata('message', 'Session is not working.');
         redirect('Contact/login');
         }
        $this->load->view('contact_dashboard',$data);
    }
    
    public function getListById($id){
      $data['user_list'] = $this->Master_model->getRow($id, "contacts");
      // echo $this->db->last_query();
      $this->load->view('edit_contact', $data);
    }

    public function edit_contacts($id)
    {
        $dataArr = $this->input->post('frm');
        
        $dataArr["id"]= $id;
        $this->Master_model->save($dataArr, 'contacts');
        //echo $this->db->last_query();die;
        redirect('Contact/Contact_details');
    }

    public function deleteListById($id){
      $this->Master_model->delete($id, "contacts");
      redirect('Contact/Contact_details');
    }
    
    public function approve($id){
      $data  = array('status'=>  1);
      $res = $this->Message_model->approve($id, $data);
      //echo $this -> db -> last_query(); die;
      if($res >0){
        //Redirect
        redirect('Contact/Contact_details');
      }else{
       //some error accured 
      }
  }

    public function disapprove($id){
      $data  = array('status'=>  0);
      $res = $this->Message_model->disapprove($id, $data);
      //echo $this -> db -> last_query(); die;
      if($res >0){
        //Redirect
        redirect('Contact/Contact_details');
      }else{
       //some error accured 
      }
  }
}
    
