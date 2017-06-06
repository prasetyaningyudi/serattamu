<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $data;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->helper('cookie');
		$this->load->database();
		$this->load->model('menu_model'); //can replace with cookies or session
		$this->data['menu'] = $this->menu_model->get_menu();
		$this->data['sub_menu'] = $this->menu_model->get_sub_menu();	
		$this->load->model('init_model'); //can replace with cookies or session		
		$this->data['title'] = 'Home';		
	}
	
	public function index(){	
		$this->data['subtitle'] = 'Index';			
		$this->data['data_table'] = 'no';
		$this->data['role_access'] = array('1','2','3','4');		
		
		if($this->init_data_validation()){
			$this->data['valid'] = TRUE;
			$this->set_cookies_init();
		}else{
			$this->data['valid'] = FALSE;
			$this->set_cookies_init_none();
		}		
		
		//view
		$this->load->view('section_header', $this->data);
		$this->load->view('section_navbar');
		$this->load->view('section_sidebar');
		$this->load->view('section_breadcurm');
		$this->load->view('section_content_title');
		$this->load->view('home');
		$this->load->view('section_footer');
		redirect('home/welcome');
	}	
	
	public function welcome(){	
		$this->data['subtitle'] = 'Welcome';			
		$this->data['data_table'] = 'no';
		$this->data['role_access'] = array('1','2','3','4');	
		
		if($this->init_data_validation()){
			$this->data['valid'] = TRUE;
			$this->set_cookies_init();
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
		if(isset($_POST['submit'])){
			//insert ke database
			$this->data['saveddata'] = array(
				'APP_NAME' => $_POST['app'],
				'OFFICE_NAME' => $_POST['office'],
				'ICON' => $_POST['icon'],
				'THEME' => $_POST['theme'],
				'USER_ID' => $_POST['user'],
			);			
			$this->db->insert('INIT_DATA', $this->data['saveddata']);
			$this->set_cookies_init();
			redirect('home/update_data');		
		}else{
			if($this->init_data_validation()){
				redirect('home/update_data');
			}else{
				$this->data['subtitle'] = 'Initial Data';			
				$this->data['data_table'] = 'no';
				$this->data['role_access'] = array('1');
				
				//view
				$this->load->view('section_header', $this->data);
				$this->load->view('section_navbar');
				$this->load->view('section_sidebar');
				$this->load->view('section_breadcurm');
				$this->load->view('section_content_title');
				$this->load->view('init_create');
				$this->load->view('section_footer');
			}							
		}
	}
	
	public function update_data(){
		if(isset($_POST['submit'])){
			//update ke database
			$this->data['saveddata'] = array(
				'APP_NAME' => $_POST['app'],
				'OFFICE_NAME' => $_POST['office'],
				'ICON' => $_POST['icon'],
				'THEME' => $_POST['theme'],
				'USER_ID' => $_POST['user'],
			);		
			$this->db->where('ID', $_POST['id']);
			$this->db->update('INIT_DATA', $this->data['saveddata']);
			$this->set_cookies_init();
			redirect('home/update_data');		
		}else{
			if($this->init_data_validation()){
				$this->data['subtitle'] = 'Initial Data';			
				$this->data['data_table'] = 'no';
				$this->data['role_access'] = array('1');
				
				$this->db->select('ID');	
				$this->db->select('APP_NAME');	
				$this->db->select('OFFICE_NAME');	
				$this->db->select('ICON');	
				$this->db->select('THEME');	
				$this->db->from('INIT_DATA');	
				$this->db->order_by('ID', 'DESC');			
				$this->db->limit(1);
				$query = $this->db->get();	
				$this->data['record'] = $query->result();			
				
				//view
				$this->load->view('section_header', $this->data);
				$this->load->view('section_navbar');
				$this->load->view('section_sidebar');
				$this->load->view('section_breadcurm');
				$this->load->view('section_content_title');
				$this->load->view('init_update');
				$this->load->view('section_footer');				
			}else{
				redirect('home/init_data');
			}			
		}		
	}
	
	private function init_data_validation(){
		$query = $this->init_model->get_init_data();
		if($query->num_rows()==1){
			$valid = TRUE;		
		}else{
			$valid = FALSE;		
		}		
		return $valid;
	}
	
	private function set_cookies_init(){
		$query = $this->init_model->get_init_data();
		$query = $query->result();
		foreach($query as $item){
			$app_name = $item->APP_NAME;
			$office_name = $item->OFFICE_NAME;
			$icon = $item->ICON;
			$theme = $item->THEME;			
		}

		$cookie= array(
		  'name'   => 'app_name',
		  'value'  => $app_name,
		   'expire' => '86500',
		);
		$this->input->set_cookie($cookie);				
		$cookie= array(
		  'name'   => 'office_name',
		  'value'  => $office_name,
		   'expire' => '86500',
		);
		$this->input->set_cookie($cookie);				
		$cookie= array(
		  'name'   => 'icon',
		  'value'  => $icon,
		   'expire' => '86500',
		);
		$this->input->set_cookie($cookie);				
		$cookie= array(
		  'name'   => 'theme',
		  'value'  => $theme,
		   'expire' => '86500',
		);
		$this->input->set_cookie($cookie);				
	}
	
	
	private function set_cookies_init_none(){
		$cookie= array(
		  'name'   => 'app_name',
		  'value'  => 'Guest Book',
		   'expire' => '86500',
		);
		$this->input->set_cookie($cookie);				
		$cookie= array(
		  'name'   => 'office_name',
		  'value'  => 'Company Name',
		   'expire' => '86500',
		);
		$this->input->set_cookie($cookie);				
		$cookie= array(
		  'name'   => 'icon',
		  'value'  => 'book',
		   'expire' => '86500',
		);
		$this->input->set_cookie($cookie);				
		$cookie= array(
		  'name'   => 'theme',
		  'value'  => 'dark',
		   'expire' => '86500',
		);
		$this->input->set_cookie($cookie);				
	}	
}


