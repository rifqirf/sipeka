<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null) {
            show_404();
        }
        $this->load->model('Raport_model', 'raport');
    }

    public function index() {
        // var_dump($this->session->user['id_jabatan']);
        $data["raport"] = $this->raport->getAllRaport();
        //
        if($this->session->user['id_jabatan'] == "ORTU") {
            $data["raport"] = $this->raport->getAllRaport($this->session->user['username']);
        }
        // var_dump($data);
        $this->load->view('template/header');
        $this->load->view('view.raport.php', $data);
        $this->load->view('template/footer');
    }

}