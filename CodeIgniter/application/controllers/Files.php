<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Files extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if($this->input->post('submit'))
		{
			//echo "Form Submit"; die();
			$this->form_validation->set_rules('frm[first_name]','First Name','required');
			$this->form_validation->set_rules('frm[last_name]','Last Name','required');
			$this->form_validation->set_rules('frm[email]','Email','required|is_unique[file.email]');
			$this->form_validation->set_rules('frm[password]','Password','required|is_unique[file.password]');
			//echo " form validated"; die();
			if($this->form_validation->run())
			{

				$data = $this->input->post('frm');
           		//echo $this->db->last_query();
              	$this->Master_model->save($data, 'file');
			}
		}
		$this->load->view('file_regsiter');
	}
	public function login()
	 {
	 	if($this->input->post("submit"))
	 		{
	 			//echo "Form Submit"; die();
	 			$this->form_validation->set_rules('frm[email]', 'Email', 'required');
	 			$this->form_validation->set_rules('frm[password]', 'Password', 'required');
	 			if($this->form_validation->run())
	 			{
	 				$return= $this->Login_model->login();
		 			if(!empty($return))
		 			  {
		 			    $sess_data = array(
		 			            'id'  => $return[0]->id,
		 			            'email'     => $return[0]->email,
		 			            'logged_in' => TRUE
		 			    );
		 			    $this->session->set_userdata('login',$sess_data);
		 			    redirect('Files/files_details');
		 			  }
		 			  else 
			          {
			            $this->session->set_flashdata('message', 'Invalid user & password.');
			            redirect('Files/login');
			          } 
		 		}
		 			
	 		}
	 		$this->load->view('file_login');
	 }
}