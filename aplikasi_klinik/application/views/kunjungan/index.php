<h2>Halaman Kunjungan</h2>
<div class="d-flex justify-content-between mb-2">
	<span>Melihat semua Kunjungan</span>
	<a href="<?= site_url("/kunjungan/create") ?>">
		<button type="button" class="btn btn-info btn-sm">Tambah Kunjungan</button>
	</a>
</div>

<table id="myTable" class="table table-striped" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pasien</th>
			<th>Nama Dokter</th>
			<th>Tanggal Kunjungan</th>
			<th>Keluhan</th>
			<th>Nama Poli</th>
			<th>Nama User</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $item) : ?>
			<tr>
				<td><?= $key + 1 ?></td>
				<td><?= $item->nama ?></td>
				<td><?= $item->nama_dokter ?></td>
				<td><?= $item->tanggal_kunjungan ?></td>
				<td><?= $item->keluhan ?></td>
				<td><?= $item->nama_poli ?></td>
				<td><?= $item->username ?></td>
				<td>
					<?php if ($this->session->userdata('id_user') === $item->id_user) : ?>

						<a style="text-decoration: none; color: black; cursor: pointer;" href="<?= site_url("/kunjungan/edit/") ?><?= $item->id_kunjungan ?>">Edit</a>
						|
						<span data-bs-toggle="modal" data-bs-target="#delete<?= $item->id_kunjungan ?>" style="text-decoration: none; color: black; cursor: pointer;">Hapus</sp>
							<!-- Modal -->
							<div class="modal fade" id="delete<?= $item->id_kunjungan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Apakah anda yakin ingin menghapus kunjungan ini?</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<p>No: <?= $key + 1 ?></p>
											<p>Nama Pasien: <?= $item->nama ?></p>
											<p>Nama Dokter: <?= $item->nama_dokter ?></p>
											<p>Nama Tanggal kunjungan: <?= $item->tanggal_kunjungan ?></p>
											<p>Nama Keluhan: <?= $item->keluhan ?></p>
											<p>Nama Nama Poli: <?= $item->nama_poli ?></p>
											<p>Nama User: <?= $item->username ?></p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
											<form action="<?= site_url('/kunjungan/delete') ?>" method="POST">
												<input type="hidden" name="id" value="<?= $item->id_kunjungan ?>">
												<button type="submit" class="btn btn-danger">Hapus</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						<?php endif ?>
				</td>
			</tr>
		<?php endforeach ?>

	</tbody>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Nama Pasien</th>
			<th>Nama Dokter</th>
			<th>Tanggal Kunjungan</th>
			<th>Keluhan</th>
			<th>Nama Poli</th>
			<th>Nama User</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>
