<?php
class Join extends CI_Controller {
	
    public function __construct(){
        parent:: __construct();
        $this->load->model('join_model');
		$this->load->model('actions_model');
		$this->load->library('session');
    }

	//난 생성
	public function join(){
		$name = $this->input->post('name');
		if(isset($name)){
			$query = $this->join_model->checkName($name);	
			
			if ( $query->num_rows() > 0){		
				echo "1";
			}else{
				$query = $this->join_model->join($name);	
				echo "2";
			}		
		}		
	}
	
	//난 삭제
	public function deleteOrchid(){
		$orchid_no = $this->input->post('orchid_no');
		if(isset($orchid_no)){
			//로그 삭제
			$this->actions_model->deleteActionlog($orchid_no);
			
			//실제 난 삭제
			$this->join_model->deleteOrchid($orchid_no);
			
			//세션 삭제
			$this->session->sess_destroy();
		}
	
	}
}
