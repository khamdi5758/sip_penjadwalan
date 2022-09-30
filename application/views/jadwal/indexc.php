<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Penjadwalan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active">Penjadwalan</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- NOTIFIKASI -->
		

		
		

		

		
		<!-- /.row -->
		<!-- list data -->
		<?php
		if (empty($rangeJam)) {
			echo '<div class="alert alert-danger alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
			echo 'data Range Jam Belum Terisi';
			echo '</div>';
		}
		if (empty($penjadwalan)) {
			echo '<div class="alert alert-danger alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
			echo 'data Penjadwalan Belum Terisi';
			echo '</div>';
		} else {
			echo '<div class="alert alert-success alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-check"></i> Alert!</h5>';
			echo 'data Penjadwalan Siap';
			echo '</div>';
		}
		if (empty($rumusan)) {
			echo '<div class="alert alert-danger alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
			echo 'data Rumusan Belum Terisi';
			echo '</div>';
		} else {
			echo '<div class="alert alert-success alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-check"></i> Alert!</h5>';
			echo 'data Rumusan Siap';
			echo '</div>';
		}
		?>

		
		<!-- aleet untuk ganti jadwal -->
		<div class="row">
			<div class="col-12">
				<div id="pindahkelas">
				</div>
			</div>
		</div>

		<!-- Table Penjadwalan -->
		<?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
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
		<?php endif; ?>

		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->