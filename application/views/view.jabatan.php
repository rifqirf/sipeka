<!-- <section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Jabatan</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?php //base_url()."jabatan/form/tambah/" ?>" >TAMBAH</a>
                </li>
              </ol>
            </nav>
            <div class="table-responsive">
              <table id="tabel-jabatan" class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th>Kode Jabatan</th>
                    <th>Nama Jabatan</th>
                    <th>Operasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  // $i = 1;
                  // foreach($jabatan as $key => $data): 
                  ?>
                  <tr>
                    <td><?php //$data['id_jabatan'] ?></td>
                    <td><?php //$data['nama_jabatan'] ?></td>
                    <td>
                      <a class="btn btn-info" href="<?php //base_url()."jabatan/form/update?id=".$data['id_jabatan'] ?>" >UPDATE</a>
                      <a class="btn btn-danger" href="<?php //base_url()."jabatan/delete/".$data['id_jabatan'] ?>" >DELETE</a>
                    </td>
                  </tr>
                  <?php 
                  //   $i++;
                  // endforeach; 
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<section class="section is-title-bar">
  <div class="level">
    <div class="level-left">
      <div class="level-item">
        <ul>
          <li>Admin</li>
          <li>Forms</li>
        </ul>
      </div>
    </div>
    <div class="level-right">
      <div class="level-item">
        <div class="buttons is-right">
        <a class="button is-success" href="<?= base_url()."siswa/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-filter"></i></span>
            <span>Filter</span>
          </a>

          <a class="button is-success" href="<?= base_url()."jabatan/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-credit-card-outline"></i></span>
            <span>Tambah</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section is-main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-add"></i></span>
          Jabatan
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
          <p>Filter</p>
        </a>
      </header>
      <div class="card-content">
        <div class="table-container">
          <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Jabatan</th>
              <th>Nama Jabatan</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php 
                  $i = 1;
                foreach($jabatan as $key => $data): 
                ?>
              <td><?= $i ?></td>
              </td>
              <td><?= $data['id_jabatan'] ?></td>
              <td><?= $data['nama_jabatan'] ?></td>
              <td>
                <div class="buttons is-right">
                  <a class="button is-small is-primary" type="button" href="<?= base_url()."jabatan/form/update?id=".$data['id_jabatan'] ?>">
                    <span class="icon"><i class="fas fa-edit"></i></span>
                  </a>
                  <a class="button is-small is-danger jb-modal" data-target="sample-modal" type="button" href="<?= base_url()."jabatan/delete/".$data['id_jabatan'] ?>">
                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                  </a>
                </div>
              </td>
            </tr>
            <?php 
              $i++;
            endforeach; 
            ?>
            </tr>
            </tbody>
          </table>
        </div>
      </div>