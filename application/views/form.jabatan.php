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

          <a class="button is-success" href="<?= base_url()."siswa/form/tambah/" ?>" target="_blank"
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
            <h3 class="card-title">Form <?= ucfirst($operasi) ?> Jabatan</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."jabatan/" ?>" >KEMBALI</a>
                </li>
              </ol>
            </nav>
            <form action="<?= base_url()."jabatan/".$operasi ?>" method="POST" class="form-row">
              <div class="form-group col-lg-12">
                <label for="id_jabatan">ID Jabatan</label>
                <input type="text" class="form-control" id="id_jabatan" name="id_jabatan" placeholder="Masukkan Kode Jabatan"
                value="<?= (!empty($jabatan) && $operasi == "update") ? $jabatan['id_jabatan'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="nama_jabatan">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" aria-describedby="nama_jabatan" 
                placeholder="Masukkan Nama Jabatan" value="<?= (!empty($jabatan) && $operasi == "update") ? $jabatan['nama_jabatan'] : "" ?>">
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
      <a href="<?= base_url()."jabatan/" ?>" title="Back" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
        </a>
        <p class="card-header-title">
          <span class="icon"><ion-icon name="add-circle"></ion-icon></span>
          Form <?= ucfirst($operasi) ?> Jabatan
        </p>
      </header>
      <div class="card-content">
        <form method="get">
        <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Nomor Induk</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="field">
                        <input class="input" id="id_jabatan" name="id_jabatan" placeholder="Masukkan Kode Jabatan"
                value="<?= (!empty($jabatan) && $operasi == "update") ? $jabatan['id_jabatan'] : "" ?>">
                      </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Nomor Induk</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="field">
                        <input class="input" type="text" placeholder="Nomor Induk">
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
                    <button type="submit" class="button is-success">
                      <span>Masukan </span>
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