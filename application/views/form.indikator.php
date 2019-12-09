<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form <?= ucfirst($operasi) ?> Indikator</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."indikator/" ?>" >KEMBALI</a>
                </li>
              </ol>
            </nav>
            <form action="<?= base_url()."indikator/".$operasi ?>" method="POST" class="form-row">
              <div class="form-group col-lg-12">
                <input type="hidden" class="form-control" id="id_indikator" name="id_indikator" placeholder="Masukkan Nomor Statistik Raudhatul Athfal"
                value="<?= (!empty($indikator) && $operasi == "update") ? $indikator['id_indikator'] : "" ?>">
                <label for="deskripsi">Deskripsi Indikator</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" aria-describedby="deskripsi" placeholder="Masukkan Nama Raudhatul Athfal" rows="3"><?= (!empty($indikator) && $operasi == "update") ? $indikator['deskripsi'] : "" ?></textarea>
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
