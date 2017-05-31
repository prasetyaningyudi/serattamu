<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();	
	}
	
	public function index(){
		$this->application();
	}
	
	public function user($id=null){	
		if(isset($id)){
			$user_id = $id;
		}else{
			$user_id = $this->session->userdata['ID'];			
		}
		//load user list
		$tables = array('ROLE', 'USER');
		$this->db->select('USER.ID');
		$this->db->select('USER.USERNAME');
		$this->db->select('USER.PASSWORD');
		$this->db->select('USER.NAMA_USER');
		$this->db->select('USER.FOTO');
		$this->db->select('USER.ROLE_ID');
		$this->db->select('ROLE.NAMA_ROLE');;		
		$this->db->from($tables);
		$this->db->WHERE('USER.ID', $user_id);
		$this->db->WHERE('USER.ROLE_ID = ROLE.ID');
		$this->db->order_by('USER.NAMA_USER', 'ASCE');	
		$query = $this->db->get(); 
		$data['record'] = $query->result();
		
		//Passing data
		$data['role_access'] = array('1', '2', '3');
		$data['data_table'] = "no";
		$data['about'] = "no";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('about-user-view', $data);
		$this->load->view('seg_footer_view', $data);		
	}

	public function application(){
		//Passing data
		$data['role_access'] = array('1', '2', '3');
		$data['data_table'] = "no";
		$data['about'] = "no";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('about-application-view');
		$this->load->view('seg_footer_view', $data);				
	}
}


