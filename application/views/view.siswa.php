<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Siswa</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."siswa/form/tambah/" ?>" >TAMBAH</a>
                </li>
              </ol>
            </nav>
            <div class="table-responsive">
              <table id="tabel-siswa" class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nomor Induk</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Operasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach($siswa as $key => $data): 
                  ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $data['no_induk'] ?></td>
                    <td><?= $data['nama_lengkap'] ?></td>
                    <td><?= $data['jk'] ?></td>
                    <td><?= $data['nama_ayah'] ?></td>
                    <td><?= $data['nama_ibu'] ?></td>
                    <td>
                      <a class="btn btn-info" href="<?= base_url()."siswa/form/update?id=".$data['no_induk'] ?>" >UPDATE</a>
                      <a class="btn btn-danger" href="<?= base_url()."siswa/delete/".$data['no_induk'] ?>" >DELETE</a>
                    </td>
                  </tr>
                  <?php 
                    $i++;
                  endforeach; 
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section is-main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Clients
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <div class="table-container">
          <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
            <thead>
            <tr>
              <th>No</th>
              <th>No Induk</th>
              <th>Nama Lengkap</th>
              <th>Jenis Kelamin</th>
              <th>Nama Ayah</th>
              <th>Nama Ibu</th>
              <th>Operasi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php 
                  $i = 1;
                  foreach($siswa as $key => $data): 
                  ?>
              <td><?= $i ?></td>
              </td>
              <!-- <td class="">
                <div class="image">
                  <img src="https://avatars.dicebear.com/v2/initials/juliet-muller.svg" class="is-rounded">
                </div>
              </td> -->
              <td class="cell-image"><?= $data['no_induk'] ?></td>
              <td><?= $data['nama_lengkap'] ?></td>
              <td><?= $data['jk'] ?></td>
              <td><?= $data['nama_ayah'] ?></td>
              <td><?= $data['nama_ibu'] ?></td>
              <td>
                <div class="buttons is-right">
                  <a class="button is-small is-primary" type="button" href="<?= base_url()."siswa/form/update?id=".$data['no_induk'] ?>">
                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                  </a>
                  <a class="button is-small is-danger jb-modal" data-target="sample-modal" type="button" href="<?= base_url()."siswa/delete/".$data['no_induk'] ?>" >
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