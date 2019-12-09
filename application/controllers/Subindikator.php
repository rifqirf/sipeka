<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subindikator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null && $this->session->user["nama_role"] != "admin" && $this->session->user["nama_role"] != "guru") {
            show_404();
        }
        $this->load->model('Subindikator_model', 'subindikator');
        $this->load->model('Indikator_model', 'indikator');
    }

	  public function index() {
        $this->lihat();
    }

    public function lihat() {
        $data['subindikator'] = $this->subindikator->getAll();
        $this->load->view('template/header');
        $this->load->view('view.subindikator.php', $data);
        $this->load->view('template/footer');
    }
    
    public function form($operasi) {
      if($operasi == 'update') {
        $id = $this->input->get('id');
        $data['subindikator'] = $this->subindikator->getbyId($id)[0];
      }
      $data['indikator'] = $this->indikator->getAll();
      $data['operasi'] = $operasi;
      $this->load->view('template/header');
      $this->load->view('form.subindikator.php', $data);
      $this->load->view('template/footer');
    }

    public function update() {
        $this->form_validation->set_rules('sub_deskripsi', 'Deskripsi Subindikator', 'required');
        $this->form_validation->set_rules('id_indikator', 'ID Indikator', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "no_subindikator" => $this->input->post('no_subindikator'),
                "sub_deskripsi" => $this->input->post('sub_deskripsi'),
                "id_indikator" => $this->input->post('id_indikator')
            ];
            $status['operasi'] = "update";
            $status['code'] = $this->subindikator->update($data);
        }
        echo json_encode($status);
        redirect(base_url()."subindikator/");
    } 

    public function tambah() {
        $this->form_validation->set_rules('sub_deskripsi', 'Deskripsi Subindikator', 'required');
        $this->form_validation->set_rules('id_indikator', 'ID Indikator', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "no_subindikator" => "",
                "sub_deskripsi" => $this->input->post('sub_deskripsi'),
                "id_indikator" => $this->input->post('id_indikator')
            ];
            
            $status['operasi'] = "tambah";
            $status['code'] = $this->subindikator->add($data);
        }
        echo json_encode($status);
        redirect(base_url()."subindikator/");
    } 

    public function delete($id) {
        $status['operasi'] = "tambah";
        $status['code'] = $this->subindikator->delete($id);
        // do something
        echo json_encode($status);
        redirect(base_url()."subindikator/");
    }
}
