<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $data;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
	
		$this->load->database();
		$this->load->model('menu_model'); //can replace with cookies or session
		$this->data['menu'] = $this->menu_model->get_menu();
		$this->data['sub_menu'] = $this->menu_model->get_sub_menu();		
		$this->data['title'] = 'Home';		
	}
	
	public function index(){	
		$this->data['subtitle'] = 'Welcome';			
		$this->data['data_table'] = 'no';		
		
		if($this->init_data_validation()){
			$this->data['valid'] = TRUE;
		}else{
			$this->data['valid'] = FALSE;
		}		
		
		//view
		$this->load->view('section_header', $this->data);
		$this->load->view('section_navbar');
		$this->load->view('section_sidebar');
		$this->load->view('section_breadcurm');
		$this->load->view('section_content_title');
		$this->load->view('home');
		$this->load->view('section_footer');
	}
	
	public function init_data(){
		$this->data['subtitle'] = 'Initial Data';			
		$this->data['data_table'] = 'no';	
		
		if($this->init_data_validation()){
			$this->data['valid'] = TRUE;
		}else{
			$this->data['valid'] = FALSE;
		}
		
		//view
		$this->load->view('section_header', $this->data);
		$this->load->view('section_navbar');
		$this->load->view('section_sidebar');
		$this->load->view('section_breadcurm');
		$this->load->view('section_content_title');
		$this->load->view('init');
		$this->load->view('section_footer');		
	}
	
	private function init_data_validation(){
		$this->db->select('ID');
		$this->db->select('APP_NAME');
		$this->db->select('OFFICE_NAME');
		$this->db->from('INIT_DATA');
		$this->db->order_by('APP_NAME', 'ASC');	
		$query = $this->db->get(); 
		if($query->num_rows()==1){
			$valid = TRUE;		
		}else{
			$valid = FALSE;		
		}		
		return $valid;
	}
}


