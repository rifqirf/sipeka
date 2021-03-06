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
        <a class="button is-success" href="<?= base_url()."siswa/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-filter"></i></span>
            <span>Filter</span>
          </a>

          <a class="button is-success" href="<?= base_url()."subindikator/form/tambah/" ?>"
            class="button is-primary"><span class="icon"><i
              class="mdi mdi-credit-card-outline"></i></span>
            <span>Tambah</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- baru -->
<section class="section is-main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-add"></i></span>
          Subindikator
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
          <p>Filter</p>
        </a>
      </header>
<div class="card-content">
  <div class="table-container">
    <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
      <thead>
        <tr>
          <th>No</th>
          <th>Sub Indikator</th>
          <th>Indikator</th>
          <th>Operasi</th>
        </tr>
      </thead>
      <tbody>
      <tr>
        <?php 
        $i = 1;
        foreach($subindikator as $key => $data): 
        ?>
        <td><?= $i ?></td>
        <td><?= $data['subindikator'] ?></td>
        <td><?= $data['indikator'] ?></td>
        <td>
          <div class="buttons is-right">
            <a class="button is-small is-primary" type="button" href="<?= base_url()."subindikator/form/update?id=".$data['id_subindikator'] ?>">
              <span class="icon"><i class="fas fa-edit"></i></span>
            </a>
            <a class="button is-small is-danger jb-modal" data-target="sample-modal" type="button" href="<?= base_url()."subindikator/delete/".$data['id_subindikator'] ?>">
              <span class="icon"><i class="mdi mdi-trash-can"></i></span>
            </a>
          </div>
        </td>
      </tr>
      <?php 
        $i++;
        endforeach; 
      ?>
      </tbody>
    </table>
  </div>
</div>