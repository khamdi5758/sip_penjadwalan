<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ubah Data Jadwal</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Data Jadwal</li>
            <li class="breadcrumb-item active">Ubah Data Jadwal</li>
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
                      <label for="idjadwal">ID Jadwal : </label>
                      <input type="text" class="form-control disabled" name="id" value="<?= $ubah['id_penjadwalan'] ?>" readonly>
                    </div>

                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Kode Jadwal</label>
                      <input type="text" class="form-control" name="kd_map" value="<?//= $ubah['kode_Jadwal'] ?>" >
                    </div> -->

                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Nama Jadwal</label>
                      <input type="text" class="form-control" name="nm_map" value="<?= $ubah['nama_Jadwal'] ?>">
                    </div> -->

                    <!-- <div class="form-group">
                      <label>Guru Jadwal</label>
                      <select class="form-control" name="id_gur">
                        <?php
                        // foreach ($guJadwal as $rowguJadwal) {
                        //   $selected = '';
                        //   if ($ubah['id_guru'] == $rowguJadwal->id_guru) {
                        //     $selected = 'selected';
                        //   } ?>
                          <option value="<?//= $rowguJadwal->id_guru ?>" <?//= $selected ?>><?//= $rowguJadwal->nama_guru ?></option>
                        <?php //} ?>
                      </select>
                    </div> -->

                    <div class="form-group">
                        <label for="kelas">kelas</label>
                        <select class="form-control" name="kelas">
                          <?php
                          foreach ($kelas as $row) { 
                            $selected = '';
                            if ($ubah['id_kelas'] == $row->id_kelas) {
                              $selected = 'selected';
                            }
                           ?>
                            <option value="<?= $row->id_kelas ?>"<?= $selected ?>><?= $row->kelas ?></option>
                          <?php } ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="kelas" name="kelas"> -->
                    </div>
                    <div class="form-group">
                      <label for="ruang">ruang</label>
                        <select class="form-control" name="ruang">
                          <?php
                          foreach ($ruang as $row) { 
                            $selected = '';
                            if ($ubah['id_ruang'] == $row->id_ruang) {
                              $selected = 'selected';
                            }
                            ?>
                            <option value="<?= $row->id_ruang ?>"<?= $selected ?>><?= $row->nama_ruang ?></option>
                          <?php } ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="ruang" name="ruang"> -->
                    </div>
                    <div class="form-group">
                      <label for="mapel">mapel</label>
                        <select class="form-control" name="mapel">
                          <?php
                          foreach ($mapel as $row) { 
                            $selected = '';
                            if ($ubah['id_mapel'] == $row->id_mapel) {
                              $selected = 'selected';
                            }
                            ?>
                            <option value="<?= $row->id_mapel ?>"<?= $selected ?>><?= $row->nama_mapel ?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<?= $row->nama_guru ?></option>
                          <?php } ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="mapel" name="mapel"> -->
                    </div>
                    <div class="form-group">
                      <label for="hari">hari</label>
                        <select class="form-control" name="hari">
                          <?php
                          foreach ($hari as $row) { 
                            $selected = '';
                            if ($ubah['id_hari'] == $row->id_hari) {
                              $selected = 'selected';
                            }
                            ?>
                            <option value="<?= $row->id_hari ?>"<?= $selected ?>><?= $row->nama_hari ?></option>
                          <?php } ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="hari" name="hari"> -->
                    </div>
                    <div class="form-group">
                      <label for="jampel">jampel</label>
                        <select class="form-control" name="jampel">
                          <?php
                          foreach ($rangeJam as $row) { 
                            $selected = '';
                            if ($ubah['id_jampel'] == $row->id_jampel) {
                              $selected = 'selected';
                            }
                            ?>
                            <option value="<?= $row->id_jampel ?>"<?=$selected;?>><?= $row->jamke ?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<?= $row->waktu ?></option>
                          <?php } ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="jampel" name="jampel"> -->
                    </div>





                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Kelas</label>
                      <select class="form-control" name="kls">
                        <?php
                        // $kelas = ['X', 'XI', 'XII'];
                        // foreach ($kelas as $kls) {
                        //   $selected = '';
                        //   if ($ubah['kelas'] == $kls) {
                        //     $selected = 'selected';
                        //   } ?>
                          <option value="<?//= $kls ?>" <?//= $selected ?>><?//= $kls ?></option>
                        <?php //} ?>
                      </select>
                      <input type="text" class="form-control" name="kls" value="<?//= $ubah['kelas'] ?>">
                    </div> -->

                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Beban Jam</label>
                      <input type="text" class="form-control" name="beban" value="<?//= $ubah['beban_jam'] ?>">
                    </div> -->

                    <!-- <div class="form-group">
                      <label>Jurusan</label>
                      <select class="form-control" name="id_jur">
                        <?php
                        // foreach ($jurusan as $jur) {
                        //   $selected = '';
                        //   if ($ubah['id_jurusan'] == $jur->id_jurusan) {
                        //     $selected = 'selected';
                        //   } ?>
                          <option value="<?//= $jur->id_jurusan ?>" <?//= $selected ?>><?//= $jur->nama_jurusan ?></option>
                        <?php //} ?>
                      </select>
                    </div> -->

                    <!-- <div class="form-group">
                      <label>Kelompok Jadwal</label>
                      <select class="form-control" name="kelompok_Jadwal">
                        <?php

                        // $kel_Jadwal = ['A', 'B', 'C', 'D'];
                        // foreach ($kel_Jadwal as $val_kel) {
                        //   $selected = '';
                        //   if ($ubah['kelompok_Jadwal'] == $val_kel) {
                        //     $selected = 'selected';
                        //   } ?>
                          <option value="<?//= $val_kel ?>" <?//= $selected ?>><?//= $val_kel ?></option>
                        <?php //} ?>
                      </select>
                    </div> -->
                    <a href="<?= base_url()?>DataJadwal" class="btn btn-danger">Batal</a>
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