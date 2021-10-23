<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller 
{
	public function __construct() { 
         parent::__construct();
         //$this->load->model('join_model/' . $this->controller . 'join_model');
         $this->load->model('join_model');
      } 
	public function index()
	{
		$data1['country'] = $this->Master_model->listAll('country');
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('frm[name]','Name','required');
			$this->form_validation->set_rules('frm[email]', 'Email', 'required|is_unique[order_list.email]');
			if($this->form_validation->run())
          	{
							$data = $this->input->post('frm');
              $this->Master_model->save($data, 'order_list');
              redirect('orders/login');
          	}
        }									
          $this->load->view('order',$data1);
	}
  public function country() {
  	$country = $this->db->get("country")->result();
    $this->load->view('order', array('country' => $country )); 
 	} 

  public function getStatesList() {
	  $id= $this->uri->segment(2);
	  $states = $this->db->where("country_id",$id)->get("states")->result();
	  echo json_encode($states);
	}
	public function login()
	{  

	  if($this->input->post("submit")){
	  	//echo "submit"; die();
	    $this->form_validation->set_rules('frm[email]', 'Email', 'required');
	    $this->form_validation->set_rules('frm[password]', 'Password', 'required');
	    if($this->form_validation->run())
	    	//echo "form validated";die();
	    {
	      $return= $this->Login_model->login();
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
	        redirect('orders/order_details');
	      } 
	    }
	    else 
	      {
	        $this->session->set_flashdata('message', 'Invalid user & password.');
	        redirect('orders/login');
	      }
	  	}
	    $this->load->view('order_login');  
	} 
	public function order_details()
  {
    $data["order_list"] = $this->join_model->getdata();
    $login = $this->session->userdata('login');
    if (!$login['id']) 
       {
        $this->session->set_flashdata('message', 'Session is not working.');
       redirect('orders/login');
       }
    $this->load->view('order_dashboard',$data); 
  }
  public function approve($id){
    $data  = array('status'=>  1);
    $res = $this->Message_model->approve($id, $data);
    if($res >0){
      redirect('orders/order_details');
    }else{
    }
  }

   public function disapprove($id){
    $data  = array('status'=>  0);
    $res = $this->Message_model->disapprove($id, $data);
    if($res >0){
      redirect('orders/order_details');
    }else{
    }
  }
}