      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome, <?= $this->session->userdata('nama_lengkap')?></h3>
                </div>
               
              </div>
            </div>
          </div>
          <div class="row">
             <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card mt-auto">
                  <img src="<?= base_url('assets/template/') ?>images/dashboard/ini.jpg">
                  
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Quetions</p>
                      <p class="fs-30 mb-2">5</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Users</p>
                      <p class="fs-30 mb-2"><?= $jum_karyawan ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Data Form</p>
                      <p class="fs-30 mb-2"><?= $masuk ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Laporan</p>
                      <p class="fs-30 mb-2"><?= $masuk ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br><br><br>
         
