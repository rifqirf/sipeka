
<!-- baru -->
<div class="card-content">
  <div class="table-container">
    <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
      <thead>
      <tr>
        <th>No</th>
        <th>Indikator</th>
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
        <td><?= $data['deskripsi'] ?></td>
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
      </tbody>
    </table>
  </div>
</div>