<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pengaturan</h3>
          </div>
          <div class="card-body">
            <form action="<?= base_url()."pengaturan/update" ?>" method="POST" class="form-row">
              <div class="form-group col-lg-4">
                <label for="nsra">NSRA</label>
                <input type="text" class="form-control" id="nsra" name="nsra" placeholder="Masukkan Nomor Statistik Raudhatul Athfal"
                value="<?= ($sekolah != null) ? $sekolah->nsra : "" ?>">
              </div>
              <div class="form-group col-lg-8">
                <label for="nama_ra">Nama Raudhatul Athfal</label>
                <input type="text" class="form-control" id="nama_ra" name="nama_ra" aria-describedby="nama_ra" placeholder="Masukkan Nama Raudhatul Athfal"
                value="<?= ($sekolah != null) ? $sekolah->nama_ra : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="alamat_jalan">Alamat</label>
                <input type="text" class="form-control" id="alamat_jalan" name="alamat_jalan" aria-describedby="alamat_jalan" placeholder="Alamat Jalan, RT/RW. Desa"
                value="<?= ($sekolah != null) ? $sekolah->alamat_jalan : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="alamat_kec">Kecamatan</label>
                <input type="text" class="form-control" id="alamat_kec" name="alamat_kec" aria-describedby="alamat_kec" rows="3" placeholder="Nama Kecamatan"
                value="<?= ($sekolah != null) ? $sekolah->alamat_kec : "" ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="alamat_kab">Kabupaten</label>
                <input type="text" class="form-control" id="alamat_kab" name="alamat_kab" aria-describedby="alamat_kab" rows="3" placeholder="Nama Kabupaten"
                value="<?= ($sekolah != null) ? $sekolah->alamat_kab : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                <label for="alamat_prov">Provinsi</label>
                <input type="text" class="form-control" id="alamat_prov" name="alamat_prov" aria-describedby="alamat_prov" rows="3" placeholder="Nama Provinsi"
                value="<?= ($sekolah != null) ? $sekolah->alamat_prov : "" ?>">
              </div>
              <div class="form-group col-lg-12">
                  <label for="nip_kepsek">Nama Kepala Sekolah</label>
                  <select name="nip_kepsek" class="form-control" id="nip_kepsek">
                      <option <?= ($sekolah != null) ? "selected" : "" ?> value="<?= ($sekolah != null) ? $sekolah->nip_kepsek : "" ?>"><?= ($sekolah != null) ? $sekolah->nama." - ".$sekolah->nip : "" ?></option>
                    </select>
                </div>
              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- pengaturan baru -->

<section class="section is-main-section">
    <div class="card column">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><ion-icon name="add-circle"></ion-icon></span>
          Kelola Data
        </p>
      </header>
      <div class="card-content">
        <form action="<?= base_url()."pengaturan/update" ?>" method="POST">
        <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">NSRA</label>
            </div>
            <div class="field-body">
              <div class="field is-medium">
                <div class="control">
                  <div class="field">
                      <input class="input" type="text" name="nama_ra" aria-describedby="nama_ra" placeholder="Masukkan Nama Raudhatul Athfal"
                      value="<?= ($sekolah != null) ? $sekolah->nsra : "" ?>" >
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Nama Raudhatul Athfal</label>
              </div>
              <div class="field-body">
                <div class="field is-medium">
                  <div class="control">
                    <div class="field">
                        <input class="input" type="text" id="nama_ra" name="nama_ra" aria-describedby="nama_ra" placeholder="Masukkan Nama Raudhatul Athfal"
                        value="<?= ($sekolah != null) ? $sekolah->nama_ra : "" ?>">
                      </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Nama Kepala Sekolah</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div class="select is-fullwidth">
                    <select id="nip_kepsek">
                      <option <?= ($sekolah != null) ? "selected" : "" ?> value="<?= ($sekolah != null) ? $sekolah->nip_kepsek : "" ?>"><?= ($sekolah != null) ? $sekolah->nama." - ".$sekolah->nip : "" ?></option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Alamat</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <textarea class="textarea" placeholder="Alamat lengkap"></textarea>
                </div>
              </div>
            </div>
          </div> -->
          <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Alamat</label>
              </div>
              <div class="field-body">
                <div class="field is-medium">
                  <div class="control">
                    <div class="field">
                        <input class="input" type="text" id="alamat_jalan" id="alamat_jalan" name="alamat_jalan" aria-describedby="alamat_jalan" placeholder="Alamat Jalan, RT/RW. Desa"
                        value="<?= ($sekolah != null) ? $sekolah->alamat_jalan : "" ?>">
                      </div>
                  </div>
                </div>
              </div>
          </div>
          
          <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Kecamatan</label>
              </div>
              <div class="field-body">
                <div class="field is-medium">
                  <div class="control">
                    <div class="field">
                        <input class="input" type="text" id="alamat_kec" name="alamat_kec" aria-describedby="alamat_kec" rows="3" placeholder="Nama Kecamatan"
                        value="<?= ($sekolah != null) ? $sekolah->alamat_kec : "" ?>">
                      </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Kabupaten</label>
              </div>
              <div class="field-body">
                <div class="field is-medium">
                  <div class="control">
                    <div class="field">
                        <input class="input" type="text" id="alamat_kab" name="alamat_kab" aria-describedby="alamat_kab" rows="3" placeholder="Nama Kabupaten"
                        value="<?= ($sekolah != null) ? $sekolah->alamat_kab : "" ?>">
                      </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Provinsi</label>
              </div>
              <div class="field-body">
                <div class="field is-medium">
                  <div class="control">
                    <div class="field">
                        <input class="input" type="text" placeholder="Provinsi" id="alamat_prov" name="alamat_prov" aria-describedby="alamat_prov" rows="3" placeholder="Nama Provinsi"
                        value="<?= ($sekolah != null) ? $sekolah->alamat_prov : "" ?>"
                        >
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
                    <button type="submit" name="submit" class="button is-success">
                      <span>Simpan</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      
      <!-- profile foto -->
      <div class="card-content">
        
      </div>
    </div>
  </section>