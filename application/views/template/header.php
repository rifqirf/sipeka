<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Perkembangan Nilai Anak</title>
  <!-- style sheet -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bulma/css/style.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bulma/css/fontawesome.css"/>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bulma/css/all.css"/>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bulma/css/main.css"/>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bulma/css/main.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  
</head>
<body>
<div id="app">
  <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
      <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
      </a>
      <div class="navbar-item">
        <div class="control"><input placeholder="Search everywhere..." class="input"></div>
      </div>
    </div>
    <div class="navbar-brand is-right">
      <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
      </a>
    </div>
    <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
          <a class="navbar-link is-arrowless">
            <div class="is-user-avatar">
              <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe">
            </div>
            <div class="is-user-name"><span><?= (strtoupper($this->session->user["id_jabatan"]) == "ORTU") ? strtoupper($this->session->user["nama_lengkap"]) : strtoupper($this->session->user["nama"]) ?></span></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
          </a>
          <div class="navbar-dropdown">
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              <span>My Profile</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-settings"></i></span>
              <span>Settings</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-email"></i></span>
              <span>Messages</span>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" href="<?= base_url()."auth/logout/" ?>">
              <span class="icon"><i class="mdi mdi-logout"></i></span>
              <span>Log Out</span>
            </a>
          </div>
        </div>
        <a href="https://justboil.me/bulma-admin-template/one" title="About" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
          <span>About</span>
        </a>
        <a title="Log out" class="navbar-item is-desktop-icon-only" href="<?= base_url()."auth/logout/" ?>">
          <span class="icon"><i class="mdi mdi-logout"></i></span>
          <span>Log out</span>
        </a>
      </div>
    </div>
  </nav>

  <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>SIPEKA</b></span>
      </div>
    </div>
    <div class="menu is-menu-main">
      <ul class="menu-list">
        <li>
          <a href="<?= base_url(); ?>home/" class="is-active router-link-active has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Menu</p>
      <ul class="menu-list">
      <?php if($this->session->user != null): ?>
        <li>
          <a href="<?= base_url(); ?>raport/" class="has-icon">
            <span class="icon has-update-mark"><i class="fas fa-file-alt"></i></span>
            <span class="menu-item-label">Raport</span>
          </a>
          <?php if($this->session->user['id_jabatan'] == "STFTU" || $this->session->user['id_jabatan'] == "ADMIN"): ?>  
        </li>
        <li>
          <a href="<?= base_url(); ?>siswa/" class="has-icon ">
            <span class="icon"><i class="fas fa-child"></i></span>
            <span class="menu-item-label">Siswa</span>
          </a>
        </li>
        <?php endif; ?>
        <?php if($this->session->user['id_jabatan'] == "ADMIN"): ?>  
        <li>
          <a href="<?= base_url(); ?>kelompok/" class="has-icon">
            <span class="icon"><i class="fas fa-users"></i></span>
            <span class="menu-item-label">Kelompok</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url(); ?>guru/" class="has-icon has-icon">
            <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
            <span class="menu-item-label">Guru</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url(); ?>jabatan/" class="has-icon has-icon">
            <span class="icon"><i class="fas fa-user-tie"></i></span>
            <span class="menu-item-label">Jabatan</span>
          </a>
          <?php endif; ?>
          <?php if($this->session->user['id_jabatan'] == "WLKLS" || $this->session->user['id_jabatan'] == "ADMIN"): ?>  
        </li>
        <li>
          <a href="<?= base_url(); ?>indikator/" class="has-icon has-icon">
            <span class="icon"><i class="fas fa-chart-line"></i></span>
            <span class="menu-item-label">Indikator</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url(); ?>subindikator/" class="has-icon has-dropdown-icon">
            <span class="icon"><i class="fas fa-chart-bar"></i></span>
            <span class="menu-item-label">Subindikator</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url(); ?>kriteria/" class="has-icon has-dropdown-icon">
            <span class="icon"><i class="fas fa-chart-bar"></i></span>
            <span class="menu-item-label">Kriteria</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url(); ?>pengaturan/" class="has-icon has-dropdown-icon">
            <span class="icon"><i class="fas fa-cog"></i></span>
            <span class="menu-item-label">Pengaturan</span>
          </a>
        </li>
      <?php 
      endif;
      endif;
      ?>
      </ul>
    </div>
  </aside>

  

  