<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll($filter = []) {
    $this->db->where($filter);
    $this->db->select('*')->join('subindikator', 'kriteria.id_subindikator=subindikator.id_subindikator')
                          ->join('kelompok', 'kriteria.id_kelompok=kelompok.id_kelompok');
    return $this->db->get('kriteria')->result_array();
  }

  public function getById($id_kriteria) {
    $this->db->where('id_kriteria', $id_kriteria);
    return $this->db->get('kriteria')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('id_kriteria', $data['id_kriteria']);
    $this->db->update('kriteria', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('kriteria', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('id_kriteria', $id);
    $this->db->delete('kriteria');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}