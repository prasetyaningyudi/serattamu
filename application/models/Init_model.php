<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Init_model extends CI_Model {

        public function __construct(){
			// Call the CI_Model constructor
			parent::__construct();
        }

        public function get_init_data(){
			$this->db->select('ID');	
			$this->db->select('APP_NAME');	
			$this->db->select('OFFICE_NAME');	
			$this->db->select('ICON');	
			$this->db->select('THEME');	
			$this->db->from('INIT_DATA');	
			$this->db->order_by('ID', 'DESC');			
			$this->db->limit(1);
			$query = $this->db->get();	 
			return $query;
        }	
}