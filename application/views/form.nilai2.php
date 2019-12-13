<form action="<?= base_url()."raport/isiRaport/" ?>" method="GET">

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
                    <option 
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
                  <option <?= ($filter['tahun_ajaran'] == $val) ? "selected" : "" ?>
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
                    // if(!empty($kelompok)):
                    foreach($semester as $key => $val): ?>
                    <option <?= ($filter['semester'] == $val) ? "selected" : "" ?>
                      value="<?= $val ?>">
                      <?= "Semester ". $val ?>
                    </option>
                    <?php 
                    endforeach;
                  // endif; 
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
                    <option 
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
                  CARI
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section is-main-section">
  <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-add"></i></span>
          Nilai Raport
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
          <p>Filter</p>
        </a>
      </header>
  <div class="table-container">
    <div class="field is-horizontal">
      <div class="field-label is-normal"></div>
      <div class="field-body"></div>
    </div>
    <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
      <thead>
          <tr>
            <th>No</th>
            <th>Indikator Penilaian</th>
            <th><?= "Penilaian " ?></th>
          </tr>
      </thead>
      <tbody>
        <?php
        // foreach($indikator as $i => $ind ):
        foreach($this->db->get('indikator')->result_array() as $i => $ind):
        ?>
        <tr>
          <td></td>
          <th><?= $ind["indikator"] ?></th>
          <td></td>
        </tr>
        <?php
          // foreach($subindikator as $j => $sub):
            foreach($this->db->where(['id_indikator'=> $ind['id_indikator']])->get('subindikator')->result_array() as $j => $sub):
              // if(strpos($sub["subindikator"], "(null)") != false):
              if(substr($sub["subindikator"], 0, 6) != "(null)"):
        ?>
        
        <tr>
          <td></td>
          <th><?= $sub["subindikator"] ?></th>
          <td></td>
        </tr>
        <?php
              endif;
            // foreach($kriteria as $k => $kri):
            foreach($this->db->where(['id_subindikator'=> $sub['id_subindikator']])->get('kriteria')->result_array() as $k => $kri):
        ?>
        <tr>
          <td><?= $k+1 ?></td>
          <td><?= $kri["kriteria"] ?></td>
          <td>
            <div class="field is-horizontal">
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="select is-fullwidth">
                      <select id="nilai<?= "krit_".$kri["id_kriteria"] ?>" name="<?= "krit_".$kri["id_kriteria"] ?>">
                      <option value="">Pilih Nilai</option>
                      <?php
                      foreach($this->db->get('nilai')->result_array() as $key => $val): 
                        $data = $this->db->where(["id_raport" => $nilaiRaport[0]["id_raport"], "id_kriteria" => $kri["id_kriteria"]])->get('nilai_raport')->result_array();
                        // var_dump($data);?>
                      <option <?= (  !empty($data) && $val['nilai'] == $data[0]['nilai'] ) ? "selected" : "" ?> value="<?= $val['nilai'] ?>">
                        <?= $val['nilai'] ?>
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
          </td>
        </tr>
        <?php
            endforeach;
            // endif;
          endforeach;
        endforeach; 
        ?>
      </tbody>
    </table>
  <div class="field is-horizontal">
        <div class="field-label">
          <!-- Left empty for spacing -->
        </div>
        <div class="field-body">
          <div class="field">
            <div class="field is-grouped">
              <div class="control">
                <button class="button is-primary" type="submit" name="submit_raport" class="btn btn-primary">
                  ISI
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      </form>