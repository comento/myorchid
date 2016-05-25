<?php
class Actions_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function action_water()
	{
		//$sql = "INSERT INTO myorchid_action (user_no, water_num, water_date) VALUES (?, ?, now())";
		//$this->db->query($sql, array(0, 1));

		$sql = "UPDATE myorchid_action SET water_num = water_num + 1 WHERE user_no = ?";
		$query = $this->db->query($sql, array(0));

		$sql = "SELECT * FROM myorchid_action WHERE user_no = ?";
		$query = $this->db->query($sql, array(0));

		return $query;
	}
}