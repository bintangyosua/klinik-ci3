<h2>Halaman Dokter</h2>
<div class="d-flex justify-content-between mb-2">
	<span>Melihat semua dokter</span>
	<a href="<?= site_url("/dokter/create") ?>">
		<button type="button" class="btn btn-info btn-sm">Tambah Dokter</button>
	</a>
</div>

<table id="myTable" class="table table-striped" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Dokter</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $item) : ?>
			<tr>
				<td><?= $key + 1 ?></td>
				<td><?= $item->nama_dokter ?></td>
				<td>
					<?php if ($this->session->userdata('id_user')) : ?>
						<a style="text-decoration: none; color: black; cursor: pointer;" href="<?= site_url("/dokter/edit/") ?><?= $item->id_dokter ?>">Edit</a>
						|
						<span data-bs-toggle="modal" data-bs-target="#delete<?= $item->id_dokter ?>" style="text-decoration: none; color: black; cursor: pointer;">Hapus</sp>
							<!-- Modal -->
							<div class="modal fade" id="delete<?= $item->id_dokter ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Apakah anda yakin ingin menghapus dokter ini?</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<p>No: <?= $key + 1 ?></p>
											<p>Nama: <?= $item->nama_dokter ?></p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
											<form action="<?= site_url('/dokter/delete') ?>" method="POST">
												<input type="hidden" name="id" value="<?= $item->id_dokter ?>">
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
			<th>Nama</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>
