<div class="pesan-data" data-pesandata="<?= $this->session->flashdata('notif'); ?>"></div>
	
	<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $title; ?></h4>
                  <?php if($this->session->userdata('hak_akses') == 'Admin'):  ?>

                  <button class="btn btn-inverse-primary btn-fw btn-sm" data-toggle="modal" data-target="#exampleModal">[+] Tambah Karyawan</button>
             	 <?php endif ?>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th> Nama Karyawan </th>
                          <th> Jenis Kelamin </th>
                          <th> Jabatan </th>
                          <?php if($this->session->userdata('hak_akses') == 'Admin'):  ?>
                          <th> Aksi </th>
                      <?php endif; ?>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
                      	$no = 1;
                      	foreach($karyawan as $kar ) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $kar['nama_lengkap'] ?></td>
                          <td><?= $kar['jk'] ?></td>
                          <td><?= $kar['jabatan'] ?></td>
                          <?php if($this->session->userdata('hak_akses') == 'Admin'):  ?>
                          <td>
                          	<a href="<?= base_url('Karyawan/hapus') ?>/<?= $kar['id_user'] ?>" class="hapus-karyawan"><button class="btn btn-danger btn-rounded btn-fw btn-sm ">Hapus</button> </a>
                          	|
                          	<a href="<?= base_url('Karyawan/edit') ?>/<?= $kar['id_user'] ?>"><button class="btn btn-warning btn-rounded btn-fw btn-sm">Edit</button></a>
                          </td>
                      <?php endif; ?>
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
