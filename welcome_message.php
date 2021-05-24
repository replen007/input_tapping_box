<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style>
		.pl-12 {
			padding-left: 12px;
		}
	</style>

</head>


<body class="bg-light">

	<div class="container" style="padding-top: 2rem ;">
		<div class="row mb-4">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="card-title text-center mb-5">
							<h4>Form Input Data</h4>
						</div>
						</hr>
						<div class="card-text">
							<form action="<?= base_url(''); ?>" method="post">
								<div class="form-row mb-2">
									<div class="form-group col-md-4">
										<label for="nama_op " class="pl-12"><strong>Nama Objek Pajak</strong></label>
										<input type="text" class="form-control" name="nama_op" id="nama_op" placeholder=" mis. nama objek pajak..." value="<?= set_value('nama_op'); ?>">
										<?= form_error('nama_op', '<small class="text-danger" style="padding-left:12px;">', '</small>'); ?>
									</div>

									<div class="form-group col-md-4">
										<label for="npwd" class="pl-12"><strong>NPWPD</strong></label>
										<input type="text" class="form-control" name="npwpd" id="npwpd" placeholder="mis. 123813 " value="<?= set_value('npwpd'); ?>">
										<?= form_error('npwpd', '<small class="text-danger" style="padding-left:12px;">', '</small>'); ?>
									</div>

									<div class="form-group col-md-4">
										<label for="nik" class="pl-12"><strong>NIK</strong></label>
										<input type="text" class="form-control" name="nik" id="nik" placeholder=" mis. 1771020607944" value="<?= set_value('nik'); ?>">
										<?= form_error('nik', '<small class="text-danger" style="padding-left:12px;">', '</small>'); ?>
									</div>
								</div>

								<div class="form-row mb-2">
									<div class="form-group col-md-4">
										<label for="alamat" class="pl-12"><strong>Alamat</strong></label>
										<input type="text" class="form-control" name="alamat" id="alamat" placeholder=" mis. Jl. Basuki Blok C, No. 003, RT/RW 001/003" value="<?= set_value('alamat'); ?>">
										<?= form_error('alamat', '<small class="text-danger" style="padding-left:12px;">', '</small>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label for="inputState" class="pl-12"><strong>Kecamatan</strong></label>
										<select name="kecamatan" id="kecamatan" class="form-control">
											<option value="">Pilih Kecamatan</option>
											<?php foreach ($_kecamatan as $kec) : ?>
												<option value="<?= $kec['kecamatan']; ?>" id_kec="<?= $kec['id']; ?>"> <?= $kec['kecamatan']; ?> </option>
											<?php endforeach; ?>
										</select>
										<?= form_error('kecamatan', '<small class="text-danger" style="padding-left:12px;">', '</small>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label for="kelurahan" class="pl-12"><strong>Kelurahan</strong></label>
										<select name="kelurahan" id="kelurahan" class="form-control">
											<!-- code in controller -->
										</select>
										<?= form_error('kelurahan', '<small class="text-danger" style="padding-left:12px;">', '</small>'); ?>
									</div>
								</div>

								<div class="form-row mb-2">
									<div class="form-group col-md-6">
										<label for="status" class="pl-12"><strong>Status Pemasangan</strong></label>
										<select name="status" id="status" class="form-control">
											<option value="">Pilih Status</option>
											<?php foreach ($_status as $val) : ?>
												<option value="<?= $val['nama_status']; ?>" <?= set_select('status', $val['nama_status']); ?>><?= $val['nama_status']; ?></option>
											<?php endforeach; ?>
										</select>
										<?= form_error('status', '<small class="text-danger" style="padding-left:12px;">', '</small>'); ?>
									</div>
									<div class="form-group col-md-6">
										<label for="jenis" class="pl-12"><strong>Jenis</strong></label>
										<select name="jenis" id="jenis" class="form-control">
											<option value="">Pilih Jenis</option>
											<?php foreach ($_jenis as $val) : ?>
												<option value="<?= $val['nama_jenis']; ?>" <?= set_select('jenis', $val['nama_jenis']); ?>><?= $val['nama_jenis']; ?></option>
											<?php endforeach; ?>
										</select>
										<?= form_error('jenis', '<small class="text-danger" style="padding-left:12px;">', '</small>'); ?>
									</div>
									<div class="form-group col-md-6">
										<label for="jenis" class="pl-12"><strong>Jenis</strong></label>
										<input type="file" class="form-control" name="image" id="image">
										<?= form_error('jenis', '<small class="text-danger" style="padding-left:12px;">', '</small>'); ?>
									</div>
								</div>

								<button type="submit" class="btn btn-info ">submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<script>
	/* id di ambil dari atribut buatan id_kec="" */
	$(document).ready(function() {
		$('#kecamatan').change(function() {

			//var id = $(this).val(); //atribut value
			var id_kec = $("option:selected", this).attr("id_kec");

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>welcome/kelurahan',
				data: {
					id: id_kec
				},
				dataType: 'json',
				success: function(response) {
					$('#kelurahan').html(response);
				},
				error: function(response) {
					alert('error');
				}
			});
		});
	});

	function _redirect() {
		window.location.replace = '<?php echo base_url(''); ?>';
	}


	// $(document).ready(function() {
	// 	$.ajax({
	// 		type: "post",
	// 		url: "<?php echo base_url('kec'); ?>",
	// 		success: function(hasil) {
	// 			$("select[name=provinsi]").html(hasil);
	// 		}
	// 	});

	// 	$("select[name=provinsi]").on("change", function() {
	// 		var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

	// 		$.ajax({
	// 			type: "post",
	// 			url: "<?php echo base_url('kel'); ?>",
	// 			data: "id_provinsi=" + id_provinsi_terpilih,
	// 			success: function(hasil_kabkota) {
	// 				$("select[name=KabKota]").html(hasil_kabkota);
	// 			}
	// 		});
	// 	});
	// });
</script>

</html>