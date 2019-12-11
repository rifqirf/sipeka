<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sistem Informasi Perkembangan Anak</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bulma/css/style.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bulma/css/fontawesome.css"/>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bulma/css/all.css"/>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bulma/css/main.css"/>
		
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<!-- Fonts -->
		<link rel="dns-prefetch" href="https://fonts.gstatic.com" />
		<link rel="dns-prefetch" href="/assets/font/fa-solid-900.ttf" />
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css" />

		<!-- script -->
		<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
		<script src="/assets/lib/chunk-vendors.5c11ecce.js"></script>
		<script src="/assets/lib/app.662731f9.js"></script> 
	</head>

	<body>
		<section class="section hero is-fullheight is-light">
			<div class="hero-body">
				<div class="container">
					<div class="columns">
						<div class="column is-half">
							<h1 class="title is-2">
								Selamat datang di Sistem Informasi Perkembangan Nilai Anak <strong><b>(SIPEKA)</b></strong>
							</h1>
							<p class="subtitle is-medium" style="margin-top: 20px;">
								Aplikasi ini bertujuan untuk membantu para guru TK serta orang tua untuk melihat bagaimana proses perkembangan anak.
							</p>
						</div>
						<div class="column is-two-fifths">
							<div class="card">
								<header class="card-header">
									<p class="card-header-title">
										Masuk ke SiPeka
									</p>
									<span href="#" class="card-header-icon" aria-label="more options">
											<a class="button has-text-centered" href="google.com"><ion-icon name="lock"></ion-icon></a>
										</span>
								</header>
								<div class="card-content">
									<form action="<?= base_url()."auth/login" ?>" method="POST">
										<div class="field"><label class="label">Username</label>
											<div class="control has-icons-right">
												<input autocomplete="on" id="username" name="username" placeholder="Masukan username anda"
													required="required" autofocus="autofocus" class="input">
												<!----> <span class="icon is-right has-text-danger"><i
														class="mdi mdi-alert-circle mdi-24px"></ion-icon></span>
												<!---->
											</div>
										</div>
										<div class="field"><label class="label">Password</label>
											<div class="control is-clearfix">
												<input type="password" autocomplete="on" id="password" name="password" placeholder="Masukan Password"
													required="required" class="input" >
											</div>
											<!---->
										</div>
										<div class="field"><label class="label">Masuk sebagai</label>
                    <div class="field is-narrow">
                      <div class="control">
                        <div class="select is-fullwidth">
                          <select name="id_roles" id="id_roles">
                          <?php foreach($roles as $key => $val): ?>
                          <option <?= ($roles != null) ? "selected" : "" ?> value="<?= ($roles != null) ? $val["id_roles"] : "" ?>">
                            <?= ($roles != null) ? strtolower($val["nama_role"]) : "" ?>
                          </option>
                          <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
											<!---->
										</div>
											<!---->
										<div class="control"><button type="submit" class="button is-info is-fullwidth ">
												Login
											</button>
                    </div>
									</form>
								</div>
								<!---->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- footer -->
		<footer class="footer is-fullheight is-large">
				<div class="content has-text-centered">
						<p>
							<strong>Zaid</strong> by <a href="">Zaid Company</a>. The source code is licensed
							<a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
							is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
						</p>
					</div>
		</footer>
	</body>
</html>
