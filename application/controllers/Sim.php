<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sim extends CI_Controller {

    public function __construct() {
      parent::__construct();
      if($this->session->user == null && $this->session->user["nama_role"] != "admin" && $this->session->user["nama_role"] != "guru" && $this->session->user["nama_role"] != "orang tua") {
        show_404();
      }
    }

    public function index() {
      $data['siswa'] = $this->db->get('siswa')->result_array();
      $this->load->view('sim/index', $data);
    }
}

