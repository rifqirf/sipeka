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
        <a class="button is-success" href="<?= base_url()."siswa/form/tambah/" ?>" target="_blank"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-filter"></i></span>
            <span>Filter</span>
          </a>

          <a class="button is-success" href="<?= base_url()."indikator/form/tambah/" ?>" target="_blank"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-credit-card-outline"></i></span>
            <span>Tambah</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <section class="pengaturan mt-4">
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
</section> -->


<section class="section is-main-section">
    <div class="card column">
      <header class="card-header">
      <a href="<?= base_url()."indikator/" ?>" title="Back" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
        </a>
        <p class="card-header-title">
          <span class="icon"><ion-icon name="add-circle"></ion-icon></span>
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
                        <input class="input" type="hidden" class="form-control" id="id_indikator" name="id_indikator" placeholder="Masukkan Nomor Statistik Raudhatul Athfal"
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
                  <textarea class="textarea" id="deskripsi" name="deskripsi" aria-describedby="deskripsi" placeholder="Masukkan Nama Raudhatul Athfal" rows="3"><?= (!empty($indikator) && $operasi == "update") ? $indikator['deskripsi'] : "" ?></textarea>
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
                    <button class="button is-primary" type="submit" name="submit" class="btn btn-primary"><?= strtoupper($operasi) ?>
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