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

  public function getById($id_subindikator) {
    $this->db->where('id_subindikator', $id_subindikator);
    return $this->db->get('subindikator')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('id_subindikator', $data['id_subindikator']);
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
    $this->db->where('id_subindikator', $id);
    $this->db->delete('subindikator');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}