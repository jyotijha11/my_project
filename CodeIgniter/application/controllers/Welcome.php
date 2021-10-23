<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$data['getdata'] = "Hello";
		$data['first_name'] = "Welcome to ";
		$data['last_name'] = "MyCoders.";
		$this->load->view('welcome_message', $data);
	}
	public function index1()
	{
		$data['getdata'] = "We help";
		$data['first_name'] = "you ";
		$data['last_name'] = "in coding.";
		$this->load->view('hello_message', $data);
	}
}
