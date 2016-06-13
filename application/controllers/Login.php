<?php
class Login extends CI_Controller {
	
    public function __construct(){
        parent:: __construct();
        $this->load->model('login_model');
		$this->load->model('actions_model');
		$this->load->model('status_model');
		$this->load->library('session');
	}
	
	//로그인
	public function login(){
		$name = $this->input->post('name');
		if(isset($name)){
			$query = $this->login_model->login($name);
		
			if(isset($query)) { //로그인 성공
				$single_column = $query->row();
				$no = $single_column->orchid_no;
				$row = $query->row_array();
	
				$status = $this->status_model->checkStatus($no, $row);
				$log = $this->actions_model->getActionlog($no, 'all');
				$this->session->set_userdata('actionLog', $log->result_array());	
				
				if($status > 0){
					$this->status_model->updateStatus($no, $status); 
					$query = $this->status_model->getOrchid($no); 
					$row = $query->row_array();	
				}
				
				$this->session->set_userdata($row);	
							
				echo "2";
			}else{ //로그인 실패
				echo "1";
			}	
				
		}
	}
	
	//로그아웃
	public function logout(){
	    $this->session->sess_destroy();
	}
	

}
