<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indikator_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    return $this->db->get('indikator')->result_array();
  }

  public function getById($id_indikator) {
    $this->db->where('id_indikator', $id_indikator);
    return $this->db->get('indikator')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('id_indikator', $data['id_indikator']);
    $this->db->update('indikator', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('indikator', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('id_indikator', $id);
    $this->db->delete('indikator');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}