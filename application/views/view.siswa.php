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