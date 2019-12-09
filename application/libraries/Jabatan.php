<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan {
    
    private $id_jabatan, $nama_jabatan;

    public function __construct($id_jabatan) {
        $this->load->model('Jabatan_model', 'model');
    }

    public function getNIP() {
        return $this->nip;
    }

    public function setNIP($nip) {
        $this->nip = $nip;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

}