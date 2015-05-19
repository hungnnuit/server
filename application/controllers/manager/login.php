<?php
class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['base_url']=base_url();
		  
		if($this->input->post('login')){
			$this->load->model('manager/Mlogin');
			$result = $this->input->post('data');
			$this->form_validation->set_error_delimiters('<li>','</li>');
			$this->form_validation->set_rules('data[username]','"Tên quản lý"','trim|required|min_length[3]|max_length[20]|callback_username');
			$this->form_validation->set_rules('data[password]','"Mật khẩu"','required|callback_password['.$result['username'].']');
			if($this->form_validation->run()==TRUE){
				header("location: ")
			}
			
			
		}
		$this->load->view('manager/vlogin.php',isset($data)?$data:NULL);
	}


	// ===================form_validation=====================
	public function username($username){
		$check = $this->Mlogin->kiemtratontai($username);
		if($check==0){
			$this->form_validation->set_message('username','%s không tồn tại');
			return FALSE;
		}
		else
			return TRUE;
	}

	public function password($password,$username){
		if($this->username($username)){
			$check = $this->Mlogin->kiemtradangnhap($username,$password);
			if($check==0){
				$this->form_validation->set_message('password','%s không đúng vui lòng kiểm tra lại');
				return FALSE;
			}
			else
				return TRUE;

		}
			
	}
}

?>