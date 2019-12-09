<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null && $this->session->user["nama_role"] != "admin") {
            show_404();
        }
        $this->load->model('Jabatan_model', 'jabatan');
    }

	  public function index() {
        $this->lihat();
    }

    public function lihat() {
        $data['jabatan'] = $this->jabatan->getAll();
        $this->load->view('template/header');
        $this->load->view('view.jabatan.php', $data);
        $this->load->view('template/footer');
    }
    
    public function form($operasi) {
      if($operasi == 'update') {
        $id = $this->input->get('id');
        $data['jabatan'] = $this->jabatan->getbyId($id)[0];
      }
      $data['operasi'] = $operasi;
      $this->load->view('template/header');
      $this->load->view('form.jabatan.php', $data);
      $this->load->view('template/footer');
    }

    public function update() {
        $this->form_validation->set_rules('id_jabatan', 'ID Jabatan', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "id_jabatan" => strtoupper($this->input->post('id_jabatan')),
                "nama_jabatan" => $this->input->post('nama_jabatan')
            ];
            $status['operasi'] = "update";
            $status['code'] = $this->jabatan->update($data);
        }
        echo json_encode($status);
        redirect(base_url()."jabatan/");
    } 

    public function tambah() {
        $this->form_validation->set_rules('id_jabatan', 'ID Jabatan', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "id_jabatan" => strtoupper($this->input->post('id_jabatan')),
                "nama_jabatan" => $this->input->post('nama_jabatan')
            ];
            
            $status['operasi'] = "tambah";
            $status['code'] = $this->jabatan->add($data);
        }
        echo json_encode($status);
        redirect(base_url()."jabatan/");
    } 

    public function delete($id) {
        $status['operasi'] = "delete";
        $status['code'] = $this->jabatan->delete($id);
        // do something
        echo json_encode($status);
        redirect(base_url()."jabatan/");
    }
}

