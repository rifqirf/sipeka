<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    $this->db->order_by('nama_lengkap');
    $this->db->select('*')->join('kelompok', 'siswa.id_kelas=kelompok.id_kelompok');
    return $this->db->get('siswa')->result_array();
  }

  public function getJumlahSiswa($prefix) {
    $this->db->like('no_induk', $prefix);
    return count($this->db->get('siswa')->result_array());
  }

  public function getByCriteria($criteria) {
    $this->db->select('*')->join('kelompok', 'siswa.id_kelas=kelompok.id_kelompok');
    $this->db->where($criteria);
    return $this->db->get('siswa')->result_array();
  }

  public function getById($no_induk) {
    $this->db->where("no_induk", $no_induk);
    return $this->db->get('siswa')->result_array();
  }

  public function getAkun($no_induk, $password) {
    $data = [
      'no_induk' => $no_induk,
      'password' => $password
    ];
    $this->db->where($data);
    return $this->db->get('siswa')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('no_induk', $data['no_induk']);
    $this->db->update('siswa', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('siswa', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('no_induk', $id);
    $this->db->delete('siswa');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}