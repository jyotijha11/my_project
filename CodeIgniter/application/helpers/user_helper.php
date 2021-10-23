<?php
class AI_User{

    public $id;
    public $name;
    public $role;
    private $row;

    public static $_SUPER_ADMIN = 1;
    public static $_ADMIN = 2;
    public static $_USER = 4;
    public static $_VENDOR = 5;
    public static $_SERVICE_PROVIDER = 3;

    function __construct(){
        $this -> id = false;
        $this -> name = '';
        $this -> role = '';
    }

    function setRow($row){
        $this -> row = $row;
    }

    function __set($key, $val){
        $this -> row -> $key = $val;
    }

    function __get($key){
        return $this -> row -> $key;
    }

    function getID(){
        return $this -> id;
    }

    function setID($id){
        $this -> id = $id;
    }

    function setRole($role){
        $this -> role = $role;
    }

    function getRole(){
        return $this -> role;
    }

    function goToDashboard(){
        if($this -> role == AI_User::$_USER){
            return site_url("accounts");
        }elseif($this -> role == AI_User::$_VENDOR){
            return site_url('v/dashboard');
        }else{
            return site_url("accounts");
        }
    }

    public static function fromDB($user_id){
        $CI =& get_instance();
        $user = $CI -> User_model -> getUserById($user_id);
        $u = new AI_User();
        $u -> setRow($user);
        $u -> setID($user -> id);
        $u -> setRole($user -> role);
        $u -> name = $user -> first_name . ' ' . $user -> last_name;
        return $u;
    }

    function isUser(){
        if($this -> role == AI_User::$_USER){
            return true;
        }else{
            return false;
        }
    }

    function isVendor(){
        if($this -> role == AI_User::$_VENDOR){
            return true;
        }else{
            return false;
        }
    }

    function isLoggedIn(){
        if(isset($_SESSION['login'])){
            $login_id = $_SESSION['login'];
            if($login_id == $this -> id){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function fromSession(){
        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
            $u = AI_User::fromDB($login);
            return $u;
        }else{
            return new AI_User();
        }
    }

    public static function getUserTypes(){
        $ar = array(self::$_SUPER_ADMIN => 'Super Admin', self::$_ADMIN => 'Admin', self::$_SERVICE_PROVIDER => 'Service Provider', self::$_USER => 'Customer', self::$_VENDOR => "Vendor/Seller");
        return $ar;
    }

    function getName(){
        return $this -> row -> first_name . ' ' . $this -> row -> last_name;
    }

    function getMobile(){
        return $this -> row -> phone_no;
    }

    function getAddress(){
        return $this -> row -> address;
    }

    function getCity(){
        return $this -> row -> city;
    }

    function getEmail(){
        return $this -> row -> email_id;
    }

    function isActiveMember(){
        if($this -> row -> membership_id == 0){
            return false;
        }
        $CI =& get_instance();
        $mInfo = $CI -> User_model -> getMembershipInfo($this -> row -> membership_id);
        $isActive = false;
        if(time() >= strtotime($mInfo -> start_dt) && time() <= strtotime($mInfo -> end_dt)){
            $isActive = true;
        }
        return $isActive;
    }
}