<h1>Daftar</h1>
<form style="max-width: 500px;" method="POST" action="<?= site_url('/auth/regist') ?>">
	<div class="mb-3">
		<label for="exampleInputNama" class="form-label">Username</label>
		<input type="nama" class="form-control" id="exampleInputNama" aria-describedby="namaHelp" name="username">
		<div id="namaHelp" class="form-text">Masukkan username anda</div>
	</div>
	<div class="mb-3">
		<label for="exampleInputPassword1" class="form-label">Password</label>
		<input type="password" class="form-control" id="exampleInputPassword1" name="password">
	</div>
	<button type="submit" class="btn btn-primary">Daftar</button>
</form>