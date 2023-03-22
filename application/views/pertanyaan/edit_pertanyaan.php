      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $title ?></h4>
                  
                  <form class="forms-sample" action="<?= base_url('Dataform/submit_edit_pertanyaan') ?>/<?= $pertanyaan['id_pertanyaan'] ?>" method="POST">
                    <input type="hidden" name="id_pertanyaan" value="<?= $pertanyaan['id_pertanyaan'] ?>">
                   
                    <div class="form-group">
                      <label for="exampleInputUsername12">Pertanyaan</label>

                       <textarea class="form-control" id="exampleTextarea1" rows="4" name="nama_pertanyaan" placeholder="Pertanyaan"><?= $pertanyaan['nama_pertanyaan'] ?></textarea>

                      <?php echo form_error('nama_pertanyaan','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername12">Poin</label>
                      <input type="number" class="form-control form-control-sm" id="exampleInputUsername1" placeholder="Poin" name="poin" value="<?= $pertanyaan['poin'] ?>">
                      <?php echo form_error('poin','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                  

                    <button type="submit" class="btn btn-primary mr-2">Edit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
