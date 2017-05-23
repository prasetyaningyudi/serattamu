<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		ini_set('date.timezone', 'Asia/Jakarta');		
	}

	public function index(){
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
		$this->db->limit(100);		
		$this->db->order_by('RAPAT.WAKTU_RAPAT', 'DESC');	
		$query = $this->db->get(); 
		$data['record'] = $query->result();		
		
		//Passing data
		$data['role_access'] = array('1','2','3');
		$data['data_table'] = "yes";
		$data['about'] = "yes";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('rapat_index_view', $data);
		$this->load->view('seg_footer_view', $data);
	}
	
	public function rekam(){
		//load instansi list
		$this->db->select('ID');
		$this->db->select('NAMA_RUANG');
		$this->db->from('RUANG_RAPAT');
		$this->db->order_by('NAMA_RUANG', 'ASC');		
		$query = $this->db->get(); 
		$data['record2'] = $query->result();
		
		if(isset($_POST['submit'])){
			//check bentrok tidak
			$this->db->select('ID');
			$this->db->select('WAKTU_RAPAT');
			$this->db->select('RUANG_RAPAT_ID');
			$this->db->from('RAPAT');		
			$this->db->where('DATE(WAKTU_RAPAT)', $_POST['tanggal']);		
			$this->db->where('RUANG_RAPAT_ID', $_POST['ruang']);		
			$query = $this->db->get(); 
			$result = $query->result();
			//var_dump($data['record1']);
			
			if($result != null){
				$error = false;
				foreach($result as $item){
					if(substr($item->WAKTU_RAPAT, -8, 2) == $_POST['jam']){
						$error = true;
					}
				}
				if($error == true){
					$data['warning'] = array(
						'text' => 'Ruang dan Waktu Rapat Bentrok. Silahkan Ulangi lagi.',
					);						
				}else{
					$set_date = date("Y-m-d H:i:s", strtotime($_POST['tanggal'] . ' ' . $_POST['jam'] . ':00:00'));
					//insert ke database
					$data['saveddata'] = array(
						'WAKTU_RAPAT' => $set_date,
						'DURASI' => $_POST['durasi'],
						'AGENDA' => $_POST['agenda'],
						'RUANG_RAPAT_ID' => $_POST['ruang'],
						'USER_ID' => $_POST['user'],
					);			
					$this->db->insert('RAPAT', $data['saveddata']);
					header("location: " . base_url()."Rapat_controller/");							
				}				
			}else{
				$set_date = date("Y-m-d H:i:s", strtotime($_POST['tanggal'] . ' ' . $_POST['jam'] . ':00:00'));
				//insert ke database
				$data['saveddata'] = array(
					'WAKTU_RAPAT' => $set_date,
					'DURASI' => $_POST['durasi'],
					'AGENDA' => $_POST['agenda'],
					'RUANG_RAPAT_ID' => $_POST['ruang'],
					'USER_ID' => $_POST['user'],
				);			
				$this->db->insert('RAPAT', $data['saveddata']);
				header("location: " . base_url()."Rapat_controller/");				
			}
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
		$this->load->view('rapat_rekam_view', $data);
		$this->load->view('seg_footer_view', $data);		
	}

	public function ubah($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load rapat by id
			$this->db->select('ID');	
			$this->db->select('WAKTU_RAPAT');	
			$this->db->select('AGENDA');	
			$this->db->select('DURASI');	
			$this->db->select('RUANG_RAPAT_ID');	
			$this->db->select('USER_ID');	
			$this->db->from('RAPAT');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$data['record'] = $query->result();

			//load ruang rapat list
			$this->db->select('ID');
			$this->db->select('NAMA_RUANG');
			$this->db->from('RUANG_RAPAT');
			$this->db->order_by('NAMA_RUANG', 'ASC');				
			$query = $this->db->get(); 
			$data['record2'] = $query->result();			
			
			if($data['record'] != null){
		
				if(isset($_POST['submit'])){
					//check bentrok tidak
					$this->db->select('ID');
					$this->db->select('WAKTU_RAPAT');
					$this->db->select('RUANG_RAPAT_ID');
					$this->db->from('RAPAT');		
					$this->db->where('DATE(WAKTU_RAPAT)', $_POST['tanggal']);		
					$this->db->where('RUANG_RAPAT_ID', $_POST['ruang']);		
					$query = $this->db->get(); 
					$result = $query->result();
					//var_dump($data['record1']);
					
					if($result != null){
						$error = false;
						foreach($result as $item){
							if(substr($item->WAKTU_RAPAT, -8, 2) == $_POST['jam']){
								$error = true;
							}
						}
						if($error == true){
							$data['warning'] = array(
								'text' => 'Ruang dan Waktu Rapat Bentrok. Silahkan Ulangi lagi.',
							);								
						}else{
							$set_date = date("Y-m-d H:i:s", strtotime($_POST['tanggal'] . ' ' . $_POST['jam'] . ':00:00'));
							//insert ke database
							$data['saveddata'] = array(
								'WAKTU_RAPAT' => $set_date,
								'DURASI' => $_POST['durasi'],
								'AGENDA' => $_POST['agenda'],
								'RUANG_RAPAT_ID' => $_POST['ruang'],
								'USER_ID' => $_POST['user'],
							);			
							$this->db->where('ID', $_POST['id']);
							$this->db->update('RAPAT', $data['saveddata']);	
							header("location: " . base_url()."Rapat_controller/");
						}				
					}else{
						$set_date = date("Y-m-d H:i:s", strtotime($_POST['tanggal'] . ' ' . $_POST['jam'] . ':00:00'));
						//insert ke database
						$data['saveddata'] = array(
							'WAKTU_RAPAT' => $set_date,
							'DURASI' => $_POST['durasi'],
							'AGENDA' => $_POST['agenda'],
							'RUANG_RAPAT_ID' => $_POST['ruang'],
							'USER_ID' => $_POST['user'],
						);			
						$this->db->where('ID', $_POST['id']);
						$this->db->update('RAPAT', $data['saveddata']);	
						header("location: " . base_url()."Rapat_controller/");						
					}					
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
				$this->load->view('rapat_ubah_view', $data);
				$this->load->view('seg_footer_view', $data);				
			}else{
				header("location: " . base_url()."Rapat_controller/");
			}			
		}
	}	
}


