<div class="pesan-fromstatus" data-pesanfromstatus="<?= $this->session->flashdata('notif'); ?>"></div>
	
	<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Self Assessment Resiko Covid-19</h4>
                  <?php if(validation_errors()){ ?>
                 <div class="alert alert-danger" role="alert">
                <?php echo validation_errors(); ?>
                  </div>
                <?php } ?>
                 <form action="<?= base_url('Dataform/submit_jawab') ?>" method="POST">
                  <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                 

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <?php 
                      $skrg = date('Y-m-d', strtotime("1 day", strtotime(date('Y-m-d')))); 
                      $besok = date('Y-m-d', strtotime("+2 day", strtotime(date('Y-m-d')))); 

                      ?>
                       <input class="form-control" name="tgl" min="<?= $skrg ?>" max="<?= $besok ?>" type="date">
                      <thead>
                        <tr>
                          <th style="width: 5px;"> No </th>
                          <th> Pertanyaan </th>
                          <th> Self Assessment Resiko Covid-19 </th>
                        </tr>
                      </thead>
                      <tbody>
                      	
                      	<tr>
                      		<td>1</td>
                      		<td>
                            
                            Apakah anda pernah mengalamin demam/pilek/batuk/sakit <br>tenggorokan/sesak nafas/indra penciuman/indra perasa <br> dalam 14 hari terakhir? 
                          </td>
                          <td>
                     <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pertanyaan1" id="membershipRadios1" value="60" >
                                Yes
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pertanyaan1" id="membershipRadios2" value="0">
                                No
                              <i class="input-helper"></i></label>

                            </div>
                          </div>
                        </div>
                      </div>

                      		</td>
                      	</tr>

                        <tr>
                          <td>2</td>
                          <td>
                            Apakah anda pernah melakukan kegiatan perjalanan <br>keluar kota/ internasional dalam 14 hari terakhir?  
                          </td>
                          <td>
                           <div class="col-md-6">
                              <div class="form-group row">
                                <div class="col-sm-4">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pertanyaan2" id="membershipRadios3" value="10" >
                                      Yes
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-5">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pertanyaan2" id="membershipRadios3" value="0">
                                      No
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </td>
                        </tr>

                         <tr>
                          <td>3</td>
                          <td>
                            Apakah anda pernah mengikuti kegiatan yang belibatkan orang<br> banyak dalam 14 hari terakhir ?
                          </td>
                          <td>
                           <div class="col-md-6">
                              <div class="form-group row">
                                <div class="col-sm-4">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pertanyaan3" id="membershipRadios3" value="5">
                                      Yes
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-5">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pertanyaan3" id="membershipRadios3" value="0">
                                      No
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </td>
                        </tr>

                        <tr>
                          <td>4</td>
                          <td>
                            Apakah anda memiliki riwayat kontak erat dengan orang yang <br>dinyatakan COVID-19 seperti (Berjabat tangan, berbicara, <br>berada dalam satu ruangan) dalam 14 hari terakhir ?
                          </td>
                          <td>
                           <div class="col-md-6">
                              <div class="form-group row">
                                <div class="col-sm-4">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pertanyaan4" id="membershipRadios3" value="15">
                                      Yes
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-5">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pertanyaan4" id="membershipRadios3" value="0">
                                      No
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </td>
                        </tr>

                        <tr>
                          <td>5</td>
                          <td>
                            Apakah Anda Pernah Keluar Rumah/Tempat Umum<br> (pasar, kerumunan 
                            orang, dll) dalam 14 hari terakhir ? 

                          </td>
                          <td>
                           <div class="col-md-6">
                              <div class="form-group row">
                                <div class="col-sm-4">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pertanyaan5" id="membershipRadios3" value="10">
                                      Yes
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-5">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="pertanyaan5" id="membershipRadios3" value="0">
                                      No
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </td>
                        </tr>

                      </tbody>
                    </table>
                    <button class="btn btn-primary float-right mt-3">Simpan</button>

                  </div>

                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>

    