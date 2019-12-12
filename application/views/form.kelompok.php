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
        <a class="button is-success" href="<?= base_url()."kelompok/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-filter"></i></span>
            <span>Filter</span>
          </a>

          <a class="button is-success" href="<?= base_url()."kelompok/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-credit-card-outline"></i></span>
            <span>Tambah</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- 
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
                // if(!empty($guru) || isset($kelompok['nip_wlkls'])):
                //   foreach($guru as $key => $val): ?>
                //   <option <?= (isset($kelompok) && ($kelompok['nip_wlkls'] == $val['nip'])) ? "selected" : "" ?> value="<?= $val["nip"] ?>">
                //     <?= $val["nama"] ?>
                //   </option>
                //   <?php 
                //   endforeach;
                // endif;
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
</section> -->


<section class="section is-main-section">
    <div class="card column">
      <header class="card-header">
      <a href="<?= base_url()."kelompok/" ?>" title="Back" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
        </a>
        <p class="card-header-title">
          <span class="icon"><ion-icon name="add-circle"></ion-icon></span>
          Form <?= ucfirst($operasi) ?> Kelompok
        </p>
      </header>
      <div class="card-content">
        <form action="<?= base_url()."kelompok/".$operasi ?>" method="POST">
        <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Nama Kelompok</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="field">
                        <input type="hidden" class="input" id="id_kelompok" name="id_kelompok" placeholder="Masukkan Kode Kelompok"
                      value="<?= (!empty($kelompok) && $operasi == "update") ? $kelompok['id_kelompok'] : "" ?>">
                    </div>
                    <div class="field">
                        <input class="input" id="nama_kelompok" name="nama_kelompok" placeholder="Masukkan Nama Kelompok"
                      value="<?= (!empty($kelompok) && $operasi == "update") ? $kelompok['nama_kelompok'] : "" ?>">
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Wali Kelas</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div class="select is-fullwidth">
                    <select id="nip_wlkls" name="nip_wlkls">
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