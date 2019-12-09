<section class="pengaturan mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Raport</h3>
          </div>
          <div class="card-body">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                  Filter :
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">Filter</button>
                </li>
              </ol>
            </nav>
            <div class="table-responsive">
              <table id="tabel-raport" class="table table-striped stripe row-border order-column" style="width:100%">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>ID Raport</th>
                    <th>Tgl Raport</th>
                    <th>Kelompok</th>
                    <th>Semester</th>
                    <th>Wali Kelas</th>
                    <th>Operasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach($raport as $key => $data): 
                  ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $data['id_raport'] ?></td>
                    <td><?= $data['tgl_raport'] ?></td>
                    <td><?= $data['nama_kelompok'] ?></td>
                    <td><?= $data['semester'] ?></td>
                    <td><?= $data['nama_guru'] ?></td>
                    <td>
                      <a class="btn btn-info" href="<?= base_url()."raport/form/isi?id_raport=".$data['id_raport'] ?>" >ISI</a>
                      <a class="btn btn-danger" href="<?= base_url()."raport/delete/".$data['id_raport'] ?>" >DELETE</a>
                    </td>
                  </tr>
                  <?php 
                    $i++;
                  endforeach;
                  ?>
                </tbody>
              </table>
            </div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item align-content-lg-end" aria-current="page">
                  <a class="btn btn-success" href="<?= base_url()."raport/form/tambah/" ?>" >TAMBAH</a>
                </li>
              </ol>
            </nav>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<form action="<?= base_url()."raport/lihat/" ?>" method="GET" class="form-row">
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterModalLabel">Filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group col-lg-12">
          <label for="id_kelompok">Kelompok</label>
          <select class="form-control" id="id_kelompok" name="id_kelompok">
          <?php 
          if(!empty($kelompok)):
            foreach($kelompok as $key => $val): ?>
            <option value="<?= $val["id_kelompok"] ?>">
              <?= $val["nama_kelompok"] ?>
            </option>
            <?php
            endforeach;
          endif;
          ?>
          </select>
        </div>
        <div class="form-group col-lg-12">
          <label for="tahun_masuk">Tahun Ajaran</label>
          <select class="form-control" id="tahun_masuk" name="tahun_masuk">
          <?php 
            // $year = intval(date('yyyy', now()));
            for($i = 2019; $i >= 2001; $i--): ?>
            <option value="<?= $i ?>">
              <?= $i ?>
             </option>
            <?php
            endfor;
            ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>
    </div>
  </div>
</div>

    