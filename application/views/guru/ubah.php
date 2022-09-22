<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ubah Data Guru</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Data Guru</li>
            <li class="breadcrumb-item active">Ubah Data Guru</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- tambah data -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Ubah Data</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <?= validation_errors(); ?>
                <form action="" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Guru</label>
                      <input type="text" class="form-control disabled" name="id_gur" value="<?= $ubah['id_guru'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Guru</label>
                      <input type="text" class="form-control" name="nama_gur" value="<?= $ubah['nama_guru'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Status Guru</label>
                      <div class="radio">
                        <?php
                        if ($ubah['status'] == "honorer") {
                          $checked1 = "checked";
                          $checked2 = "";
                        } else {
                          $checked1 = "";
                          $checked2 = "checked";
                        }
                        ?>
                        <label>
                          <input type="radio" name="status_gur" value="honorer" <?php echo $checked1; ?> required>Guru Honorer
                        </label>
                        <label>
                          <input type="radio" name="status_gur" value="tetap" <?php echo $checked2; ?> required>Guru Tetap
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Pendidikan Guru</label>
                      <select class="form-control" name="pendidikan_gur">
                        <option value="">-----Pilih Hari-----</option>
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
                      <label for="exampleInputPassword1">Nomor Telpon Guru</label>
                      <input type="number" class="form-control" name="telp_gur" value="<?= $ubah['no_telp'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email Guru</label>
                      <input type="email" class="form-control" name="email_gur" value="<?= $ubah['email'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kode Warna</label>
                      <input type="color" class="form-control" name="code_color" value="<?= $ubah['code_color'] ?>">
                    </div>
                    <a href="<?= base_url()?>DataGuru" class="btn btn-danger">Batal</a>
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
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper