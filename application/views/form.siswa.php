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
            <form action="<?= base_url()."siswa/".$operasi ?>" method="POST" class="form-row">
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
