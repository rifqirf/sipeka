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