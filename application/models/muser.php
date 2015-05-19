<?php
	class Muser  extends CI_Model{
		public function __construct(){
			 parent::__construct();
			$this->load->database();
		}
		public function check_exist_member($u,$p){
			$query =$this->db->select("*")
							  ->where("TenDangNhap",$u)
							  ->where("Password",$p)
							  ->get('nhanvien');
			if($query->num_rows()!=0){
				return true;
			} 
			else
				return false;
	
		} 
		public function login($u,$p)
		{
			$query =$this->db->select("TenNV,MaNV")
							  ->where("TenDangNhap",$u)
							  ->where("Password",$p)
							  ->get('nhanvien');

			return $rs=$query->row_array();
			

		} 

	}

?>