<?php
class Join extends CI_Controller {
	
    public function __construct(){
        parent:: __construct();
        $this->load->model('join_model');
    }


	public function join(){
		$name = $this->input->post('name');
		$query = $this->join_model->checkName($name);		
		if ( $query->num_rows() > 0){		
			echo "1";
		}else{
			$query = $this->join_model->join($name);	
			echo "2";
		}				
	}
	
}
