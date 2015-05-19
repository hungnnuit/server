<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login(){
		if($_POST){
			$this->load->model('Muser');
			if($this->Muser->check_exist_member("manager","1234"))
			{
				$result=$this->Muser->get_info_user('manager','1234');
				echo"<pre>";
					print_r($result);
				echo"</pre>";
			}
			else{
				print('username sai');
			}
		}

	}

	
	
// ======================customer=====================
	public function get_station_and_seat()
	{
		if($_POST)
		{
			$date=$_POST['date'];
			$time=$_POST['time'];
			$route=$_POST['route'];
			$id_detail= $this->handle_string($date,$time,$route);
			$this->load->model('phone/Mbook');
			
			$station=$this->Mbook->get_station($route);
			$seat =$this->Mbook->get_seat_empty($id_detail);
	
			$result= '[{"tramdung":'.$station['TramDung'].'},{"vitri":"'.$seat.'"}]';
			echo($result);
			
		}
		else{
			echo'Chưa có kết nối';
		}
		

		// http://localhost/khoaluan/server/index.php/phone/service/get_station/
	}

	function get_station(){
		if($_POST)
		{
			$route=$_POST['route'];
			// $route="BXMT-BXBD"; test
			$this->load->model('phone/Mbook');
			$station=$this->Mbook->get_station($route);
			echo $station['TramDung'];
		}
		else{
			echo'Chưa có kết nối';
		}
	}
	function test1(){
		$this->load->database();
		
		
	}


	public function book_ticket(){
		
		if($_POST){
			$id_customer =$_POST['id_customer'];
			$date=$_POST['date'];
			$time=$_POST['time'];
			$route=$_POST['route'];
			$origin=$_POST['origin'];
			$des=$_POST['des'];
			$seat=$_POST['seat'];
			$id_detail= $this->handle_string($date,$time,$route);
			$this->load->model("phone/Mbook");
				$arr_info_booking = array(
					'MaHK'=>$id_customer,
					'MaLT'=>$route,
					'MaCT'=>$id_detail,
					'TramDon'=>$origin,
					'TramXuong'=>$des,
					'Vitri'=>$seat,
					'NgayKhoiHanh'=>$date,
					'Chuyen'=>$time
					);
			if(!$this->Mbook->exist_id_detail($id_detail)){
				$arr_details = array(
					'MaCT'=> $id_detail,
				);
				$this->Mbook->create_new_record_detail($arr_details);
			}
			
			$this->Mbook->booking_ticket($arr_info_booking);
			
		}
		else{
			echo "Chưa có kết nối";
		}
	}

	//=====================Drier==================
	
	public function login_driver(){

		if($_POST){    				//kiểm tra post
			$u=$_POST['username'];
			$p=$_POST['password'];
			$this->load->model('phone/Mdriver');
			// $arr_details_driver=$this->Mdriver->login('driver','1234');
			$arr_details_driver=$this->Mdriver->login($u,$p);
			$arr_result['status']=0;// Tạo mảng trả về
			if($arr_details_driver!=NULL){
				// =======lấy ngày hiện tại ===========
				$now = getdate(); 
				$date=$now['year'].'-'.$now['mon'].'-'.$now['mday'];

				//Gán giá trị thông tin tài xế vào mảng trả về
				$arr_result['thongtintaixe']=$arr_details_driver;

				//Lấy thông tin chi tiết chuyến đi cho driver (Mã nhân viên + ngày hiện tại)
				$arr_detail_trip =$this->Mdriver->get_infor_detail_trip($arr_details_driver['MaNV'],'2015-5-15');

				if($arr_detail_trip!=0){

					//Gán thông tin chuyến đi vào mảng trả về
					$arr_result['thongtinchuyendi']= $arr_detail_trip['thongtinchuyendi'];
				 	
				 	$count = count($arr_detail_trip['khachhang']);

					for($i=0;$i<$count;$i++){
						//Chuyển mảng về dạng chuẩn json sau khi js_encode
						$arr_temp=$arr_detail_trip['khachhang'][$i];
						$temp['tramdon'] = json_decode($arr_temp['TramDon']);
						$temp['tramxuong'] = json_decode($arr_temp['TramXuong']);
						
						$arr_temp['TramDon']=$temp['tramdon'];
						$arr_temp['TramXuong']=$temp['tramxuong'];

						$arr_detail_trip['khachhang'][$i]=$arr_temp;
					
					}

					//gán các giá trị cần thiết vào mảng arr_result trả về cho client
					$arr_result['thongtinkhachhang']=$arr_detail_trip['khachhang'];
					$arr_result['status']=1;

				}else{
					$arr_result['status']=2;
				}
				
			}
			
			echo json_encode($arr_result);
			
		}
		else{
			echo "Chưa có kết nối";
		}
		
	}





	//library
	public function handle_string($date,$time,$route)
	{
		$date = explode('-', $date);
		return $id_detail= $date[2].'-'.$date[1].$route.$time;
	}
	
}
