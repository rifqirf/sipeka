<!-- baru -->

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
        <td><?= $data['sub_deskripsi'] ?></td>
        <td><?= $data['deskripsi'] ?></td>
        <td>
          <div class="buttons is-right">
            <a class="button is-small is-primary" type="button" href="<?= base_url()."subindikator/form/update?id=".$data['no_subindikator'] ?>">
              <span class="icon"><i class="fas fa-edit"></i></span>
            </a>
            <a class="button is-small is-danger jb-modal" data-target="sample-modal" type="button" href="<?= base_url()."subindikator/delete/".$data['no_subindikator'] ?>">
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