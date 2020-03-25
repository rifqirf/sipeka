<?php
include APPPATH . 'third_party/fpdf/fpdf.php';

$pdf = new FPDF('p','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',10);
// mencetak string 
$pdf->Cell(190,7,'Nomor Seri : ',0,0,'C');
$pdf->Cell(0,7,'......',0,1,'C');
$sekolah = $this->db->get("sekolah")->result_array()[0];
$siswa = $this->db->where(["no_induk"=>$this->input->get('no_induk')])->get("siswa")->result_array()[0];
$pdf->Cell(0,20,' ',0,1);

$pdf->SetFont('Times','B',14);
$pdf->Cell(0,8,'LAPORAN',0,1,'C');
$pdf->Cell(0,8,'PERKEMBANGAN PESERTA DIDIK',0,1,'C');

$pdf->Cell(0,10,' ',0,1);

$pdf->SetFont('Times','B',20);
$pdf->Cell(0,15,'RA',0,1,'C');
$pdf->Cell(0,8,'RAUDHATUL ATHFAL',0,1,'C');

$pdf->Cell(0,10,' ',0,1);

$x=50;
$y=7;
$z=20;
$pdf->SetFont('Times','B',10);

$pdf->Cell($x,$y,'Nama Peserta Didik',0,0,'L');
$pdf->Cell($x,$y, ': '. $siswa['nama_lengkap'],0,1);

$pdf->Cell($x,$y,'No. Induk',0,0);
$pdf->Cell($x,$y, ': '. $siswa['no_induk'],0,1);

$pdf->Cell($x,$y,'Nama Orang Tua/Wali',0,0);
$pdf->Cell($x,$y, ': '. $siswa['nama_ayah'] ."/".$siswa['nama_ibu'],0,1);

$pdf->Cell($x,$y,'NSRA',0,0);
$pdf->Cell($x,$y, ': '. $sekolah['nsra'],0,1);

$pdf->Cell($x,$y,'Alamat',0,0);
$pdf->Cell($x,$y, ': '.$sekolah['alamat_jalan'],0,1);

$pdf->Cell($x,$y,' ',0,0);
$pdf->Cell($z,$y, '  Kec.',0,0);
$pdf->Cell($z,$y, $sekolah['alamat_kec'],0,1);

$pdf->Cell($x,$y,' ',0,0);
$pdf->Cell($z,$y, '  Kab/Kota.',0,0);
$pdf->Cell($z,$y, $sekolah['alamat_kab'],0,1);

$pdf->Cell($x,$y,' ',0,0);
$pdf->Cell($z,$y, '  Provinsi.',0,0);
$pdf->Cell($z+2,$y, $sekolah['alamat_prov'],0,0);
$pdf->Cell($z-12,$y, 'Telp. ',0,0);
$pdf->Cell($z,$y, '(0265) 836413',0,1);


$pdf->Cell(0,15,' ',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'KEMENTRIAN AGAMA',0,1,'C');
$pdf->Cell(0,8,'PROVINSI JAWA BARAT',0,1,'C');

$pdf->SetFont('Times','B',12);
$pdf->SetFont('');
$pdf->Cell(0,15,'IDENTITAS PESERTA DIDIK',0,1,'C');



$raport = $this->db->where(["id_raport"=> $this->input->get("id_raport")])->get("raport")->result_array()[0];

$pdf->SetFont('Times','B',10);
$pdf->SetFont('');
$pdf->Cell(30,8,'Nama Peserta Didik',0,0);
$pdf->Cell(45,8,': '.$siswa['nama_lengkap'],0,0);
$pdf->Cell(30,8,'Semester',0,0);
$pdf->Cell(45,8,': '.$raport["semester"],0,1);

$pdf->Cell(30,8,'Kelompok',0,0);
$pdf->Cell(45,8,': '. $this->db->where(["id_kelompok"=> $raport["id_kelompok"]])->get("kelompok")->result_array()[0]['nama_kelompok'],0,0);
$pdf->Cell(30,8,'Tahun Pelajaran',0,0);
$pdf->Cell(45,8,': '. $raport['tahun_ajaran'] ."/".($raport['tahun_ajaran']+1),0,1);

$pdf->Cell(0,8,' ',0,1);
$pdf->Cell(10,8,'NO',1,0,'C');
$pdf->Cell(95,8,'INDIKATOR TINGKAT PENCAPAIAN PERKEMBANGAN',1,0,'C');
$pdf->Cell(20,8,'NILAI',1,1,'C');
foreach($this->db->get('indikator')->result_array() as $i => $ind):
  // Indikator
  $pdf->Cell(10,8,'',1,0,'C');
  $pdf->Cell(95,8,$ind['indikator'],1,0,'L');
  $pdf->Cell(20,8,'',1,1,'C');
  
  // Subindikator
  foreach($this->db->where(['id_indikator'=> $ind['id_indikator']])->get('subindikator')->result_array() as $j => $sub):
    if(substr($sub["subindikator"], 0, 6) != "(null)"):
      $pdf->Cell(10,8,'',1,0,'C');
      $pdf->Cell(95,8,$sub['subindikator'],1,0,'L');
      $pdf->Cell(20,8,'',1,1,'C');
    endif;
    foreach($this->db->where(['id_subindikator'=> $sub['id_subindikator']])->get('kriteria')->result_array() as $k => $kri):
      $pdf->Cell(10,8,$k+1,1,0,'C');
      $pdf->Cell(95,8,$kri['kriteria'],1,0,'L');
      $nil = $this->db->select('nilai')
              ->where(["id_raport" => $this->input->get('id_raport'), 
                        "id_kriteria"=> $kri['id_kriteria']])
              ->get('nilai_raport')->result_array()[0];
      $pdf->Cell(20,8,$nil['nilai'],1,1,'C');
    endforeach;
  endforeach;
endforeach;

  


$pdf->Output();