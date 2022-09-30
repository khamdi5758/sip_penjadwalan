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
                      <label for="exampleInput">Kode Guru</label>
                      <input type="text" class="form-control disabled" name="id_gur" value="<?= $ubah['id_guru'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInput">Nama Guru</label>
                      <input type="text" class="form-control" name="nama_gur" value="<?= $ubah['nama_guru'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInput">Nip</label>
                      <input type="text" class="form-control" name="nip_guru" value="<?= $ubah['nip'] ?>">
                    </div>
                    <div class="form-group">
                      <?php
                        switch ($ubah['pangkat']) {
                          case 'Pembina Tk. 1':
                              $cp1= "checked";
                              $cp2= "";
                              $cp3= "";
                              $cp4= "";
                              $cp5= "";
                              $cp6= "";
                            break;
                          case 'Pembina':
                              $cp1= "";
                              $cp2= "checked";
                              $cp3= "";
                              $cp4= "";
                              $cp5= "";
                              $cp6= "";
                            break;
                          case 'Penata Tk. 1':
                              $cp1= "";
                              $cp2= "";
                              $cp3= "checked";
                              $cp4= "";
                              $cp5= "";
                              $cp6= "";
                            break;
                          case 'Penata Muda Tk.1':
                              $cp1= "";
                              $cp2= "";
                              $cp3= "";
                              $cp4= "checked";
                              $cp5= "";
                              $cp6= "";
                            break;
                          case 'Penata Muda':
                              $cp1= "";
                              $cp2= "";
                              $cp3= "";
                              $cp4= "";
                              $cp5= "checked";
                              $cp6= "";
                            break;
                          case 'Ahli Pertama':
                              $cp1= "";
                              $cp2= "";
                              $cp3= "";
                              $cp4= "";
                              $cp5= "";
                              $cp6= "checked";
                            break;
                        }
                      ?>
                      <label>Pangkat</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="pangkat_gur" value="Pembina Tk. 1" placeholder="Pembina Tk. 1"  <?php echo $cp1; ?> required> Pembina Tk. 1
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="pangkat_gur" value="Pembina" placeholder="Pembina" <?php echo $cp2; ?> required>Pembina
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="pangkat_gur" value="Penata Tk. 1" placeholder="Penata Tk. 1" <?php echo $cp3; ?> required>Penata Tk. 1
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="pangkat_gur" value="Penata Muda Tk.1" placeholder="Penata Muda Tk.1" <?php echo $cp4; ?> required>Penata Muda Tk.1
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="pangkat_gur" value="Penata Muda" placeholder="Penata Muda" <?php echo $cp5; ?> required>Penata Muda
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="pangkat_gur" value="Ahli Pertama" placeholder="Ahli Pertama" <?php echo $cp6; ?> required>Ahli Pertama
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInput">Gol</label>
                      <input type="text" class="form-control" name="gol_guru" value="<?= $ubah['gol'] ?>">
                    </div>

                    <div class="form-group">
                      <label>Status Guru</label>
                      <div class="radio">
                        <?php
                        if ($ubah['status'] == "PNS") {
                          $cs1 = "checked";
                          $cs2 = "";
                          $cs3 = "";
                        } else if($ubah['status'] == "GTT") {
                          $cs1 = "";
                          $cs2 = "checked";
                          $cs3 = "";
                        } else if($ubah['status'] == "PPPK") {
                          $cs1 = "";
                          $cs2 = "";
                          $cs3 = "checked";
                        }


                        ?>
                        <label>
                          <input type="radio" name="status_gur" value="PNS" placeholder="PNS" <?php echo $cs1; ?> required> PNS
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="status_gur" value="GTT" placeholder="GTT" <?php echo $cs2; ?> required>GTT
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="status_gur" value="PPPK" placeholder="PPPK" <?php echo $cs3; ?> required>PPPK
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Pendidikan Guru</label>
                      <select class="form-control" name="pendidikan_gur">
                        <?php
                          switch ($ubah['pendidikan_terakhir']) {
                            case 'sd':
                                $capengur1 = "selected" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 'smp':
                                $capengur1 = "" ;
                                $capengur2 = "selected" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 'sma':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "selected" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 'smk':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "selected" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 'd1':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "selected" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 'd2':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "selected" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 'd3':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "selected" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 'd4':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "selected" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 's1':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "selected" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 's2':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "selected" ;
                                $capengur11 = "" ;
                                $capengur12 = "" ;
                              break;
                            case 's3':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "selected" ;
                                $capengur12 = "" ;
                              break;
                            case 's4':
                                $capengur1 = "" ;
                                $capengur2 = "" ;
                                $capengur3 = "" ;
                                $capengur4 = "" ;
                                $capengur5 = "" ;
                                $capengur6 = "" ;
                                $capengur7 = "" ;
                                $capengur8 = "" ;
                                $capengur9 = "" ;
                                $capengur10 = "" ;
                                $capengur11 = "" ;
                                $capengur12 = "selected" ;
                              break;
                            
                          }
                        ?>
                        <option value="" >-----pilih-----</option>
                        <option value="sd" <?= $capengur1 ?> >SD</option>
                        <option value="smp" <?= $capengur2 ?> >SMP</option>
                        <option value="sma" <?= $capengur3 ?> >SMA</option>
                        <option value="smk" <?= $capengur4 ?> >SMK</option>
                        <option value="d1" <?= $capengur5 ?> >D1</option>
                        <option value="d2" <?= $capengur6 ?> >D2</option>
                        <option value="d3" <?= $capengur7 ?> >D3</option>
                        <option value="d4" <?= $capengur8 ?> >D4</option>
                        <option value="s1" <?= $capengur9 ?> >S1</option>
                        <option value="s2" <?= $capengur10 ?> >S2</option>
                        <option value="s3" <?= $capengur11  ?> >S3</option>
                        <option value="s4" <?= $capengur12 ?> >S4</option>
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