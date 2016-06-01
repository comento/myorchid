<?php
class Actions extends CI_Controller {
	
    public function __construct(){
        parent:: __construct();
        $this->load->model('actions_model');
		$this->load->library('session');
    }

    public function water() {
    	$orchid_no = $this->input->post('orchid_no');	
		$query = $this->actions_model->getActionlog($orchid_no, 'all');
		if(!isset($query)){	//액션 기록이 아무것도 없다면 상태 업데이트		 
		    $this->actions_model->updateStatus($no, 2);
			$row = $this->actions_model->getOrchid($no); 
			$this->session->set_userdata($row);	
		}
        $this->actions_model->action_water($orchid_no);
    }
	
	public function join(){
		$name = $this->input->post('name');
		$query = $this->actions_model->checkName($name);		
		if ( $query->num_rows() > 0){		
			echo "1";
		}else{
			$query = $this->actions_model->join($name);	
			echo "2";
		}				
	}
	
	public function login(){
		$name = $this->input->post('name');
		$query = $this->actions_model->login($name);
		
		if(isset($query)) { //로그인 성공
			$single_column = $query->row();
			$no = $single_column->orchid_no;
			$row = $query->row_array();
				
			$query1 = $this->actions_model->getActionlog($no, 'all'); //한번도 기록되어있지 않으면, 쥬금 체크하지 않음
			if(isset($query)){
				if(!checkDeath($no)){ //쥬금체크
					$this->actions_model->updateStatus($no, 7); //쥬김
					$row = $this->actions_model->getOrchid($no); 
				}	
			}
			
			$this->session->set_userdata($row);						
			echo "2";
		}else{ //로그인 실패
			echo "1";
		}	
	}
	
	
	public function logout(){
	    $this->session->sess_destroy();
	}

	
}
