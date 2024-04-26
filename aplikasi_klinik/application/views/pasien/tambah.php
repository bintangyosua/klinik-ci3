<h2>Tambah Pasien</h2>
<form style="max-width: 500px;" method="POST" action="<?= site_url('/pasien/add') ?>">
	<div class="mb-3">
		<label for="nama" class="form-label">Nama</label>
		<input type="text" class="form-control" id="nama" aria-describedby="namaHelp" name="nama" autocomplete="off">
		<div id="namaHelp" class="form-text">Masukkan nama pasien.</div>
		<div class="invalid-feedback">
			Nama pasien wajib dimasukkan!
		</div>
	</div>
	<div class="mb-3">
		<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
		<input type="date" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahirHelp" name="tanggal_lahir" autocomplete="off">
		<div id="tanggal_lahirHelp" class="form-text">Masukkan tanggal lahir pasien.</div>
	</div>
	<div class="mb-3">
		<label for="alamat" class="form-label">Alamat</label>
		<textarea class="form-control" id="alamat" aria-describedby="alamatHelp" rows="3" name="alamat"></textarea>
		<div id="alamatHelp" class="form-text">masukkan alamat pasien.</div>
	</div>
	<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" class="btn btn-primary">
	<input type="submit" class="btn btn-primary">
</form>

<script>
	$(document).ready(function() {
		$('.select-user').select2();
	});
</script>
