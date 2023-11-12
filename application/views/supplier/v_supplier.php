<?php
$total_pesanan = $this->m_notif->pesanan();
$jmlbarang = $this->m_notif->jmlbarang();
$notif = $this->m_notif->barang();
?>
<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<div class="col-md-2">
					<img src="<?= base_url() ?>deskapp-master/vendors/images/rajawali1.png" alt="">
				</div>
				<div class="col-md-8">
					<h4 class="font-20 weight-500 mb-10 text-capitalize">
						Welcome back <div class="weight-600 font-30 text-blue"><?= $this->session->userdata('nama_user') ?>!</div>
					</h4>
					<p class="font-18 max-width-600">Kelola Pengiriman Barang</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-4 mb-30">
				<div class="card-box height-100-p widget-style1">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<div id="chart"></div>
						</div>
						<div class="widget-data">
							<div class="h4 mb-0"><?= $total_pesanan ?></div>
							<div class="weight-600 font-14">Pesanan</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 mb-30">
				<div class="card-box height-100-p widget-style1">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<div id="chart2"></div>
						</div>
						<div class="widget-data">
							<div class="h4 mb-0"><?= $jmlbarang ?></div>
							<div class="weight-600 font-14">Jumlah Barang</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 mb-30">
				<div class="card-box height-100-p widget-style1">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<div id="chart3"></div>
						</div>
						<div class="widget-data">
							<div class="h4 mb-0"><?= $notif ?></div>
							<div class="weight-600 font-14">Stock barang Menipis</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-box mb-30">
			<h2 class="h4 pd-20">Stock Barang Digudang</h2>
			<table class="data-table table nowrap">
				<thead>
					<tr>
						<th class="table-plus datatable-nosort">Gambar</th>
						<th>Nama Barang</th>
						<th>Kategori Barang</th>
						<th>Stock Barang</th>
						<th>Harga Satuan Barang</th>
						<th>Deskripsi Barang</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($barang as $key => $value) { ?>
						<tr>
							<td class="table-plus">
								<img src="<?= base_url('/assets/barang/' . $value->gambar) ?>" width="70" height="70" alt="">
							</td>
							<td><?= $value->nama_barang ?></td>
							<td><?= $value->kategori_barang ?></td>
							<td><?= $value->stock ?></td>
							<td>Rp. <?= number_format($value->harga, 0) ?></td>
							<td><?= $value->deskripsi ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>