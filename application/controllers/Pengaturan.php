<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null && $this->session->user["nama_role"] != "admin") {
          show_404();
        }
        $this->load->model('Sekolah_model', 'sekolah');
        $this->load->model('Guru_model', 'guru');
    }
    
	public function index() {
        $this->lihat();
    }

    public function lihat() {
        $data['sekolah'] = $this->sekolah->getAll()[0];
        $data['guru'] = $this->guru->getAll();
        $this->load->view('template/header');
        $this->load->view('view.pengaturan.php', $data);
        $this->load->view('template/footer');
    }
    
    public function update() {
      $data = [
        "nsra" => $this->input->post('nsra'),
        "nama_ra" => $this->input->post('nama_ra'),
        "alamat_jalan" => $this->input->post('alamat_jalan'),
        "alamat_kec" => $this->input->post('alamat_kec'),
        "alamat_kab" => $this->input->post('alamat_kab'),
        "alamat_prov" => $this->input->post('alamat_prov'),
        "nip_kepsek" => $this->input->post('nip_kepsek')
      ];
      $status['operasi'] = 'update';
      $status['code'] = $this->sekolah->update($data);
      // do something for response
      redirect(base_url()."pengaturan");
    }
}

