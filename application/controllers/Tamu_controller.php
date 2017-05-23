<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		ini_set('date.timezone', 'Asia/Jakarta');		
	}

	public function index(){	
		//load tamu list
		$tables = array('BUKU_TAMU', 'TUJUAN', 'INSTANSI', 'USER');
		$this->db->select('BUKU_TAMU.ID');
		$this->db->select('NAMA_TAMU');
		$this->db->select('KTP');
		$this->db->select('TELP');
		$this->db->select('WAKTU');
		$this->db->select('KEPERLUAN');
		$this->db->select('NAMA_TUJUAN');		
		$this->db->select('NAMA_INSTANSI');		
		$this->db->select('NAMA_USER');		
		$this->db->select('STATUS_TAMU');		
		$this->db->from($tables);
		$this->db->WHERE('TUJUAN.ID = BUKU_TAMU.TUJUAN_ID');
		$this->db->WHERE('INSTANSI.ID = BUKU_TAMU.INSTANSI_ID');
		$this->db->WHERE('USER.ID = BUKU_TAMU.USER_ID');
		$this->db->limit(100);
		$this->db->order_by('BUKU_TAMU.WAKTU', 'DESC');	
		$query = $this->db->get(); 
		$data['record'] = $query->result();

		//Passing data
		$data['role_access'] = array('1','2','3');
		$data['data_table'] = "yes";
		$data['about'] = "yes";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('tamu_index_view', $data);
		$this->load->view('seg_footer_view', $data);		
	}
	
	public function rekam(){		
		//load instansi list
		$this->db->select('ID');
		$this->db->select('NAMA_INSTANSI');
		$this->db->from('INSTANSI');
		$this->db->order_by('NAMA_INSTANSI', 'ASC');		
		$query = $this->db->get(); 
		$data['record1'] = $query->result();
		
		//load tujuan list
		$this->db->select('ID');
		$this->db->select('NAMA_TUJUAN');
		$this->db->from('TUJUAN');
		$this->db->order_by('NAMA_TUJUAN', 'ASC');		
		$query = $this->db->get(); 
		$data['record2'] = $query->result();		
		
		if(isset($_POST['submit'])){			
			//insert ke database
			$data['saveddata'] = array(
				'NAMA_TAMU' => $_POST['nama'],
				'KTP' => $_POST['ktp'],
				'TELP' => $_POST['telp'],
				'KEPERLUAN' => $_POST['keperluan'],
				'WAKTU' => date('Y-m-d H:i:s'),
				'INSTANSI_ID' => $_POST['instansi'],
				'TUJUAN_ID' => $_POST['tujuan'],
				'USER_ID' => $_POST['user'],
				'STATUS_TAMU' => $_POST['status'],
			);			
			$this->db->insert('BUKU_TAMU', $data['saveddata']);
			header("location: " . base_url()."Tamu_controller/");	
		}else{
			//Do nothing
		}
		
		//Passing data
		$data['role_access'] = array('1','3');
		$data['data_table'] = "no";
		$data['about'] = "no";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('tamu_rekam_view', $data);
		$this->load->view('seg_footer_view', $data);
	}

	public function ubah($id=null){	
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load instansi list
			$this->db->select('ID');
			$this->db->select('NAMA_INSTANSI');
			$this->db->from('INSTANSI');
			$this->db->order_by('NAMA_INSTANSI', 'ASC');		
			$query = $this->db->get(); 
			$data['record1'] = $query->result();
			
			//load tujuan list
			$this->db->select('ID');
			$this->db->select('NAMA_TUJUAN');
			$this->db->from('TUJUAN');
			$this->db->order_by('NAMA_TUJUAN', 'ASC');		
			$query = $this->db->get(); 
			$data['record2'] = $query->result();	
		
			//load barang by id
			$this->db->select('ID');	
			$this->db->select('NAMA_TAMU');	
			$this->db->select('WAKTU');	
			$this->db->select('KTP');	
			$this->db->select('KEPERLUAN');	
			$this->db->select('TELP');	
			$this->db->select('TUJUAN_ID');	
			$this->db->select('INSTANSI_ID');	
			$this->db->select('USER_ID');	
			$this->db->select('STATUS_TAMU');	
			$this->db->from('BUKU_TAMU');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$data['record3'] = $query->result();
			
			if($data['record3'] != null){				
				if(isset($_POST['submit'])){
					//insert ke database
					$data['saveddata'] = array(
						'NAMA_TAMU' => $_POST['nama'],
						'WAKTU' => $_POST['waktu'],
						'KTP' => $_POST['ktp'],
						'KEPERLUAN' => $_POST['keperluan'],
						'TELP' => $_POST['telp'],
						'TUJUAN_ID' => $_POST['tujuan'],
						'INSTANSI_ID' => $_POST['instansi'],
						'USER_ID' => $_POST['user'],
						'STATUS_TAMU' => $_POST['status'],
					);	
					$this->db->where('ID', $id);
					$this->db->update('BUKU_TAMU', $data['saveddata']);	
					header("location: " . base_url()."Tamu_controller/");
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
				$this->load->view('tamu_ubah_view', $data);
				$this->load->view('seg_footer_view', $data);				
			}else{
				header("location: " . base_url()."Tamu_controller/");
			}			
		}
	}

	public function ubah_status($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load barang by id
			$this->db->select('ID');	
			$this->db->select('STATUS_TAMU');	
			$this->db->from('BUKU_TAMU');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$result = $query->result();
			
			if($result != null){
				foreach($result as $item){
					$status = $item->STATUS_TAMU;
				}
				if($status == '1'){
					$new_status = '0';
				}else if($status == '0'){
					$new_status = '1';
				}
				//Update Status di database
				$this->db->set('STATUS_TAMU', $new_status);
				$this->db->where('ID', $id);
				$this->db->update('BUKU_TAMU');	
				header("location: " . base_url()."Tamu_controller/");
			}else{
				header("location: " . base_url()."Tamu_controller/");
			}
		}		
	}	
}


