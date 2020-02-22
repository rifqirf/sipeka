<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function get($no_induk) {
    $data = [];
    $indikator = $this->db->get('indikator')->result_array();
    foreach($indikator as $k => $val) {
      $this->db->select("nama_kelompok, tahun_ajaran, semester, indikator, AVG(bobot) as rata2 ");
      // $this->db->where(['no_induk'=>$no_induk, 'id_indikator' => $val['id_indikator']]);
      $this->db->join('raport', 'raport.id_raport=nilai_raport.id_raport','left')
              ->join('kriteria', 'kriteria.id_kriteria=nilai_raport.id_kriteria','left')
              ->join('subindikator', 'subindikator.id_subindikator=kriteria.id_subindikator','left')
              ->join('indikator', 'indikator.id_indikator=subindikator.id_indikator','left')
              ->join('nilai', 'nilai.nilai=nilai_raport.nilai','left')
              ->join('siswa', 'raport.no_induk=siswa.no_induk','left')
              ->join('kelompok', 'siswa.id_kelas=kelompok.id_kelompok','left')
              ->where(["siswa.no_induk"=>$no_induk, "indikator.id_indikator"=>$val['id_indikator']]);
      array_push($data, $this->db->get('nilai_raport')->result_array()[0]);
    }

    return $data;
  }

  public function getDataPerkembangan($bobot) {
    $this->db->having("nilai.bobot", $bobot);
    $this->db->get('nilai_raport')->result_array();
  }

  public function getRaports() {
    $this->db->select('*')->join('siswa', 'siswa.no_induk=raport.no_induk', 'right')
                          ->join('kelompok', 'raport.id_kelompok=kelompok.id_kelompok', 'right');
    return $this->db->get('raport')->result_array();
  }

  public function getByCriteria($criteria) {
    $this->db->where($criteria);
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
      $this->db->having(['raport.no_induk'=> $no_induk]);
      $this->db->group_by('raport.id_raport');
    }
    // $this->db->group_by('raport.no_induk');
    $this->db->select('*')->join('siswa', 'siswa.no_induk=raport.no_induk', 'right')
                          ->join('kelompok', 'raport.id_kelompok=kelompok.id_kelompok', 'right')
                          ->join('nilai_raport', 'nilai_raport.id_raport=raport.id_raport', 'right');
    return $this->db->get('raport')->result_array();
  }
  
  public function deleteAllReport($id_raport) {

    $this->db->where('id_raport', $id_raport);
    $this->db->delete('nilai_raport');

    $this->db->where('id_raport', $id_raport);
    $this->db->delete('raport');
    
    // if($this->db->trans_status() == false) {
    //   return 0;
    // } else {
    //   return 1;
    // }
  }


  /////////////////////////////////////
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