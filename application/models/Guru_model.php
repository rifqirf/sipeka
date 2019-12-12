<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    $this->db->join('jabatan', 'jabatan.id_jabatan=guru.id_jabatan','left');
    return $this->db->get('guru')->result_array();
  }

  public function getAkun($nip, $password, $id_jabatan) {
    $this->db->join('jabatan', 'jabatan.id_jabatan=guru.id_jabatan','left');
    $data = [
      'nip' => $nip,
      'password' => $password,
      'guru.id_jabatan' => $id_jabatan
    ];
    $this->db->where($data);
    return $this->db->get('guru')->result_array();
  }

  public function getKepsek() {
    $this->db->where('id_jabatan', "KPSEK");
    return $this->db->get('guru')->result_array();
  }

  public function getWaliKelas() {
    $this->db->where('id_jabatan', "WLKLS");
    return $this->db->get('guru')->result_array();
  }

  public function getByNIP($nip) {
    $this->db->where('nip', $nip);
    return $this->db->get('guru')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('nip', $data['nip']);
    $this->db->update('guru', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('guru', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('nip', $id);
    $this->db->delete('guru');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

}