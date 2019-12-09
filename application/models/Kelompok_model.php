<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    $this->db->join('guru', 'guru.nip=kelompok.nip_wlkls','left');
    return $this->db->get('kelompok')->result_array();
  }

  public function getById($id_kelompok) {
    $this->db->where('id_kelompok', $id_kelompok);
    return $this->db->get('kelompok')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('id_kelompok', $data['id_kelompok']);
    $this->db->update('kelompok', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('kelompok', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('id_kelompok', $id);
    $this->db->delete('kelompok');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

}