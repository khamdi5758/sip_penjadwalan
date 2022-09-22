<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Guru</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Guru</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <!-- NOTIFIKASI -->
    <?php
    if ($this->session->flashdata('flash_guru')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6>
          <i class="icon fas fa-check"></i>
          Data Berhasil
          <strong>
            <?= $this->session->flashdata('flash_guru');   ?>
          </strong>
        </h6>
      </div>
    <?php } ?>
    <!-- tambah data -->
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
                <form action="<?= base_url() ?>DataGuru/validation_form" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Kode Guru</label>
                      <input type="text" class="form-control" name="id_gur">
                    </div>
                    <div class="form-group">
                      <label>Nama Guru</label>
                      <input type="text" class="form-control" name="nama_gur">
                    </div>
                    <div class="form-group">
                      <label>Status Guru</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="status_gur" value="honorer" placeholder="honorer" required>Guru Honorer
                        </label>
                        <label>
                          <input type="radio" name="status_gur" value="tetap" placeholder="tetap" required>Guru Tetap
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Pendidikan Guru</label>
                      <select class="form-control" name="pendidikan_gur">
                        <option value="">-----Pilih -----</option>
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sma">SMA</option>
                        <option value="smk">SMK</option>
                        <option value="d1">D1</option>
                        <option value="d2">D2</option>
                        <option value="d3">D3</option>
                        <option value="d4">D4</option>
                        <option value="s1">S1</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                        <option value="s4">S4</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nomor Telpon Guru</label>
                      <input type="number" class="form-control" name="telp_gur">
                    </div>
                    <div class="form-group">
                      <label>Email Guru</label>
                      <input type="email" class="form-control" name="email_gur">
                    </div>
                    <div class="form-group">
                      <label>Warna Guru</label>
                      <input type="color" class="form-control" name="code_color">
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
                  <th>Kode Guru</th>
                  <th>Nama Guru</th>
                  <th>Status Guru</th>
                  <th>Pendidikan Guru</th>
                  <th>Nomor Telpon Guru</th>
                  <th>Email Guru</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;

                foreach ($guru as $row) { ?>
                  <tr style="background-color: <?= $row->code_color ?>;">
                    <td><?= $no ?></td>
                    <td><?= $row->id_guru ?></td>
                    <td><?= $row->nama_guru ?></td>
                    <td><?= $row->status ?></td>
                    <td><?= $row->pendidikan_terakhir ?></td>
                    <td><?= $row->no_telp ?></td>
                    <td><?= $row->email ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="<?= base_url() ?>DataGuru/hapus/<?= $row->id_guru ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
                        <a href="<?= base_url() ?>DataGuru/ubah/<?= $row->id_guru ?>" class="btn btn-warning">update</a>
                        <?php
                        // foreach ($jadwal as $value) {
                        //   if ($value->id_guru == $row->id_guru) {
                        ?>
                            <!-- <a href="<?//= base_url() ?>DataJadwal/pdf/<?//= $row->id_guru ?>" class="btn btn-primary" disabled>Lihat Jadwal</a> -->

                        <?php
                          //   break;
                          // }
                        // }
                        ?>
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
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->