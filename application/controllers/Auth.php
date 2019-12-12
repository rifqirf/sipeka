<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model("Guru_model", "guru");
      $this->load->model("Jabatan_model", "jabatan");
      $this->load->model("Siswa_model", "siswa");
    }
    
	  public function index($type = "") {
      if($type != "ortu") {
        $data['roles'] = $this->jabatan->getAll();
      } else {
        $data['roles'] = [["id_jabatan" => "ORTU", "nama_jabatan" => "Orang Tua"]];
      }

      $this->load->view("form.login.php", $data);
    }
    
    public function login() {
      // var_dump($this->input->post());
      $this->form_validation->set_rules('username', 'username', 'required|alpha_dash', TRUE);
      $this->form_validation->set_rules('password', 'Password', 'required');
      $permission = $this->input->post("id_jabatan");
      $status = [
          "operasi" => 0,
          "code" => 0,
          'errors' => []
      ];

      if($this->form_validation->run() == FALSE) {
          array_push($status['errors'], validation_errors());
      } else {
        $result = [];
        if(strtoupper($permission) == "ORTU") {
          $result = $this->siswa->getAkun($this->input->post("username"), md5($this->input->post("password")));
        } else {
          $result = $this->guru->getAkun($this->input->post("username"), md5($this->input->post("password")), $permission);
        }
        // var_dump($result);
        $status['operasi'] = "login";
        
        if(!empty($result)) {
          $data = $result[0];
          if(strtoupper($permission) == "ORTU") {
            $data["id_jabatan"] = "ORTU";
            $data["nama_jabatan"] = "Orang Tua";
          }
          $this->session->set_userdata('user', $data);
          echo json_encode($this->session->user);
          redirect(base_url()."home/");
        } else {
          redirect(base_url()."welcome/");
        }
      }
    }

    public function logout() {
      $this->session->sess_destroy();
      $this->session->unset_userdata('user');
      redirect(base_url()."welcome");
    }
}

