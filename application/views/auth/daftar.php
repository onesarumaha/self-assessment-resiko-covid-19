<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DAFTAR | PT Uninet Media Sakti</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets/template') ?>/images/download.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= base_url('assets/template/') ?>images/download.png" alt="logo">
              </div>
              <h4>Daftar</h4>
              <h6 class="font-weight-light">Silahkan Buat Akun Anda !</h6>
              <form class="pt-3" action="<?= base_url('Login/action_daftar'); ?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputnama" placeholder="Nama" name="nama">
                  <?php echo form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputnama" placeholder="Email" name="email">
                  <?php echo form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                </div>
               
                
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="username">
                  <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                  <?php echo form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword2" placeholder="Konfirmasi Password" name="konfirmasi_password">
                  <?php echo form_error('konfirmasi_password','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                  <p class="text-muted">*Pastikan Email Anda Benar !</p>
                
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Daftar</button>
                <div class="text-center mt-4 font-weight-light">
                  Sudah punya akun ? <a href="<?= base_url('Login') ?>" class="text-primary">Kembali ke Login!</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url('assets/template/') ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('assets/template/') ?>js/off-canvas.js"></script>
  <script src="<?= base_url('assets/template/') ?>js/hoverable-collapse.js"></script>
  <script src="<?= base_url('assets/template/') ?>js/template.js"></script>
  <script src="<?= base_url('assets/template/') ?>js/settings.js"></script>
  <script src="<?= base_url('assets/template/') ?>js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
