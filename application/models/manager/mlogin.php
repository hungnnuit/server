<?php
	class Mlogin extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function kiemtratontai($username){
			$query = $this->db->where('TenDangNhap',$username)
							  ->get('nhanvien');
			return $num_row = $query->num_rows();
		}
		public function kiemtradangnhap($username,$password){
			$query = $this->db->where('TenDangNhap',$username)
									  ->where('Password',$password)
									  ->get('nhanvien');
			return $num_row = $query->num_rows();
			
		} 
	}

?>