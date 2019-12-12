<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    $this->db->order_by('id_jabatan', "DESC");
    return $this->db->get('jabatan')->result_array();
  }

  public function getById($id_jabatan) {
    $this->db->where('id_jabatan', $id_jabatan);
    return $this->db->get('jabatan')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('id_jabatan', $data['id_jabatan']);
    $this->db->update('jabatan', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('jabatan', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('id_jabatan', $id);
    $this->db->delete('jabatan');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}