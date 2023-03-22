<div class="pesan-satgas" data-pesansatgas="<?= $this->session->flashdata('notif'); ?>"></div>
	
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
                          <th> Nama Karyawan </th>
                          <th> Poin </th>
                          <th> Status </th>
                          <?php if($this->session->userdata('hak_akses') == 'Satgas'):  ?>
                          <th> Aksi </th>
                        <?php endif; ?>

                        <?php if($this->session->userdata('hak_akses') == 'Pimpinan'):  ?>
                          <th> Aksi </th>
                        <?php endif; ?>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
                      	$no = 1;
                      	foreach($app as $approve ) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $approve['tgl'] ?> / <?= $approve['waktu'] ?></td>
                          <td><?= $approve['nama_lengkap'] ?></td>
                          <td><?= $approve['poin'];?></td>
                          <td>
                           <?php echo  $approve['isi_status'] ?>
                            
                          </td>
                          <td>
                            

                            <?php if($this->session->userdata('hak_akses') == 'Satgas'):  ?>
                            <a href="<?= base_url('Dataform/approve_satgas/') ?><?= $approve['id_status'] ?>" class="btn btn-success btn-rounded btn-fw btn-sm approve-satgas">Approve</a>

                            <a href="<?= base_url('Dataform/approve_satgas_tidak/') ?><?= $approve['id_status'] ?>" class="btn btn-danger btn-rounded btn-fw btn-sm approve-satgas-tidak">Tidak Diizinkan</a>
                            <?php endif ?>

                            <?php if($this->session->userdata('hak_akses') == 'Pimpinan'):  ?>
                            <button class="btn btn-success btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#exampleModal<?= $approve['id_status'] ?>">Approve</button>
                            <?php endif ?>

                          </td>
                        </tr>

                        <!-- Modal -->
						<div class="modal fade" id="exampleModal<?= $approve['id_status'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Approve </h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="<?= base_url('Dataform/approve_pertanyaan') ?>/<?= $approve['id_status']; ?>" method="POST">
						        	<input type="hidden" name="id_status" value="<?= $approve['id_status'] ?>">
						        	<input type="hidden" name="id_form" value="<?= $approve['id_form'] ?>">
						        	<div class="form-group">
						            <select class="form-control form-control-sm" id="isi_status" name="isi_status">
						            	<option disabled="">-- Pilih --</option>
						              <option value="Tidak Diizinkan Masuk">Tidak Diizinkan Masuk</option>
						              <option value="Diizinkan Masuk Dengan Pemantauan Ketat ">Diizinkan Masuk Dengan Pemantauan Ketat </option>
						            </select>
						          </div>
						          <label class="isinya" id="isinya"></label>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
						        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
						      </div>
						     </form>

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

    <script type="text/javascript">
    	$('#isi_status').on('change', function(){
		  const selectedPackage = $('#isi_status').val();
		  $('#isinya').html('hffhfgh');
		});
    </script>

