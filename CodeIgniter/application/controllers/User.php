<?php
class User extends Apps{
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('City_model');
    }

    function abc(){
        $m = "Mr Jugadu: 1234 is an OTP to verify mobile no.";
        sendSMS('9090904113', $m);
    }


    function createad($id=false){
        if(!is_login()){
            $this -> session ->set_flashdata("error", "You must login to Add Your Services");
            $this -> session -> set_userdata("redirect", current_url());
            redirect("store/login");
        }
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
            $this->data['id'] = $id;
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
            $data['id'] = false;
            if(!isset($data['hmobile'])){
                $data['hmobile'] = 0;
            }

            if(is_login()){
                $data['user_id'] = login_id();
            }else{
                $email = $data['email'];
                if($this -> User_model -> emailExists($email)){
                    $u = $this -> User_model -> getUser($email);
                    $data['user_id'] = $u -> id;
                }else{
                    $user = array();
                    $user['id'] = false;
                    $user['first_name'] = $data['name'];
                    $user['last_name'] = "";
                    $user['pass'] = $data['mobile'];
                    $user['email_id'] = $data['email'];
                    $user['created'] = date("Y-m-d H:i");
                    $user['status'] = 0;
                    $user['is_verified'] = 0;
                    $user['act_code'] = rand(5555, 9999);
                    $user['phone_no'] = $data['mobile'];
                    $user['role'] = AI_User::$_SERVICE_PROVIDER;
                    $data['user_id'] = $this -> User_model -> saveProfile($user);
                }
            }

            $offer = $this -> input -> post("offer");
            $price = $this -> input -> post("price");

            $ob = new stdClass();
            $ob -> offer = $offer;
            $ob -> price = $price;
            $data['offer_data'] = json_encode($ob);

            $service_id = $this->User_model->createServiceProvider($data);
            //========Write code to send email for verification =============

            $m = new AI_Mail();
            $m -> onServiceCreated($data['name'], $data['email'], $data['offer_title']);
            $m -> sendMail();
            $this->session->set_flashdata('success','You have successfully submitted free service.');
            $this -> session -> set_userdata("service_id", $service_id);

            $u = AI_User::fromDB($data['user_id']);
            if($u -> isActiveMember()){
                redirect("accounts");
            }else{
                redirect("user/select-plans");
            }
        }
        else{
            $this -> data['main'] = "create-ad";
            $this -> data['login_id'] = $this -> user_id();
            $this->load->front_view('default', $this->data);
        }
    }

    function thankyou(){
        $this -> data['main'] = "thankyou";
        $this -> load -> front_view("default", $this -> data);
    }

    function select_plans(){
        $service_id = $this -> session -> userdata("service_id");
        $this -> data['main'] = "service-plans";
        $this -> data['service_id'] = $service_id;
        $this -> load -> front_view("default", $this -> data);
    }

    function checkout_summary(){
        $this -> load -> model("Services_model");
        if($this -> input -> post("plans")){
            $plan_id = $this -> input -> post("plans");
            $service_id = $this -> input -> post("service_id");
            $service = $this -> Services_model -> getService($service_id);
            $user_id = $service -> user_id;
            $user = $this -> User_model -> getUserById($user_id);
            $this -> data['user_id'] = $user_id;
            $this -> data['plan_id'] = $plan_id;

            if($plan_id == Membership::$plan_e){
                $this -> User_model -> addMembership($user_id, $plan_id);
                redirect("user/thankyou");
            }
            $this -> data['main'] = "checkout-summary";

            $plan = Membership::getMembership($plan_id);
            $this -> data['amount'] = $plan -> getPrice();
            $this -> data['validity'] = $plan -> getValidity();
            $this -> data['plan_title'] = $plan -> getName();
            $this -> data['cust_name'] = $user -> first_name . ' ' . $user -> last_name;
            $this -> load -> front_view("default", $this -> data);
        }
    }

    function checkout(){
        $plan_id = $this -> input -> post("plan_id");
        $user_id = $this -> input -> post("user_id");
        $amount = $this -> input -> post("amount");

        $plan = Membership::getMembership($plan_id);
        $user = AI_User::fromDB($user_id);

        $this -> session -> set_userdata("pay_user_id", $user_id);
        $this -> session -> set_userdata("pay_plan_id", $plan_id);

        $this->load->helper('instamojo');
        $api = new Instamojo\Instamojo(INSTA_KEY, INSTA_TOKEN);
        try {
            $response = $api->paymentRequestCreate(array("purpose" => substr($plan -> getName(), 0, 30), "amount" => $amount, "send_email" => true, "email" => $user -> getEmail(), "buyer_name" => $user -> getName(), "redirect_url" => site_url('user/response')));
            $url = $response['longurl'];
            redirect($url);
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    }

    function response() {
        if (isset($_GET['payment_id']) && isset($_GET['payment_request_id'])) {
            $user_id = $this -> session -> userdata("pay_user_id");
            $plan_id = $this -> session -> userdata("pay_plan_id");

            $id = $this -> User_model -> addMembership($user_id, $plan_id);

            $payment_id = $_GET['payment_id'];
            $trans_id = $_GET['payment_request_id'];
            $m = array();
            $m['txn_no'] = $trans_id;
            $m['payment_method'] = "Instamojo";

            $this -> db -> update("ai_membership", $m, array('id' => $id));
            $this -> session -> set_flashdata("success", "Thank you!! Memberhsip upgraded");

            $this -> session -> unset_userdata("pay_user_id");
            $this -> session -> unset_userdata("pay_plan_id");
            if(is_login()){
                redirect("accounts");
            }else{
                redirect("user/thankyou");
            }
        }
    }

    function activate(){
        $email = $this -> input -> get('email');
        $actcode = $this -> input -> get("actcode");
        if($email && $actcode){
            if($this -> User_model -> validateEmail($email, $actcode)){
                $u = $this -> User_model -> getUser($email);
                $s = array();
                $s['id'] = $u -> id;
                $s['act_code'] = '';
                $s['status'] = 1;
                $this -> User_model -> save($s);

                $m = new AI_Mail();
                $m -> onSuccessVerification($u -> first_name, $email);
                $m -> sendMail();

                $this -> session -> set_flashdata("success", "Account activated successfully");
            }else{
                $this -> session -> set_flashdata("error", "Sorry!! Activation code not matching");
            }
        }else{
            $this -> session -> set_flashdata("error", "Opps!! Something wrong. Try again later");
        }
        redirect(site_url('user/login'));
    }

    function facebook() {
        if (!$this->isLoggedin()) {
            if ($this->input->post('data')) {

                $jsonStr = $this->input->post("data");
                $dataArr = json_decode($jsonStr, TRUE);
                //print_r($dataArr);
                //Check if Email Id is returned or not
                if (isset($dataArr['email'])) {
                    if ($this->User_model->emailExists($dataArr['email'])) {
                        $em = $dataArr['email'];
                        $u = $this->User_model->getUser($em);
                        $login = array(
                            'user_id' => $u->id
                        );
                        $this->session->set_userdata("login", $login);
                        //echo json_encode(array('success' => 'redirect'));
                        echo "success";

                    } else {
                        $user['id'] = FALSE;
                        $user['first_name'] = $dataArr['first_name'];
                        $user['last_name'] = $dataArr['last_name'];
                        $user['email_id'] = $dataArr['email'];
                        $user['pass'] = substr(md5($dataArr['first_name']), 0, 6);
                        $user['created'] = date('Y-m-d');
                        $user['status'] = 1;
                        $user['is_verified'] = 1;
                        $user['mobile'] = '';
                        $user['role'] = 4;
                        $user['gender'] = $dataArr['gender'];
                        $user_id = $this->User_model->save($user);

                        $login = array(
                            'user_id' => $user_id
                        );

                        $this->session->set_userdata("login", $login);
                        //==========================

                        $em = new AI_Mail();
                        $em -> onSocialSignup($user['first_name'],$user['email_id'], $user['pass']);
                        echo 'success';
                    }
                } else {
                    $this->session->set_flashdata("error", "There is some problem with Facebook. Signup using Emails");
                    echo 'error';
                }
            }
        } else {
            echo 'success';
        }
    }

    function google() {
        if (!$this->isLoggedin()) {
            if (isset($_POST['email'])) {
                $first_name = $_POST['first_name'];
                $email = $_POST['email'];
                if ($this->User_model->emailExists($email)) {
                    $u = $this->User_model->getUser($email);
                    $login = array(
                        'user_id' => $u->id
                    );
                    $this->session->set_userdata("login", $login);
                    echo 'success';
                } else {

                    $user['id'] = FALSE;
                    $user['first_name'] = $first_name;
                    $user['last_name'] = '';
                    $user['email_id'] = $email;
                    $user['pass'] = substr(md5($first_name), 0, 6);
                    $user['created'] = date('Y-m-d');
                    $user['status'] = 1;
                    $user['is_verified'] = 0;
                    $user['phone_no'] = '';
                    $user['role'] = AI_User::$_MEMBER;
                    $user['gender'] = '';
                    $user_id = $this-> User_model ->save($user);

                    $login = array(
                        'user_id' => $user_id
                    );
                    $this->session->set_userdata("login", $login);
                    echo "success";
                    //==========================
                    $em = new AI_Mail();
                    $em -> onSuccessVerification($user['first_name'],$user['email_id']);
                    echo 'success';
                }
            }
        } else {
            echo 'success';
        }
    }

    function requirements(){

        $this -> data['cities'] = $this -> City_model -> get_city();
        $this->load->model('City_model');
        $this -> data['state'] = $this -> City_model -> getStatelist();
        $config['upload_path']		= upload_dir();
        $config['allowed_types']	= 'gif|jpg|png|jpeg|bmp';
        $config['max_size']			= '50000';
        $config['max_width']		= '0';
        $config['max_height']		= '0';
        $this->load->library('upload', $config);

        $this->form_validation->set_rules('data[parent_category]','Category','required');
        $this->form_validation->set_rules('data[offer_title]','Offer Title','required');
        $this->form_validation->set_rules('data[name]','Name','required');
        $this->form_validation->set_rules('data[email]','Email','required|valid_email');
        $this->form_validation->set_rules('data[mobile]','Mobile','required');
        $this->form_validation->set_rules('data[state]','State','required');
        $this->form_validation->set_rules('data[district]','District','required');
        $this->form_validation->set_rules('data[city]','City','required');
        if($this->form_validation->run())
        {
            $data=$this->input->post('data');
            $data['created'] = date("Y-m-d h:i:s");
            $this -> db -> insert('ai_requirements', $data);

            $msg = "Title: " . $data['offer_title'];
            $m = new AI_Mail();
            $m -> onSendRequirement($data['name'], $data['email'], $msg);
            $m -> sendMail();

            $this -> session -> set_flashdata("success", "Thank you for sending your requirements. We will contact you shortly.");
            redirect(site_url('user/requirements'));
        }
        else{
            $this -> data['main'] = "add-requirements";
            $this->load->front_view('default', $this->data);
        }
    }

    function logout(){
        $u = array(
            'id' => $this -> user_id()
        );
        $this -> User_model -> save($u);
        $this -> session -> sess_destroy();
        $this -> session -> set_userdata("logout", "Successfully logged out");
        redirect('user/login');
    }
}