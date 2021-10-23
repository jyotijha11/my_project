<?php class Order_model extends Master_model {
    function __construct() {
        parent::__construct();
        $this->table = 'ai_orders';
    }

    function saveOrders($ord) {
        $this->db->insert($this->table, $ord);

        return $this->db->insert_id();
    }

    function addFiles($files) {
        $this->db->insert('ai_order_items', $files);
    }

    function orderDetails($order_id) {
        $row = $this->db->get_where('ai_orders', array('id' => $order_id))->first_row();
        if(is_object($row)) {
            $row->files = $this->orderFiles($order_id);
            $row->user = $this->User_model->getUserById($row->user_id);
            $row->address = $this->User_model->getAddress($row->shipping_id);
            return $row;
        }else{
            return false;
        }
    }

    function orderFile($file_id){
        return $this -> db -> get_where("ai_order_items", array("id" => $file_id)) -> row();
    }

    function orderFiles($order_id) {
        return $this->db->get_where('ai_order_items', array('order_id' => $order_id))->result();
    }


    function orderForTracking($offset = 0, $limit = 40) {
        $this->db->where('order_status', 'Processing');
        $this->db->or_where('order_status', 'In Transit');
        $this->db->where('tracking_code <> ""');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);
        $rest = $this->db->get('ai_orders');
        $data = array();
        $data['results'] = $rest->result();
        $this->db->where('order_status', 'Processing');
        $this->db->or_where('order_status', 'In Transit');
        $this->db->where('tracking_code <> ""');
        $data['total'] = $this->db->get('ai_orders')->num_rows();

        return $data;
    }

    function saveTracking($save) {
        $this->db->insert('order_tracking', $save);
    }

    function orderTrack($trackingid) {
        $this->db->order_by('id', 'DESC');

        return $this->db->get_where('order_tracking', array('tracking_code' => $trackingid))->result();
    }

    function lastUpdateTracking($trackingid) {
        return $this->db->get_where('order_tracking', array('tracking_code' => $trackingid))->last_row();
    }

    function delOrder($id) {
        $this->db->delete($this->table, array('id' => $id));
        $this->db->delete('ai_order_items', array('order_id' => $id));
    }

    function getVendorOrders($user_id, $offset = 0, $limit = 40){

        $sql = "SELECT * FROM ai_order_items WHERE product_id IN(SELECT id FROM ai_products WHERE user_id = $user_id) LIMIT $offset, $limit";
        $sql_1 = "SELECT * FROM ai_order_items WHERE product_id IN(SELECT id FROM ai_products WHERE user_id = $user_id)";

        $rest = $this -> db -> query($sql) -> result();
        $count = $this -> db -> query($sql_1) -> num_rows();

        $data = array();
        $data['results'] = $rest;
        $data['total'] = $count;

        return $data;
    }

}