<?php
class Log_model extends CI_Model
{
    public function login()
    {
	   $email = $this->input->post('frm[email]');
	   $password = $this->input->post('frm[password]');
	   $query = $this->db->where(['email' => $email, 'password' => $password])->get('contacts');
	   return $query->result();
    }
}