<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller 
{
	public function __construct() { 
         parent::__construct();
      } 
	
      public function register()
      {
      	if($this->input->server('REQUEST_METHOD') == 'POST'){
          // echo "Form Submit"; die();
          $this->form_validation->set_rules('frm[f_name]', 'First Name', 'required');
          $this->form_validation->set_rules('frm[l_name]', 'Second Name', 'required');
          $this->form_validation->set_rules('frm[email]', 'Email', 'required|is_unique[employees.email]');
          $this->form_validation->set_rules('frm[password]', 'Password', 'required');
          $this->form_validation->set_rules('frm[phone]', 'Phone', 'required');
          $this->form_validation->set_rules('frm[gender]', 'Gender', 'required');
          
          if($this->form_validation->run()==TRUE)
          {
            $data = $this->input->post('frm');
           echo $this->db->last_query();
              $this->Master_model->save($data, 'employees');
              // echo $this->db->last_query();
              redirect('Apply/emp_details');
           }
        }
        $this->load->view('employee');
      } 
      public function emp_details()
      {
        $data["list"] = $this->Master_model->listAll('employees');
        $login = $this->session->userdata('login');
        //print_r($_SESSION); die;
        if (!$login['id']) 
           {
            $this->session->set_flashdata('message', 'Session is not working.');
           redirect('apply/login');
           }
        $this->load->view('employee_dashboard',$data); 
      }
      public function getListById($id){
        $data['user_list'] = $this->Master_model->getRow($id, "employees");
        // echo $this->db->last_query();
        $this->load->view('edit_employee', $data);
      }

      public function edit_employees($id)
      {
          $dataArr = $this->input->post('frm');
          
          $dataArr["id"]= $id;
          $this->Master_model->save($dataArr, 'employees');
          //echo $this->db->last_query();die;
          redirect('Apply/emp_details');
      }

      public function deleteListById($id){
        $this->Master_model->delete($id, "employees");
        redirect('Apply/emp_details');
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
            redirect('Apply/emp_details');
          } 
        }else 
          {
            $this->session->set_flashdata('message', 'Invalid user & password.');
            redirect('Apply/login');
          }
        
      }

        $this->load->view('epm_login');  
    } 
    public function approve($id){
      $data  = array('status'=>  1);
      $res = $this->Message_model->approve($id, $data);
      //echo $this -> db -> last_query(); die;
      if($res >0){
        //Redirect
        redirect('Apply/emp_details');
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
        redirect('Apply/emp_details');
      }else{
       //some error accured 
      }
  }
}