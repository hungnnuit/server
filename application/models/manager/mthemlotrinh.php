<?php
	class Mthemlotrinh extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function themLT($arr){
			$this->db->insert('lotrinh', $arr); 

		} 
		
	}
	
?>