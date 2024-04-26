<h2>Halaman Pasien</h2>
<div class="d-flex justify-content-between mb-2">
	<span>Melihat semua pasien</span>
	<a href="<?= site_url("/pasien/create") ?>">
		<button type="button" class="btn btn-info btn-sm">Tambah Pasien</button>
	</a>
</div>

<table id="myTable" class="table table-striped" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
			<th>User</th>
			<th>Tanggal Kunjungan</th>
			<th>Keluhan</th>
			<th>Nama Dokter</th>
			<th>Nama Poli</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pasien as $key => $item) : ?>
			<tr>
				<td><?= $key + 1 ?></td>
				<td><?= $item->nama ?></td>
				<td><?= $item->tanggal_lahir ?></td>
				<td><?= $item->alamat ?></td>
				<td><?= $item->username ?></td>
				<td><?= $item->tanggal_kunjungan ?></td>
				<td><?= $item->keluhan ?></td>
				<td><?= $item->nama_dokter ?></td>
				<td><?= $item->nama_poli ?></td>
				<td>
					<a style="text-decoration: none; color: black; cursor: pointer;" href="<?= site_url("/pasien/edit/") ?><?= $item->id_pasien ?>">Edit</a>
					|
					<span data-bs-toggle="modal" data-bs-target="#delete<?= $item->id_pasien ?>" style="text-decoration: none; color: black; cursor: pointer;">Hapus</sp>
						<!-- Modal -->
						<div class="modal fade" id="delete<?= $item->id_pasien ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Apakah anda yakin ingin menghapus pasien ini?</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>ID: <?= $key + 1 ?></p>
										<p>Nama: <?= $item->nama ?></p>
										<p>Tanggal Lahir: <?= $item->tanggal_lahir ?></p>
										<p>Alamat: <?= $item->alamat ?></p>
										<p>User: <?= $item->username ?></p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
										<form action="<?= site_url('/pasien/delete') ?>" method="POST">
											<input type="hidden" name="id" value="<?= $item->id_pasien ?>">
											<button type="submit" class="btn btn-danger">Hapus</button>
										</form>
									</div>
								</div>
							</div>
						</div>
				</td>
			</tr>
		<?php endforeach ?>

	</tbody>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
			<th>User</th>
			<th>Tanggal Kunjungan</th>
			<th>Keluhan</th>
			<th>Nama Dokter</th>
			<th>Nama Poli</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>

<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});
</script>