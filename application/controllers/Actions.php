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
}
