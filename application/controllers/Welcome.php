<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->library('session');		
		$this->load->helper('url');			
		header("location: " . base_url()."home");
	}
}
