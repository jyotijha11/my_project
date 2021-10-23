<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller 
{
	public function table_array()
	{
		$table_array = array(
		  array("name"=>"Jyoti", "address"=>"Banglore", "email"=>"jyoti@mycoders.in"),
		   array("name"=>"Juli", "address"=>"Dhanbad", "email"=>"juli@mycoders.in"),
		  array("name"=>"Sonam", "address"=>"Bokaro", "email"=>"sonam@mycoders.in"),
		   array("name"=>"Avi", "address"=>"Patna", "email"=>"avi@mycoders.in")
		);

		$data["tablearr"]=$table_array;
		$this->load->view('table_array', $data);
	}
}
