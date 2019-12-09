<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll($filter = []) {
    $this->db->select('*')->join('kelompok', 'raport.id_kelompok=kelompok.id_kelompok')
                          ->join('guru', 'raport.nip=guru.nip');
    if(!empty($filter)) {
      $this->db->where($filter);  
    }
    return $this->db->get('raport')->result_array();
  }

  public function getById($id_raport) {
    $this->db->where('id_raport', $id_raport);
    return $this->db->get('raport')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('id_raport', $data['id_raport']);
    $this->db->update('raport', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('raport', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('id_raport', $id);
    $this->db->delete('raport');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}