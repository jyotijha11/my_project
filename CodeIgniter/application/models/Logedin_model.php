<?php
class Logedin_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

    public function login()
    {
	   $email = $this->input->post('frm[email]');
	   $password = $this->input->post('frm[password]');
	   $query = $this->db->where(['email' => $email, 'password' => $password])->get('ecard');
	   return $query->result();
    }
}