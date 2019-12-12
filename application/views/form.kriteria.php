
<section class="section is-title-bar">
  <div class="level">
    <div class="level-left">
      <div class="level-item">
        <ul>
          <li>Admin</li>
          <li>Forms</li>
        </ul>
      </div>
    </div>
    <div class="level-right">
      <div class="level-item">
        <div class="buttons is-right">
        <a class="button is-success" href="<?= base_url()."kriteria/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-filter"></i></span>
            <span>Filter</span>
          </a>

          <a class="button is-success" href="<?= base_url()."kriteria/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-credit-card-outline"></i></span>
            <span>Tambah</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section is-main-section">
    <div class="card column">
      <header class="card-header">
      <a href="<?= base_url()."kriteria/" ?>" title="Back" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
        </a>
        <p class="card-header-title">
          <span class="icon"><ion-icon name="add-circle"></ion-icon></span>
          Form <?= ucfirst($operasi) ?> Kriteria
        </p>
      </header>
      <div class="card-content">
        <form action="<?= base_url()."kriteria/".$operasi ?>" method="POST">
        <input type="hidden" class="form-control" id="id_kriteria" name="id_kriteria" placeholder="Masukkan Nomor Subindikator"
                value="<?= (!empty($kriteria) && $operasi == "update") ? $kriteria['id_kriteria'] : "" ?>">
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Kriteria Penilaian</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <textarea class="textarea" id="kriteria" name="kriteria" aria-describedby="kriteria" placeholder="Masukkan Kriteria Penilaian" rows="3"><?= (!empty($kriteria) && $operasi == "update") ? $kriteria['kriteria'] : "" ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Sub Indikator</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div class="select is-fullwidth">
                    <select id="id_subindikator" name="id_subindikator">
                      <?php 
                        if(!empty($subindikator)):
                        foreach($subindikator as $key => $val): ?>
                        <option 
                          value="<?= $val["id_subindikator"] ?>">
                          <?= $val["subindikator"] ?>
                        </option>
                        <?php 
                        endforeach;
                      endif; 
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="field is-horizontal">
            <div class="field-label">
              <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
              <div class="field">
                <div class="field is-grouped">
                  <div class="control">
                    <button type="submit" name="submit" class="button is-primary"><?= strtoupper($operasi) ?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
  </section>