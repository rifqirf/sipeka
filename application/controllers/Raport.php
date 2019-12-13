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

    }

    public function index() {
        // var_dump($this->session->user['id_jabatan']);
        $data["raport"] = $this->raport->getRaports();
        
        if($this->session->user['id_jabatan'] == "ORTU") {
            $data["raport"] = $this->raport->getAllRaport($this->session->user['username']);
        }

        $this->load->view('template/header');
        $this->load->view('view.raport.php', $data);
        $this->load->view('template/footer');
    }

    public function delete() {
        $data = $this->input->get();
        $res = $this->raport->deleteAllReport($data['no_induk']);
        
        redirect(base_url('raport'));
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
        $data = $this->input->get();

        $res = $this->raport->add($data);
        var_dump($res);
    }

    public function update() {
        $data = $this->input->get();

        $res = $this->raport->update($data);
        var_dump($res);
    }

}