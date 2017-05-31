<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();	
	}
	
	public function index(){
		//load user list
		$tables = array('ROLE', 'USER');
		$this->db->select('USER.ID');
		$this->db->select('USER.USERNAME');
		$this->db->select('USER.PASSWORD');
		$this->db->select('USER.NAMA_USER');
		$this->db->select('USER.FOTO');
		$this->db->select('USER.STATUS_USER');
		$this->db->select('USER.ROLE_ID');
		$this->db->select('ROLE.NAMA_ROLE');;		
		$this->db->from($tables);
		$this->db->WHERE('USER.ROLE_ID = ROLE.ID');
		$this->db->order_by('USER.NAMA_USER', 'ASC');	
		$query = $this->db->get(); 
		$data['record'] = $query->result();

		//Passing data
		$data['role_access'] = array('1','2');
		$data['data_table'] = "yes";
		$data['about'] = "yes";
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('user_index_view', $data);
		$this->load->view('seg_footer_view', $data);
	}
	
	public function rekam(){
		//load role list
		$this->db->select('ID');
		$this->db->select('NAMA_ROLE');
		$this->db->from('ROLE');
		$this->db->order_by('ID', 'DESC');		
		$query = $this->db->get(); 
		$data['record'] = $query->result();
		
		if(isset($_POST['submit'])){				
			//insert ke database
			$data['saveddata'] = array(
				'USERNAME' => $_POST['username'],
				'PASSWORD' => md5($_POST['password']),
				'NAMA_USER' => $_POST['nama'],
				'ROLE_ID' => $_POST['role'],
				'STATUS_USER' => $_POST['status'],
			);					
			$this->db->insert('USER', $data['saveddata']);
			header("location: " . base_url()."User_controller/");
		}else{
			//DO Nothing
		}
		
		//Passing data
		$data['role_access'] = array('1');
		$data['data_table'] = "no";
		$data['about'] = "no";			
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('user_rekam_view', $data);
		$this->load->view('seg_footer_view', $data);	
	}

	public function ubah($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			if($this->session->userdata['ROLE_ID'] != '1' && $this->session->userdata['ID'] != $id){
				header("location: " . base_url()."About_controller/user/");
			}else{
				//load user by id
				$this->db->select('ID');
				$this->db->select('USERNAME');
				$this->db->select('PASSWORD');
				$this->db->select('NAMA_USER');
				$this->db->select('FOTO');
				$this->db->select('ROLE_ID');
				$this->db->select('STATUS_USER');
				$this->db->from('USER');		
				$this->db->where('ID', $id);		
				$query = $this->db->get(); 
				$data['record3'] = $query->result();

				if($data['record3'] != null){	
					if(isset($_POST['submit'])){
						if($_POST['password'] !='' && $_POST['password-lg'] != ''){
							//check password baru dengan password baru lagi harus sama
							if($_POST['password'] == $_POST['password-lg']){
								$this->db->set('PASSWORD', md5($_POST['password-lg']));
								$this->db->set('NAMA_USER', $_POST['nama']);
								$this->db->where('ID', $id);
								$this->db->update('USER');
								if($this->session->userdata['ROLE_ID'] == '1'){
									header("location: " . base_url()."User_controller/");	
								}else{
									header("location: " . base_url()."About_controller/user/");
								}							
							}else{
								$data['warning'] = array(
									'PASSWORD_SALAH' => "Input Password Baru dan Password Baru Lagi harus sama",
								);					
							}	
						}else{
							//Update Status di database
							$this->db->set('NAMA_USER', $_POST['nama']);
							$this->db->where('ID', $id);
							$this->db->update('USER');
							if($this->session->userdata['ROLE_ID'] == '1'){
								header("location: " . base_url()."User_controller/");	
							}else{
								header("location: " . base_url()."About_controller/user/");
							}						
						}					
					}else{
						//Do nothing
					}
					//Passing data
					$data['role_access'] = array('1', '2', '3');
					$data['data_table'] = "no";
					$data['about'] = "no";			
					
					//Load View
					$this->load->view('seg_head_view', $data);
					$this->load->view('seg_navigation_view', $data);
					$this->load->view('user_ubah_view', $data);
					$this->load->view('seg_footer_view', $data);				
				}else{
					if($this->session->userdata['ROLE_ID'] == '1'){
						header("location: " . base_url()."User_controller/");	
					}else{
						header("location: " . base_url()."About_controller/user/");
					}
				}
			}
		}		
	}

	public function ubah_status($id=null){
		if($id == null){
			header("location: " . base_url()."User_authentication/no_permission");
		}else{
			//load user by id
			$this->db->select('ID');	
			$this->db->select('STATUS_USER');	
			$this->db->from('USER');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$result = $query->result();
			
			if($result != null){
				foreach($result as $item){
					$status = $item->STATUS_USER;
				}
				if($status == '1'){
					$new_status = '0';
				}else if($status == '0'){
					$new_status = '1';
				}
				//Update Status di database
				$this->db->set('STATUS_USER', $new_status);
				$this->db->where('ID', $id);
				$this->db->update('USER');	
				header("location: " . base_url()."User_controller/");
			}else{
				header("location: " . base_url()."User_controller/");
			}
		}	
	}

	public function upload_foto($id=null){
			//load user by id
			$this->db->select('ID');
			$this->db->select('USERNAME');
			$this->db->select('PASSWORD');
			$this->db->select('NAMA_USER');
			$this->db->select('FOTO');
			$this->db->select('ROLE_ID');
			$this->db->select('STATUS_USER');
			$this->db->from('USER');		
			$this->db->where('ID', $id);		
			$query = $this->db->get(); 
			$data['record3'] = $query->result();

			if($data['record3'] != null){	
				if(isset($_POST['submit'])){		
					if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ''){
						$file_name = $_FILES['foto']['name'];
						$file_size =$_FILES['foto']['size'];
						$file_tmp =$_FILES['foto']['tmp_name'];
						$file_type=$_FILES['foto']['type'];

						if(move_uploaded_file($file_tmp,"././uploads/".$id.'.'.$file_name)){						
							//Update Status di database
							$this->db->set('FOTO', base_url().'uploads/'.$id.'.'.$file_name);
							$this->db->where('ID', $id);
							$this->db->update('USER');
							if($this->session->userdata['ROLE_ID'] == '1'){
								header("location: " . base_url()."User_controller/");	
							}else{
								header("location: " . base_url()."About_controller/user/");
							}
						}else{	
							//Do nothing
						}
					}else{
						//Do nothing
					}
				}else{
					//Do Nothing
				}	
			}else{
				if($this->session->userdata['ROLE_ID'] == '1'){
					header("location: " . base_url()."User_controller/");	
				}else{
					header("location: " . base_url()."About_controller/user/");
				}
			}

		//Passing data
		$data['role_access'] = array('1', '2', '3');
		$data['data_table'] = "no";
		$data['about'] = "no";			
		
		//Load View
		$this->load->view('seg_head_view', $data);
		$this->load->view('seg_navigation_view', $data);
		$this->load->view('user_upload_view', $data);
		$this->load->view('seg_footer_view', $data);		
	}
}


