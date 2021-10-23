<?php
class Reg_model extends CI_Model
{
    public function save($array)
    {	   
	   $this->db->insert('registration', $array);
    }
}