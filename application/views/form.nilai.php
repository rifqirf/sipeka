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
        <a class="button is-success" href="<?= base_url()."raport/nilai/simpan/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-filter"></i></span>
            <span>Filter</span>
          </a>

          <a class="button is-success" href="<?= base_url()."raport/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-credit-card-outline"></i></span>
            <span>Tambah</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<form action="<?= base_url()."raport/nilai/simpan" ?>">
<section class="section is-main-section">
  <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-add"></i></span>
          Nama : <?= $siswa[0]["nama_lengkap"] ?>
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
          <p>Filter</p>
        </a>
      </header>
  <div class="table-container">
  <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
    <thead>
        <tr>
          <th>No</th>
          <th>Indikator</th>
          <th>Subindikator</th>
          <th>Kriteria</th>
          <th><?= "Semester ".$this->input->get("semester") ?></th>
        </tr>
    </thead>
    <tbody>
      <?php
      foreach($this->db->get('indikator')->result_array() as $i => $ind ):
        foreach($this->db->where("id_indikator" , $ind["id_indikator"])->get('subindikator')->result_array() as $j => $sub):
          foreach($this->db->where("id_subindikator" , $sub["id_subindikator"])->get('kriteria')->result_array() as $k => $kri):
      ?>
      <tr>
        <td><?= $k+1 ?></td>
        <td><?= $ind["indikator"] ?></td>
        <td><?= $sub["subindikator"] ?></td>
        <td><?= $kri["kriteria"] ?></td>
        <td>
          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div class="select is-fullwidth">
                    <select id="nilai" name="nilai" name="">
                    <?php 
                    foreach($nilai as $key => $val): ?>
                    <option value="<?= $val['nilai'] ?>">
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
        endforeach;
      endforeach; 
      ?>
    </tbody>
  </table>
</section>
</form>