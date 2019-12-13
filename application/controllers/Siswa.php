<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null && $this->session->user["nama_role"] != "admin" && $this->session->user["nama_role"] != "tata usaha") {
            show_404();
        }
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Kelompok_model', 'kelompok');
    }

	  public function index() {
        $this->lihat();
    }

    public function lihat() {
        $data['siswa'] = $this->siswa->getAll();
        $data['kelompok'] = $this->kelompok->getAll();
        $this->load->view('template/header');
        $this->load->view('view.siswa.php', $data);
        $this->load->view('template/footer');
    }
    
    public function form($operasi) {
      if($operasi == 'update') {
        $id = $this->input->get('id');
        $data['siswa'] = $this->siswa->getbyId($id)[0];
      }
      $data['jk'] = [
        "L" => "LAKI-LAKI",
        "P" => "PEREMPUAN"
      ];
      $data['agama'] = [
        "islam" => "ISLAM",
        "kristen" => "KRISTEN",
        "katholik" => "KATHOLIK",
        "budha" => "BUDHA",
        "konghuchu" => "KONGHUCHU"
      ];
      $data['kelompok'] = $this->kelompok->getAll();
      $data['operasi'] = $operasi;
      $this->load->view('template/header');
      $this->load->view('form.siswa.php', $data);
      $this->load->view('template/footer');
    }

    public function update() {
        $this->form_validation->set_rules('no_induk', 'No Induk', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = $this->input->post();
            $status['operasi'] = "update";
            $status['code'] = $this->siswa->update($data);
        }
        var_dump($data);
        echo json_encode($status);
        redirect(base_url()."siswa/");
    } 

    public function tambah() {
        $this->form_validation->set_rules('tgl_diterima', 'Tgl Diterima', 'required|date');
        $this->form_validation->set_rules('id_kelas', 'ID Kelas', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = $this->input->post();
            $prefix = substr($this->input->post('tgl_diterima'), 2, 2) . (intval(substr($this->input->post('tgl_diterima'), 2, 2))+1)."-".$this->kelompok->getById($this->input->post('id_kelas'))[0]["nama_kelompok"];
            $jmlSiswa = intval($this->siswa->getJumlahSiswa($prefix))+1; 
            $data["no_induk"] = $prefix."-".sprintf('%03d', $jmlSiswa);
            $data["password"] = md5($data["no_induk"]);
            $status['operasi'] = "tambah";
            
            $status['code'] = $this->siswa->add($data);
        }
        var_dump($data);
        echo json_encode($status);
        redirect(base_url()."siswa/");
    } 

    public function delete($id) {
        $status['operasi'] = "delete";
        $status['code'] = $this->siswa->delete($id);
        // do something
        echo json_encode($status);
        redirect(base_url()."siswa/");
    }

    public function data() {
        $id = $this->input->get("id");
        echo json_encode($this->siswa->getByCriteria(["id_kelompok" => $id]));
    }
}

