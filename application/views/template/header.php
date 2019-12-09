<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <title>Hello</title>
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/dataTables.bootstrap4.min.css">

</head>
<body >

<div class="topnav">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <a class="navbar-brand" href="<?= base_url(); ?>">SIPEKA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if($this->session->user != null): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>raport/">Raport</a>
      </li>
      <?php if($this->session->user['id_roles'] == 4 || $this->session->user['id_roles'] == 1): ?>  
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>siswa/">Siswa</a>
      </li>
      <?php endif; ?>
      <?php if($this->session->user['id_roles'] == 1): ?>  
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>kelompok/">Kelompok</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>guru/">Guru</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>jabatan/">Jabatan</a>
      </li>
      <?php endif; ?>
      <?php if($this->session->user['id_roles'] == 2 || $this->session->user['id_roles'] == 1): ?>  
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>indikator/">Indikator</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>subindikator/">Subindikator</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>pengaturan/">Pengaturan</a>
      </li>
      <?php endif; ?>
    </ul>
    
    <div class="my-2 my-lg-0">
      <button class="btn btn-outline-info my-2 my-sm-0">
        <?= strtoupper($this->session->user["id_roles"])?>
      </button>
      <a class="btn btn-danger my-2 my-sm-0" href="<?= base_url()."auth/logout/" ?>">
        LOGOUT
      </a>
    </div>
    <?php endif; ?>
  </div>
</nav>
</div>