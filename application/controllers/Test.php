<?php
class Test extends CI_Controller {
	public function __construct()
	{
    	parent::__construct();
		$this->load->library('session');
		$this->load->library('unit_test');
	}

	public function index() {
		$this->test2();
	}

	public function test2() {
		$this->unit->run('Foo', 'Foo');
		$this->unit->run('Foo', 'is_string');

		echo $this->unit->report();
	}

	public function test1()
	{
		$test = 1 + 1;
		$expected_result = 2;
		$test_name = 'Adds one plus one';

		echo $this->unit->run($test, $expected_result, $test_name);
	}
}