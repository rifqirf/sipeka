
<section class="section is-main-section">
  
<?php if($raport['tgl_raport'] != null || !empty($raport['tgl_raport'])):?>
<div class="notification is-successs">
  <button class="delete"></button>
  Raport <strong>sudah disahkan</strong> oleh Kepala Sekolah.
</div>
<?php else:?>
<div class="notification" style="background-color:crimson">
  <button class="delete"></button>
  Raport <strong>Belum disahkan</strong> oleh Kepala Sekolah.
</div>
<?php endif;?>

</section>

<?php if($this->session->user['id_jabatan'] != "ORTU" || $this->session->user != null): ?>
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
    <a class="button is-success" href="<?= base_url()."raport/form/tambah/" ?>"
      class="button is-primary"><span class="icon"><i
        class="mdi mdi-credit-card-outline"></i></span>
      <span>Tambah</span>
    </a>
  </div>
</section>
<?php endif; ?>
<section class="section is-main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-add"></i></span>
        Nilai Raport
      </p>
      <div class="field is-horizontal">
          <div class="field-label is-normal">
          
          </div>
          <div class="field-body">
            <div class="field is-normal">
              <p class="control">
              <input type="hidden" class="input" readonly id="id_raport" name="id_raport" placeholder="Masukkan No. Induk"
              value="<?= (!empty($data['id_raport'])) ? $data['id_raport'] : "" ?>">
              </p>
            </div>
          </div>
        </div>
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
                        <div class="select is-fullwidth is-static">
                          <select readonly class="input is-static" id="nilai<?= "krit_".$kri["id_kriteria"] ?>" name="<?= "krit_".$kri["id_kriteria"] ?>">
                          <?php
                          $kr = array_search($kri['id_kriteria'], array_column($isi, 'id_kriteria'));
                          foreach($this->db->get('nilai')->result_array() as $key => $val):
                            $nl = array_search($val['nilai'], array_column($isi, 'nilai'));
                            if ((!empty($this->db->where(["id_raport" => $data['id_raport'], "id_kriteria"=> $kri['id_kriteria'], "nilai" => $val['nilai']])->get('nilai_raport')->result_array()))):
                            ?>
                          <option
                           value="<?= $val['nilai'] ?>">
                            <?= $val['nilai'] ?>
                          </option>
                          <?php
                            endif;
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
    </div>
  </div>
 </section>
<form action="<?= base_url()."raport/pengesahan/" ?>" method="GET">
  <section class="section is-main-section">
    <div class="tile is-ancestor">
      <div class="tile is-parent is-8">
        <div class="card tile is-child">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-circle default"></i></span>
              Grafik perkembangan Anak
            </p>
          </header>
          <div class="card-content">
						<div class="chart-area">
								<div style="">
									<div class="chartjs-size-monitor">
										<div class="chartjs-size-monitor-expand">
											<div></div>
										</div>
										<div class="chartjs-size-monitor-shrink">
											<div></div>
										</div>
									</div>
									<canvas id="big-line-chart" class="chartjs-render-monitor" ></canvas>
                </div>
							</div>
          </div>
        </div>
      </div>
      <div class="tile is-parent is-4">
        <div class="card tile is-child">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account default"></i></span>
              Profile
            </p>
          </header>
          <div class="card-content">
            <div class="is-user-avatar image has-max-width is-aligned-center">
              <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe">
            </div>
            <hr>
            <div class="field">
              <label class="label">Nomor Induk</label>
              <div class="control is-clearfix">
                <input type="hidden" id="id_raport" name ="id_raport" readonly value="<?php echo $raport['id_raport'] ?>" class="input is-static">
                <input type="text" id="no_induk" name ="no_induk" readonly value="<?php echo $raport['no_induk'] ?>" class="input is-static">
              </div>
            </div>
            <hr>
            <div class="field">
              <label class="label">Nama Lengkap</label>
              <div class="control is-clearfix">
                <input type="text" readonly value="<?php echo $raport['nama_lengkap'] ?>" class="input is-static">
              </div>
            </div>
            <hr>
            <div class="field">
              <label class="label">Kelas</label>
              <div class="control is-clearfix">
                <input type="hidden" id="id_kelompok" name ="id_kelompok" readonly value="<?php echo $raport['id_kelompok'] ?>" class="input is-static">
                <input type="text" readonly value="<?php echo $raport['nama_kelompok'] ?>" class="input is-static">
              </div>
            </div>
            <hr>
            <div class="field">
              <label class="label">Semester</label>
              <div class="control is-clearfix">
                <input type="text" id="semester" name ="semester"  readonly value="<?php echo $raport['semester'] ?>" class="input is-static">
              </div>
            </div>
            <hr>
            <div class="field">
              <label class="label">Tahun Ajaran</label>
              <div class="control is-clearfix">
                <input type="text" id="tahun_ajaran" name ="tahun_ajaran"  readonly value="<?php echo $raport['tahun_ajaran'] ?>" class="input is-static">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="tile is-ancestor">
  <?php if($this->session->user['id_jabatan'] == "ADMIN" || $this->session->user['id_jabatan'] == "KPSEK"): ?>
      <div class="tile is-parent is-12">
        <div class="card tile is-child">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account default"></i></span>
              Form Pengesahan
            </p>
          </header>
          <div class="card-content">
            <div class="field">
              <label class="label">Tgl Sah</label>
              <div class="control is-clearfix">
                <input type="date" name="tgl_raport" value="<?php echo ($raport['tgl_raport'] != null) ? $raport['tgl_raport'] : "" ?>" class="input">
              </div>
            </div>
            <hr>
            <div class="field">
              <label class="label"> </label>
              <div class="control is-clearfix">
                <button type="submit" class="button is-primary" >
                  SIMPAN
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
  </section>
</form>