<h2>Tambah Kunjungan</h2>
<form style="max-width: 500px;" method="POST" action="<?= site_url('/kunjungan/add') ?>">
	<div class="mb-3">
		<label for="id_pasien" class="form-label">Nama Pasien</label>
		<select class="form-select" name="id_pasien" aria-label="Large select example">
			<option value="">Pilih pasien</option>
			<?php foreach ($pasien as $item) : ?>
				<option value="<?= $item->id_pasien ?>"><?= $item->nama ?></option>
			<?php endforeach ?>
		</select>
		<div id="id_userHelp" class="form-text">Pasien harus dipilih.</div>
	</div>
	<div class="mb-3">
		<label for="id_dokter" class="form-label">Nama Dokter</label>
		<select class="form-select" name="id_dokter" aria-label="Large select example">
			<option value="">Pilih dokter</option>
			<?php foreach ($dokter as $item) : ?>
				<option value="<?= $item->id_dokter ?>"><?= $item->nama_dokter ?></option>
			<?php endforeach ?>
		</select>
		<div id="id_userHelp" class="form-text">Dokter harus dipilih.</div>
	</div>
	<div class="mb-3">
		<label for="tanggal_kunjungan" class="form-label">Tanggal kunjungan</label>
		<input type="date" class="form-control" id="tanggal_kunjungan" aria-describedby="tanggal_kunjunganHelp" name="tanggal_kunjungan" autocomplete="off">
		<div id="tanggal_kunjunganHelp" class="form-text">Masukkan tanggal kunjungan.</div>
	</div>
	<div class="mb-3">
		<label for="keluhan" class="form-label">Keluhan</label>
		<input type="text" class="form-control" id="keluhan" aria-describedby="keluhanHelp" name="keluhan" autocomplete="off">
		<div id="keluhanHelp" class="form-text">Masukkan keluhan.</div>
		<div class="invalid-feedback">
			Keluhan wajib dimasukkan!
		</div>
	</div>
	<div class="mb-3">
		<label for="id_poli" class="form-label">Nama Poli</label>
		<select class="form-select" name="id_poli" aria-label="Large select example">
			<option value="">Pilih poli</option>
			<?php foreach ($poli as $item) : ?>
				<option value="<?= $item->id_poli ?>"><?= $item->nama_poli ?></option>
			<?php endforeach ?>
		</select>
		<div id="id_userHelp" class="form-text">Poli harus dipilih.</div>
	</div>
	<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" class="btn btn-primary">
	<input type="submit" class="btn btn-primary">
</form>
