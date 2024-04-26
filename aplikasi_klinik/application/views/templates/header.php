<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel='stylesheet' href='https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css' />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src='https://code.jquery.com/jquery-3.7.1.js'></script>
	<script src='https://cdn.datatables.net/2.0.3/js/dataTables.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<style>
		.alert {
			/* padding: 3px 4px; */
			padding-top: 5px;
			padding-bottom: 5px;
		}

		p {
			margin-bottom: 0;
		}
	</style>
</head>

<body>
	<!-- Container -->

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
		<div class="container">
			<a class="navbar-brand" href="/">Sistem Manajemen Klinik</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('/kunjungan') ?>">Kunjungan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('/pasien') ?>">Pasien</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('/dokter') ?>">Dokter</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('/poli') ?>">Poli</a>
					</li>
					<?php if (!$this->session->userdata('username')) : ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/auth/register') ?>">Registrasi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/auth/login') ?>">Login</a>
						</li>
					<?php else : ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/auth/logout') ?>">Logout</a>
						</li>
						<li class="nav-item">
							<span class="nav-link">Halo <?= $this->session->userdata('username') ?></span>
						</li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-4">
		<?php if ($this->session->flashdata('success')) : ?>
			<div class="alert alert-success" role="alert">
				<?= $this->session->flashdata('success') ?>
			</div>
		<?php endif ?>

		<?php if ($this->session->flashdata('error')) : ?>
			<div class="alert alert-danger" role="alert">
				<?= $this->session->flashdata('error') ?>
			</div>
		<?php endif ?>

		<?php if ($this->session->flashdata('errors')) : ?>
			<div class="alert alert-danger" role="alert">
				<ul class="m-0">
					<?php foreach ($this->session->flashdata('errors') as $err) : ?>
						<li><?= $err ?></li>
					<?php endforeach ?>
				</ul>
			</div>
		<?php endif ?>
