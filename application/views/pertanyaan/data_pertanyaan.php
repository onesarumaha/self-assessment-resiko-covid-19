<div class="pesan-pertanyaan" data-pesanpertanyaan="<?= $this->session->flashdata('notif'); ?>"></div>
	
	<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $title; ?></h4>
                  <button class="btn btn-inverse-primary btn-fw btn-sm" data-toggle="modal" data-target="#exampleModal">[+] Tambah</button>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th> Pertanyaan </th>
                          <th> Poin </th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
                      	$no = 1;
                      	foreach($pertanyaan as $per ) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $per['nama_pertanyaan'] ?></td>
                          <td><?= $per['poin'] ?></td>
                          <td>
                          	<a href="<?= base_url('Dataform/hapus_pertanyaan') ?>/<?= $per['id_pertanyaan'] ?>" class="hapus-pertanyaan"><button class="btn btn-danger btn-rounded btn-fw btn-sm ">Hapus</button> </a>
                          	|
                          	<a href="<?= base_url('Dataform/edit_pertanyaan') ?>/<?= $per['id_pertanyaan'] ?>"><button class="btn btn-warning btn-rounded btn-fw btn-sm">Edit</button></a>
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
	        <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form class="forms-sample" action="<?= base_url('Dataform/submit_pertanyaan') ?>" method="POST">
	            <div class="form-group">
	              <label for="exampleInputUsername1">Pertanyaan</label>
	             
	              <textarea class="form-control" id="exampleTextarea1" rows="4" name="nama_pertanyaan" placeholder="Pertanyaan"></textarea>
	              <?php echo form_error('nama_pertanyaan','<small class="text-danger pl-3">','</small>'); ?>

	            </div>

	            <div class="form-group">
	              <label for="exampleInputUsername12">Poin</label>
	              <input type="number" class="form-control form-control-sm" id="exampleInputUsername1" placeholder="Poin" name="poin">
	              <?php echo form_error('poin','<small class="text-danger pl-3">','</small>'); ?>
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
