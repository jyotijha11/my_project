<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller 
{
	public function __construct() { 
         parent::__construct();
      } 
	
      public function index() 
      {
        if($this->input->server('REQUEST_METHOD') == 'POST'){
          // echo "Form Submit"; die();
          $this->form_validation->set_rules('frm[name]', 'Name', 'required');
          $this->form_validation->set_rules('frm[email]', 'Email', 'required');
          $this->form_validation->set_rules('frm[password]', 'Password', 'required');
          $this->form_validation->set_rules('frm[address]', 'Address', 'required');
          $this->form_validation->set_rules('frm[contact]', 'Contact', 'required');
          
          if($this->form_validation->run()==TRUE)
          {
            $dataArr = $this->input->post('frm');
            
              $this->Master_model->save($dataArr, 'register');
              redirect('registration/user_details');
          }
        }
        $this->load->view('register'); 
      }
      public function user_details()
      {
        $data["record"] = $this->Master_model->listAll('register');
        $this->load->view('dashboard',$data); 
      }

      public function getrecordbyid($id){
        $data['user_record'] = $this->Master_model->getRow($id, "register");
        $this->load->view('edit', $data);
      }

      public function edit_user($id)
      {
          $dataArr = $this->input->post('frm');
          
          $dataArr["id"]= $id;
          //print_r($dataArr);exit;
          $this->Master_model->save($dataArr, 'register');
          redirect('registration/user_details');
      }

      public function deleteRecordById($id){
        $this->Master_model->delete($id, "register");
        redirect('registration/user_details');
      }
}	