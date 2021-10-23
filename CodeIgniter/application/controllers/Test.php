<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function index()
	{
		$data['getdata'] = " Welcome";
		$data['first_name'] = " to ";
		$data['last_name'] = "MyCoders.";
		$this->load->view('welcome_message', $data);
	}
	public function testfunction()
	{
		$data['getdata'] = " We help";
		$data['first_name'] = "you ";
		$data['last_name'] = "in coding.";
		$this->load->view('hello_message', $data);
	}
	public function testfunction2()
	{
		$data['getdata'] = " Hello";
		$data['first_name'] = "Friends ";
		$data['last_name'] = "to MyCoders.";
		$this->load->view('hello_message', $data);
	}
}
