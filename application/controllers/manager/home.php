<?php
	class Home extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}
		public function index()
		{
			$this->load->helper('url');
			
			$data['base_url']=base_url();
		  



			$this->load->view('manager/vhome',isset($data)?$data:NULL);
		}
	}

?>