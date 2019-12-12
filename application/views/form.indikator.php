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
        <a class="button is-success" href="<?= base_url()."siswa/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-filter"></i></span>
            <span>Filter</span>
          </a>

          <a class="button is-success" href="<?= base_url()."indikator/form/tambah/" ?>"
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
      <a href="<?= base_url()."indikator/" ?>" title="Back" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
        </a>
        <p class="card-header-title">
          <span class="icon"><ion-icon></ion-icon></span>
          Form <?= ucfirst($operasi) ?> Indikator
        </p>
      </header>
      <div class="card-content">
        <form action="<?= base_url()."indikator/".$operasi ?>" method="POST" >
        <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label"></label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="field">
                        <input class="input" type="hidden" class="form-control" id="id_indikator" name="id_indikator" 
                        placeholder="Masukkan Nomor Statistik Raudhatul Athfal"
                        value="<?= (!empty($indikator) && $operasi == "update") ? $indikator['id_indikator'] : "" ?>">
                      </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Dekripsi Indikator</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <textarea class="textarea" id="indikator" name="indikator" aria-describedby="indikator" placeholder="Masukkan Nama Raudhatul Athfal" 
                  rows="3"><?= (!empty($indikator) && $operasi == "update") ? $indikator['indikator'] : "" ?></textarea>
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
                    <button class="button is-primary" type="submit" class="btn btn-primary"><?= strtoupper($operasi) ?>
                    </button>
                  </div>
  
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    
    </div>
  </section>