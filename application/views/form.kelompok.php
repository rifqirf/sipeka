<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form <?= ucfirst($operasi) ?> Kelompok</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."kelompok/" ?>" >KEMBALI</a>
                </li>
              </ol>
            </nav>
            <form action="<?= base_url()."kelompok/".$operasi ?>" method="POST" class="form-row">
              <div class="form-group">
                <input type="hidden" class="form-control" id="id_kelompok" name="id_kelompok" aria-describedby="id_kelompok" placeholder="Masukkan ID Kelompok"
                value="<?= (!empty($kelompok) && $operasi == "update") ? $kelompok['id_kelompok'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="nama_kelompok">Nama Kelompok</label>
                <input class="form-control" id="nama_kelompok" name="nama_kelompok" aria-describedby="nama_kelompok" placeholder="Masukkan Nama Kelompok"
                value="<?= (!empty($kelompok) && $operasi == "update") ? $kelompok['nama_kelompok'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="nip_wlkls">Wali Kelas</label>
                <select class="form-control" id="nip_wlkls" name="nip_wlkls">
                <?php 
                if(!empty($guru) || isset($kelompok['nip_wlkls'])):
                  foreach($guru as $key => $val): ?>
                  <option <?= (isset($kelompok) && ($kelompok['nip_wlkls'] == $val['nip'])) ? "selected" : "" ?> value="<?= $val["nip"] ?>">
                    <?= $val["nama"] ?>
                  </option>
                  <?php 
                  endforeach;
                endif;
                ?>
                </select>
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
