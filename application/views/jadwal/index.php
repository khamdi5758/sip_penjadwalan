<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data jadwal</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data jadwal</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <!-- NOTIFIKASI -->
    <?php
    if ($this->session->flashdata('flash_jadwal')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6>
          <i class="icon fas fa-check"></i>
          Data Berhasil
          <strong>
            <?= $this->session->flashdata('flash_jadwal');   ?>
          </strong>
        </h6>
      </div>
    <?php } ?>

    <?php
    if ($this->session->flashdata('gagal')) { ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6>
          <i class="icon fas fa-window-close"></i>
          <strong>
            <?= $this->session->flashdata('gagal');   ?>
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
                <form action="<?= base_url() ?>DataJadwal/validation_form" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Kode jadwal</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="id_jur">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="idpenjadwalan">id jadwal</label>
                      <input type="text" class="form-control" id="idpenjadwalan" name="id_jadwal">
                    </div> -->
                    <div class="form-group">
                        <label for="kelas">kelas</label>
                        <select class="form-control" name="kelas">
                          <?php
                          foreach ($kelas as $row) { ?>
                            <option value="<?= $row->id_kelas ?>"><?= $row->kelas ?></option>
                          <?php } ?>
                        </select>
                      <!-- <label for="kelas">kelas</label>
                      <input type="text" class="form-control" id="kelas" name="kelas"> -->
                    </div>
                    <div class="form-group">
                      <label for="ruang">ruang</label>
                        <select class="form-control" name="ruang">
                          <?php
                          foreach ($ruang as $row) { ?>
                            <option value="<?= $row->id_ruang ?>"><?= $row->nama_ruang ?></option>
                          <?php } ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="ruang" name="ruang"> -->
                    </div>
                    <div class="form-group">
                      <label for="mapel">mapel</label>
                        <select class="form-control" name="mapel">
                          <?php
                          foreach ($mapel as $row) { ?>
                            <option value="<?= $row->id_mapel ?>"><?= $row->nama_mapel?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<?= $row->nama_guru ?></option>
                          <?php } ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="mapel" name="mapel"> -->
                    </div>
                    <div class="form-group">
                      <label for="hari">hari</label>
                        <select class="form-control" name="hari">
                          <?php
                          foreach ($hari as $row) { ?>
                            <option value="<?= $row->id_hari ?>"><?= $row->nama_hari ?></option>
                          <?php } ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="hari" name="hari"> -->
                    </div>
                    <div class="form-group">
                      <label for="jampel">jampel</label>
                        <select class="form-control" name="jampel">
                          <?php
                          foreach ($rangeJam as $row) { ?>
                            <option value="<?= $row->id_jampel ?>"><?= $row->jamke ?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<?= $row->waktu ?></option>
                          <?php } ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="jampel" name="jampel"> -->
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
                  <th>id penjadwalan</th>
                  <th>kelas</th>
                  <th>ruang</th>
                  <th>mapel</th>
                  <th>hari</th>
                  <th>jam ke</th>
                  <th>waktu</th>
                  <th>guru yang bertugas</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($penjadwalan as $row) { ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $row->id_penjadwalan ?></td>
                    <td><?= $row->kelas ?></td>
                    <td><?= $row->nama_ruang ?></td>
                    <td><?= $row->nama_mapel ?></td>
                    <td><?= $row->nama_hari ?></td>
                    <td><?= $row->jamke?></td>
                    <td><?= $row->waktu?></td>
                    <td><?= $row->nama_guru?></td>
                    <td>
                      <div class="btn-group">
                        <a href="<?= base_url() ?>DataJadwal/hapus/<?= $row->id_penjadwalan ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
                        <a href="<?= base_url() ?>DataJadwal/ubah/<?= $row->id_penjadwalan ?>" class="btn btn-warning">update</a>
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
<!-- /.content-wrapper