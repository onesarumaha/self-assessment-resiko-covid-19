<div class="pesan-email" data-pesanemail="<?= $this->session->flashdata('notif'); ?>"></div>
	
	<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $title; ?></h4>
                 
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th> Tanggal / Waktu </th>
                          <th> Nama Karyawan </th>
                          <th> Poin </th>
                          <th> Status </th>
                          <th> Share </th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
                      	$no = 1;
                      	foreach($app_suk as $approve ) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $approve['tgl'] ?> / <?= $approve['waktu'] ?></td>
                          <td><?= $approve['nama_lengkap'] ?></td>
                          <td><?= $approve['poin'];
                          	?></td>
                          <td>
                          	<?php 
                          	if($approve['isi_status'] == 'Tidak Diizinkan Masuk' ) 
                          	{
                              echo "<label style='color:red; font-weight: bold;'>Tidak Diizinkan Masuk</label>";
                          }elseif($approve['isi_status'] == 'Diizinkan Masuk' && $approve['poin'] > 50){
                          		echo "Menunggu Diapprove";
                          }else{
                          	echo $approve['isi_status'];
                          }
                          	?>
                          </td>
                          <td>
                            <?php if($approve['isi_status'] == 'Tidak Diizinkan Masuk' ) : ?>
                              <button class="btn btn-primary btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#exampleModal<?= $approve['id_form'] ?>"><i class="ti-email"></i></button>
                            <?php endif; ?>
                            <?php if($approve['isi_status'] == 'Diizinkan Masuk' && $approve['poin'] < 50) : ?>
                              <button class="btn btn-primary btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#exampleModal<?= $approve['id_form'] ?>"><i class="ti-email"></i></button>
                            <?php endif; ?>
                            <?php if($approve['isi_status'] == 'Diizinkan Masuk Dengan Pemantauan Ketat') : ?>
                              <button class="btn btn-primary btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#exampleModal<?= $approve['id_form'] ?>"><i class="ti-email"></i></button>
                            <?php endif; ?>
                            <!-- <button class="btn btn-primary btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#exampleModal<?= $approve['id_form'] ?>"><i class="ti-email"></i></button> -->
                          </td>
                        </tr>

                        <div class="modal fade" id="exampleModal<?= $approve['id_form'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Share Via Email</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <label>Yakin Share ke Email ?</label>
                                  <form action="<?= base_url('Email/share/') ?>" method="POST">
                                    <input type="hidden" name="" value="<?= $approve['id_form'] ?>">
                                    <input type="hidden" class="form-control" id="inputEmail" name="tgl" value="<?= $approve['tgl'] ?>">

                                    <input type="hidden" class="form-control" id="inputEmail" name="waktu" value="<?= $approve['waktu'] ?>">

                                    <input type="hidden" class="form-control" id="inputEmail" name="email" value="<?= $approve['email'] ?>">

                                   <input type="hidden" class="form-control" id="inputEmail" name="nama_lengkap" value="<?= $approve['nama_lengkap'] ?>">
                                    <input type="hidden" class="form-control" id="inputEmail" name="status" value="<?= $approve['isi_status'] ?>">
                                    
                                    <input type="hidden" class="form-control" id="inputEmail" name="poin" value="<?= $approve['poin'] ?>">
                                      
                                   <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Yakin</button>
                                  </div>
                                  </form>
                              </div>
                              
                            </div>
                          </div>
                        </div>


                    <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form class="forms-sample" action="<?= base_url('Karyawan/submit') ?>" method="POST">
	            <div class="form-group">
	              <label for="exampleInputUsername1">Nama Karyawan</label>
	              <input type="text" class="form-control form-control-sm" id="exampleInputUsername1" placeholder="Nama Karyawan" name="nama_lengkap">
	              <?php echo form_error('nama_lengkap','<small class="text-danger pl-3">','</small>'); ?>
	            </div>
	            <div class="form-group" >
	              <label for="exampleInputjk1">Jenis Kelamin</label>
	              <select class="form-control form-control-sm" name="jk">
	              	<option disabled="">-- Pilih ---</option>
	              	<option value="Pria">Pria</option>
	              	<option value="Wanita">Wanita</option>
	              </select>
	              <?php echo form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputUsername12">Username</label>
	              <input type="text" class="form-control form-control-sm" id="exampleInputUsername1" placeholder="Username" name="username">
	              <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
	            </div>
	            <div class="form-group">
	              <label for="exampleInputUsername12">Jabatan</label>
	              <input type="text" class="form-control form-control-sm" id="exampleInputUsername1" placeholder="Jabatan" name="jabatan">
	              <?php echo form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?>
	            </div>
	            <div class="form-group">
	              <input type="hidden" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	            </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
			      </div>
	          </form>
	      </div>

	    </div>
	  </div>
	</div>
