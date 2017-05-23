<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();	
	}

	public function index(){
		//load list pegawai
		$this->db->select('ID');
		$this->db->select('NIP');
		$this->db->select('NAMA_PEGAWAI');
		$this->db->select('JABATAN');	
		$this->db->select('STATUS_PEGAWAI');	
		$this->db->from('PEGAWAI');
		$this->db->order_by('ID', 'ASC');	
		$query = $this->db->get(); 
		$data['record'] = $query->result();		
		
		//Passing data
		$data['role_access'] = array('1','2','3');
		$data['data_table'] = "yes";
		$data['about'] = "yes";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('pegawai_index_view', $data);
		$this->load->view('seg_footer_view', $data);
	}
	
	public function rekam(){
		if(isset($_POST['submit'])){			
			//insert ke database
			$data['saveddata'] = array(
				'NIP' => $_POST['nip'],
				'NAMA_PEGAWAI' => $_POST['nama'],
				'JABATAN' => $_POST['jabatan'],
				'STATUS_PEGAWAI' => $_POST['status'],
			);			
			$this->db->insert('PEGAWAI', $data['saveddata']);
			header("location: " . base_url()."Pegawai_controller/");
		}else{
			//Do nothing
		}		
		
		//Passing data
		$data['role_access'] = array('1', '3');
		$data['data_table'] = "no";
		$data['about'] = "no";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('pegawai_rekam_view', $data);
		$this->load->view('seg_footer_view', $data);		
	}

	public function ubah($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load pegawai by id
			$this->db->select('ID');	
			$this->db->select('NIP');	
			$this->db->select('NAMA_PEGAWAI');	
			$this->db->select('JABATAN');	
			$this->db->select('STATUS_PEGAWAI');	
			$this->db->from('PEGAWAI');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$data['record'] = $query->result();

			if($data['record'] != null){
				//Passing data
				$data['role_access'] = array('1', '3');
				$data['data_table'] = "no";
				$data['about'] = "no";			
				
				//Load View
				$this->load->view('seg_head_view', $data);
				$this->load->view('seg_navigation_view', $data);
				$this->load->view('pegawai_ubah_view', $data);
				$this->load->view('seg_footer_view', $data);
				
				if(isset($_POST['submit'])){
					//insert ke database
					$data['saveddata'] = array(
						'NIP' => $_POST['nip'],
						'NAMA_PEGAWAI' => $_POST['nama'],
						'JABATAN' => $_POST['jabatan'],
						'STATUS_PEGAWAI' => $_POST['status'],
					);
					$this->db->where('ID', $_POST['id']);
					$this->db->update('PEGAWAI', $data['saveddata']);	
					header("location: " . base_url()."Pegawai_controller/");
				}else{
					//Do nothing
				}
				
			}else{
				header("location: " . base_url()."Pegawai_controller/");
			}			
		}
	}

	public function ubah_status($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load pegawai by id
			$this->db->select('ID');	
			$this->db->select('STATUS_PEGAWAI');	
			$this->db->from('PEGAWAI');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$result = $query->result();
			
			if($result != null){
				foreach($result as $item){
					$status = $item->STATUS_PEGAWAI;
				}
				if($status == '1'){
					$new_status = '0';
				}else if($status == '0'){
					$new_status = '1';
				}
				//Update Status di database
				$this->db->set('STATUS_PEGAWAI', $new_status);
				$this->db->where('ID', $id);
				$this->db->update('PEGAWAI');	
				header("location: " . base_url()."Pegawai_controller/");
			}else{
				header("location: " . base_url()."Pegawai_controller/");
			}
		}		
	}	
}


