      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $title ?></h4>
                  
                  <form class="forms-sample" action="<?= base_url('Karyawan/submit_edit') ?>/<?= $karyawan['id_user'] ?>" method="POST">
                    <input type="hidden" name="id_user" value="<?= $karyawan['id_user'] ?>">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Lengkap</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="nama_lengkap" value="<?= $karyawan['nama_lengkap'] ?>">
                      <?php echo form_error('nama_lengkap','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group" >
                      <label for="exampleInputjk1">Jenis Kelamin</label>
                      <select class="form-control form-control-sm" name="jk">
                        <option value="<?= $karyawan['jk'] ?>">-- Pilih ---</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                      </select>
                      <?php echo form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername12">Username</label>
                      <input type="text" class="form-control form-control-sm" id="exampleInputUsername1" placeholder="Username" value="<?= $karyawan['username'] ?>" name="username">
                      <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputUsername12">Jabatan</label>
                      <input type="text" class="form-control form-control-sm" id="exampleInputUsername1" placeholder="Jabatan" value="<?= $karyawan['jabatan'] ?>" name="jabatan">
                      <?php echo form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Edit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
