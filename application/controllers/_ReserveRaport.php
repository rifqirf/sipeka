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
      $this->load->model('NilaiRaport_model', 'nilai_raport');

      $this->load->model('Indikator_model', 'indikator');
      $this->load->model('Subindikator_model', 'subindikator');
    }

	  public function index() {
      $this->form();
    }

    public function nilai() {
      $data['operasi'] = "Pengisian";
      $data['filter'] = $this->input->get();
      $data['tahunAjaran'] = range(2019, 2000);
      $data['semester'] = range(1, 2);
      $data['siswa'] = $this->siswa->getById($data['filter']['no_induk']);
      $data['kelompok'] = $this->kelompok->getById($data['filter']['id_kelompok']);
      $fil = [
        "no_induk" => $this->input->get("no_induk"),
        "raport.id_kelompok" => $this->input->get("id_kelompok"),
        "semester" => $this->input->get("semester"),
        "tahun_ajaran" => $this->input->get("tahun_ajaran"),
      ];
      $data['nilaiRaport'] = $this->nilai_raport->getAll($fil);

      var_dump($data['nilaiRaport']);

      $this->load->view('template/header');
      $this->load->view('form.nilai2.php', $data);
      $this->load->view('template/footer');
    }
    
    public function form($operasi = "tambah") {
      
      $data['operasi'] = $operasi;
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
        // redirect(base_url()."raport/");
    }

    public function isiRaport() {
      $data = $this->input->get();
      $raport = [
        "no_induk" => $data["no_induk"],
        "id_kelompok" => $data["id_kelompok"],
        "semester" => $data["semester"],
        "tahun_ajaran" => $data["tahun_ajaran"]
      ];
      $res = $this->raport->getByCriteria($raport);

      var_dump($res);
      if(empty($res)) {
        $raport['id_raport'] = "";
        $this->raport->add($raport);
        $dataRaport = $this->raport->getByCriteria($raport);
      } else {
        $dataRaport = $res;
      }
      var_dump($dataRaport[0]["id_raport"]);
      $nilaiRaport = [];
      // var_dump($data);
      foreach($data as $key => $val) {
        // echo $key;
        if(strpos($key, "krit_") !== false && !empty($val)) {
          $k = str_replace("krit_", "", $key);
          array_push($nilaiRaport, ['id_raport' => $dataRaport[0]["id_raport"], 'id_kriteria' => $k, "nilai" => $val]);
        }
      }
      var_dump($nilaiRaport);
      
      foreach($nilaiRaport as $key => $val) {
        $res = $this->nilai_raport->getByCriteria(["id_raport" => $val['id_raport'], "id_kriteria" => $val['id_kriteria']]);
        if(empty($res)) {
          $this->nilai_raport->add($val);
        } else {
          $this->nilai_raport->update($val);
        }
      }

      redirect(base_url().'raport/');
      
    }
}

