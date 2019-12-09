<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Kelompok Belajar</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."kelompok/form/tambah/" ?>" >TAMBAH</a>
                </li>
              </ol>
            </nav>
            <div class="table-responsive">
              <table id="tabel-kelompok" class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Kelompok</th>
                    <th>Wali Kelas</th>
                    <th>Operasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach($kelompok as $key => $data): 
                  ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $data['nama_kelompok'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td>
                      <a class="btn btn-info" href="<?= base_url()."kelompok/form/update?id=".$data['id_kelompok'] ?>" >UPDATE</a>
                      <a class="btn btn-danger" href="<?= base_url()."kelompok/delete/".$data['id_kelompok'] ?>" >DELETE</a>
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