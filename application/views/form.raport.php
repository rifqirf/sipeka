<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form <?= ucfirst($operasi) ?> Raport </h3>
          </div>
          <div class="card-body">
            <form action="<?= base_url()."raport/".$operasi ?>" method="POST" class="form-row">
              <div class="form-group col-lg-4">
                <input type="hidden" class="form-control" id="id_raport" name="id_raport" placeholder="Masukkan Nomor Statistik Raudhatul Athfal"
                  value="<?= ($raport != null) ? $raport["id_raport"] : "" ?>">
                <label for="id_kelompok">Kelompok</label>
                <select name="id_kelompok" class="form-control" id="id_kelompok">
                  <?php foreach($kelompok as $key => $val): ?>
                  <option <?= ($kelompok != null) ? "selected" : "" ?> value="<?= ($kelompok != null) ? $val["id_kelompok"] : "" ?>">
                    <?= ($kelompok != null) ? $val["nama_kelompok"] : "" ?>
                  </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-lg-4">
                <input type="hidden" class="form-control" id="nip" name="nip" placeholder="Masukkan Nomor Statistik Raudhatul Athfal"
                  value="<?= ($raport != null) ? $raport["nip"] : "" ?>">
                <label for="semester">Semester</label>
                <select name="semester" class="form-control" id="semester">
                  <?php for($sm = 1; $sm <= 2; $sm++): ?>
                  <option <?= ($kelompok != null) ? "selected" : "" ?> value="<?= ($kelompok != null) ? $sm : "" ?>">
                    <?= ($kelompok != null) ? $sm : "" ?>
                  </option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="form-group col-lg-4">
                <label for="tgl_raport">Tgl Raport</label>
                <input type="date" class="form-control" id="tgl_raport" name="tgl_raport" aria-describedby="tgl_raport" placeholder="Masukkan Nama Raudhatul Athfal"
                value="<?= ($raport != null) ? $raport["tgl_raport"] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>