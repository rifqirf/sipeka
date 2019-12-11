<!--
<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form <?= ucfirst($operasi) ?> Siswa</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."siswa/" ?>" >KEMBALI</a>
                </li>
              </ol>
            </nav>
            <form action="<?= base_url()."siswa/".$operasi ?>" method="POST" class="form-row" enctype="multipart/form-data">
              <?php if($operasi == "tambah" ): ?>
              <div class="form-group col-lg-6">
                <label for="id_kelompok">Kelompok</label>
                <select class="form-control" id="id_kelompok" name="id_kelompok">
                <?php 
                if(!empty($kelompok)):
                  foreach($kelompok as $key => $val): ?>
                  <option value="<?= $val['id_kelompok'] ?>">
                    <?= $val['nama_kelompok'] ?>
                  </option>
                  <?php 
                  endforeach;
                endif;
                ?>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="tgl_diterima">Tanggal Diterima</label>
                <input type="date" class="form-control" id="tgl_diterima" name="tgl_diterima" aria-describedby="tgl_diterima" 
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['tgl_diterima'] : "" ?>">
              </div>
              <?php endif; ?>
              <div class="form-group col-lg-12">
                <h4 class="title">Profil Siswa</h4>
              </div>
              <?php if($operasi == "update" ): ?>
              <div class="form-group col-lg-12">
                <label for="no_induk">No. Induk</label>
                <input type="text" class="form-control" id="no_induk" name="no_induk" placeholder="Masukkan No. Induk"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['no_induk'] : "" ?>">
              </div>
              <?php endif; ?>
              <div class="form-group col-lg-8">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="nama_lengkap" 
                placeholder="Masukkan Nama Lengkap" value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_lengkap'] : "" ?>">
              </div>
              <div class="form-group col-lg-4">
                <label for="nama_panggilan">Nama Panggilan</label>
                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" aria-describedby="nama_panggilan" 
                placeholder="Masukkan Nama Panggilan" value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_panggilan'] : "" ?>">
              </div>
              <div class="form-group col-lg-4">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" aria-describedby="tempat_lahir" 
                placeholder="Masukkan Tempat Lahir" value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['tempat_lahir'] : "" ?>">
              </div>
              <div class="form-group col-lg-8">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" aria-describedby="tgl_lahir" 
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['tgl_lahir'] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control" id="jk" name="jk">
                <?php 
                if(!empty($jk)):
                  foreach($jk as $key => $val): ?>
                  <option <?= (isset($siswa) && $siswa['jk'] == $val) ? "selected" : "" ?>
                    value="<?= $val ?>">
                    <?= $val ?>
                  </option>
                  <?php 
                  endforeach;
                endif; 
                ?>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="agama">Agama</label>
                <select class="form-control" id="agama" name="agama">
                <?php 
                if(!empty($agama)):
                  foreach($agama as $key => $val): ?>
                  <option <?= (isset($siswa) && $siswa['agama'] == $val) ? "selected" : "" ?>
                    value="<?= $val ?>">
                    <?= $val ?>
                  </option>
                  <?php 
                  endforeach;
                endif;
                ?>
                </select>
              </div>
              <div class="form-group col-lg-8">
                <label for="anak_ke">Anak Ke</label>
                <input type="number" class="form-control" id="anak_ke" name="anak_ke" aria-describedby="anak_ke" 
                placeholder="Masukkan Anak Ke" value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['anak_ke'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <h4 class="title">Profil Orang Tua & Wali</h4>
              </div>
              <div class="form-group col-lg-6">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_ayah'] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['pekerjaan_ayah'] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_ibu'] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['pekerjaan_ibu'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="alamat_jalan">Alamat</label>
                <input type="text" class="form-control" id="alamat_jalan" name="alamat_jalan" aria-describedby="alamat_jalan" placeholder="Alamat Jalan, RT/RW. Desa"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_jalan"] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="alamat_desa">Desa/Kelurahan</label>
                <input type="text" class="form-control" id="alamat_desa" name="alamat_desa" aria-describedby="alamat_desa" placeholder="Alamat Jalan, RT/RW. Desa"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_desa"] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="alamat_kec">Kecamatan</label>
                <input type="text" class="form-control" id="alamat_kec" name="alamat_kec" aria-describedby="alamat_kec" rows="3" placeholder="Nama Kecamatan"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_kec"] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="alamat_kab">Kabupaten</label>
                <input type="text" class="form-control" id="alamat_kab" name="alamat_kab" aria-describedby="alamat_kab" rows="3" placeholder="Nama Kabupaten"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_kab"] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="alamat_prov">Provinsi</label>
                <input type="text" class="form-control" id="alamat_prov" name="alamat_prov" aria-describedby="alamat_prov" rows="3" placeholder="Nama Provinsi"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_prov"] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="nama_wali">Nama Wali</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="Masukkan Nama Wali"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_wali'] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" placeholder="Masukkan Pekerjaan wali"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['pekerjaan_wali'] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="wali_jalan">Alamat</label>
                <input type="text" class="form-control" id="wali_jalan" name="wali_jalan" aria-describedby="wali_jalan" placeholder="Alamat Jalan, RT/RW. Desa"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_jalan"] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="wali_desa">Desa/Kelurahan</label>
                <input type="text" class="form-control" id="wali_desa" name="wali_desa" aria-describedby="wali_desa" placeholder="Alamat Jalan, RT/RW. Desa"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_desa"] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="wali_kec">Kecamatan</label>
                <input type="text" class="form-control" id="wali_kec" name="wali_kec" aria-describedby="wali_kec" rows="3" placeholder="Nama Kecamatan"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_kec"] : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="wali_kab">Kabupaten</label>
                <input type="text" class="form-control" id="wali_kab" name="wali_kab" aria-describedby="wali_kab" rows="3" placeholder="Nama Kabupaten"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_kab"] : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="wali_prov">Provinsi</label>
                <input type="text" class="form-control" id="wali_prov" name="wali_prov" aria-describedby="wali_prov" rows="3" placeholder="Nama Provinsi"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_prov"] : "" ?>">
              </div>  
              <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-primary"><?= strtoupper($operasi) ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
-->
<!-- baru deui njing :v -->

<!-- <section class="hero is-hero-bar">
    <div class="hero-body">
      <div class="level">
        <div class="level-left">
          <div class="level-item"><h1 class="subtitle">
          </h1></div>
          <p>Kelola Data Anak</p>
        </div>
        <div class="level-right" style="display: none;">
          <div class="level-item"></div>
        </div>
      </div>
    </div>
  </section> -->
  <section class="section is-main-section">
    <div class="card column">
      <header class="card-header">
        <p class="card-header-title">
        <a href="<?= base_url()."siswa/" ?>" title="Back" class="navbar-item has-divider is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
        </a>
        <?php if($operasi == "tambah" ): ?>
          <label for="id_kelompok">Form <?= ucfirst($operasi) ?> Siswa </label>
        </p>
      <?php endif; ?>
      </header>
      <div class="card-content">
        <form method="POST" enctype="multipart/form-data" action="<?= base_url()."siswa/".$operasi ?>">
        <?php if($operasi == "tambah" ): ?>
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Kelompok</label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <div class="select is-fullwidth">
                  <select id="id_kelompok" name="id_kelompok">
                  <?php 
                if(!empty($kelompok)):
                  foreach($kelompok as $key => $val): ?>
                  <option value="<?= $val['id_kelompok'] ?>">
                    <?= $val['nama_kelompok'] ?>
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
              <label class="label">Tanggal Diterima</label>
            </div>
            <div class="field-body">
              <div class="field is-normal">
                <p class="control">
                  <input class="input" type="date" class="form-control" id="tgl_diterima" name="tgl_diterima" aria-describedby="tgl_diterima" 
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['tgl_diterima'] : "" ?>">
                </p>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if($operasi == "update" ): ?>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">No Induk</label>
            </div>
            <div class="field-body">
              <div class="field is-normal">
                <p class="control">
                <input type="text" class="form-control" id="no_induk" name="no_induk" placeholder="Masukkan No. Induk"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['no_induk'] : "" ?>">
                </p>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Nama Lengkap</label>
            </div>
            <div class="field-body">
              <div class="field is-normal">
                <p class="control is-expanded">
                <input type="text" class="input" id="nama_lengkap" name="nama_lengkap" aria-describedby="nama_lengkap" 
                placeholder="Masukkan Nama Lengkap" value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_lengkap'] : "" ?>">
                </p>
              </div>
              <div class="field">
                <p class="control is-expanded">
                <input type="text" class="input" id="nama_panggilan" name="nama_panggilan" aria-describedby="nama_panggilan" 
                placeholder="Masukkan Nama Panggilan" value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_panggilan'] : "" ?>">
                </p>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Tempat Lahir</label>
            </div>
            <div class="field-body">
              <div class="field is-normal">
                <p class="control">
                <input type="text" class="input" id="tempat_lahir" name="tempat_lahir" aria-describedby="tempat_lahir" 
                placeholder="Masukkan Tempat Lahir" value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['tempat_lahir'] : "" ?>">
                </p>
              </div>
            </div>
          </div>
          <!-- <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Semester</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div class="select is-fullwidth">
                    <select>
                      <option>Semester 1</option>
                      <option>Semester 2</option>
                      <option>Semester 3</option>
                      <option>Semester 4</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Tanggal Lahir</label>
            </div>
            <div class="field-body">
              <div class="field is-normal">
                <p class="control">
                <input type="date" class="input" id="tgl_lahir" name="tgl_lahir" aria-describedby="tgl_lahir" 
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['tgl_lahir'] : "" ?>">
                </p>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Agama</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div class="select is-fullwidth">
                    <select id="jk" name="jk">
                    <?php 
                      if(!empty($jk)):
                        foreach($jk as $key => $val): ?>
                        <option <?= (isset($siswa) && $siswa['jk'] == $val) ? "selected" : "" ?>
                          value="<?= $val ?>">
                          <?= $val ?>
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
              <label class="label">Agama</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div class="select is-fullwidth">
                    <select id="agama" name="agama">
                    <?php 
                    if(!empty($agama)):
                      foreach($agama as $key => $val): ?>
                      <option <?= (isset($siswa) && $siswa['agama'] == $val) ? "selected" : "" ?>
                        value="<?= $val ?>">
                        <?= $val ?>
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
              <label class="label">Anak Ke</label>
            </div>
            <div class="field-body">
              <div class="field is-normal">
                <p class="control">
                  <input class="input" type="number" id="anak_ke" name="anak_ke" aria-describedby="anak_ke" 
                  placeholder="Masukkan Anak Ke" value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['anak_ke'] : "" ?>">
                  <span class="icon is-small is-left"><ion-icon name="person"></ion-icon></ion-icon></span>
                </p>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
              <div class="field-label is-normal"><label class="label">Foto Anak</label></div>
              <div class="field-body">
                <div class="field">
                  <div class="field file">
                    <label class="upload control">
                      <a class="button is-warning">
                        <span class="icon"><i class="mdi mdi-upload"></i></span>
                        <span>Upload Photo</span>
                      </a>
                      <input type="file">
                    </label>
                  </div>
                </div>
              </div>
            </div>
          <hr>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Nama Ayah</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_ayah'] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Pekerjaan Ayah</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['pekerjaan_ayah'] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Nama Ibu</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_ibu'] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Pekerjaan Ibu</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['pekerjaan_ibu'] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Alamat</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="alamat_jalan" name="alamat_jalan" aria-describedby="alamat_jalan" placeholder="Alamat Jalan, RT/RW. Desa"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_jalan"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Desa/Kelurahan</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="alamat_desa" name="alamat_desa" aria-describedby="alamat_desa" placeholder="Alamat Jalan, RT/RW. Desa"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_desa"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Kecamatan</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="alamat_kec" name="alamat_kec" aria-describedby="alamat_kec" rows="3" placeholder="Nama Kecamatan"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_kec"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Kabupaten</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="alamat_kab" name="alamat_kab" aria-describedby="alamat_kab" rows="3" placeholder="Nama Kabupaten"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_kab"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Provinsi</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="alamat_prov" name="alamat_prov" aria-describedby="alamat_prov" rows="3" placeholder="Nama Provinsi"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["alamat_prov"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <hr>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Nama Wali</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="nama_wali" name="nama_wali" placeholder="Masukkan Nama Wali"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['nama_wali'] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Pekerjaan Wali</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="pekerjaan_wali" name="pekerjaan_wali" placeholder="Masukkan Pekerjaan wali"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa['pekerjaan_wali'] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Alamat</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="wali_jalan" name="wali_jalan" aria-describedby="wali_jalan" placeholder="Alamat Jalan, RT/RW. Desa"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_jalan"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Desa/Kelurahan</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="wali_desa" name="wali_desa" aria-describedby="wali_desa" placeholder="Alamat Jalan, RT/RW. Desa"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_desa"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Kecamatan</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="wali_kec" name="wali_kec" aria-describedby="wali_kec" rows="3" placeholder="Nama Kecamatan"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_kec"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Kabupaten</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="wali_kab" name="wali_kab" aria-describedby="wali_kab" rows="3" placeholder="Nama Kabupaten"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_kab"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Provinsi</label>
              </div>
              <div class="field-body">
                <div class="field is-normal">
                  <p class="control">
                    <input class="input" id="wali_prov" name="wali_prov" aria-describedby="wali_prov" rows="3" placeholder="Nama Provinsi"
                value="<?= (!empty($siswa) && $operasi == "update") ? $siswa["wali_prov"] : "" ?>">
                  </p>
                </div>
              </div>
            </div>
          <div class="field is-horizontal">
            <div class="field-label">
              <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
              <div class="field">
                <div class="field is-grouped">
                  <div class="control">
                    <button type="submit" class="button is-success">
                    <?= strtoupper($operasi) ?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      </div>