<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();	
	}

	public function index(){
		$this->login();
	}

	public function login(){
		$data['notif'] = null;
		$this->load->view('login_view', $data);
	}
	
	public function login_validation(){
		if($this->validate_credentials()){
			//find user berdasarkan username
			$tables = array('ROLE', 'USER');
			$this->db->select('USER.ID');
			$this->db->select('USER.USERNAME');
			$this->db->select('USER.NAMA_USER');
			$this->db->select('USER.ROLE_ID');
			$this->db->select('ROLE.NAMA_ROLE');
			$this->db->from($tables);
			$this->db->where('USERNAME', $this->input->post('username'));		
			$this->db->where('ROLE.ID=USER.ROLE_ID');
			$this->db->where('STATUS_USER','1');		
			$query = $this->db->get(); 
			$data1 = $query->result();	
			
			foreach($data1 as $item){
				$data_session=array(
					'ID'=>$item->ID,
					'USERNAME'=>$item->USERNAME,
					'NAMA_USER'=>$item->NAMA_USER,
					'ROLE_ID'=>$item->ROLE_ID,
					'NAMA_ROLE'=>$item->NAMA_ROLE,
					'is_logged_in'=>1
				);
			}
			//var_dump($data_session);
			$this->session->sess_expiration = '2';
			$this->session->sess_expire_on_close = 'true';
			$this->session->set_userdata($data_session);
			//var_dump($this->session->USERNAME);
			if($this->session->userdata['ROLE_ID'] ==  '2'){
				redirect('Monitoring_controller/');
			}else{
				redirect('Tamu_controller/');
			}
		}else{
			$data['notif'] = array(
				'text' => 'Username atau Password Salah',
			);
			$this->load->view('login_view', $data);
		}
	}	
	
	private function validate_credentials(){		
		$this->db->where('USERNAME',$this->input->post('username'));
		$this->db->where('PASSWORD',md5($this->input->post('password')));
		$this->db->where('STATUS_USER','1');
		$query=$this->db->get('USER');
		if($query->num_rows()==1){
			$valid = true;
		}else{
			$valid = false;
		}
		return $valid;
	}
	
	public function no_permission(){		
		//Passing data
		$data['role_access'] = array('1','2','3');
		$data['data_table'] = "no";
		$data['about'] = "yes";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('no_permission_view');
		$this->load->view('seg_footer_view', $data);		
	}

	public function logout(){	
		$this->session->sess_destroy();
		redirect('User_authentication/');
	}	
}


