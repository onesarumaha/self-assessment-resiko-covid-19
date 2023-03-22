<div class="pesan-datapertanyaan" data-pesandatapertanyaan="<?= $this->session->flashdata('notif'); ?>"></div>
	
	<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $title; ?></h4>
                 <!--  <button class="btn btn-inverse-primary btn-fw btn-sm" data-toggle="modal" data-target="#exampleModal">[+] Tambah Karyawan</button> -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th> Tanggal / Waktu </th>
                          <th> Poin </th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
                      	$no = 1;
                      	foreach($app_kary as $approve ) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= date('d M Y', strtotime($approve['tgl'])) ?> / <?= $approve['waktu'] ?></td>
                          <td><?= $approve['poin']?></td>
                          

                        </tr>
                    <?php endforeach; ?>
                      </tbody>
                    </table>
                    <?php if(empty($app_kary) ) : ?>
				            <div class="alert alert-danger mt-3" role="alert">
				             <center>Data Tidak Ada !</center> 
				            </div>
				          <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

   
