<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    $this->db->select('*')->join('guru', 'sekolah.nip_kepsek=guru.nip', 'left');
    return $this->db->get('sekolah')->result_object();
  }

  public function getByNSRA($nsra) {
    $this->db->where('nsra', $nsra);
    return $this->db->get('sekolah')->result_object();
  }

  public function update($data) {
    $this->db->trans_start();
    $this->db->where('nsra', $data['nsra']);
    $this->db->update('sekolah', $data);
    $this->db->trans_complete();
    
    if($this->db->trans_status() == TRUE) {
      return 1;
    } else {
      return 0;
    }
  }

}