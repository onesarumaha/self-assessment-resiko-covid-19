<div class="pesan-pertanyaan" data-pesanpertanyaan="<?= $this->session->flashdata('notif'); ?>"></div>
	
	<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $title; ?></h4>
                 <!--  <button class="btn btn-inverse-primary btn-fw btn-sm" data-toggle="modal" data-target="#exampleModal">[+] Tambah</button> -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th> Pertanyaan </th>
                          <th> Poin </th>
                        </tr>
                      </thead>
                      <tbody>
                      	
                        <tr>
                          <td>1</td>
                          <td>Apakah anda pernah mengalamin demam / pilek / batuk / sakit <br>tenggorokan / sesak nafas / indra penciuman/indra perasa <br> dalam 14 hari terakhir? </td>
                          <td>60</td>
                          
                        </tr>
                        <tr>
                          
                          <td>2</td>
                          <td>Apakah anda pernah melakukan kegiatan perjalanan <br>keluar kota/ internasional dalam 14 hari terakhir?   </td>
                          <td>10</td>                                                 
                        </tr>
                        <tr>
                         <td>3</td>
                          <td>Apakah anda pernah mengikuti kegiatan yang belibatkan orang<br> banyak dalam 14 hari terakhir ?  </td>
                          <td>5</td>
                          
                        </tr>
                        <tr>
                          
                          <td>4</td>
                          <td> Apakah anda memiliki riwayat kontak erat dengan orang yang <br>dinyatakan COVID-19 seperti (Berjabat tangan, berbicara, <br>berada dalam satu ruangan) dalam 14 hari terakhir ?  </td>
                          <td>15</td>
                          
                        </tr>
                        <tr>
                         
                          <td>5</td>
                          <td> Apakah Anda Pernah Keluar Rumah/Tempat Umum<br> (pasar, kerumunan orang, dll) dalam 14 hari terakhir ?   </td>
                          <td>10</td>
                          
                        </tr>
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
