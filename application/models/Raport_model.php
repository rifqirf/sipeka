<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function getRaports() {
    $this->db->select('*')->join('siswa', 'siswa.no_induk=raport.no_induk', 'right')
                          ->join('kelompok', 'raport.id_kelompok=kelompok.id_kelompok', 'right');
    return $this->db->get('raport')->result_array();
  }

  public function getAll() {
    $this->db->select('*')->join('siswa', 'siswa.no_induk=raport.no_induk', 'right')
                          ->join('kelompok', 'raport.id_kelompok=kelompok.id_kelompok', 'right')
                          ->join('nilai_raport', 'nilai_raport.id_raport=raport.id_raport', 'right'); 
    return $this->db->get('raport')->result_array();
  }

  public function getAllRaport($no_induk = "") {
    if(!empty($no_induk)) {
      $this->db->where(['raport.no_induk'=> $no_induk]);
    }
    // $this->db->group_by('raport.no_induk');
    $this->db->select('*')->join('siswa', 'siswa.no_induk=raport.no_induk', 'right')
                          ->join('kelompok', 'raport.id_kelompok=kelompok.id_kelompok', 'right')
                          ->join('nilai_raport', 'nilai_raport.id_raport=raport.id_raport', 'right');
    return $this->db->get('raport')->result_array();
  }
  
  public function deleteAllReport($id_raport) {
    // $this->db->trans_start();

    $this->db->where('id_raport', $id_raport);
    $this->db->delete('nilai_raport');
    
    // $this->db->trans_complete();
    
    // if($this->db->trans_status() == false) {
    //   return 0;
    // } else {
    //   return 1;
    // }
  }


  /////////////////////////////////////
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

/*
SELECT siswa.no_induk, siswa.nama_lengkap, raport.id_raport, raport.semester, raport.tahun_ajaran, nilai_raport.id_kriteria, nilai_raport.nilai FROM raport 
RIGHT JOIN siswa ON siswa.no_induk=raport.no_induk 
RIGHT JOIN nilai_raport ON raport.id_raport=nilai_raport.id_raport
GROUP BY siswa.no_induk
HAVING siswa.no_induk = '1213-A-002';


SELECT siswa.no_induk, siswa.nama_lengkap, raport.id_raport, raport.id_kelompok, raport.semester, raport.tahun_ajaran, nilai_raport.id_kriteria, nilai_raport.nilai FROM raport 
RIGHT JOIN siswa ON siswa.no_induk=raport.no_induk
RIGHT JOIN kelompok ON raport.id_kelompok = kelompok.id_kelompok
RIGHT JOIN nilai_raport ON raport.id_raport=nilai_raport.id_raport
GROUP BY siswa.no_induk
HAVING siswa.no_induk = '1213-A-002';

*/