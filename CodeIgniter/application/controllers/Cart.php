<?php class Cart extends Apps {
    var $category;

    function __construct() {
        parent::__construct();
    }

    private function emptyCartRedirect() {
        $cart = $this->getCart();
        $items = $cart->getCartItems();
        if (count($items) == 0) {
            $this->session->set_flashdata("error", "Opps!! Cart Empty");
            redirect(site_url());
        }
    }

    function index() {
        $cart = $this->getCart();
        $this->data['main'] = 'cart';
        $this->data['carts'] = $cart->getCartItems();
        $this->load->front_view('default', $this->data);
    }

    function add_cart() {
        $cart = $this->getCart();
        $item = new CartItem();
        $item->pid = $_POST['pid'];
        $item->qty = $_POST['qty'];
        $item->price = $_POST['sale_price'];
        $item->ptype = $_POST['ptype'];
        $cart->addItem($item);
        $cart->commit();
        $url = site_url("cart");
        if ($this->input->post("url")) {
            $url = urldecode($this->input->post("url"));
        }
        $this -> session -> set_flashdata("success", "Item added to cart");
        if($this -> input -> post("btn_buy")){
            redirect("cart");
        }else {
            redirect($url);
        }
    }

    function clear() {
        $cart = $this->getCart();
        $cart->destroy();
        redirect(site_url());
    }


    function r($rid = false) {
        if ($rid) {
            $cart = $this->getCart();
            $item = new CartItem();
            $item->pid = $rid;
            $item->qty = 0;
            $cart->updateCart($item);
            $cart->commit();
        }
        redirect('cart');
    }

    function update() {
        $qtyar = $this->input->post('qty');
        $cart = $this->getCart();
        if (is_array($qtyar) && count($qtyar) > 0) {
            foreach ($qtyar as $pid => $qty) {
                $item = new CartItem();
                $item->pid = $pid;
                $item->qty = $qty;
                $cart->updateCart($item);
            }
        }
        if ($this->input->post("btn_coupon")) {
            $ccode = $this->input->post("offer");
            if ($this->Category_model->isValidCoupon($ccode) && $this->Category_model->couponNotApplied($ccode, $this->user_id())) {
                $cvalue = $this->Category_model->getCouponValue($ccode);
                $cart = $this->getCart();
                $cart->setCouponStatus(true);
                $cart->setCoupon($ccode, $cvalue);
                $cart->commit();
                $this->session->set_flashdata('success', "Coupon Applied Successfully");
            } else {
                $this->session->set_flashdata('error', "Opps!! Invalid coupon successfully");
            }
        }
        redirect('cart');
    }

    function disabled() {
        $cart = $this->getCart();
        $cart->setCouponStatus(false);
        $cart->setCoupon("");
        $cart->commit();
        $this->session->set_flashdata("success", "Coupon removed.");
        redirect("cart");
    }


    function summary() {
        $item_arr = $this->input->post('item_id_qty');
        $check_items = $item_arr;
        $flag = false;
        foreach ($check_items as $v) {
            if (intval($v) > 0) {
                $flag = true;
            }
        }
        if ($flag) {
            $json = json_encode($item_arr);
            $this->session->set_userdata("food_json", $json);
            redirect("cart/checkout");
        } else {
            $this->session->set_flashdata("error", "You must select your food Preference");
            redirect('cart/customize');
        }
    }

    function login(){
        $this -> data['main'] = 'cart-login';

        $this -> load -> front_view("default", $this -> data);
    }

    function checkout() {
        $this->emptyCartRedirect();
        $this->load->model(array("City_model", "Order_model"));
        $this->data['main'] = 'checkout';
        $this->data['addresses'] = $this->User_model->getUserAddresses($this->user_id());
        if (!$this->isLoggedIn()) {
            $url_to = urlencode(site_url('cart/checkout'));
            $this->session->set_userdata('redirect', $url_to);
            $this -> session -> set_flashdata("error", "You must login to continue");
            redirect('store/login');
        }
        $tu = $this->User_model->getUserById($this->user_id());
        //print_r($tu);
        $this->data['user'] = $tu;
        $this->data['arstats'] = $this->City_model->getStates();
        if ($tu->default_address <> '') {
            $this->data['address'] = $this->User_model->getAddress($tu->default_address);
        } else {
            $taddress = array();
            $this->data['address'] = $taddress;
        }
        $this->form_validation->set_rules('frm[ship_name]', 'Name', 'required');
        $this->form_validation->set_rules('frm[ship_add1]', 'Address', 'required');
        $this->form_validation->set_rules('frm[ship_city]', 'City', 'required');
        if ($this->form_validation->run()) {
            $ship = $this->input->post('frm');
            $ship['user_id'] = $this->user_id();
            $adid = $this->User_model->saveAddress($ship);
            $this->session->set_userdata('cur_address', $adid);
            if ($this->input->post('makeit')) {
                $this->User_model->makeDefaultAddress($adid, $this->user_id());
            }
            if (trim($tu->default_address) == '') {
                $this->User_model->makeDefaultAddress($adid, $this->user_id());
            }
            $this->save_orders();
        }
        $this->load->front_view('default', $this->data);
    }

    function selectaddress() {
        if ($this->input->post('btn_continue')) {
            $adid = $this->input->post('adid');
            $this->session->set_userdata('cur_address', $adid);
            redirect('cart/save_orders');
        }
        redirect('cart/checkout');
    }

    function save_orders() {
        $cart = $this->getCart();
        $this->load->model("Order_model");
        $ord = array();
        $ord['user_id'] = $this->user_id();
        $address = $this->User_model->getDefaultAddress($this->user_id());
        if ($this->session->has_userdata('cur_address')) {
            $adid = $this->session->userdata('cur_address');
            $address = $this->User_model->getAddress($adid);
        }
        $shipping = ($cart->cartPrice() < theme_option('min_order')) ? theme_option('min_order_charge') : 0;
        if ($shipping > 0) {
            $cart->shipping = "yes";
            $cart->shipping_charge = $shipping;
        }
        $ord['shipping_id'] = $address->id;
        $ord['created_on'] = date('Y-m-d h:i:s');
        $ord['modified_on'] = date('Y-m-d h:i:s');
        $ord['payment_price'] = $cart->checkoutPrice();
        $ord['shipping_price'] = $shipping;
        $ord['sub_total'] = 0;
        $ord['total'] = 0;
        $ord['status'] = "Payment Pending";

        $ord['coupon_code'] = '';
        $ord['coupon_value'] = 0;
        if ($cart->isCouponApplied()) {
            $ord['coupon_code'] = $cart->getCoupon();
            $ord['coupon_value'] = $cart->getCouponValue();
        }
        $order_id = $this->Order_model->saveOrders($ord);
        $this->session->set_userdata('orderid', $order_id);
        $arrcart = $cart->getCartItems();
        if (is_array($arrcart) && count($arrcart) > 0) {
            foreach ($arrcart as $cr) {
                $files = array();
                $item = new AI_Product($cr->pid);
                $files['attributes'] = $cr->ptype;
                $files['order_id'] = $order_id;
                $files['product_id'] = $item->ID();
                $files['product_name'] = $item->title();
                $files['product_price'] = $item->price();
                $files['subtotal_price'] = ($cr->price * $cr->qty);
                $files['quantity'] = $cr->qty;
                $files['created_on'] = date('Y-m-d h:i:s');
                $files['modified_on'] = date('Y-m-d h:i:s');
                $this->Order_model->addFiles($files);
            }
            redirect('cart/revieworders');
        } else {
            redirect(site_url());
        }
    }


    function revieworders() {
        $this -> load -> model("Order_model");
        $cart = $this->getCart();
        $this->data['carts'] = $p = $cart->getCartItems();
        if (!$this->session->has_userdata('cart')) {
            redirect(site_url());
        }
        $this->data['main'] = 'review-orders';
        $this->data['price'] = $cart->cartPrice();
        $this->data['orderid'] = $this->session->userdata('orderid');
        $this->load->front_view('default', $this->data);
    }

    function payments() {
        $cart = $this->getCart();
        $this->data['main'] = 'payments';
        $this->data['cartprice'] = $cart->checkoutPrice();
        $this->load->front_view('default', $this->data);
    }

    function payment_process() {
        if (!$this->session->has_userdata('cart')) {
            redirect(site_url());
        }
        $this->session->unset_userdata('cart');
        $this->load->model("Order_model");
        if ($this->input->post('btn_confirm')) {
            $order_id = $this->session->userdata('orderid');
            $ord = array();
            $ord['id'] = $order_id;
            $ord['pay_method'] = "COD";
            $ord['pay_status'] = "Pending";
            $ord['order_status'] = "Processing";
            $this->Order_model->save($ord);
            redirect('cart/confirm');
        }
        if ($this->input->post("btn_pay")) {
            $order_id = $this->session->userdata('orderid');
            $obj_order = $this->Order_model->orderDetails($order_id);
            $this->load->helper('instamojo');
            $api = new Instamojo\Instamojo(INSTA_KEY, INSTA_TOKEN);
            try {
                $response = $api->paymentRequestCreate(array("purpose" => "Order ID: #" . $obj_order -> id, "amount" => $obj_order->payment_price, "send_email" => true, "email" => $obj_order->user->email_id, "buyer_name" => $obj_order->user->first_name, "phone" => $obj_order -> user -> phone_no, "redirect_url" => site_url('cart/response')));
                $ord = array();
                $ord['id'] = $order_id;
                $ord['payment_id'] = $response['id'];
                $ord['pay_method'] = "InstaMojo";
                $ord['pay_status'] = 'Redirect to PG';
                $ord['order_status'] = "Processing";
                $this->Order_model->save($ord);
                $url = $response['longurl'];
                redirect($url);
            } catch (Exception $e) {
                print('Error: ' . $e->getMessage());
            }
        }
    }

    function confirm() {
        if(!$this -> session -> has_userdata("orderid")){
            redirect(site_url());
        }
        $this->load->model("Order_model");
        $order_id = $this->session->userdata('orderid');
        $this -> session -> unset_userdata("orderid");
        $this->data['main'] = 'order-confirmed';
        $this->data['order'] = $o = $this->Order_model->orderDetails($order_id);
        $msg = "Thank your for Order with Mr Jugadu. Your Order ID: " . $order_id;
        $this->load->library("sms");
        $this->sms->send($o->user->phone_no, $msg);
        /*==============Admin Confirmation======================== */
        $msg = "New Order has been Placed. Order ID: " . $order_id . " Name: " . $o->user->first_name . " Mob: " . $o->user->phone_no . ' Amount:  ' . $o->payment_price;
        //$this->sms->send('9654642262', $msg);
        $this->load->front_view('default', $this->data);
    }

    function response() {
        //Array ( [payment_id] => MOJO7729005N75736296 [payment_request_id] => 76a567f22d9c49b09a72726836fb6c24 ) Array ( [__ci_last_regenerate] => 1501301847 [login] => 372 [cur_address] => 10 [orderid] => 19 )
        $this -> load -> model("Order_model");
        if (isset($_GET['payment_id']) && isset($_GET['payment_request_id'])) {
            $order_id = $this->session->userdata('orderid');
            $payment_id = $_GET['payment_id'];
            $trans_id = $_GET['payment_request_id'];
            $m = array();
            $m['id'] = $order_id;
            $m['payment_id'] = $payment_id;
            $m['pay_status'] = "Received";
            $m['status'] = "Payment Confirmed";
            $this->Order_model->save($m);
            redirect('cart/confirm');
        }
    }

    function radd($id = false) {
        if ($id) {
            $this->Master_model->delete($id, 'ai_addresses');
            $this->session->set_flashdata("success", "Address removed");
        }
        redirect("cart/checkout");
    }
}