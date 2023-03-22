<div class="pesan-data" data-pesandata="<?= $this->session->flashdata('notif'); ?>"></div>
	
	<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $title; ?></h4>
     		<form action="<?= base_url('Laporan/cetak_periode') ?>" method="POST" target="_blank">
              <div class="card-body">
                  <div class="form-group row">
                    <div class="col">
                      <label>Dari Tanggal : </label>
                      <div id="the-basics">
                        <input class="typeahead" type="date" id="tgl_1" name="tgl_1" required="">
                      </div>
                    </div>
                    <div class="col">
                      <label>Sampai Tanggal :</label>
                      <div id="bloodhound">
                        <input class="typeahead" type="date" id="tgl_2" name="tgl_2" required="">
                      </div>
                    </div>
                    <div class="col">
                      <label>Status</label>
                      <div id="bloodhound">
                        <select class="form-control" id="exampleSelectGender" name="status">
                          <option value="Diizinkan Masuk">Diizinkan Masuk</option>
                          <option value="Tidak Diizinkan Masuk">Tidak Diizinkan Masuk</option>
                          <option value="Diizinkan Masuk Dengan Pemantauan Ketat">Diizinkan Masuk Dengan Pemantauan Ketat</option>
                          <option value="Telah Diapprove Oleh Satgas">Telah Diapprove Oleh Satgas</option>
                        </select>
                      </div>
                    </div>
                  </div>
                   <button type="submit" name="periode" class="btn btn-primary btn-sm">Cetak Periode</button>
                    <a href="<?= base_url("Laporan/cetak_laporan") ?>" class="btn btn-success btn-sm" target="_blank">Cetak Full</a>
                </div>
			</form>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th> Tanggal / Waktu </th>
                          <th> Nama Karyawan </th>
                          <th> Poin </th>
                          <th> Status </th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
                      	$no = 1;
                      	foreach($laporan as $lap ) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $lap['tgl'] ?> / <?= $lap['waktu'] ?></td>
                          <td><?= $lap['nama_lengkap'] ?></td>
                          <td><?= $lap['poin'];
                          	?></td>
                          <td>
                            <?php 
                            if($lap['isi_status'] == 'Tidak Diizinkan Masuk' ) 
                            {
                              echo "<label style='color:red;'>Tidak Diizinkan Masuk</label>";
                          }elseif($lap['isi_status'] == 'Diizinkan Masuk' && $lap['poin'] > 50){
                              echo "Menunggu Diapprove";
                          }else{
                            echo $lap['isi_status'];
                          }
                            ?>

                          </td>

                        </tr>
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
