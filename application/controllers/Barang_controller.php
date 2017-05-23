<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		ini_set('date.timezone', 'Asia/Jakarta');		
	}

	public function index(){
		//load list pegawai
		$tables = array('BARANG', 'PEGAWAI', 'INSTANSI', 'USER');
		$this->db->select('BARANG.ID');
		$this->db->select('BARANG.NAMA_BARANG');
		$this->db->select('BARANG.PEGAWAI_ID');
		$this->db->select('BARANG.INSTANSI_ID');
		$this->db->select('BARANG.USER_ID');
		$this->db->select('BARANG.STATUS_BARANG');
		$this->db->select('BARANG.WAKTU_TERIMA');
		$this->db->select('PEGAWAI.NAMA_PEGAWAI');
		$this->db->select('INSTANSI.NAMA_INSTANSI');
		$this->db->from($tables);
		$this->db->where('BARANG.PEGAWAI_ID = PEGAWAI.ID');
		$this->db->where('BARANG.INSTANSI_ID = INSTANSI.ID');
		$this->db->where('BARANG.USER_ID = USER.ID');
		$this->db->limit(100);
		$this->db->order_by('BARANG.WAKTU_TERIMA', 'DESC');	
		$query = $this->db->get(); 
		$data['record'] = $query->result();		
		
		//Passing data
		$data['role_access'] = array('1','2','3');
		$data['data_table'] = "yes";
		$data['about'] = "yes";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('barang_index_view', $data);
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
		$this->db->select('NAMA_PEGAWAI');
		$this->db->from('PEGAWAI');
		$this->db->order_by('NAMA_PEGAWAI', 'ASC');		
		$this->db->where('STATUS_PEGAWAI', '1');		
		$query = $this->db->get(); 
		$data['record2'] = $query->result();		
		
		if(isset($_POST['submit'])){			
			//insert ke database
			$data['saveddata'] = array(
				'NAMA_BARANG' => $_POST['nama'],
				'PEGAWAI_ID' => $_POST['pegawai'],
				'USER_ID' => $_POST['user'],
				'INSTANSI_ID' => $_POST['instansi'],
				'WAKTU_TERIMA' => date('Y-m-d H:i:s'),
				'STATUS_BARANG' => $_POST['status'],
			);			
			$this->db->insert('BARANG', $data['saveddata']);
			header("location: " . base_url()."Barang_controller/");
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
		$this->load->view('barang_rekam_view', $data);
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
			$this->db->select('NAMA_PEGAWAI');
			$this->db->from('PEGAWAI');
			$this->db->order_by('NAMA_PEGAWAI', 'ASC');		
			$this->db->where('STATUS_PEGAWAI', '1');		
			$query = $this->db->get(); 
			$data['record2'] = $query->result();	
		
			//load barang by id
			$this->db->select('ID');	
			$this->db->select('NAMA_BARANG');	
			$this->db->select('INSTANSI_ID');	
			$this->db->select('PEGAWAI_ID');	
			$this->db->select('STATUS_BARANG');	
			$this->db->select('WAKTU_TERIMA');	
			$this->db->select('USER_ID');	
			$this->db->from('BARANG');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$data['record3'] = $query->result();
			

			if($data['record3'] != null){
				//Passing data
				$data['role_access'] = array('1', '3');
				$data['data_table'] = "no";
				$data['about'] = "no";			
				
				//Load View
				$this->load->view('seg_head_view', $data);
				$this->load->view('seg_navigation_view', $data);
				$this->load->view('barang_ubah_view', $data);
				$this->load->view('seg_footer_view', $data);
				
				if(isset($_POST['submit'])){
					//insert ke database
					$data['saveddata'] = array(
						'NAMA_BARANG' => $_POST['nama'],
						'PEGAWAI_ID' => $_POST['pegawai'],
						'USER_ID' => $_POST['user'],
						'INSTANSI_ID' => $_POST['instansi'],
						'WAKTU_TERIMA' => $_POST['waktu'],
						'STATUS_BARANG' => $_POST['status'],
					);	
					$this->db->where('ID', $_POST['id']);
					$this->db->update('BARANG', $data['saveddata']);	
					header("location: " . base_url()."Barang_controller/");
				}else{
					//Do nothing
				}
			}else{
				header("location: " . base_url()."Barang_controller/");
			}			
		}
	}

	public function ubah_status($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load barang by id
			$this->db->select('ID');	
			$this->db->select('STATUS_BARANG');	
			$this->db->from('BARANG');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$result = $query->result();
			
			if($result != null){
				foreach($result as $item){
					$status = $item->STATUS_BARANG;
				}
				if($status == '1'){
					$new_status = '0';
				}else if($status == '0'){
					$new_status = '1';
				}
				//Update Status di database
				$this->db->set('STATUS_BARANG', $new_status);
				$this->db->where('ID', $id);
				$this->db->update('BARANG');	
				header("location: " . base_url()."Barang_controller/");
			}else{
				header("location: " . base_url()."Barang_controller/");
			}
		}		
	}	
}


