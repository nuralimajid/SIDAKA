<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai_model extends CI_Model{

	public function getAllPegawai(){
		$query = $this->db->get('pegawai');
		return $query->result();
	}

	public function postPegawai($data){
		$this->db->insert('pegawai',$data);
		return $this->db->insert_id();

	}
}
