<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <!-- <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">Sistem Penjadwalan</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $this->session->userdata('username') ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a href="<?= base_url('Welcome') ?>" class="nav-link active">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard</i>
            </p>
          </a>
        </li>
        <!-- Data Jurusan  -->
        <li class="nav-item">
          <a href="<?= base_url() ?>DataJurusan" class="nav-link">
            <i class="fas fa-shield-alt"></i>
            <p>
              Data Jurusan
            </p>
          </a>
        </li>
        <!-- Data Kelas -->
        <li class="nav-item">
          <a href="<?= base_url() ?>DataKelas" class="nav-link">
            <i class="fas fa-school"></i>
            <p>
              Data Kelas
            </p>
          </a>
        </li>
        <!-- Data Mapel -->
        <li class="nav-item">
          <a href="<?= base_url() ?>DataMapel" class="nav-link">
            <i class="fas fa-book-open"></i>
            <p>
              Data Mapel
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>DataRuang" class="nav-link">
            <i class="fas fa-book-open"></i>
            <p>
              Data Ruang
            </p>
          </a>
        </li>
        
        <!-- data guru -->
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-user"></i>
            <p> Guru <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">-->
            <li class="nav-item">
              <a href="<?= base_url() ?>DataGuru" class="nav-link">
                <i class="fas fa-user-tie"></i>
                <p>
                  Data Guru
                </p>
              </a>
            </li>
            <!--<li class="nav-item">
              <a href="<?= base_url() ?>DataPenugasanGuru" class="nav-link ml-3">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>Penugasan Guru</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>DataRequestJadwal" class="nav-link ml-3">
                <i class="fas fa-table"></i>
                <p>
                  Request Jadwal
                </p>
              </a>
            </li>
          </ul>
        </li> -->
        <!-- Range Jam -->
        <li class="nav-item">
          <a href="<?= base_url() ?>DataRangeJam" class="nav-link">
            <i class="fas fa-table"></i>
            <p>
              Range Jam
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>DataRangeHari" class="nav-link">
            <i class="fas fa-table"></i>
            <p>
              Range Hari
            </p>
          </a>
        </li>
        <!-- Jadwal Khusus -->
        <!-- <li class="nav-item">
          <a href="<?//= base_url() ?>DataJadwalKhusus  " class="nav-link">
            <i class="fas fa-table"></i>
            <p>
              Jadwal Khusus
            </p>
          </a>
        </li> -->

        <!-- Penjadwalan -->
        <li class="nav-item">
          <a href="<?= base_url() ?>DataJadwal" class="nav-link">
            <i class="fas fa-table"></i>
            <p>
              Penjadwalan
            </p>
          </a>
        </li>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>