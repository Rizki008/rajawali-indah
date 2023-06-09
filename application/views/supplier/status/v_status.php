<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4><?= $title ?></h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= base_url('supplier') ?>">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">

					</div>
				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box pb-10">
				<div class="h5 pd-20 mb-0">Recent Patient</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus">Nama Barang</th>
							<th>Kategori Barang</th>
							<th>Jumlah Kirim</th>
							<th>Tanggal Proses</th>
							<th>Status</th>
							<th class="datatable-nosort">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($masuk as $key => $value) { ?>
							<tr>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?= base_url('assets/barang/' . $value->gambar) ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?= $value->nama_barang ?></div>
										</div>
									</div>
								</td>
								<td><?= $value->kategori_barang ?></td>
								<td><?= $value->qty ?></td>
								<td><?= $value->tanggal_kirim ?></td>
								<td>
									<?php if ($value->status == '0') { ?>
										<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Menunggu Konfirmasi</span>
									<?php } elseif ($value->status == '1') { ?>
										<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Dikonfirmasi</span>
									<?php } elseif ($value->status == '2') { ?>
										<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Kirim</span>
									<?php } elseif ($value->status == '3') { ?>
										<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Selesai</span>
									<?php } ?>
								</td>
								<td>
									<div class="table-actions">
										<?php if ($value->status == '1') { ?>
											<a href="<?= base_url('status_barang/kirim/' . $value->id_barang_masuk) ?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
											<!-- <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a> -->
										<?php } ?>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- Simple Datatable End -->
			<br>