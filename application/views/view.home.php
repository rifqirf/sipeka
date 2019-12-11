<section class="hero is-hero-bar">
    <div class="hero-body">
      <div class="level">
        <div class="level-left">
          <div class="level-item"><h1 class="title">
            Profile
          </h1></div>
        </div>
        <div class="level-right" style="display: none;">
          <div class="level-item"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section is-main-section">
    <div class="tile is-ancestor">
      <div class="tile is-parent is-6">
        <div class="card tile is-child">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-circle default"></i></span>
              Grafik perkembangan Anak
            </p>
          </header>
          <div class="card-content">
						<div class="chart-area">
								<div style="height: 100%;">
									<div class="chartjs-size-monitor">
										<div class="chartjs-size-monitor-expand">
											<div></div>
										</div>
										<div class="chartjs-size-monitor-shrink">
											<div></div>
										</div>
									</div>
									<canvas id="big-line-chart" width="100" height="200" class="chartjs-render-monitor" style="display: block; height: 400px; width: 197px;"></canvas>
								</div>
							</div>
          </div>
        </div>
      </div>
      <div class="tile is-parent">
        <div class="card tile is-child">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account default"></i></span>
              Profile
            </p>
          </header>
          <div class="card-content">
            <div class="is-user-avatar image has-max-width is-aligned-center">
              <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1400&q=80" alt="John Doe">
            </div>
            <hr>
            <div class="field">
              <div class="control has-text-centered">
                <input type="button is-fullwidth" class="button is-info" value="Edit profile">
              </div>
            </div>
            <div class="field">
              <label class="label">Name</label>
              <div class="control is-clearfix">
                <input type="text" readonly value="John Doe" class="input is-static">
              </div>
            </div>
            <hr>
            <div class="field">
              <label class="label">E-mail</label>
              <div class="control is-clearfix">
                <input type="text" readonly value="user@example.com" class="input is-static">
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

  </section>
