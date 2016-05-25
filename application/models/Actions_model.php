<?php
class Actions_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function action_water()
	{
		$sql = "UPDATE myorchid_action SET water_num = water_num + 1 WHERE user_no = ?";
		$query = $this->db->query($sql, array(0));

		$sql = "SELECT * FROM myorchid_action WHERE user_no = ?";
		$query = $this->db->query($sql, array(0));

		return $query;
	}
	
	public function check_name($name = NULL)
	{
		$sql = "select * from myorchid where name = ?";
		$query = $this->db->query($sql, array($name));
		return $query;
	}
	
	public function join($name = NULL)
	{
	
		$sql = "insert into myorchid (name, date) values (?, now())";
		$query = $this->db->query($sql, array($name));
		return $query;
		//setCookie("user_no", );
	}
}