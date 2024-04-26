<h1>Login</h1>
<form style="max-width: 500px;" method="POST" action="<?= site_url('/auth/signin') ?>">
	<div class="mb-3">
		<label for="exampleInputEmail" class="form-label">Username</label>
		<input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="username">
		<div id="emailHelp" class="form-text">Masukkan username anda</div>
	</div>
	<div class="mb-3">
		<label for="exampleInputPassword1" class="form-label">Password</label>
		<input type="password" class="form-control" id="exampleInputPassword1" name="password">
	</div>
	<button type="submit" class="btn btn-primary">Login</button>
</form>