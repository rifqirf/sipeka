<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah {
    
    private $nsra, $nama, $alamat_jalan, $alamat_kec, $alamat_kab, $alamat_prov, $kepsek;

    // public function __construct($nsra = "", $nama = "", $alamat_jalan = "", $alamat_kec = "", $alamat_kab = "", $alamat_prov = "", $kepsek = null) {
    public function __construct($data) {
      $this->nsra = $data['nsra'];
      $this->nama = $data['nama'];
      $this->alamat_jalan = $data['alamat_jalan'];
      $this->alamat_kec = $data['alamat_kec'];
      $this->alamat_kab = $data['alamat_kab'];
      $this->alamat_prov = $data['alamat_prov'];
      $this->nama_kepsek = $data['nama_kepsek'];
    }
    
}