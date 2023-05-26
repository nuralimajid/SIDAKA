<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kontrak_model extends CI_Model{

	public function getAllKontrak(){
		$query=$this->db->get('kontrak');
		return $query->result();
	}

	public function postKontrak($data){
		$this->db->insert('kontrak',$data);
		return $this->db->insert_id();
	}
}
