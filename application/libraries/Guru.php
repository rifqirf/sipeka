<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Guru {
    
    private $nip, $nama, $jabatan, $telp;

    public function __construct($data) {
        $this->load->model('Guru_model', 'model');
        $this->nip = $data['nip'];
        $this->nama = $data['nama'];
        $this->jabatan = $data['id_jabatan'];
        $this->telp = $data['telp'];
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