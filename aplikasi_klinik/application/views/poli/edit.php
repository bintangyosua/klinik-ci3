<h2>Edit Poli</h2>
<form style="max-width: 500px;" method="POST" action="<?= site_url('/poli/update') ?>">
	<div class="mb-3">
		<label for="nama" class="form-label">Nama Poli</label>
		<input type="text" class="form-control" id="nama" aria-describedby="namaHelp" name="nama_poli" autocomplete="off" value="<?= $data->nama_poli ?>">
		<div id="namaHelp" class="form-text">Masukkan nama poli.</div>
		<div class="invalid-feedback">
			Nama poli wajib dimasukkan!
		</div>
	</div>
	<input type="hidden" name="id_poli" value="<?= $data->id_poli ?>">
	<input type="submit" class="btn btn-primary">
</form>
