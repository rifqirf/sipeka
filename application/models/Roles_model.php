<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll($filter = []) {
    if(!empty($filter)) {
      $this->db->where($filter);
    }
    return $this->db->get('roles')->result_array();
  }
  
  public function getAllWithout($filter = []) {
    if(!empty($filter)) {
      $this->db->not_like($filter);
    }
    return $this->db->get('roles')->result_array();
  }

  public function getByRole($nama_role) {
    $this->db->where('nama_role', $nama_role);
    return $this->db->get('roles')->result_array();
  }

  public function getById($id_roles) {
    $this->db->where('id_roles', $id_roles);
    return $this->db->get('roles')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('id_roles', $data['id_roles']);
    $this->db->update('roles', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('roles', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('id_roles', $id);
    $this->db->delete('roles');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}