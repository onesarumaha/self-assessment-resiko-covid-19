 <div class="pesan-user" data-pesanuser="<?= $this->session->flashdata('notif'); ?>"></div>
 <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

           <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $title ?></h4>
                  <form action="<?= base_url('Profile/submit_profile/') ?><?= $this->session->userdata('id_user')?>" method="POST" class="form-sample">
                    <?php foreach($usernya as $user) : ?>
                      <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user')?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                            <input name="nama_lengkap" type="text" value="<?= $user['nama_lengkap'] ?>" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jabatan</label>
                          <div class="col-sm-9">
                            <input name="jabatan" type="text" value="<?= $user['jabatan'] ?>" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="jk">
                              <?php if($user['jk'] == 'Pria') : ?>
                              <option value="Pria">Pria</option>
                              <option value="Wanita">Wanita</option>
                            <?php endif; ?>
                              <?php if($user['jk'] == 'Wanita') : ?>
                              <option value="Wanita">Wanita</option>
                              <option value="Pria">Pria</option>
                            <?php endif; ?>
                            <?php if($user['jk'] == '-') : ?>
                              <option value="-">-</option>
                              <option value="Pria">Pria</option>
                              <option value="Wanita">Wanita</option>
                            <?php endif; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input name="username" type="text" value="<?= $user['username'] ?>" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input name="email" type="text" value="<?= $user['email'] ?>" class="form-control" />
                            <small class="card-description">*Pastikan Email Anda Benar! </small>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  <?php endforeach; ?>
                  <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
