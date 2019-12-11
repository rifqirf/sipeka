<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model("User_model", "user");
      $this->load->model("Roles_model", "roles");
      $this->load->model("Guru_model", "guru");
      $this->load->model("Siswa_model", "siswa");
    }
    
	  public function index($type = "") {
      if($type != "admin") {
        $data["user"] = "";
        $data['roles'] = $this->roles->getAllWithout(['nama_role'=>'admin']);
      } else {
        $data["user"] = "admin";
        $data['roles'] = $this->roles->getByRole("admin");
      }

      $this->load->view("form.login.php", $data);
    }
    
    public function login() {
      // var_dump($this->input->post());
      $this->form_validation->set_rules('username', 'username', 'required|alpha_dash', TRUE);
      $this->form_validation->set_rules('password', 'Password', 'required');

      $status = [
          "operasi" => 0,
          "code" => 0,
          'errors' => []
      ];

      if($this->form_validation->run() == FALSE) {
          array_push($status['errors'], validation_errors());
      } else {
        $data = [
          "username" => $this->input->post('username'),
          "password" => md5($this->input->post('password')),
          "user.id_roles" => $this->input->post('id_roles'),
        ];
        $status['operasi'] = "login";
        $result = $this->user->getFiltered($data)[0];
        if(!empty($result)) {
          $data['id_roles'] = $result['id_roles'];
          $data['nama_role'] = $result['nama_role'];
          if( $result['id_roles'] == 1 ) {
            $data['data'] = ["nama"=>"Administrator"];
          } else if( $result['id_roles'] == 2 || $result['id_roles'] == 3 || $result['id_roles'] == 4 ) {
            $data['data'] = $this->guru->getByNIP($result['username']);
          } else if( $result['id_roles'] == 5 ) {
            $data['data'] = $this->siswa->getById($result['username']);
          }
          $this->session->set_userdata('user', $data);
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

