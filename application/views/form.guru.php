<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form <?= ucfirst($operasi) ?> Guru</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."guru/" ?>" >KEMBALI</a>
                </li>
              </ol>
            </nav>
            <form action="<?= base_url()."guru/".$operasi ?>" method="POST" class="form-row">
              <div class="form-group col-lg-12">
                <label for="nip">NIP</label>
                <input class="form-control" id="nip" name="nip" aria-describedby="nip" placeholder="Masukkan Nomor Induk Pegawai"
                value="<?= (!empty($guru) && $operasi == "update") ? $guru['nip'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="nama">Nama Guru</label>
                <input class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Masukkan Nama Lengkap"
                value="<?= (!empty($guru) && $operasi == "update") ? $guru['nama'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="id_jabatan">Jabatan</label>
                <select class="form-control" id="id_jabatan" name="id_jabatan">
                <?php 
                if(!empty($jabatan) || isset($guru['id_jabatan'])):
                  foreach($jabatan as $key => $val): ?>
                  <option <?= ($guru['id_jabatan'] == $val['id_jabatan']) ? "selected" : "" ?> value="<?= $val["id_jabatan"] ?>">
                    <?= $val["nama_jabatan"] ?>
                  </option>
                  <?php 
                  endforeach;
                endif;
                ?>
                </select>
              </div>
              <div class="form-group col-lg-12">
                <label for="telp">No. HP</label>
                <input class="form-control" id="telp" name="telp" aria-describedby="telp" placeholder="Masukkan Nomor Handphone"
                value="<?= (!empty($guru) && $operasi == "update") ? $guru['telp'] : "" ?>">
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
