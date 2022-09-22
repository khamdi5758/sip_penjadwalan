Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ubah Data ruang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Data ruang</li>
            <li class="breadcrumb-item active">Ubah Data ruang</li>
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
                      <label for="kode ruang">Kode ruang</label>
                      <input type="text" class="form-control disabled" name="id_ruang" value="<?= $ubah['id_ruang'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="nama ruang">Nama ruang</label>
                      <input type="text" class="form-control"name="nm_ruang" value="<?= $ubah['nama_ruang'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="kapasitas">kapasitas</label>
                      <input type="text" class="form-control"name="kasis" value="<?= $ubah['kapasitas'] ?>">
                    </div>
                    <a href="<?= base_url()?>DataRuang" class="btn btn-danger">Batal</a>
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