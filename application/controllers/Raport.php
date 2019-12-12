<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends CI_Controller {

    public function __construct() {
      parent::__construct();
      if($this->session->user == null && $this->session->user["nama_role"] != "admin" && $this->session->user["nama_role"] != "guru" && $this->session->user["nama_role"] != "orang tua") {
        show_404();
      }
      $this->load->model('Raport_model', 'raport');
      $this->load->model('Kelompok_model', 'kelompok');
      $this->load->model('Guru_model', 'guru');
      $this->load->model('Kriteria_model', 'kriteria');
      $this->load->model('Siswa_model', 'siswa');
      $this->load->model('Nilai_model', 'nilai');
    }

	  public function index() {
      $this->lihat();
    }

    public function lihat() {
      $criteria = [];
      $data['raport'] = $this->raport->getAll($criteria);
      $this->load->view('template/header');
      $this->load->view('view.raport.php', $data);
      $this->load->view('template/footer');
    }

    public function nilai() {
      $criteria = [];
      $data['raport'] = $this->raport->getAll($criteria);
      $data['siswa'] = $this->siswa->getAll();
      $data['kriteria'] = $this->kriteria->getAll();
      $data['nilai'] = $this->nilai->getAll();
      $this->load->view('template/header');
      $this->load->view('form.nilai.php', $data);
      $this->load->view('template/footer');
    }
    
    public function form($operasi = "tambah") {
      $criteria = [];
      $data['operasi'] = $operasi;
      $data['raport'] = $this->raport->getAll($criteria);
      $data['kelompok'] = $this->kelompok->getAll();
      $this->load->view('template/header');
      $this->load->view('form.raport.php', $data);
      $this->load->view('template/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('id_kelompok', 'id_kelompok', 'required');
        $this->form_validation->set_rules('tgl_raport', 'Tgl Raport', 'required');

        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
          $status['operasi'] = "tambah";
          $criteria = $this->input->get();
          $data = $this->input->post();
          foreach($this->siswa->getByCriteria(["id_kelas" => $criteria["id_kelompok"]]) as $key => $val) {
            $data["no_induk"] = $val["no_induk"];
            $status['code'] = $this->raport->add($data);
          }
        }
        echo json_encode($status);
        redirect(base_url()."raport/");
    } 
}

