<?php
class Actions extends CI_Controller {
	
    public function __construct(){
        parent:: __construct();
        $this->load->model('actions_model');
		$this->load->model('status_model');
		$this->load->library('session');
    }

	//액션
    public function action() {
    	$orchid_no = $this->input->post('orchid_no');	
		$act_type = $this->input->post('act_type');	
		if(isset($orchid_no,$act_type)){
			$this->actions_model->setAction($orchid_no, $act_type);
			
			$log = $this->actions_model->getActionlog($orchid_no, 'all');
			$this->session->set_userdata('actionLog', $log->result_array());	
			
			$row = $this->status_model->getOrchid($orchid_no); 
			
			if($this->session->userdata('status') == 1){
				if($this->checkAdult($orchid_no)){ //성인이 될 조건을 만족하는가?
					$this->status_model->updateStatus($orchid_no, 2);//status 업데이트 
					echo "1";	
				}
			}else{
				$status = $this->status_model->checkStatus($orchid_no, $row->row_array());
				if( $status == '0' ) $status = 2;
				$this->status_model->updateStatus($orchid_no, $status);
			}
			
			$row = $this->status_model->getOrchid($orchid_no); 
			$this->session->set_userdata($row->row_array());
					     	
		}
    }	
	
	public function checkAdult($no){
		//액션 기록에 물주기 1 영양 주기 1 닦기가 1 번씩 있으면, 애기-> 성인으로 만들어준다.
		$query = $this->actions_model->getActionlog($no, 'all');
	
		$clean_count = 0;
		$nutrition_count = 0;
		$water_count = 0;		
		foreach ($query->result_array() as $row){
		   if($row['action'] == 'water') $water_count++;
		   else if($row['action'] == 'nutrition') $nutrition_count++;
		   else if($row['action'] == 'clean') $clean_count++;	
		}
		
		if($clean_count > 0 && $nutrition_count > 0 && $water_count > 0 ){
			return true;
		}else{
			return false;
		}
	}
	
	public function revival(){
		$orchid_no = $this->input->post('orchid_no');
		if(isset($orchid_no)){
			$this->status_model->revival($orchid_no);	
			$row = $this->status_model->getOrchid($orchid_no); 
			$this->session->set_userdata($row->row_array());					
		}
	}
	
	public function killOrchid(){
		$orchid_no = $this->input->post('orchid_no');
		if(isset($orchid_no)){
			$this->status_model->updateStatus($orchid_no, 7);
			$row = $this->status_model->getOrchid($orchid_no); 
			$this->session->set_userdata($row->row_array());
		}
	}

}
