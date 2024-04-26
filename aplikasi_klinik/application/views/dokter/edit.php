<h2>Edit Dokter</h2>
<form style="max-width: 500px;" method="POST" action="<?= site_url('/dokter/update') ?>">
	<div class="mb-3">
		<label for="nama" class="form-label">Nama Dokter</label>
		<input type="text" class="form-control" id="nama" aria-describedby="namaHelp" name="nama_dokter" autocomplete="off" value="<?= $data->nama_dokter ?>">
		<div id="namaHelp" class="form-text">Masukkan nama dokter.</div>
		<div class="invalid-feedback">
			Nama dokter wajib dimasukkan!
		</div>
	</div>
	<input type="hidden" name="id_dokter" value="<?= $data->id_dokter ?>">
	<input type="submit" class="btn btn-primary">
</form>
