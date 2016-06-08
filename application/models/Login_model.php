<?php
class Login_model extends CI_Model {
		
	public function __construct(){
		$this->load->database();
		$this->load->model('status_model');
	}
	
	public function login($name = NULL){
		$sql = "select count(*) as c, orchid_no from orchid where name = ?";
		$query = $this->db->query($sql, array($name));
		$row = $query->row(); 
		$query3=null;
		
		if( $row->c > 0){
			$orchid_no = $row->orchid_no;
			
			$update_sql ="update orchid set login_date = now() where name = ?";
			$query2 = $this->db->query($update_sql, array($name));							
			
			$query3 = $this->status_model->getOrchid($orchid_no);
		}
		
		return $query3;
	}
	
}