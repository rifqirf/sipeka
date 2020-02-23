<form action="<?= base_url()."raport/doIsi/" ?>" method="GET">

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
        <i class="fa fa-list"></i>
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
                          $kr = array_search($kri['id_kriteria'], array_column($isi, 'id_kriteria'));
                          foreach($this->db->get('nilai')->result_array() as $key => $val):
                            $nl = array_search($val['nilai'], array_column($isi, 'nilai'));
                             ?>
                          <option <?= (!empty($this->db->where(["id_raport" => $data['id_raport'], "id_kriteria"=> $kri['id_kriteria'], "nilai" => $val['nilai']])->get('nilai_raport')->result_array()))? "selected" : "" ?>
                           value="<?= $val['nilai'] ?>">
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
                    <?= strtoupper($operasi) ?>
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