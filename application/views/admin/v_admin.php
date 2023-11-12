<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<div class="col-md-2">
					<img src="<?= base_url() ?>deskapp-master/vendors/images/rajawali1.png" alt="">
				</div>
				<div class="col-md-8">
					<h4 class="font-20 weight-500 mb-10 text-capitalize">
						Welcome back <div class="weight-600 font-30 text-blue"><?= $this->session->userdata('nama_user') ?>!</div>
					</h4>
					<p class="font-18 max-width-600">Admin Rajawali Indah Mebeul</p>
				</div>
			</div>
		</div>
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Stock Barang</h4>
				</div>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama Barang</th>
						<th scope="col">Stock</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($barang as $key => $value) { ?>
						<tr>
							<th scope="row"><img src="<?= base_url('assets/barang/' . $value->gambar) ?>" width="70" height="70" alt=""></th>
							<td><?= $value->nama_barang ?></td>
							<td>
								<?php if ($value->stock >= 50) { ?>
									<span class="badge badge-pill badge-primary"><?= $value->stock ?></span>
								<?php } elseif ($value->stock >= 20 && $value->stock <= 50) { ?>
									<span class="badge badge-pill badge-warning"><?= $value->stock ?></span>
								<?php } elseif ($value->stock <= 20) { ?>
									<span class="badge badge-pill badge-danger"><?= $value->stock ?></span>
								<?php } ?>
							</td>
							<td>
								<?php if ($value->stock >= 50) { ?>
									<span class="badge badge-pill badge-primary">Penuh</span>
								<?php } elseif ($value->stock >= 20 && $value->stock <= 50) { ?>
									<span class="badge badge-pill badge-warning">Sedang</span>
								<?php } elseif ($value->stock <= 20) { ?>
									<span class="badge badge-pill badge-danger">Pesan Barang</span><a href="<?= base_url('kirim') ?>" class="fa fa-send-o"></a>
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>