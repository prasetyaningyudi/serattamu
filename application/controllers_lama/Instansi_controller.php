<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();	
	}

	public function index(){
		//load list ruang
		$this->db->select('ID');
		$this->db->select('NAMA_INSTANSI');
		$this->db->from('INSTANSI');
		$this->db->order_by('NAMA_INSTANSI', 'ASC');	
		$query = $this->db->get(); 
		$data['record'] = $query->result();		
		
		//Passing data
		$data['role_access'] = array('1','2','3');
		$data['data_table'] = "yes";
		$data['about'] = "yes";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('instansi_index_view', $data);
		$this->load->view('seg_footer_view', $data);
	}
	
	public function rekam(){
		if(isset($_POST['submit'])){			
			//insert ke database
			$data['saveddata'] = array(
				'NAMA_INSTANSI' => $_POST['nama'],
			);			
			$this->db->insert('INSTANSI', $data['saveddata']);
			header("location: " . base_url()."Instansi_controller/");
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
		$this->load->view('instansi_rekam_view', $data);
		$this->load->view('seg_footer_view', $data);		
	}

	public function ubah($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load ruang by id
			$this->db->select('ID');	
			$this->db->select('NAMA_INSTANSI');	
			$this->db->from('INSTANSI');	
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
				$this->load->view('instansi_ubah_view', $data);
				$this->load->view('seg_footer_view', $data);
				
				if(isset($_POST['submit'])){
					//insert ke database
					$data['saveddata'] = array(
						'NAMA_INSTANSI' => $_POST['nama'],
					);
					$this->db->where('ID', $_POST['id']);
					$this->db->update('INSTANSI', $data['saveddata']);	
					header("location: " . base_url()."Instansi_controller/");
				}else{
					//Do nothing
				}
				
			}else{
				header("location: " . base_url()."Instansi_controller/");
			}			
		}
	}	
}


