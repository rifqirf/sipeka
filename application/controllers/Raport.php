<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null) {
            show_404();
        }
        $this->load->model('Raport_model', 'raport');
        
        $this->load->model('Kelompok_model', 'kelompok');
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Nilai_model', 'nilai');
        $this->load->model('NilaiRaport_model', 'nilai_raport');

    }

    public function index() {
      
        // var_dump($this->session->user);
        $data["raport"] = $this->raport->getRaports();
        
        if($this->session->user['id_jabatan'] == "ORTU") {
            $data["raport"] = $this->raport->getAllRaport($this->session->user['no_induk']);
        }
        // var_dump($data["raport"][3]);

        $this->load->view('template/header');
        $this->load->view('view.raport.php', $data);
        $this->load->view('template/footer');
    }

    public function form($operasi="tambah") {
        $data['operasi'] = $operasi;
        if(!empty($this->input->get())) {
            $data["old"] = $this->input->get();
        }
        $data['kelompok'] = $this->kelompok->getAll();
        $data['siswa'] = $this->siswa->getAll();
        
        $this->load->view('template/header');
        $this->load->view('form.raport.php', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $d = $this->input->get();
        $data = [
            "raport.id_kelompok" => $d["id_kelompok"],
            "raport.no_induk" => $d["no_induk"],
            "raport.semester" => $d["semester"],
            "raport.tahun_ajaran" => $d["tahun_ajaran"],
        ];
        $res = $this->raport->getByCriteria($data);
        // var_dump($res);
        if(empty($res)) {
            $res = $this->raport->add($data);
        }
        // var_dump($res);
        redirect(base_url()."raport/");
    }

    public function isi($operasi = "tambah") {
        
        $data['operasi'] = $operasi;
        $data['data'] = $this->input->get();
        $data['siswa'] = $this->siswa->getAll();
        $data['nilai'] = $this->nilai->getAll();

        $data['isi'] = $this->nilai_raport->getAllNilai($data['data']['id_raport']);
        // var_dump($data['isi']);

        $this->load->view('template/header');
        $this->load->view('form.nilai2.php', $data);
        $this->load->view('template/footer');

    }

    public function doIsi() {
      $data = $this->input->get();
    //   $dataRaport = $this->raport->getByCriteria($data['id_raport']);
      $nilaiRaport = [];
      // var_dump($data);
      foreach($data as $key => $val) {
        // echo $key;
        if(strpos($key, "krit_") !== false && !empty($val)) {
          $k = str_replace("krit_", "", $key);
          array_push($nilaiRaport, ['id_raport' => $data['id_raport'], 'id_kriteria' => $k, "nilai" => $val]);
        }
      }
    //   var_dump($nilaiRaport);
      
      foreach($nilaiRaport as $key => $val) {
        $res = $this->nilai_raport->getByCriteria(['id_raport' => $val['id_raport'], 'id_kriteria' => $val['id_kriteria']]);
        if(empty($res)) {
          $this->nilai_raport->add($val);
        } else {
          $this->nilai_raport->update($val);
        }
      }

      redirect(base_url().'raport/');
    }

    public function update() {
        $data = $this->input->get();

        $res = $this->raport->update($data);
        var_dump($res);
    }

    public function delete() {
        $data = $this->input->get();
        $res = $this->raport->deleteAllReport($data['id_raport']);
        var_dump($res);
        // redirect(base_url()."raport/");
    }

    public function grafik() {
        
        $data['data'] = $this->input->get();
        $filter = [
            "raport.no_induk" => $this->input->get("no_induk"),
            "raport.id_kelompok" => $this->input->get("id_kelompok"),
            "raport.semester" => $this->input->get("semester"),
            "raport.tahun_ajaran" => $this->input->get("tahun_ajaran"),
        ];
        $data['r'] = $this->raport->getByCriteria($filter);
        // var_dump($data['data']);
        $data['raport'] = $this->raport->getByCriteria(["siswa.no_induk"=>$data['data']['no_induk']])[0];
        $data['grafik'] = $this->raport->get($data['data']['no_induk']);
        $data['kepsek'] = $this->guru->getKepsek();
        $data['isi'] = $this->nilai_raport->getAllNilai($data['data']['id_raport']);
        // var_dump($data['isi']);

        $this->load->view('template/header');
        $this->load->view('view.grafik.php', $data);
        $this->load->view('template/footer');

    }

    public function pengesahan() {
      $data = $this->input->get();

      $res = $this->raport->update($data);

      var_dump($res);

    }

    public function getGrafikValue($no_induk) {
        $data = $this->raport->get($no_induk);
        header('Content-type: application/json');
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        echo json_encode($data);
    }


}