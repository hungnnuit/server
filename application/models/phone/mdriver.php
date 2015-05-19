<?php
	class Mdriver extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function login($u,$p)
		{
			$query =$this->db->select("TenNV,MaNV")
							  ->where("TenDangNhap",$u)
							  ->where("Password",$p)
							  ->get('nhanvien');

			return $rs=$query->row_array();
			

		} 
		public function get_id_detail($id_driver,$date){
			$query=$this->db->select('MaCT,NgayKhoiHanh,Chuyen,DiemKhoiHanh,DiemDen,lotrinh.MaLT')
			   				->join('lotrinh','lotrinh.MaLT=chitiet.MaLT')
							->where('MaNV',$id_driver)
							->where('NgayKhoiHanh',$date)
							->get('chitiet');
			return $query->row_array();
		}

		public function get_infor_detail_trip($id_driver,$date){
			$id_detail=$this->get_id_detail($id_driver,$date);

			if($id_detail){
				$arr_info_customer_in_trip =$this->get_infor_customer($id_detail['MaCT']);
				$arr_result['khachhang']=$arr_info_customer_in_trip;
				$arr_result['thongtinchuyendi']=$id_detail;
				return $arr_result;
			}
			else
				return 0; 
			}
		public function get_infor_customer($id_detail){
			
			$query=$this->db->select('TenHanhKhach,SoDT,Vitri,TramDon,TramXuong')
						   ->join('hanhkhach','hanhkhach.MaHK=donhang.MaHK')
						   ->where('MaCT',$id_detail)
			               ->get('donhang');
			return $query->result_array();
		}


		
	}

?>