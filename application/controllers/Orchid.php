<?php
class Orchid extends CI_Controller {
	public function __construct()
	{
    	parent::__construct();
		session_start();
	}

	public function index()
	{
		$data = '';

		$this->load->view('templates/header', $data);
        $this->load->view('orchid/index', $data);

        print_r($_SESSION);
	}

	public function album()
	{

	}
}