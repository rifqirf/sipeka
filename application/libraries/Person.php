<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person {

    private $nama,
            $jk,
            $tmp_lahir,
            $tgl_lahir,
            $alamat;

    public function __construct($nama = "", $jk = "", $tmp_lahir = "", $tgl_lahir = "", $alamat = "") {
        $this->nama = $nama;
        $this->jk = $jk;
        $this->tmp_lahir = $tmp_lahir;
        $this->tgl_lahir = $tgl_lahir;
        $this->alamat = $alamat;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getJk() {
        return $this->jk;
    }

    public function setJk($jk) {
        $this->jk = $jk;
    }

    public function getTempatLahir() {
        return $this->tmp_lahir;
    }

    public function setTempatLahir($tmp_lahir) {
        $this->tmp_lahir = $tmp_lahir;
    }

    public function getTanggalLahir() {
        return $this->tgl_lahir;
    }

    public function setTanggalLahir($tgl_lahir) {
        $this->tgl_lahir = $tgl_lahir;
    }

}