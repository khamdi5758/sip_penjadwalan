<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Jadwal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Range Jam</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- NOTIFIKASI -->
        <?php
        if ($this->session->flashdata('flash_rangejam')) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6>
                    <i class="icon fas fa-check"></i>
                    Data Berhasil
                    <strong>
                        <?= $this->session->flashdata('flash_rangejam');   ?>
                    </strong>
                </h6>
            </div>
        <?php } ?>
        <!-- /.row -->
        <!-- list data -->
        <div class="row">
            <div class="col-12">
                <div class="callout callout-danger">
                    <h5>Jadwal Belum Terplot</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td>Kelas</td>
                            <td>Id Guru</td>
                            <td>Nama Guru</td>
                            <td>Mapel</td>
                            <td>Beban Jam</td>
                            <td>Jumlah Yang belum Terplot</td>
                            <td>Request Jadwal</td>
                            <td>Action</td>
                        </tr>
                        <?php
                        foreach ($belumterplot as $valueBelumterplot) : ?>
                            <tr>
                                <td><?= $valueBelumterplot->id_kelas ?></td>
                                <td><?= $valueBelumterplot->id_guru ?></td>
                                <td><?= $valueBelumterplot->nama_guru ?></td>
                                <td><?= $valueBelumterplot->nama_mapel ?></td>
                                <td><?= $valueBelumterplot->beban_jam ?></td>
                                <td><?= $valueBelumterplot->sisa_jam ?></td>
                                <td><?= $valueBelumterplot->hari ?></td>
                                <td><button data-tugasguru="<?= $valueBelumterplot->id_tugas ?>" data-kelas="<?= $valueBelumterplot->id_kelas ?>" data-request="<?= $valueBelumterplot->hari ?>" class="btn btn-primary plotting">Plotting</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

        </div>
        <div class="row">
            <?php
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
            function filter_jadwal($penjadwalan, $hari, $kelas, $sesi)
            {
                $data = [];
                foreach ($penjadwalan as $value) {
                    if ($value->hari == $hari && $value->sesi == $sesi && $value->id_kelas == $kelas) {
                        $data[] = $value;
                    }
                }
                return $data;
            }
            function getkodeMapel($mapel, $idMapel)
            {
                $key = array_search($idMapel, array_column($mapel, 'id_mapel'));
                return $mapel[$key]->kode_mapel;
            }
            foreach ($hari as $valueHari) :
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
                                    <?php foreach ($kelas as $valueKelas) : ?>
                                        <th><?= $valueKelas->id_kelas ?></th>
                                    <?php endforeach; ?>
                                </tr>
                                <?php
                                // print_r($penjadwalan);
                                for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <?php
                                        foreach ($kelas as $valueKelas) :
                                            $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                            if ($dataJadwalKelas[0]->id_guru !== null) { ?>
                                                <td id="<?= $dataJadwalKelas[0]->id_penjadwalan ?>" class='penjadwalan first' data-kelas='<?= $valueKelas->id_kelas ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalKelas[0]) ?>' data-request='<?= $dataJadwalKelas[0]->request ?>' style="padding: 10px; background-color: <?= $dataJadwalKelas[0]->code_color ?> ;">
                                                    <div>
                                                        <?= '(' . $dataJadwalKelas[0]->id_guru . ') ' .  getkodeMapel($mapel, $dataJadwalKelas[0]->id_mapel) ?>
                                                    </div>
                                                </td>
                                        <?php
                                            } else {
                                                $color = 'blue';
                                                if ($dataJadwalKelas[0]->keterangan == 'kosong') {
                                                    $color = 'red';
                                                }
                                                echo "<td style='color: $color ;' data-request='-' data-guru='" . $dataJadwalKelas[0]->id_guru . "' data-kelas='$valueKelas->id_kelas' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalKelas[0]) . "'>" . $dataJadwalKelas[0]->keterangan . "</td>";
                                            }
                                        endforeach; ?>
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
            endforeach; ?>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->