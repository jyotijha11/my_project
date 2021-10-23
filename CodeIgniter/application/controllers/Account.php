<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller 
{
	public function __construct() { 
         parent::__construct();
      } 
	
      public function sign()
      {
        $data1['states'] = $this->Master_model->listAll('states');
      	if($this->input->post('submit'))
        {
          //echo "Form Submit"; die();
          
          $this->form_validation->set_rules('frm[f_name]', 'First Name', 'required');
          $this->form_validation->set_rules('frm[l_name]', 'Last Name', 'required');
          $this->form_validation->set_rules('frm[email]', 'Email', 'required|is_unique[accounts.email]');
           $this->form_validation->set_rules('frm[phone]', 'phone', 'required|is_unique[accounts.phone]');
          $this->form_validation->set_rules('frm[password]', 'Password', 'required');
          if($this->form_validation->run())
          {
            $data = $this->input->post('frm');

           //echo $this->db->last_query();
              $this->Master_model->save($data, 'accounts');
          }
          }
          $this->load->view('sign_up',$data1);
      }
       public function login()  
    {  
      if($this->input->post("submit")){
        $this->form_validation->set_rules('frm[email]', 'Email', 'required');
        $this->form_validation->set_rules('frm[password]', 'Password', 'required');
        if($this->form_validation->run())
        {
          $return= $this->Login_model->login();
          //echo $this -> db -> last_query(); die;
          if(!empty($return))
          {
            $sess_data = array(
                    'id'  => $return[0]->id,
                    'email'     => $return[0]->email,
                    'logged_in' => TRUE
            );
            //print_r($newdata); die;
            $this->session->set_userdata('login',$sess_data);
           //print_r($_SESSION); die;
            redirect('Account/account_details');
          } 
        }else 
          {
            $this->session->set_flashdata('message', 'Invalid user & password.');
            redirect('Account/login');
          }
        
      }

        $this->load->view('sigin');  
    } 
    public function account_details()
      {
        $data["list"] = $this->Master_model->listAll('accounts');
        $login = $this->session->userdata('login');
        //print_r($_SESSION); die;
        if (!$login['id']) 
           {
            $this->session->set_flashdata('message', 'Session is not working.');
           redirect('Account/login');
           }
        $this->load->view('acount_dashboard',$data); 
      }
       public function approve($id){
      $data  = array('status'=>  1);
      $res = $this->Message_model->approve($id, $data);
      //echo $this -> db -> last_query(); die;
      if($res >0){
        //Redirect
        redirect('Account/account_details');
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
        redirect('Account/account_details');
      }else{
       //some error accured 
      }
  }
   public function states() {
      $states = $this->db->get("states")->result();
      $this->load->view('sign_up', array('states' => $states )); 
   } 

   public function getCityList() {
      $id= $this->uri->segment(2);
       $city = $this->db->where("state_id",$id)->get("city")->result();
       //print_r($city); die();
       echo json_encode($city);
   }
}       