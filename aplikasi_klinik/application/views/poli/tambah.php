<h2>Tambah Poli</h2>
<form style="max-width: 500px;" method="POST" action="<?= site_url('/poli/add') ?>">
	<div class="mb-3">
		<label for="nama" class="form-label">Nama Poli</label>
		<input type="text" class="form-control" id="nama" aria-describedby="namaHelp" name="nama_poli" autocomplete="off">
		<div id="namaHelp" class="form-text">Masukkan nama poli.</div>
		<div class="invalid-feedback">
			Nama poli wajib dimasukkan!
		</div>
	</div>
	<input type="submit" class="btn btn-primary">
</form>
