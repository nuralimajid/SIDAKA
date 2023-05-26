<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('kontrak_model');
		$this->load->model('jabatanPegawai_model');

		$this->load->library('form_validation');
     	$this->load->helper('form');
	}

	// Get Data Pegawai
	public function getPegawai(){
		$pegawai = $this->pegawai_model->getAllPegawai();

		if(!$pegawai){
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($pegawai));
		}else{
			$response =array(
				'success' => false,
				'message' => 'Gagal Menampilkan Data'
			);
		}
	}

	// Post Data Pegawai
	public function postPegawai(){
				
			$data = array(
				'nama'=>$this->input->post('nama'),
				'telepon' =>$this->input->post('telepon'),
				'email' =>$this->input->post('email'),
				'alamat' =>$this->input->post('alamat'),
				'tanggal_masuk' =>$this->input->post('tanggal_masuk'),
			);

			$id_pegawai = $this->pegawai_model->postPegawai($data);

			if($id_pegawai){
				$response = array(
					'success' => true,
					'message' => 'Pegawai Berhasil ditambahkan',
					'pegawai_id'=>$id_pegawai
				);
			} else{
				$response = array(
					'success' => false,
					'message' => 'Pegawai tidak Berhasil ditambahkan',
					
				);
			}

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}

	// Get Jabatan
	public function getJabPegawai(){
		$jabPegawai = $this->jabatanPegawai_model->getAllPegawai();

		if(!$jabPegawai){
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($jabPegawai));
		}else{
			$response =array(
				'success' => false,
				'message' => 'Gagal Menampilkan Data'
			);
		}
	}

	// Post Data Jabatan Pegawai
	public function postJabPegawai(){
				
			$data = array(
				'nama_jabatan'=>$this->input->post('nama_jabatan'),
				'level' =>$this->input->post('level'),
			);

			$jabPegawai_id = $this->jabatanPegawai_model->postJabPegawai($data);

			if($id_pegawai){
				$response = array(
					'success' => true,
					'message' => 'Jabatan Berhasil ditambahkan',
					'pegawai_id'=>$jabPegawai_id
				);
			} else{
				$response = array(
					'success' => false,
					'message' => 'jabatan tidak Berhasil ditambahkan',
					
				);
			}

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}

	// Get Kontrak
	public function getKontrak(){
		$kontrak = $this->kontrak_model->getAllKontrak()();

		if(!$kontrak){
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($kontrak));
		}else{
			$response =array(
				'success' => false,
				'message' => 'Gagal Menampilkan Data'
			);
		}
	}

	// Post Data kontrak
	public function postKontrak(){
				
			$data = array(
				'id_pegawai'=>$this->input->post('id_pegawai'),
				'id_jabatan'=>$this->input->post('id_jabatan'),
				'tanggal_mulai' =>$this->input->post('tanggal_mulai'),
				'tanggal_selesai' =>$this->input->post('tanggal_selesai'),
				'gaji' =>$this->input->post('gaji'),
			);

			$kontrak_id = $this->kontrak_model->postKontrak()($data);

			if($id_pegawai){
				$response = array(
					'success' => true,
					'message' => 'kontrak Berhasil ditambahkan',
					'pegawai_id'=>$kontrak_id
				);
			} else{
				$response = array(
					'success' => false,
					'message' => 'kontrak tidak Berhasil ditambahkan',
					
				);
			}

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}
}
