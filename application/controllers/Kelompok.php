<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->user == null && $this->session->user["nama_role"] != "admin") {
            show_404();
        }
        $this->load->model('Kelompok_model', 'kelompok');
        $this->load->model('Guru_model', 'guru');
    }

	public function index() {
        $this->lihat();
    }

    public function lihat() {
        $data['kelompok'] = $this->kelompok->getAll();
        $this->load->view('template/header');
        $this->load->view('view.kelompok.php', $data);
        $this->load->view('template/footer');
    }
    
    public function form($operasi) {
      if($operasi == 'update') {
        $id = $this->input->get('id');
        $data['kelompok'] = $this->kelompok->getbyId($id)[0];
      }
      $data['guru'] = $this->guru->getAll();
      $data['operasi'] = $operasi;
      $this->load->view('template/header');
      $this->load->view('form.kelompok.php', $data);
      $this->load->view('template/footer');
    }

    public function update() {
        $this->form_validation->set_rules('id_kelompok', 'Kode Kelas', 'required');
        $this->form_validation->set_rules('nama_kelompok', 'Kelompok', 'required');
        $this->form_validation->set_rules('nip_wlkls', 'Nomor Induk Pegawai', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "id_kelompok" => $this->input->post('id_kelompok'),
                "nama_kelompok" => $this->input->post('nama_kelompok'),
                "nip_wlkls" => $this->input->post('nip_wlkls')
            ];
            $status['operasi'] = "update";
            $status['code'] = $this->kelompok->update($data);
        }
        var_dump($this->input->post());
        echo json_encode($status);
        redirect(base_url()."kelompok/");
    } 

    public function tambah() {
        $this->form_validation->set_rules('nama_kelompok', 'Kelompok', 'required');
        $this->form_validation->set_rules('nip_wlkls', 'Nomor Induk Pegawai', 'required');
        $status = [
            "operasi" => 0,
            "code" => 0,
            'errors' => []
        ];

        if($this->form_validation->run() == FALSE) {
            array_push($status['errors'], validation_errors());
        } else {
            $data = [
                "id_kelompok" => "",
                "nama_kelompok" => $this->input->post('nama_kelompok'),
                "nip_wlkls" => $this->input->post('nip_wlkls')
            ];
            
            $status['operasi'] = "tambah";
            $status['code'] = $this->kelompok->add($data);
        }
        var_dump($this->input->post());
        echo json_encode($status);
        redirect(base_url()."kelompok/");
    } 

    public function delete($id) {
        $status['operasi'] = "delete";
        $status['code'] = $this->kelompok->delete($id);
        // do something
        var_dump($this->input->post());
        echo json_encode($status);
        redirect(base_url()."kelompok/");
    }
}
