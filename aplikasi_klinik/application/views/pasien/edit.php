<h2>Edit Pasien</h2>
<form style="max-width: 500px;" method="POST" action="<?= site_url('/pasien/update') ?>">
	<div class="mb-3">
		<label for="nama" class="form-label">Nama</label>
		<input type="text" class="form-control" id="nama" aria-describedby="namaHelp" name="nama" autocomplete="off" value="<?= $pasien->nama ?>">
		<div id="namaHelp" class="form-text">Masukkan nama pasien.</div>
		<div class="invalid-feedback">
			Nama pasien wajib dimasukkan!
		</div>
	</div>
	<div class="mb-3">
		<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
		<input type="date" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahirHelp" name="tanggal_lahir" autocomplete="off" value="<?= $pasien->tanggal_lahir ?>">
		<div id="tanggal_lahirHelp" class="form-text">Masukkan tanggal lahir pasien.</div>
	</div>
	<div class="mb-3">
		<label for="alamat" class="form-label">Alamat</label>
		<textarea class="form-control" id="alamat" aria-describedby="alamatHelp" rows="3" name="alamat"><?= $pasien->alamat ?></textarea>
		<div id="alamatHelp" class="form-text">masukkan alamat pasien.</div>
	</div>
	<div class="mb-3">
		<label for="id_user" class="form-label">Nama User</label>
		<select class="select-user form-select form-select-lg mb-3 p-4" name="id_user" aria-label="Large select example">
			<option value="">Pilih user</option>
			<?php foreach ($users as $item) : ?>
				<?php if ($pasien->id_user === $item->id_user) : ?>
					<option value="<?= $item->id_user ?>" selected><?= $item->username ?></option>
				<?php else : ?>
					<option value="<?= $item->id_user ?>"><?= $item->username ?></option>
				<?php endif ?>
			<?php endforeach ?>
		</select>
		<div id="id_userHelp" class="form-text">User harus dipilih.</div>
	</div>
	<input type="hidden" name="id_pasien" value="<?= $pasien->id_pasien ?>">
	<input type="submit" class="btn btn-primary">
</form>

<script>
	$(document).ready(function() {
		$('.select-user').select2();
	});
</script>