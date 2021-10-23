<?php

class AI_Cart{

    private $arrItems;
    private $is_coupon_applied;
    private $ordertype;
    private $coupon_code;
    private $coupon_value;
    var $additionals;
    var $shipping;
    var $shipping_charge;
    var $pay_method;
    var $pay_status;
    var $order_status;
    public static $_PRODUCT = "product";
    public static $_PACKAGE = "pack";

    function __construct(){
        $this -> is_coupon_applied = false;
        $this -> arrItems = array();
        $this -> ordertype = self::$_PRODUCT;
        $this -> coupon_code = '';
        $this -> coupon_value = 0;
        $this -> additionals = '';
        $this -> shipping = "no";
        $this -> shipping_charge = 0;
    }

    function setCoupon($code, $value = 0){
        $this -> coupon_code = $code;
        $this -> coupon_value = $value;
    }

    function getCoupon(){
        return $this -> coupon_code;
    }

    function getCouponValue(){
        return $this -> coupon_value;
    }

    function getOType(){
        return $this -> ordertype;
    }

    function isCouponApplied(){
        return $this -> is_coupon_applied;
    }

    function setOType($type){
        $this -> ordertype = $type;
    }

    function isEmpty(){
        if(!isset($_SESSION['cart'])){
            return true;
        }else{
            return false;
        }
    }

    function setCouponStatus($status){
        $this -> is_coupon_applied = $status;
    }

    function removeItem($id){
        $items = $this -> getCartItems();
        $newarr = array();
        foreach($items as $ob){
            if($ob -> id == $id) continue;
            $newarr[] = $ob;
        }
        $this -> arrItems = $newarr;
    }

    function addItem($item){
        $items = $this -> getCartItems();
        $newitems = array();
        $add_new = true;
        foreach($items as $row){
            if($item -> qty == 0) continue;
            if($row -> pid == $item -> pid){
                $row -> qty = ($row -> qty) + $item -> qty;
                $add_new = false;
            }
            $newitems[] = $row;
        }
        if($add_new){
            $newitems[] = $item;
        }
        $this -> arrItems = $newitems;
    }

    function updateCart($item){
        $items = $this -> getCartItems();
        $newitems = array();
        foreach($items as $row){
            if($row -> pid == $item -> pid){
                $row -> qty = $item -> qty;
            }
            if($row -> qty == 0) continue;
            $newitems[] = $row;
        }
        $this -> arrItems = $newitems;
    }


    public function cartPrice(){
        $items = $this -> arrItems;
        $sum = 0;
        foreach($items as $row){
            $sum += ($row -> price * $row -> qty);
        }
        if($this -> additionals != ''){
            $items = $this -> additionals;
            foreach($items as $it){
                $i = new AI_Item($it['item_id']);
                $sum += $i -> getPrice() * $it['item_qty'];
            }
        }
        if($this -> isCouponApplied()){
            $cvalue = $this -> getCouponValue();
            $sum = $sum  - $cvalue;
        }
        return $sum;
    }

    function checkoutPrice(){
        $p = $this -> cartPrice();
        if($this -> shipping == "yes"){
            //$p = $p + $this -> shipping_charge;
        }
        return $p;
    }

    public function commit(){
        $_SESSION['cart'] = $this;
    }

    function getCartItems(){
        return $this -> arrItems;
    }

    function setCartItems($items){
        $this -> arrItems = $items;
    }

    function length(){
        return count($this -> arrItems);
    }

    public static function fromSession(){
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }else {
            $cart = new AI_Cart();
        }
        return $cart;
    }

    public static function fromDB($order_id){
        $db =& get_instance();
        $row = $db -> Order_model -> orderDetails($order_id);
        $cart = new AI_Cart();
        $files = $row -> files;
        $arr = array();
        if(is_array($files) && count($files) > 0){
            foreach($files as $f){
                $item = new CartItem();
                $item -> pid = $f -> product_id;
                $item -> price = $f -> product_price;
                $item -> qty = $f -> quantity;
                $arr[] = $item;
            }
        }
        $cart -> setCartItems($arr);
        $cart -> setCoupon($row -> coupon_code, $row -> coupon_value);
        $cart -> pay_method = $row -> pay_method;
        $cart -> pay_status = $row -> pay_status;
        $cart -> order_status = $row -> order_status;
        /*
         *  $this -> is_coupon_applied = false;
        $this -> arrItems = array();
        $this -> ordertype = self::$_PRODUCT;
        $this -> coupon_code = '';
        $this -> coupon_value = 0;
        $this -> additionals = '';
        $this -> shipping = "no";
        $this -> shipping_charge = 0;
         */
        return $cart;
    }

    function reset(){
        $this -> is_coupon_applied = false;
        $this -> arrItems = array();
        $this -> commit();
    }

    function destroy(){
        unset($_SESSION['cart']);
    }

}

class CartItem{
    var $pid;
    var $price;
    var $qty;
    var $ptype;
    var $options;
    var $additionals;

    function __construct(){
        $this -> pid = '';
        $this -> price = 0;
        $this -> qty = 0;
        $this -> ptype = 'product';
        $this -> options = '[]';
        $this -> additionals = '';
    }
}

