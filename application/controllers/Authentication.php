<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
	private $data;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		$this->load->model('menu_model'); //can replace with cookies or session
		$this->data['menu'] = $this->menu_model->get_menu();
		$this->data['sub_menu'] = $this->menu_model->get_sub_menu();		
		$this->data['title'] = 'Authentication';		
	}

	public function index(){
		$this->login();
	}

	public function login(){
		if(isset($this->session->userdata['is_logged_in'])){
			redirect('authentication/no_permission');
		}else{
			$this->data['data_table'] = 'no';		
			$this->data['warning'] = null;
			$this->data['subtitle'] = 'Login';		
			$this->data['role_access'] = array('4');		
			
			//view
			$this->load->view('section_header', $this->data);
			$this->load->view('section_navbar');
			$this->load->view('section_sidebar');
			$this->load->view('section_breadcurm');
			$this->load->view('section_content_title');
			$this->load->view('login');
			$this->load->view('section_footer');			
		}
	}
	
	public function login_validation(){
		if($this->validate_credentials()){
			//find user berdasarkan username
			$tables = array('ROLE', 'USER');
			$this->db->select('USER.ID');
			$this->db->select('USER.USERNAME');
			$this->db->select('USER.USER_ALIAS');
			$this->db->select('USER.ROLE_ID');
			$this->db->select('ROLE.ROLE_NAME');
			$this->db->from($tables);
			$this->db->where('USERNAME', $this->input->post('username'));		
			$this->db->where('ROLE.ID=USER.ROLE_ID');
			$this->db->where('USER_STATUS','1');		
			$query = $this->db->get(); 
			$result = $query->result();	
			
			foreach($result as $item){
				$data_session=array(
					'ID'=>$item->ID,
					'USERNAME'=>$item->USERNAME,
					'USER_ALIAS'=>$item->USER_ALIAS,
					'ROLE_ID'=>$item->ROLE_ID,
					'ROLE_NAME'=>$item->ROLE_NAME,
					'is_logged_in'=>1
				);
			}
			$this->session->sess_expiration = '2';
			$this->session->sess_expire_on_close = 'true';
			$this->session->set_userdata($data_session);
			redirect('home/');
		}else{
			$this->data['warning'] = array(
				'text' => 'Ops, Something wrong with username or password',
			);
			$this->data['data_table'] = 'no';		
			$this->data['subtitle'] = 'Login';	
			$this->data['role_access'] = array('4');
			
			//view
			$this->load->view('section_header', $this->data);
			$this->load->view('section_navbar');
			$this->load->view('section_sidebar');
			$this->load->view('section_breadcurm');
			$this->load->view('section_content_title');
			$this->load->view('login');
			$this->load->view('section_footer');
		}
	}	
	
	private function validate_credentials(){		
		$this->db->where('USERNAME',$this->input->post('username'));
		$this->db->where('PASSWORD',md5($this->input->post('password')));
		$this->db->where('USER_STATUS','1');
		$query = $this->db->get('USER');
		if($query->num_rows()==1){
			$valid = true;
		}else{
			$valid = false;
		}
		return $valid;
	}
	
	public function no_permission(){		
		$this->data['data_table'] = 'no';		
		$this->data['subtitle'] = 'No Permission';	
		$this->data['role_access'] = array('1','2','3','4');		
		
		//view
		$this->load->view('section_header', $this->data);
		$this->load->view('section_navbar');
		$this->load->view('section_sidebar');
		$this->load->view('section_breadcurm');
		$this->load->view('section_content_title');
		$this->load->view('no_permission');
		$this->load->view('section_footer');		
	}

	public function logout(){	
		$this->session->sess_destroy();
		redirect('home');
	}	
}


