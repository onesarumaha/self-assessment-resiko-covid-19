<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dashboard/') ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php if($this->session->userdata('hak_akses') == 'Karyawan'):  ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dataform/form_karyawan'); ?>">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Form</span>
            </a>
          </li>

         

           <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dataform/isi_form'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Isi Form</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dataform/history'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">History</span>
            </a>
          </li>
 
        <?php endif; ?>
        <?php if($this->session->userdata('hak_akses') == 'Admin'):  ?>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Quetions/'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Data Quetions</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('karyawan/'); ?>">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Karyawan</span>
            </a>
          </li>

         

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dataform/'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Data Form</span>
            </a>
          </li>

         <!--  <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dataform/isi_form'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Isi Form</span>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dataform/approve'); ?>">
              <i class="icon-paper menu-icon"></i>
              <i class="icon-check account-check menu-icon"></i>
              <span class="menu-title">Approve</span>
            </a>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Laporan/'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>
        <?php endif; ?>

         <?php if($this->session->userdata('hak_akses') == 'Satgas'):  ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Quetions/'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Data Quetions</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('karyawan/'); ?>">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Karyawan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dataform/app_satgas'); ?>">
              <!-- <i class="icon-paper menu-icon"></i> -->
              <i class="icon-check account-check menu-icon"></i>
              <span class="menu-title">Approve</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Laporan/'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>
        <?php endif; ?>

       <?php if($this->session->userdata('hak_akses') == 'Pimpinan'):  ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('karyawan/'); ?>">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Karyawan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dataform/approve_pimpinan'); ?>">
              <!-- <i class="icon-paper menu-icon"></i> -->
              <i class="icon-check account-check menu-icon"></i>
              <span class="menu-title">Approve</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Laporan/'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>
        <?php endif; ?>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Login/logout'); ?>">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>