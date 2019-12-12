<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null && $this->session->user["nama_role"] != "admin" && $this->session->user["nama_role"] != "guru") {
            show_404();
        }
        $this->load->model('Kriteria_model', 'kriteria');
        $this->load->model('Subindikator_model', 'subindikator');
    }

	  public function index() {
        $this->lihat();
    }

    public function lihat() {
        $data['kriteria'] = $this->kriteria->getAll();
        $this->load->view('template/header');
        $this->load->view('view.kriteria.php', $data);
        $this->load->view('template/footer');
    }
    
    public function form($operasi) {
      if($operasi == 'update') {
        $id = $this->input->get('id');
        $data['kriteria'] = $this->kriteria->getbyId($id)[0];
      }
      $data['subindikator'] = $this->subindikator->getAll();
      $data['operasi'] = $operasi;
      $this->load->view('template/header');
      $this->load->view('form.kriteria.php', $data);
      $this->load->view('template/footer');
    }

    public function update() {
        $this->form_validation->set_rules('kriteria', 'Deskripsi Subindikator', 'required');
        $this->form_validation->set_rules('id_subindikator', 'ID Subindikator', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "id_kriteria" => $this->input->post('id_kriteria'),
                "kriteria" => $this->input->post('kriteria'),
                "id_subindikator" => $this->input->post('id_subindikator')
            ];
            $status['operasi'] = "update";
            $status['code'] = $this->kriteria->update($data);
        }
        var_dump($this->input->post());
        echo json_encode($status);
        redirect(base_url()."kriteria/");
    } 

    public function tambah() {
        $this->form_validation->set_rules('kriteria', 'Deskripsi Subindikator', 'required');
        $this->form_validation->set_rules('id_subindikator', 'ID Subindikator', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "id_kriteria" => "",
                "kriteria" => $this->input->post('kriteria'),
                "id_subindikator" => $this->input->post('id_subindikator')
            ];
            $status['operasi'] = "tambah";
            $status['code'] = $this->kriteria->add($data);
        }
        var_dump($this->input->post());
        echo json_encode($status);
        redirect(base_url()."kriteria/");
    } 

    public function delete($id) {
        $status['operasi'] = "tambah";
        $status['code'] = $this->kriteria->delete($id);
        // do something
        echo json_encode($status);
        redirect(base_url()."kriteria/");
    }
}
