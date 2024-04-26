<h2>Tambah Dokter</h2>
<form style="max-width: 500px;" method="POST" action="<?= site_url('/dokter/add') ?>">
	<div class="mb-3">
		<label for="nama" class="form-label">Nama Dokter</label>
		<input type="text" class="form-control" id="nama" aria-describedby="namaHelp" name="nama_dokter" autocomplete="off">
		<div id="namaHelp" class="form-text">Masukkan nama dokter.</div>
		<div class="invalid-feedback">
			Nama dokter wajib dimasukkan!
		</div>
	</div>
	<input type="submit" class="btn btn-primary">
</form>
