<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll($filter = []) {
    $this->db->join('roles', 'user.id_roles=roles.id_roles', 'left');
    if(!empty($filter)) {
      $this->db->where($filter);
    }
    return $this->db->get('user')->result_array();
  }
  
  public function getAllWithout($filter = []) {
    if(!empty($filter)) {
      $this->db->not_like($filter);
    }
    return $this->db->get('user')->result_array();
  }

  public function getByIdPass($username, $password) {
    $this->db->select('*')->join('roles', 'user.id_roles=roles.id_roles');
    $this->db->where(['username' => $username, "password" => $password, "activated" => 1]);
    return $this->db->get('user')->result_array();
  }

  public function getFiltered($filter = []) {
    $this->db->select('*')->join('roles', 'user.id_roles=roles.id_roles');
    $this->db->where($filter);
    return $this->db->get('user')->result_array();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('username', $data['username']);
    $this->db->update('user', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function add($data) {
    $this->db->trans_start();
    $this->db->insert('user', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }

  public function delete($id) {
    $this->db->trans_start();
    $this->db->where('username', $id);
    $this->db->delete('user');
    $this->db->trans_complete();
    
    if($this->db->trans_status() == false) {
      return 0;
    } else {
      return 1;
    }
  }
}