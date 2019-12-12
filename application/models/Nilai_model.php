<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    return $this->db->get('nilai')->result_array();
  }

  public function getById($nilai) {
    $this->db->where('nilai', $nilai);
    return $this->db->get('nilai')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('nilai', $data['nilai']);
    $this->db->update('nilai', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('nilai', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('nilai', $id);
    $this->db->delete('nilai');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}