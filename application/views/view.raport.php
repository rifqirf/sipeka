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
        <a class="button is-success" href="<?= base_url()."raport/form/tambah/" ?>"
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

<section class="section is-main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-add"></i></span>
          Raport
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
          <p>PRINT</p>
        </a>
      </header>
  <div class="table-container">
    <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
      <thead>
      <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Semester</th>
        <th>Kelompok</th>
        <th>Tahun Ajaran</th>
        <th>Operasi</th>
      </tr>
      </thead>
      <tbody>
      <tr>
      <?php 
          if(!empty($raport)):
          $i = 1;
          foreach($raport as $key => $data): 
            if($data['id_raport']!= null):
          ?>
        <td><?= $i ?></td>
        <td><?= $data['nama_lengkap'] ?></td>
        <td><?= $data['semester'] ?></td>
        <td><?= $data['nama_kelompok'] ?></td>
        <td><?= $data['tahun_ajaran'] ?></td>
        <td>
          <div class="buttons is-right">
            <a class="button is-small is-primary" type="button" href="<?= base_url()."raport/grafik?id_raport=".$data['id_raport']."&no_induk=".$data['no_induk']."&semester=".$data['semester']."&tahun_ajaran=".$data['tahun_ajaran']."&id_kelompok=".$data['id_kelompok'] ?>">
              <span class="icon"><i class="fas fa-chart-bar"></i></span>
              <span>Grafik</span>
            </a>
            <?php if($this->session->user['id_jabatan'] == "ADMIN" || $this->session->user['id_jabatan'] == "WLKLS" || $this->session->user['id_jabatan'] == "KPSEK"): ?>
            <a class="button is-small is-primary" type="button" href="<?= base_url()."raport/isi?id_raport=".$data['id_raport']."&no_induk=".$data['no_induk']."&semester=".$data['semester']."&tahun_ajaran=".$data['tahun_ajaran']."&id_kelompok=".$data['id_kelompok'] ?>">
              <span class="icon"><i class="fas fa-eye"></i></span>
              <span>Lihat</span>
            </a>
            <a class="button is-small is-primary" type="button" href="<?= base_url()."raport/form/update?no_induk=".$data['no_induk']."&semester=".$data['semester']."&tahun_ajaran=".$data['tahun_ajaran']."&id_kelompok=".$data['id_kelompok'] ?>">
              <span class="icon"><i class="fas fa-edit"></i></span>
              <span>UPDATE</span>
            </a>
            <a class="button is-small is-primary" type="button" href="<?= base_url()."raport/print/?id_raport=".$data['id_raport']."&no_induk=".$data['no_induk']."&semester=".$data['semester']."&tahun_ajaran=".$data['tahun_ajaran']."&id_kelompok=".$data['id_kelompok'] ?>">
              <span class="icon">
                <i class="fa fa-clipboard-check"></i> 
              </span>
              <span>PRINT</span>
            </a>
            <a class="button is-small is-danger jb-modal" data-target="sample-modal" type="button" href="<?= base_url()."raport/delete/?id_raport=".$data['id_raport']."&no_induk=".$data['no_induk']."&semester=".$data['semester']."&tahun_ajaran=".$data['tahun_ajaran']."&id_kelompok=".$data['id_kelompok'] ?>">
              <span class="icon"><i class="mdi mdi-trash-can"></i></span>
            </a>
          <?php endif; ?>
          </div>
        </td>
      </tr>
      <?php endif;
            $i++;
          endforeach; 
        endif;
      ?>
      </tr>
      </tbody>
    </table>
  </div>
</div>