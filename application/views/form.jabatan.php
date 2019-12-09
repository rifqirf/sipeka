<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form <?= ucfirst($operasi) ?> Jabatan</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."jabatan/" ?>" >KEMBALI</a>
                </li>
              </ol>
            </nav>
            <form action="<?= base_url()."jabatan/".$operasi ?>" method="POST" class="form-row">
              <div class="form-group col-lg-12">
                <label for="id_jabatan">ID Jabatan</label>
                <input type="text" class="form-control" id="id_jabatan" name="id_jabatan" placeholder="Masukkan Kode Jabatan"
                value="<?= (!empty($jabatan) && $operasi == "update") ? $jabatan['id_jabatan'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="nama_jabatan">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" aria-describedby="nama_jabatan" 
                placeholder="Masukkan Nama Jabatan" value="<?= (!empty($jabatan) && $operasi == "update") ? $jabatan['nama_jabatan'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <button type="submit" name="submit" class="btn btn-primary"><?= strtoupper($operasi) ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
