<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meeting extends CI_Controller {
	private $data;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		$this->load->model('menu_model'); //can replace with cookies or session
		$this->data['menu'] = $this->menu_model->get_menu();
		$this->data['sub_menu'] = $this->menu_model->get_sub_menu();		
		$this->data['title'] = 'Meeting';
		ini_set('date.timezone', 'Asia/Jakarta');		
	}

	public function index(){
		//load user list
		$tables = array('MEETING', 'MEETING_ROOM', 'EMPLOYEES');
		$this->db->select('MEETING.ID');
		$this->db->select('MEETING_TIME');
		$this->db->select('DURATION');
		$this->db->select('AGENDA');
		$this->db->select('MEETING_ROOM_ID');
		$this->db->select('PIC_ID');
		$this->db->select('ROOM_NAME');
		$this->db->select('EMPLOYEE_NAME');
		$this->db->select('MEETING_STATUS');	
		$this->db->from($tables);	
		$this->db->where('MEETING_STATUS != ', '9');	
		$this->db->where('MEETING.PIC_ID=EMPLOYEES.ID');	
		$this->db->where('MEETING.MEETING_ROOM_ID=MEETING_ROOM.ID');	
		$this->db->order_by('MEETING_TIME', 'DESC');		
		$this->db->order_by('ROOM_NAME', 'ASC');		
		$query = $this->db->get(); 
		$this->data['record'] = $query->result();
		
		$this->data['subtitle'] = 'View';			
		$this->data['data_table'] = 'yes';
		$this->data['role_access'] = array('1', '3');			
		
		//view
		$this->load->view('section_header', $this->data);
		$this->load->view('section_navbar');
		$this->load->view('section_sidebar');
		$this->load->view('section_breadcurm');
		$this->load->view('section_content_title');
		$this->load->view('meeting_index');
		$this->load->view('section_footer');		
	}
	
	public function create(){
		if(isset($_POST['submit'])){
			$this->db->select('ID');
			$this->db->select('EMPLOYEE_NAME');
			$this->db->from('EMPLOYEES');
			$this->db->where('EMPLOYEE_STATUS =', '1');	
			if($_POST['pic_id'] == ''){
				$this->db->where('EMPLOYEE_NAME', $_POST['pic']);	
			}else{
				$this->db->where('ID', $_POST['pic_id']);	
			}	
			$this->db->order_by('EMPLOYEE_NAME', 'ASC');		
			$query = $this->db->get(); 
			$this->data['record'] = $query->result();

			if($query->num_rows()==1){
				//check room
				$this->db->select('ID');
				$this->db->select('MEETING_TIME');
				$this->db->select('DURATION');
				$this->db->select('MEETING_ROOM_ID');
				$this->db->from('MEETING');		
				$this->db->where('DATE(MEETING_TIME)', date("Y-m-d", strtotime($_POST['date'])));		
				$this->db->where('MEETING_ROOM_ID', $_POST['room']);	
				$this->db->where('MEETING_STATUS != ', '9');				
				$query = $this->db->get(); 
				$this->data['record1'] = $query->result();
				
				if($query->num_rows()>=1){
					//same date
					$new_date = date("Y-m-d H:i:s", strtotime($_POST['date'] . ' ' . $_POST['time'] . ':00:00'));
					$new_hour = date("G", strtotime($new_date));
					$new_duration = date("G", strtotime($new_date)) + $_POST['duration'];						
					$new_range = range($new_hour, $new_duration);	
					$error = false;
					foreach($this->data['record1'] as $item){
						$date_time = $item->MEETING_TIME;
						$hour = date("G", strtotime($item->MEETING_TIME));
						$duration = date("G", strtotime($item->MEETING_TIME)) + $item->DURATION;
						$range = range($hour, $duration);
						foreach($new_range as $item){
							foreach($range as $value){
								if($value == $item){
									$error = true;
								}
							}
						}
					}	
					if($error == true){
						$this->data['warning'] = array(
							'text' => 'Meeting with this date and time has scheduled, pick another',
						);											
					}else{
						foreach($this->data['record'] as $item){
							$pic_id = $item->ID;
						}						
						$set_date = date("Y-m-d H:i:s", strtotime($_POST['date'] . ' ' . $_POST['time'] . ':00:00'));
						$this->data['saveddata'] = array(
							'MEETING_TIME' => $set_date,
							'DURATION' => $_POST['duration'],
							'AGENDA' => $_POST['agenda'],
							'USER_ID' => $_POST['user'],
							'MEETING_ROOM_ID' => $_POST['room'],
							'PIC_ID' => $pic_id,
						);
						$this->db->insert('MEETING', $this->data['saveddata']);	
						redirect('meeting');
					}
				}else{
					foreach($this->data['record'] as $item){
						$pic_id = $item->ID;
					}
					$set_date = date("Y-m-d H:i:s", strtotime($_POST['date'] . ' ' . $_POST['time'] . ':00:00'));
					//insert ke database
					$this->data['saveddata'] = array(
						'MEETING_TIME' => $set_date,
						'DURATION' => $_POST['duration'],
						'AGENDA' => $_POST['agenda'],
						'USER_ID' => $_POST['user'],
						'MEETING_ROOM_ID' => $_POST['room'],
						'PIC_ID' => $pic_id,
					);
					$this->db->insert('MEETING', $this->data['saveddata']);
					redirect('meeting');
				}
			}else{
				$this->data['warning'] = array(
					'text' => 'Ops, PIC not found, Try a new one.',
				);
			}			
		}
		//load data	
		$this->db->select('ID');
		$this->db->select('ROOM_NAME');
		$this->db->from('MEETING_ROOM');
		$this->db->order_by('ROOM_NAME', 'ASC');		
		$this->db->where('ROOM_STATUS', '1');		
		$query = $this->db->get(); 
		$this->data['record'] = $query->result();			

		$this->db->select('ID');
		$this->db->select('EMPLOYEE_NAME');
		$this->db->from('EMPLOYEES');
		$this->db->order_by('EMPLOYEE_NAME', 'ASC');		
		$this->db->where('EMPLOYEE_STATUS', '1');		
		$query = $this->db->get(); 
		$this->data['record1'] = $query->result();	
		
		$this->data['subtitle'] = 'Add';			
		$this->data['data_table'] = 'no';	
		$this->data['role_access'] = array('1', '3');			
		
		//view
		$this->load->view('section_header', $this->data);
		$this->load->view('section_navbar');
		$this->load->view('section_sidebar');
		$this->load->view('section_breadcurm');
		$this->load->view('section_content_title');
		$this->load->view('meeting_create');
		$this->load->view('section_footer');

	}

	public function update($id=null){
		if($id == null){
			redirect('authentication/no_permission');
		}else{
			//load user list
			$tables = array('ROLE', 'USER');
			$this->db->select('USER.ID');
			$this->db->select('USER.USERNAME');
			$this->db->select('USER.PASSWORD');
			$this->db->select('USER.USER_ALIAS');
			$this->db->select('USER.USER_STATUS');
			$this->db->select('USER.ROLE_ID');		
			$this->db->from($tables);
			$this->db->WHERE('USER.ROLE_ID = ROLE.ID');
			$this->db->WHERE('USER.ID', $id);	
			$query = $this->db->get(); 
			$this->data['record'] = $query->result();
			
			if($query->result() !== null){
				if(isset($_POST['submit'])){
					if($_POST['password'] != $_POST['password2']){
						$this->data['warning'] = array(
							'text' => 'Ops, Please ensure you type repeat password same with password.',
						);
					}else{
						if($_POST['password'] == '' or $_POST['password'] === null){
							//insert ke database
							$this->data['saveddata'] = array(
								'USER_ALIAS' => $_POST['alias'],
								'ROLE_ID' => $_POST['role'],
							);								
						}else{
							//insert ke database
							$this->data['saveddata'] = array(
								'PASSWORD' => md5($_POST['password']),
								'USER_ALIAS' => $_POST['alias'],
								'ROLE_ID' => $_POST['role'],
							);								
						}
						$this->db->where('ID', $id);
						$this->db->update('USER', $this->data['saveddata']);
						redirect('user');				
					}	
				}				
				//load data
				$this->db->select('ID');
				$this->db->select('ROLE_NAME');
				$this->db->from('ROLE');
				$this->db->order_by('ID', 'ASC');		
				$this->db->where('ID !=', '1');		
				$query = $this->db->get(); 
				$this->data['record1'] = $query->result();	
				
				$this->data['subtitle'] = 'Update';			
				$this->data['data_table'] = 'no';	
				$this->data['role_access'] = array('1');			
				
				//view
				$this->load->view('section_header', $this->data);
				$this->load->view('section_navbar');
				$this->load->view('section_sidebar');
				$this->load->view('section_breadcurm');
				$this->load->view('section_content_title');
				$this->load->view('user_update');
				$this->load->view('section_footer');
			}else{
				redirect('user');
			}						
		}
	}

	public function update_status($id=null){
		if($id === null){
			redirect('authentication/no_permission');
		}else{
			//load data
			$this->db->select('ID');	
			$this->db->select('MEETING_STATUS');	
			$this->db->from('MEETING');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$result = $query->result();
			
			if($result !== null){
				foreach($result as $item){
					$status = $item->MEETING_STATUS;
				}
				if($status == '1'){
					$new_status = '0';
				}else if($status == '0'){
					$new_status = '1';
				}
				//Update Status di database
				$this->db->set('MEETING_STATUS', $new_status);
				$this->db->where('ID', $id);
				$this->db->update('MEETING');	
				redirect('meeting');
			}else{
				redirect('meeting');
			}
		}		
	}

	public function delete($id=null){
		if($id === null){
			redirect('authentication/no_permission');
		}else{
			//load data
			$this->db->select('ID');	
			$this->db->select('MEETING_STATUS');	
			$this->db->from('MEETING');
			$this->db->where('ID', $id);	
			$query = $this->db->get();	
			$result = $query->result();
			
			if($result !== null){
				//Update Status di database
				$this->db->set('MEETING_STATUS', '9');
				$this->db->where('ID', $id);
				$this->db->update('MEETING');	
				redirect('meeting');
			}else{
				redirect('meeting');
			}
		}		
	}
}


