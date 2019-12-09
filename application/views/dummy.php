<section class="nilai mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Raport Siswa</h3>
          </div>
          <div class="card-body">
            <form action="<?= base_url()."nilai/redirect" ?>" method="POST" class="form-row">
              <div class="form-group col-lg-12">
                <label for="no_induk">Nama Siswa</label>
                <select class="form-control" id="no_induk" name="no_induk">
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
              <div class="form-group col-lg-6">
                <label for="id_kelompok">Kelompok</label>
                <select class="form-control" id="id_kelompok" name="id_kelompok">
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
              <div class="form-group col-lg-6">
                <label for="semester">Semester</label>
                <select class="form-control" id="semester" name="semester">
                  <?php 
                  for($sm = 1; $sm <= 2; $sm++): ?>
                  <option value="<?= $sm ?>">
                    <?= $sm ?>
                  </option>
                  <?php 
                  endfor;
                  ?>
                </select>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
$nilai = ["BB", "MB", "BSH", "BSB"]; 

?>
<section class="nilai mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Nilai Raport</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th class="text-center align-middle" scope="col" rowspan="2">No</th>
                  <th class="text-center align-middle" scope="col" rowspan="2">INDIKATOR TINGKAT PENCAPAIAN PERKEMBANGAN</th>
                  <?php for($sm = 1; $sm <= 2; $sm++): ?>
                  <th class="text-center align-middle" scope="col" colspan="<?= count($nilai) ?>"><?= "SEMESTER ".$sm ?></th>
                  <?php endfor; ?>
                </tr>
                <tr>
                  <?php for($sm = 1; $sm <= 2; $sm++): ?>
                    <?php for($nl = 0; $nl < count($nilai); $nl++): ?>
                    <th class="text-center align-middle" scope="col"><?= $nilai[$nl] ?></th>
                    <?php endfor; ?>
                  <?php endfor; ?>
                </tr>
              </thead>
              <tbody>
                <?php for($i = 1; $i < 3; $i++): ?>
                <tr>
                  <td colspan="<?= (count($nilai) * 2) + 2 ?>">
                    <h5><?= "Indikator ".$i ?></h5>
                  </td>
                </tr>
                <tr>
                  <th>1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                </tr>
                <?php endfor; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>