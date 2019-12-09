<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form <?= ucfirst($operasi) ?> Subindikator</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."subindikator/" ?>" >KEMBALI</a>
                </li>
              </ol>
            </nav>
            <form action="<?= base_url()."subindikator/".$operasi ?>" method="POST" class="form-row">
              <div class="form-group col-lg-12">
                <input type="hidden" class="form-control" id="no_subindikator" name="no_subindikator" placeholder="Masukkan Nomor Subindikator"
                value="<?= (!empty($subindikator) && $operasi == "update") ? $subindikator['no_subindikator'] : "" ?>">
                <label for="sub_deskripsi">Deskripsi Subindikator</label>
                <textarea class="form-control" id="sub_deskripsi" name="sub_deskripsi" aria-describedby="sub_deskripsi" placeholder="Masukkan Deskripsi Subindikator" rows="3"><?= (!empty($subindikator) && $operasi == "update") ? $subindikator['sub_deskripsi'] : "" ?></textarea>
              </div>
              <div class="form-group col-lg-12">
                <label for="id_indikator">Indikator</label>
                <select class="form-control" id="id_indikator" name="id_indikator">
                <?php 
                if(!empty($indikator)):
                  foreach($indikator as $key => $val): ?>
                  <option 
                    value="<?= $val["id_indikator"] ?>">
                    <?= $val["deskripsi"] ?>
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
