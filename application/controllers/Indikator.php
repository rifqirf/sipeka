<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indikator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null) {
            show_404();
        }
        $this->load->model('Indikator_model', 'indikator');
    }

	  public function index() {
        $this->lihat();
    }

    public function lihat() {
        $data['indikator'] = $this->indikator->getAll();
        $this->load->view('template/header');
        $this->load->view('view.indikator.php', $data);
        $this->load->view('template/footer');
    }
    
    public function form($operasi) {
      if($operasi == 'update') {
        $id = $this->input->get('id');
        $data['indikator'] = $this->indikator->getbyId($id)[0];
      }
      $data['operasi'] = $operasi;
      $this->load->view('template/header');
      $this->load->view('form.indikator.php', $data);
      $this->load->view('template/footer');
    }

    public function update() {
        $this->form_validation->set_rules('indikator', 'Deskripsi Indikator', 'required|max_length[100]');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "id_indikator" => $this->input->post('id_indikator'),
                "indikator" => $this->input->post('indikator')
            ];
            $status['operasi'] = "update";
            $status['code'] = $this->indikator->update($data);
        }
        var_dump($this->input->post());
        echo json_encode($status);
        redirect(base_url()."indikator/");
    } 

    public function tambah() {
        $this->form_validation->set_rules('indikator', 'Deskripsi Indikator', 'required|max_length[100]');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "id_indikator" => "",
                "indikator" => $this->input->post('indikator')
            ];
            
            $status['operasi'] = "tambah";
            $status['code'] = $this->indikator->add($data);
        }
        var_dump($this->input->post());
        echo json_encode($status);
        redirect(base_url()."indikator/");
    } 

    public function delete($id) {
        $status['operasi'] = "delete";
        $status['code'] = $this->indikator->delete($id);
        // do something
        echo json_encode($status);
        redirect(base_url()."indikator/");
    }
}

