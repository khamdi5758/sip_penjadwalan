<!-- Main Footer -->
<footer class="main-footer">
	<strong>Copyright &copy; 2021 SMEAGRIPA Penjadwalan.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 3.0.2
	</div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script> -->
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard2.js"></script>
<!-- page script Table -->
<!-- Select2 -->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- description box -->
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/description-box/easyTooltip.min.js"></script>


<script>
	$(function() {
		$('#example1').DataTable();
	});

	//Initialize Select2 Elements
	$('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	})

	// $("input[name=chkHari\\[\\]]").change(function() {
	// 	var max = 3;
	// 	if ($("input[name=chkHari\\[\\]]:checked").length == max) {
	// 		$("input[name=chkHari\\[\\]]").attr('disabled', 'disabled');
	// 		$("input[name=chkHari\\[\\]]:checked").removeAttr('disabled');
	// 	} else {
	// 		$("input[name=chkHari\\[\\]]").removeAttr('disabled');
	// 	}
	// })
</script>
<?php if ($this->uri->segment(1) == "DataPenugasanGuru") : ?>
	<script>
		var numberForm = 2;
		$("#mapelSelectForm").on('change', function() {
			var selectedVal = $(this).val();
			var dataSelect = $(this).data("mapelselect");
			$.ajax({
				type: "POST",
				url: "<?= base_url('DataPenugasanGuru/getDataKelasByKodeMapel') ?>",
				data: {
					'kode_mapel': selectedVal
				},
				success: function(data) {
					dataKelas = JSON.parse(data);
					console.log(dataKelas);
				}
			})
			console.log('inidata' + dataSelect);
		});
		// Modal 
		$('#TugasGuru').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget);
			var mapel = button.data('mapel');
			var kode_mapel = button.data('kodemapel');
			var modal = $(this);
			$.ajax({
				type: 'POST',
				url: "<?= base_url('DataPenugasanGuru/getDataKelas') ?>",
				data: {
					'kode_mapel': kode_mapel
				},
				success: function(data) {
					modal.find('.modal-title').text('Mata Pelajaran ' + mapel);
					modal.find('.modal-body input').val(mapel);
					modal.find('#form').html(data);
					// html = JSON.parse(data);
					// console.log(html);
				}
			})
		})

		// $("#btnaddForm").click(function() {
		// 	var html = `
		// 	<div class="row inputFormRow">
		// 	    <div class="col-3">
		// 	      <div class="form-group">
		// 	        <select class="form-control"  id="mapelSelectForm" name="mapel[] data-mapelselect="` + numberForm +
		// 		`" >
		// 	          <option selected="selected">Pilih Mapel</option>
		// 	        </select>
		// 	      </div>
		// 	    </div>
		// 	    <div class="col-3">
		// 	      <div class="form-group">
		// 	        <select class="form-control" data-kelasselect="` + numberForm +
		// 		`" >
		// 	          <option selected="selected">Pilih Mapel</option>
		// 	        </select>
		// 	      </div>
		// 	    </div>
		// 	    <div class="col-3">
		// 	      <button type="button" id="removeForm" class="btn btn-block btn-danger">
		// 	        Remove
		// 	      </button>
		// 	    </div>
		// 	  </div>`;
		// 	numberForm++;
		// 	$(".select-form").after(html);
		// 	// remove
		// 	$("#removeForm").click(function() {
		// 		$(this).closest('.inputFormRow').remove();
		// 	});
		// });

		$('div.hapus-data').on('click', function() {
			const form = $(this);
			let id_tugas = form.data('idtugas');
			let form_group = form.parent().parent().parent();
			$.ajax({
				url: "<?= base_url('DataPenugasanGuru/hapus') ?>",
				type: "POST",
				data: {
					'id_tugas': id_tugas
				},
				success: function(data) {
					form_group.find(".form-mapel").removeAttr("disabled");
					form_group.find(".form-kelas").removeAttr("disabled");
					form_group.find(".form-beban-jam").removeAttr("disabled");
					form_group.find(".select-guru").removeAttr("disabled");
					form.remove();
				}
			})
		});
	</script>
<?php endif; ?>

<?php if ($this->uri->segment(1) == "DataJadwal") : ?>
	<script>
		let dataFirst = '';
		let dataSecond = '';
		let plotingAction = false;
		$('tr .penjadwalan').click(function() {
			if ($(this).data('guru') != '' || dataFirst != '' || plotingAction == true) {
				if ($(this).hasClass('first')) {
					dataFirst = $(this).data('jadwal');
					let dataKelas = $(this).data('kelas');
					let dataRequest = $(this).data('request');
					notifikasiPerpindahan(dataKelas, dataFirst.keterangan, dataFirst.nama_guru)
					if (dataRequest == '') {
						dataRequest = 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu';
					}
					$.each(dataRequest.split(','), function(key, value) {
						$('.penjadwalan').removeClass('first');
						// $('td[data-hari="' + value + '"][data-kelas="' + dataKelas + '"]').removeClass('first');
						$('td[data-hari="' + value + '"][data-kelas="' + dataKelas + '"]').css({
							'border-color': 'black',
							'border-width': '4px',
							'border-style': 'dotted'
						});
						// $('tr .penjadwalan ').removeClass('first');
						$('td[data-hari="' + value + '"][data-kelas="' + dataKelas + '"]').addClass('second');
					});
					Swal.fire({
						position: 'top-end',
						icon: 'success',
						title: 'Pilihan Pertama',
						timer: 1500
					})
				} else if ($(this).hasClass('second')) {
					$('tr .penjadwalan').removeClass('second');
					$('tr .penjadwalan').addClass('first');
					dataSecond = $(this).data('jadwal');
					Swal.fire({
						position: 'top-end',
						icon: 'success',
						title: 'Pilihan Kedua',
						timer: 1500
					})

				} else {
					Swal.fire({
						// position: 'top-end',
						icon: 'error',
						title: 'Tukar jadwal di area dengan garis putus',
						timer: 1500
					})
				}
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Pilih jadwal yang sudah terdapat jadwal Mengajar',
					timer: 1500
				})
			}

			if (plotingAction == true && dataSecond != '') {
				console.log('klik pertama :' + dataFirst + 'klik kedua :' + dataSecond.id_guru);

				$.ajax({
					url: "<?= base_url('DataJadwal/pindahJadwal/belumSet') ?>",
					data: {
						'tugasGuru': dataFirst,
						'dataSecond': dataSecond
					},
					type: 'POST',
					dataType: 'json',
					success: function(response) {
						if (response.status == 'success') {
							Swal.fire({
								icon: 'success',
								title: 'Oke',
								text: 'Jadwal Berhasil Ditukar',
								timer: 1500
							}).then(function() {
								location.reload();
							});
						} else {
							Swal.fire({
								icon: 'error',
								title: response.keterangan,
								timer: 1500

							}).then(function() {
								location.reload();
							});
						}
						dataFirst = '';
						dataSecond = '';
					}
				});
			} else if (dataFirst != '' && dataSecond != '') {
				console.log('klik pertama :' + dataFirst.id_guru + 'klik kedua :' + dataSecond.id_guru);
				$.ajax({
					url: "<?= base_url('DataJadwal/pindahJadwal') ?>",
					data: {
						'dataFirst': dataFirst,
						'dataSecond': dataSecond
					},
					type: 'POST',
					dataType: 'json',
					success: function(response) {
						if (response.status == 'success') {
							Swal.fire({
								icon: 'success',
								title: 'Oke',
								text: 'Jadwal Berhasil Ditukar',
								timer: 3000
							}).then(function() {
								location.reload();
							});
						} else {
							Swal.fire({
								icon: 'error',
								title: response.keterangan,
							}).then(function() {
								location.reload();
							});
						}
						dataFirst = '';
						dataSecond = '';
					}
				});
			} else {
				console.log(dataFirst);
				console.log(dataSecond);
			}
		});

		$('.plotting').click(function() {
			plotingAction = true;
			let dataRequest = $(this).data('request');
			let dataKelas = $(this).data('kelas');
			let dataMapel = $(this).data('mapel');
			let dataGuru = $(this).data('guru');
			dataFirst = $(this).data('tugasguru');
			notifikasiPerpindahan(dataKelas, dataMapel, dataGuru);
			if (dataRequest == '') {
				dataRequest = 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu';
			}
			$.each(dataRequest.split(','), function(key, value) {
				$('.penjadwalan').removeClass('first');
				// $('td[data-hari="' + value + '"][data-kelas="' + dataKelas + '"]').removeClass('first');
				$('td[data-hari="' + value + '"][data-kelas="' + dataKelas + '"]').css({
					'border-color': 'black',
					'border-width': '4px',
					'border-style': 'dotted'
				});
				$('td[data-hari="' + value + '"][data-kelas="' + dataKelas + '"]').addClass('second');
			});
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Pilihan Pertama',
				timer: 1500
			})
		});

		function notifikasiPerpindahan(kelas1 = null, mapel1 = null, guru1 = null, kelas2 = null, mapel2 = null, guru2 = null) {
			let text = "Perpindahan Jadwal " + kelas1 + " Guru : " + guru1 +
				" Mapel :" + mapel1;
			let html = ` 
			<div class = "alert alert-success alert-dismissible" >
				<button id="cancelPenjadwalan" onclick="cancel()" type = "button" class="close" data-dismiss="alert" aria-hidden= "true">×</button> <h5><i class="fas fa-exclamation"></i></i> Perpindahan Kelas</h5>` +
				text + '<i class="fas fa-arrow-right"></i>' +
				`</div>`;
			$('#pindahkelas').html(html).show();
		}

		/* 
		 * cancel penjadwalan
		 */
		function cancel() {
			location.reload()
		}
	</script>
<?php endif; ?>

</body>

</html>