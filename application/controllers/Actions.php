<?php
class Actions extends CI_Controller {
	
    public function __construct(){
        parent:: __construct();
        $this->load->model('actions_model');
		$this->load->library('session');
    }

    public function water() {
        $query = $this->actions_model->action_water();
        foreach ($query->result() as $row) {
            print_r($row);
        }
    }
	
	public function join()
	{
		$name = $_POST['name'];
		$query = $this->actions_model->check_name($name);
		
		if ( $query->num_rows() > 0){		
			echo "1";
		}else{
			$query = $this->actions_model->join($name);	
			echo "2";
		}				
	}
	
	public function login()
	{
		$name = $_POST['name'];
		$query = $this->actions_model->login($name);
		
		if( $query->num_rows() > 0 ) {

			$row = $query->row_array();
			$this->session->set_userdata($row);			
			
			echo "2";
		}else{
			echo "1";
		}	
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
	}



}
