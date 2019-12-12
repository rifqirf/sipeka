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

          <a class="button is-success" href="<?= base_url()."indikator/form/tambah/" ?>"
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
          Siswa
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
        <th>Deskripsi Indikator</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      <tr>
      <?php 
            $i = 1;
          foreach($indikator as $key => $data): 
          ?>
        <td><?= $i ?></td>
        <td><?= $data['indikator'] ?></td>
        <td>
          <div class="buttons is-right">
            <a class="button is-small is-primary" type="button" href="<?= base_url()."indikator/form/update?id=".$data['id_indikator'] ?>">
              <span class="icon"><i class="fas fa-edit"></i></span>
            </a>
            <a class="button is-small is-danger jb-modal" data-target="sample-modal" type="button" href="<?= base_url()."indikator/delete/".$data['id_indikator'] ?>">
              <span class="icon"><i class="mdi mdi-trash-can"></i></span>
            </a>
          </div>
        </td>
      </tr>
      <?php 
        $i++;
      endforeach; 
      ?>
      </tr>
      </tbody>
    </table>
  </div>
</div>