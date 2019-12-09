<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Indikator</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."indikator/form/tambah/" ?>" >TAMBAH</a>
                </li>
              </ol>
            </nav>
            <div class="table-responsive">
              <table id="tabel-indikator" class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Deskripsi Indikator</th>
                    <th>Operasi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $i = 1;
                foreach($indikator as $key => $data): 
                ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?= $data['deskripsi'] ?></td>
                  <td>
                    <a class="btn btn-info" href="<?= base_url()."indikator/form/update?id=".$data['id_indikator'] ?>" >UPDATE</a>
                    <a class="btn btn-danger" href="<?= base_url()."indikator/delete/".$data['id_indikator'] ?>" >DELETE</a>
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