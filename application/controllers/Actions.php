<?php
class Actions extends CI_Controller {
        public function __construct() 
        {
                parent:: __construct();
                $this->load->model('actions_model');
        }

        public function water() 
        {
                $query = $this->actions_model->action_water();

                foreach ($query->result() as $row) {
                        print_r($row);
                }
        }
		
		public function join()
		{
				$name = $_POST['name'];
				$query = $this->actions_model->check_name($name);
				//echo $query->num_rows()."adkdkdkd";
				
				if ($query->num_rows() > 0){		
					echo "1";
				}else{
					$query = $this->actions_model->join($name);	
					$row = $query->last_row();
					//echo $query;
					echo "2";
				}
				
		}
		
}
