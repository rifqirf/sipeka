<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Guru</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."guru/form/tambah/" ?>" >TAMBAH</a>
                </li>
              </ol>
            </nav>
            <div class="table-responsive">
              <table id="tabel-guru" class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Jabatan</th>
                    <th>Operasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach($guru as $key => $data): 
                  ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $data['nip'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['nama_jabatan'] ?></td>
                    <td>
                      <a class="btn btn-info" href="<?= base_url()."guru/form/update?id=".$data['nip'] ?>" >UPDATE</a>
                      <a class="btn btn-danger" href="<?= base_url()."guru/delete/".$data['nip'] ?>" >DELETE</a>
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