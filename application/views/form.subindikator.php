
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
        <a class="button is-success" href="<?= base_url()."subindikator/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-filter"></i></span>
            <span>Filter</span>
          </a>

          <a class="button is-success" href="<?= base_url()."subindikator/form/tambah/" ?>"
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
      <a href="<?= base_url()."subindikator/" ?>" title="Back" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
        </a>
        <p class="card-header-title">
          <span class="icon"><ion-icon name="add-circle"></ion-icon></span>
          Form <?= ucfirst($operasi) ?> Indikator
        </p>
      </header>
      <div class="card-content">
        <form action="<?= base_url()."subindikator/".$operasi ?>" method="POST">
        <input type="hidden" class="form-control" id="id_subindikator" name="id_subindikator" placeholder="Masukkan Nomor Subindikator"
                value="<?= (!empty($subindikator) && $operasi == "update") ? $subindikator['id_subindikator'] : "" ?>">
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Deskripsi Subindikator</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <textarea class="textarea" id="subindikator" name="subindikator" aria-describedby="subindikator" placeholder="Masukkan Deskripsi Subindikator" rows="3"><?= (!empty($subindikator) && $operasi == "update") ? $subindikator['sub_deskripsi'] : "" ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Indikator</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div class="select is-fullwidth">
                    <select id="id_indikator" name="id_indikator">
                      <?php 
                        if(!empty($indikator)):
                        foreach($indikator as $key => $val): ?>
                        <option 
                          value="<?= $val["id_indikator"] ?>">
                          <?= $val["indikator"] ?>
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