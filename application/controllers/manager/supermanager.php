<?php
	class Supermanager extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			echo "string";
		}
		public function themlotrinh()
		{
			$json='[{"latitude":10.8662973,"longitude":106.72568212},{"latitude":10.86385507,"longitude":106.72474053},{"latitude":10.85983864,"longitude":106.72390698},{"latitude":10.84091381,"longitude":106.71700319},{"latitude":10.83019011,"longitude":106.71410578},{"latitude":10.81694914,"longitude":106.71159751},{"latitude":10.81272914,"longitude":106.70937786},{"latitude":10.80987182,"longitude":106.70909565},{"latitude":10.79980607,"longitude":106.70638612},{"latitude":10.79506635,"longitude":106.70175432},{"latitude":10.78886256,"longitude":106.69294564},{"latitude":10.78676613,"longitude":106.69092463},{"latitude":10.77867892,"longitude":106.68278488},{"latitude":10.76943426,"longitude":106.67040465},{"latitude":10.75803709,"longitude":106.66020269},{"latitude":10.75586252,"longitude":106.65830875},{"latitude":10.7510625,"longitude":106.65239073},{"latitude":10.7497051,"longitude":106.64194348},{"latitude":10.74878469,"longitude":106.63782984},{"latitude":10.74116624,"longitude":106.61880568}]';
			// $arr = json_decode($json);
			// $str_tramdung="";
			
			// $count = count($arr);
			// foreach ($arr as $key => $value) {
				
			// 	$str_tramdung =$str_tramdung.$value->latitude.','.$value->longitude.";";
				
			// }
			$vl =htmlspecialchars($json);
			$value = array(
				'MaLT'=>'LT3',
				'DiemKhoiHanh'=>'thu duc',			
				'DiemDen'=>'ben xe',			
				'TramDung'=>$vl,
				'GiaTien'=>'2',
			);

			
			
			$this->load->model('manager/Mthemlotrinh');
			$this->Mthemlotrinh->themLT($value);
			echo "ok";
		}

		public function themquanly()
		{

		}


	}

?>