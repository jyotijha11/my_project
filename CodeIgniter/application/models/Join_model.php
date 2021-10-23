<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Join_model extends CI_Model {

    
   public function getdata(){	

	$this->db->select('order_list.*,country.country,states.states');
	$this->db->from('order_list');
	$this->db->join('country', 'order_list.country = country.id','left');
	$this->db->join('states', 'order_list.states = states.id','left'); 
	$query = $this->db->get();
	return $query->result();

	}
}
?>
