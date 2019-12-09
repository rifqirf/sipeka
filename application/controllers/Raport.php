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
    }

	  public function index() {
      $this->lihat();
    }

    public function lihat() {
      $criteria = [];
      if($this->input->get("id_kelompok") != null) {
        $criteria["id_kelompok"] = $this->input->get("id_kelompok");
      } 
      // if($this->input->get("tahun_masuk") != null) {
      //   $year = $this->input->get("tahun_masuk");
      //   $nextYear = $this->input->get("tahun_masuk") + 1;
      //   echo substr($year,2,2).substr($nextYear,2,2);
      //   $criteria["no_induk"] = intval($this->input->get("tahun_masuk")).intval($this->input->get("tahun_masuk")) + 1;
      // }
      $data['raport'] = $this->raport->getAll($criteria);
      $this->load->view('template/header');
      $this->load->view('view.raport.php', $data);
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
            // $data = [
            //     "no_induk" => strtoupper($this->input->post('no_induk')),
            //     "nama_lengkap" => $this->input->post('nama_lengkap')
            // ];
            $data = $this->input->post();
            $status['operasi'] = "tambah";
            $status['code'] = $this->raport->add($data);
        }
        echo json_encode($status);
        redirect(base_url()."raport/");
    } 
}

