<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index() {
        $data['title'] = "Home";
        $this->load->view('template/header', $data);
        $this->load->view('view.home.php');
        $this->load->view('template/footer');
    }
}

