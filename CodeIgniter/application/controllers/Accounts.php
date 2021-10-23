<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends Apps {
    function __construct() {
        parent::__construct();
        if(isset($_GET['redirect'])){
            $this -> session -> set_userdata("redirect", $_GET['redirect']);
        }
        if(!$this -> isLoggedin()){
            $this -> session -> set_flashdata("error", "Please login to view the page");
            redirect("store/login");
        }
        $u = AI_User::fromSession();
        if($u -> isVendor()){
            redirect("v/dashboard");
        }
    }

    function index() {
        $this -> data['main'] = "account";
        $this -> load -> model("Order_model");
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $this -> show_per_page;
        $rules = array('user_id' => $this -> user_id());

        $data = $this -> Order_model -> getWhereRecords($offset, $this -> show_per_page, $rules);
        $this->data['orders'] = $data['results'];
        $this -> initPagination($data['total']);
        $this->load->front_view('default', $this->data);
    }
    function myorders() {
        $this -> data['main'] = "account-myorders";
        $this -> load -> model("Order_model");
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $this -> show_per_page;
        $rules = array('user_id' => $this -> user_id());

        $data = $this -> Order_model -> getWhereRecords($offset, $this -> show_per_page, $rules);
        $this->data['orders'] = $data['results'];
        $this -> initPagination($data['total']);
        $this->load->front_view('default', $this->data);
    }

    function order_details($ord_id = false){
        $this -> load -> model("Order_model");
        $this -> data['main'] = "order-details";
        $this -> data['orders'] = $o = $this -> Order_model -> orderDetails($ord_id);
        if($o -> user_id != login_id()){
            $this -> session -> set_flashdata("error", "Opps!! Something wrong.");
            redirect(site_url("accounts/myorders"));
        }
        $this -> load -> front_view("default", $this -> data);
    }

    function membership(){
        $u = $this -> User_model -> getUserById(login_id());
        $member_id = $u -> membership_id;
        $plan = $this -> User_model -> getMembershipInfo($member_id);
        $this -> data['main'] = "membership";
        $this -> load -> front_view("default", $this -> data);
    }

    function upgradeto(){
        $plan_id = $_GET['plan'];
        $user = AI_User::fromDB(login_id());
        $plan = Membership::getMembership($_GET['plan']);
        $this -> data['cust_name'] = $user -> getName();
        $this -> data['plan_title'] = $plan -> getName();
        $this -> data['validity'] = $plan -> getValidity();
        $this -> data['amount'] = $plan -> getPrice();
        $this -> data['main'] = "checkout-summary";
        $this -> data['user_id'] = login_id();
        $this -> data['plan_id'] = $plan_id;

        $this -> load -> front_view("default", $this -> data);
    }


    function adresses(){
        $this -> data['main'] = "accounts-addresses";
        $this -> data['user'] = $this -> User_model -> getUserById($this -> user_id());
        $this -> data['addresses'] = $this -> User_model -> getUserAddresses($this -> user_id());
        $this -> load -> front_view("default", $this -> data);
    }

    function add_address($id = false){
        $this -> data['main'] = "accounts-add-address";
        $this -> data['address'] = $this -> Master_model -> getNew("ai_addresses");
        if($id){
            $this -> data['address'] = $this -> Master_model -> getRow($id, "ai_addresses");
        }
        $this->form_validation->set_rules('frm[ship_name]', 'Name', 'required');
        $this->form_validation->set_rules('frm[ship_add1]', 'Address', 'required');
        $this->form_validation->set_rules('frm[ship_city]', 'City', 'required');
        if ($this->form_validation->run()) {
            $ship = $this->input->post('frm');
            $ship['id'] = $id;
            $ship['user_id'] = $this->user_id();
            $adid = $this->Master_model->save($ship, "ai_addresses");
            $this -> session -> set_flashdata("success", "Address saved successfully");
            redirect(site_url("accounts/add-address/" . $adid));
        }else {
            $this->load->front_view("default", $this->data);
        }
    }

    function edit_profile() {
        $this -> data['main'] = 'edit-profile';
        $this->data['p'] = $s = $this->User_model->getUserById($this->user_id());
        $this->form_validation->set_rules('form[first_name]', 'First Name', 'required');
        $this->form_validation->set_rules('form[last_name]', 'Last Name', 'required');
        if ($this->form_validation->run()) {
            $user = $this->input->post("form");
            $user['id'] = $this->user_id();
            $this->User_model->save($user);
            $this->session->set_flashdata("success", "Profile saved successfully");
            redirect(site_url('accounts/edit-profile'));
        }
        $this->load->front_view('default', $this->data);
    }


    function changepassword() {
        $this->data['title'] = "Change Password";
        $this->data['main'] = "change-password";
        $this->form_validation->set_rules('oldpass', "Old Password", "required");
        $this->form_validation->set_rules('password', "New Password", "required|min_length[6]");
        $this->form_validation->set_rules('cnfpassword', "Confirm Password", "required|matches[password]");
        if ($this->form_validation->run()) {
            $oldp = $this->input->post('oldpass');
            $newp = $this->input->post('password');
            $cnfp = $this -> input -> post("cnfpassword");

            $u = AI_User::fromDB($this -> user_id());
            if($u -> pass == $oldp){
                $s = array();
                $s['pass'] = $newp;
                $s['id'] = $this -> user_id();
                $this -> User_model -> save($s);
                $this->session->set_flashdata("success", "New password updated successfully");
            }else{
                $this->session->set_flashdata("error", "Invalid old password.");
            }
            redirect('accounts/changepassword');
        }
        $this->load->front_view('default', $this->data);
    }

    function addfav($id){
        $data = array();
        $data['user_id'] = $this -> user_id();
        $data['product_id'] = $id;
        $c = $this -> Product_model -> addToFav($data);
        $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : site_url();
        if($c){
            $this -> session -> set_flashdata("success", "Product added to wishlist");
        }else{
            $this -> session -> set_flashdata("error", "Product already in wishlist");
        }
        redirect($redirect);
    }


    function favlist() {
        $this->data['services'] = array();
        $this->data['main'] = "accounts-favlist";

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $this -> show_per_page;
        $where = array(
            'user_id' => $this -> user_id()
        );

        $data = $this -> Master_model -> getWhereRecords($offset, $this ->show_per_page, $where, "ai_favlist");
        $this -> data['pids'] = $data['results'];
        $this -> initPagination($data['total']);
        $this->load->front_view('default', $this->data);
    }

    function remfav($id = false){
        if($id) {
            $this->Product_model->removeFromFav($id, $this->user_id());
            $this -> session -> set_flashdata("success", "Product removed from your fav list.");
        }
        redirect("accounts/favlist");
    }

    function services() {
        $this->data['services'] = $d = $this->User_model->services($this->getLoginID());
        $this -> data['main'] = "account-services";
        $this->load->front_view('default', $this->data);
    }

    function edit_services1($id = false) {
        $this -> load -> model("Services_model");
        $this->load->model('City_model');
        $this->data['sr'] = $this->Services_model->getService($id);
        $this->data['state'] = $this->City_model->getStatelist();
        $this -> data['main'] = "edit-services";
        $this->load->front_view('default', $this->data);
    }

    function edit_services($id=false){
        $this -> load -> model("City_model");
        $this -> load -> model("Services_model");
        $user = AI_User::fromDB(login_id());
        $this -> data['cities'] = $this -> City_model -> get_city();
        $this->load->model('City_model');
        $this->data['id'] = $id;
        $this -> data['state'] = $this -> City_model -> getStatelist();
        $config['upload_path']		= upload_dir();
        $config['allowed_types']	= 'gif|jpg|png|jpeg|bmp';
        $config['max_size']			= '50000';
        $config['max_width']		= '0';
        $config['max_height']		= '0';
        $this->load->library('upload', $config);

        $this->form_validation->set_rules('data[parent_category]','Category','required');
        $this->form_validation->set_rules('data[child_category]','Child Category','required');
        $this->form_validation->set_rules('data[offer_type]','Offer type','required');
        $this->form_validation->set_rules('data[offer_title]','Offer Title','required');
        $this->form_validation->set_rules('data[description]','Description','required');
        $this->form_validation->set_rules('data[price]','Price','required');
        $this->form_validation->set_rules('data[name]','Name','required');
        $this->form_validation->set_rules('data[email]','Email','required|valid_email');
        $this->form_validation->set_rules('data[mobile]','Mobile','required');
        $this->form_validation->set_rules('data[state]','State','required');
        $this->form_validation->set_rules('data[district]','District','required');
        $this->form_validation->set_rules('data[city]','City','required');
        if($this->form_validation->run())
        {
            $data=$this->input->post('data');
            $data['id'] = $id;
            $uploaded	= $this->upload->do_upload('image1');

            if($uploaded)
            {
                $image			= $this->upload->data();
                $data['image1']	= $image['file_name'];
            }
            $uploaded1	= $this->upload->do_upload('image2');
            if($uploaded1){
                $image1			= $this->upload->data();
                $data['image2']	= $image1['file_name'];
            }
            $uploaded2	= $this->upload->do_upload('image3');
            if($uploaded2){
                $image2			= $this->upload->data();
                $data['image3']	= $image2['file_name'];
            }
            $data['created'] = date("Y-m-d h:i:s");
            if(!isset($data['hmobile'])){
                $data['hmobile'] = 0;
            }

            $offer = $this -> input -> post("offer");
            $price = $this -> input -> post("price");

            $ob = new stdClass();
            $ob -> offer = $offer;
            $ob -> price = $price;
            $data['offer_data'] = json_encode($ob);

            $service_id = $this->Services_model->save($data);
            $this->session->set_flashdata('success','You have successfully submitted free service.');
            $this -> session -> set_userdata("service_id", $service_id);

            redirect("accounts/edit-services/" . $service_id);
        }else{
            $this -> load -> model("Services_model");
            $this->data['sr'] = $this->Services_model->getService($id);
            $this->data['state'] = $this->City_model->getStatelist();
            $this -> data['main'] = "edit-services";
            $this->load->front_view('default', $this->data);
        }
    }

    public function services_delete($id) {
        $this -> load -> model("Services_model");
        if ($id > 0) {
            $data = $this->Services_model->getRow($id);
            $file = array();
            $file[] = upload_dir($data -> image1);
            $file[] = upload_dir($data -> image2);
            $file[] = upload_dir($data -> image3);
            foreach ($file as $f) {
                if (file_exists($f)) {
                    @unlink($f);
                }
            }
            $this->Services_model->delete($id);
            $this->session->set_flashdata('success', 'Services deleted successfully');
        }
        redirect(site_url('accounts/services'));
    }

}
