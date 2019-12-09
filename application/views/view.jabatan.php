<section class="pengaturan mt-4">
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
                  <a class="btn btn-success" href="<?= base_url()."jabatan/form/tambah/" ?>" >TAMBAH</a>
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
                  $i = 1;
                  foreach($jabatan as $key => $data): 
                  ?>
                  <tr>
                    <td><?= $data['id_jabatan'] ?></td>
                    <td><?= $data['nama_jabatan'] ?></td>
                    <td>
                      <a class="btn btn-info" href="<?= base_url()."jabatan/form/update?id=".$data['id_jabatan'] ?>" >UPDATE</a>
                      <a class="btn btn-danger" href="<?= base_url()."jabatan/delete/".$data['id_jabatan'] ?>" >DELETE</a>
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