<?php
class Actions_model extends CI_Model {
		
	public function __construct(){
		$this->load->database();
	}
	
	public function action_water($no){
		$sql ="INSERT INTO log_action (orchid_no, action, date) values (?, 'water', now())";
		$query = $this->db->query($sql, array($no));
	}
	
	public function checkName($name = NULL){
		$sql = "select * from orchid where name = ?";
		$query = $this->db->query($sql, array($name));
		return $query;
	}
	
	public function join($name = NULL){
		$sql = "insert into orchid (name, birth, status) values (?, now(), '1')";
		$query = $this->db->query($sql, array($name));
		return $query;
	}
	
	public function login($name = NULL){
		$sql = "select count(*) as c, orchid_no from orchid where name = ?";
		$query = $this->db->query($sql, array($name));
		$row = $query->row(); 
		$query3=null;
		
		if($row->c > 0){
			$orchid_no = $row->orchid_no;
			
			$update_sql ="update orchid set login_date = now() where name = ?";
			$query2 = $this->db->query($update_sql, array($name));							
			
			$query3 = $this->actions_model->getOrchid($orchid_no);
		}
		
		return $query3;
	}
	
	public function checkDeath($no = NULL){
		//죽는 조건에 걸리는지 확인
		return true;		
	}
	
	public function updateStatus($no, $status){
		$sql = "update orchid set status = ? where orchid_no = ?";
		$query = $this->db->query($sql, array($status, $no));
	}
	
	public function getOrchid($no){
		$select_sql ="select o.*, s.status as status_name, s.img from orchid o join status_desc s on o.status=s.no where orchid_no = ?";
		$query = $this->db->query($select_sql, array($no));
		return $query;
	}
	
	public function getActionlog($no, $type = null){

		if($type == "all") {
			$sql = "select * from log_action where orchid_no = ?";
			$query = $this->db->query($sql, array($no));			
		} else {
			$sql = "select * from log_action where orchid_no = ? and action = ?";
			$query = $this->db->query($sql, array($no, $type));						
		}
		
		return $query;
	}
}