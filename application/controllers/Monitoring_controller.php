<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring_controller extends CI_Controller {

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
		$this->db->where('DATE(BUKU_TAMU.WAKTU)', date('Y-m-d'));		
		$this->db->order_by('BUKU_TAMU.WAKTU', 'DESC');	
		$query = $this->db->get(); 
		$data['record'] = $query->result();
		
		//load list barang
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
		$this->db->where('DATE(BARANG.WAKTU_TERIMA)', date('Y-m-d'));
		$this->db->order_by('BARANG.WAKTU_TERIMA', 'DESC');	
		$query = $this->db->get(); 
		$data['record1'] = $query->result();

		//load list rapat
		$tables = array('RAPAT', 'RUANG_RAPAT');
		$this->db->select('RAPAT.ID');
		$this->db->select('RAPAT.WAKTU_RAPAT');
		$this->db->select('RAPAT.DURASI');
		$this->db->select('RAPAT.AGENDA');
		$this->db->select('RAPAT.RUANG_RAPAT_ID');	
		$this->db->select('RAPAT.USER_ID');	
		$this->db->select('RUANG_RAPAT.NAMA_RUANG');	
		$this->db->from($tables);
		$this->db->where('RAPAT.RUANG_RAPAT_ID = RUANG_RAPAT.ID');
		$this->db->where('DATE(RAPAT.WAKTU_RAPAT)', date('Y-m-d'));
		$this->db->order_by('RAPAT.WAKTU_RAPAT', 'DESC');	
		$query = $this->db->get(); 
		$data['record2'] = $query->result();		

		//Passing data
		$data['role_access'] = array('1','2');
		$data['data_table'] = "yes";
		$data['about'] = "no";
		
		//Load View
		$this->load->view('seg_head_mon_view', $data);
		$this->load->view('monitor_index_view', $data);
		$this->load->view('seg_footer_view', $data);
	}
	
}


