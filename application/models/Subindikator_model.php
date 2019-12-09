<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subindikator_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    $this->db->select('*')->join('indikator', 'subindikator.id_indikator=indikator.id_indikator', 'left');
    return $this->db->get('subindikator')->result_array();
  }

  public function getById($no_subindikator) {
    $this->db->where('no_subindikator', $no_subindikator);
    return $this->db->get('subindikator')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('no_subindikator', $data['no_subindikator']);
    $this->db->update('subindikator', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('subindikator', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('no_subindikator', $id);
    $this->db->delete('subindikator');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}