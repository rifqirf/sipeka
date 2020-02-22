
<form action="<?= base_url()."raport/".$operasi ?>" method="GET">
<section class="section is-main-section">
  <div class="card column">
    <header class="card-header">
    <a href="<?= base_url()."indikator/" ?>" title="Back" class="navbar-item has-divider is-desktop-icon-only">
        <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
      </a>
      <p class="card-header-title">
        <span class="icon"><ion-icon></ion-icon></span>
        Form <?= ucfirst($operasi) ?> Raport
      </p>
    </header>
    <div class="card-content">
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Kelas</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow">
            <div class="control">
              <div class="select is-fullwidth">
                <select id="raport_id_kelompok" name="id_kelompok" onchange="loadSiswa()">
                  <?php 
                    if(!empty($kelompok)):
                    foreach($kelompok as $key => $val): ?>
                    <option <?= ($operasi == "update") ?  ($old['id_kelompok'] == $val["id_kelompok"]) ? "selected" : ""  : "" ?>
                      value="<?= $val["id_kelompok"] ?>">
                      <?= $val["nama_kelompok"] ?>
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
          <label class="label">Tahun Ajaran</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow">
            <div class="control">
              <div class="select is-fullwidth">
                <select id="tahun_ajaran" name="tahun_ajaran">
                  <?php 
                  foreach(range(2019, 2000) as $key => $val): ?>
                  <option <?= ($operasi == "update") ?  ($old['tahun_ajaran'] == $val) ? "selected" : ""  : "" ?>
                    value="<?= $val ?>">
                    <?= $val . "/" . ($val + 1) ?>
                  </option>
                  <?php 
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Semester</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow">
            <div class="control">
              <div class="select is-fullwidth">
                <select id="semester" name="semester">
                  <?php 
                    if(!empty($kelompok)):
                    foreach(range(1, 2) as $key => $val): ?>
                    <option <?= ($operasi == "update") ?  ($old['tahun_ajaran'] == $val) ? "selected" : ""  : "" ?>
                      value="<?= $val ?>">
                      <?= "Semester ". $val ?>
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
          <label class="label">Nama Siswa</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow">
            <div class="control">
              <div class="select is-fullwidth">
                <select id="no_induk" name="no_induk">
                  <?php 
                    if(!empty($siswa)):
                    foreach($siswa as $key => $val): ?>
                    <option <?= ($operasi == "update") ?  ($old['no_induk'] == $val["no_induk"]) ? "selected" : ""  : "" ?>
                      value="<?= $val["no_induk"] ?>">
                      <?= $val["nama_lengkap"] ?>
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
                <button class="button is-primary" type="submit" class="btn btn-primary">
                  <?= strtoupper($operasi); ?>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>



    
