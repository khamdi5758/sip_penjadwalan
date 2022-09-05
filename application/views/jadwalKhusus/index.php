<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Jadwal Khusus</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Jadwal Khusus</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- NOTIFIKASI -->
    <?php
    if ($this->session->flashdata('flash_jadwalKhusus')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6>
          <i class="icon fas fa-check"></i>
          Data Berhasil
          <strong>
            <?= $this->session->flashdata('flash_jadwalKhusus');   ?>
          </strong>
        </h6>
      </div>
    <?php } ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Tambah Data</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <?= validation_errors(); ?>
                <form action="<?= base_url() ?>DataJadwalKhusus/validation_form" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Hari</label>
                      <br>
                      <?php
                      $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                      foreach ($hari as $value) { ?>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="hari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                          <label class="form-check-label" for="<?= $value ?>"><?= $value ?></label>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                      <br>
                      <?php
                      $kelas = ['X', 'XI', 'XII'];
                      foreach ($kelas as $value) { ?>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="kelas[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                          <label class="form-check-label" for="<?= $value ?>"><?= $value ?></label>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <input class="form-control" type="text" name="keterangan" id="keterangan">
                    </div>
                    <div class="form-group">
                      <label for="sesi">Sesi Ke</label>
                      <input class="form-control" type="number" name="sesi" id="sesi" min="0" max="20">
                    </div>
                    <div class="form-group">
                      <label for="durasi">Durasi</label>
                      <input class="form-control" type="number" name="durasi" id="durasi">
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save">
                  </div>
                  <!-- /.card-body -->
                </form>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- list data -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- card-body -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Hari</th>
                  <th>Kelas</th>
                  <th>Keterangan</th>
                  <th>Sesi Ke</th>
                  <th>Durasi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($jadwal_khusus as $row) { ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['hari'] ?></td>
                    <td><?= $row['kelas'] ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td><?= $row['sesi'] ?></td>
                    <td><?= $row['durasi'] ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="<?= base_url() ?>DataJadwalKhusus/hapus/<?= $row['id_jadwal_khusus']   ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
                        <!-- <a href="<?= base_url() ?>DataJadwalKhusus/ubah/<?= $row['id_jadwal_khusus']  ?>" class="btn btn-warning">update</a> -->
                      </div>
                    </td>
                  </tr>
                <?php
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

    <?php
    if (empty($dataKelas)) {
      echo '<div class="alert alert-danger alert-dismissible">';
      echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">×</button>';
      echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
      echo 'data Kelas Belum Terisi';
      echo '</div>';
    }
    // if (empty($jadwal_khusus)) {
    //   echo '<div class="alert alert-danger alert-dismissible">';
    //   echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">×</button>';
    //   echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
    //   echo 'data Range Jam Belum Terisi';
    //   echo '</div>';
    // }
    if (empty($jadwal)) {
      echo '<div class="alert alert-danger alert-dismissible">';
      echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">×</button>';
      echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
      echo 'data Jadwal Belum Terisi';
      echo '</div>';
    }
    ?>
    <?php if (!empty($jadwal) && !empty($dataKelas)) : ?>
      <div class="row">
        <?php
        $arrHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
        $hari = array_column($jadwal, 'hari');
        function keteranganSesi($jadwal_khusus, $hari, $kelas, $sesi)
        {
          foreach ($jadwal_khusus as $value) {
            if ($value['hari'] == $hari && $value['kelas'] == $kelas && $value['sesi'] == $sesi) {
              return $value['keterangan'];
            }
          }
          // return ;
        }
        foreach ($arrHari as $valueHari) {
          if (in_array($valueHari, $hari)) {
            # code...
            // foreach ($hari as $valueHari) :
            $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
            $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
        ?>
            <div class="col-6">
              <div class="card">
                <!-- card-body -->
                <div class="card-body">
                  <h3><?= $valueHari ?></h3>
                  <table class="table table-bordered table-responsive">
                    <tr>
                      <th>+</th>
                      <?php foreach ($dataKelas as $valueKelas) : ?>
                        <th><?= $valueKelas->id_kelas ?></th>
                      <?php endforeach; ?>
                    </tr>
                    <?php
                    // print_r($penjadwalan);
                    for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                      <tr>
                        <td><?= $i ?></td>
                        <?php foreach ($dataKelas as $valueKelas) : ?>
                          <td>
                            <?php
                            $result =  keteranganSesi($jadwal_khusus, $valueHari, $valueKelas->kelas, $i);
                            echo $result;
                            ?>
                          </td>
                        <?php endforeach; ?>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
        <?php
            // endforeach;
          }
        }
        ?>
      </div>
    <?php endif; ?>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->