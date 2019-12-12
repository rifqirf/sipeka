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
            <a href="https://admin-one-vue-cli.justboil.me/" target="_blank"
              class="button is-primary"><span class="icon"><i
                class="mdi mdi-credit-card-outline"></i></span>
              <span>Premium Demo</span>
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
                  <option <?= (!empty($guru) && $guru['id_jabatan'] == $val['id_jabatan']) ? "selected" : "" ?> value="<?= $val["id_jabatan"] ?>">
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
</section> -->


<section class="section is-main-section">
    <div class="card column">
      <header class="card-header">
        <p class="card-header-title">
        <a href="<?= base_url()."guru/" ?>" title="Back" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
        </a>
          <span class="icon"><ion-icon name="add-circle"></ion-icon></span>
          Form <?= ucfirst($operasi) ?> Guru
        </p>
      </header>
      <div class="card-content">
        <form action="<?= base_url()."guru/".$operasi ?>" method="POST">
          <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">NIP</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="field">
                        <input class="input" id="nip" name="nip" aria-describedby="nip" placeholder="Masukkan Nomor Induk Pegawai"
                value="<?= (!empty($guru) && $operasi == "update") ? $guru['nip'] : "" ?>">
                      </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Nama Guru</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="field">
                        <input class="input" id="nama" name="nama" aria-describedby="nama" placeholder="Masukkan Nama Lengkap"
                        value="<?= (!empty($guru) && $operasi == "update") ? $guru['nama'] : "" ?>">
                      </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">`
                <label class="label">Jabatan</label>
            </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="select is-fullwidth">
                      <select id="id_jabatan" name="id_jabatan">
                      <?php 
                        if(!empty($jabatan) || isset($guru['id_jabatan'])):
                          foreach($jabatan as $key => $val): ?>
                          <option <?= (!empty($guru) && $guru['id_jabatan'] == $val['id_jabatan']) ? "selected" : "" ?> value="<?= $val["id_jabatan"] ?>">
                            <?= $val["nama_jabatan"] ?>
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

          <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">No Telepon</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="field">
                      <input class="input" id="telp" name="telp" aria-describedby="telp" placeholder="Masukkan Nomor Handphone"
                value="<?= (!empty($guru) && $operasi == "update") ? $guru['telp'] : "" ?>">
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
                  <button type="submit" name="submit" class="button is-primary"><?= strtolower($operasi) ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      
      <!-- profile foto -->
    </div>
  </section>
