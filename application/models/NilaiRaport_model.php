<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiRaport_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    return $this->db->get('nilai_raport')->result_array();
  }

  public function getByCriteria($criteria) {
    $this->db->where($criteria);
    return $this->db->get('nilai_raport')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('id_raport', $data['id_raport']);
    $this->db->where('id_kriteria', $data['id_kriteria']);
    $this->db->update('nilai_raport', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('nilai_raport', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  // public function delete($id) {
  //   $this->db->trans_start();
  //   $this->db->where('nilai', $id);
  //   $this->db->delete('nilai_raport');
  //   $this->db->trans_complete();
    
  //   if($this->db->trans_status() == false) {
  //     return 0;
  //   } else {
  //     return 1;
  //   }
  // }
}