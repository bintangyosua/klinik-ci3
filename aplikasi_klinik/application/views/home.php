<!-- Projects -->
<h2 class="mb-2">Total Kunjungan</h2>
<div class="row row-cols-1 row-cols-md-4 g-4">
	<?php foreach ($data as $item) { ?>
		<div class="col">
			<div class="card" style="width: 100%; height: 100%;">
				<div class="card-body">
					<h5 class="card-title"><?= $item->tanggal_kunjungan ?></h5>
					<h6 class="card-subtitle mb-2" style="color: red;">Total kunjungan: <?= $item->total_kunjungan ?></h6>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<div class="mb-3"></div>
