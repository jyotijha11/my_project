<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message_model extends CI_Model {

    
   public function approve($id, $data) {
       $this->db->where('id', $id);
       return $this->db->update('order_list',$data); 
   }
   public function disapprove($id, $data) {
       $this->db->where('id', $id);
       return $this->db->update('order_list',$data); 
   }
}
?>