<?php
	class Mbook extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		// public function get_infor_ticket_booked($id_detail){
		// 	$query=$this->db->select("*")
		// 					->where("MaCT",$id_detail)
		// 					->get("donhang");
		// 	return $query->result_array();
		// } 
		// 
		public function exist_id_detail($id_detail){
			$query = $this->db->select("*")
							  ->where('MaCT',$id_detail)
							  ->get('chitiet');
			return $row = $query->num_rows();
		}
		public function booking_ticket($arr){
			$query = $this->db->insert('donhang',$arr);
		}
		public function create_new_record_detail($arr_detail){
			$query = $this->db->insert('chitiet',$arr_detail);
		}


		public function get_station($idroute){
			$query = $this->db->select("*")
							  ->where("MaLT",$idroute)
							  ->get("lotrinh");
			return $query->row_array();
		} 

		public function get_seat_empty($id_detail){
			$vitri ="";
			$query= $this->db->select("Vitri")
							 ->where("MaCT",$id_detail)
							 ->get("donhang");
			$result = $query->result_array();
			if(count($result)!=0){
				foreach ($result as $key => $value) {
					$vitri =$vitri.' '.$value['Vitri'];
				}
			}
			return $vitri;			
		}
	}

?>