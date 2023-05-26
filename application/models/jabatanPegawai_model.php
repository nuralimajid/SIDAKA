<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jabatanPegawai_model extends CI_Model{

	public function getAllJabatan(){
		$query = $this->db->get('jabatan_pegawai');
		return $query->result();
	}

	public function postJabatan($data){
		$this->db->insert('jabatan_pegawai');
		return $this->db->insert_id();
	}
}
