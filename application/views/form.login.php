<section class="login">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title"><?= strtoupper("Login ".$user) ?></h5>
          </div>
          <div class="card-body">
            <form action="<?= base_url()."auth/login" ?>" method="POST" class="form-row">
              <div class="form-group col-lg-6">
                <label for="username">Username</label>
                <input type="username" class="form-control" name="username" id="username" aria-describedby="usernameHelp" placeholder="Masukkan Username">
              </div>
              <div class="form-group col-lg-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
              </div>
              <div class="form-group col-lg-12">
                <label for="id_roles">Sebagai</label>
                <select name="id_roles" class="form-control" id="id_roles">
                  <?php foreach($roles as $key => $val): ?>
                  <option <?= ($roles != null) ? "selected" : "" ?> value="<?= ($roles != null) ? $val["id_roles"] : "" ?>">
                    <?= ($roles != null) ? strtoupper($val["nama_role"]) : "" ?>
                  </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

