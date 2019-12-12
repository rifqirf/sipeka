<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null && $this->session->user["nama_role"] != "admin") {
            show_404();
        }
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Jabatan_model', 'jabatan');
    }

	  public function index() {
        $this->lihat();
    }

    public function lihat() {
        $data['guru'] = $this->guru->getAll();
        $this->load->view('template/header');
        $this->load->view('view.guru.php', $data);
        $this->load->view('template/footer');
    }
    
    public function form($operasi) {
      if($operasi == 'update') {
        $id = $this->input->get('id');
        $data['guru'] = $this->guru->getbyNIP($id)[0];
      }
      $data['jabatan'] = $this->jabatan->getAll();
      $data['operasi'] = $operasi;
      $this->load->view('template/header');
      $this->load->view('form.guru.php', $data);
      $this->load->view('template/footer');
    }

    public function update() {
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');
        $this->form_validation->set_rules('nama', 'Nama Guru', 'required');
        $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "nip" => $this->input->post('nip'),
                "nama" => $this->input->post('nama'),
                "id_jabatan" => $this->input->post('id_jabatan'),
                "telp" => $this->input->post('telp')
            ];
            $status['operasi'] = "update";
            $status['code'] = $this->guru->update($data);
        }
        echo json_encode($status);
        redirect(base_url()."guru/");
    } 

    public function tambah() {
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama Guru', 'required');
        $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "nip" => $this->input->post('nip'),
                "password" => md5($this->input->post('password')),
                "nama" => $this->input->post('nama'),
                "id_jabatan" => $this->input->post('id_jabatan'),
                "telp" => $this->input->post('telp')
            ];
            
            $status['operasi'] = "tambah";
            $status['code'] = $this->guru->add($data);
        }
        echo json_encode($status);
        redirect(base_url()."guru/");
    } 

    public function delete($id) {
        $status['operasi'] = "delete";
        $status['code'] = $this->guru->delete($id);
        // do something
        echo json_encode($status);
        redirect(base_url()."guru/");
    }
}
