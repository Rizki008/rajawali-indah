<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<div class="col-md-4">
					<img src="<?= base_url() ?>deskapp-master/vendors/images/banner-img.png" alt="">
				</div>
				<div class="col-md-8">
					<h4 class="font-20 weight-500 mb-10 text-capitalize">
						Welcome back <div class="weight-600 font-30 text-blue"><?= $this->session->userdata('nama_user') ?>!</div>
					</h4>
					<p class="font-18 max-width-600">Kelola Barang Gudang</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-3 mb-30">
				<div class="card-box height-100-p widget-style1">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<div id="chart"></div>
						</div>
						<div class="widget-data">
							<div class="h4 mb-0">2020</div>
							<div class="weight-600 font-14">Contact</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 mb-30">
				<div class="card-box height-100-p widget-style1">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<div id="chart2"></div>
						</div>
						<div class="widget-data">
							<div class="h4 mb-0">400</div>
							<div class="weight-600 font-14">Deals</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 mb-30">
				<div class="card-box height-100-p widget-style1">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<div id="chart3"></div>
						</div>
						<div class="widget-data">
							<div class="h4 mb-0">350</div>
							<div class="weight-600 font-14">Campaign</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 mb-30">
				<div class="card-box height-100-p widget-style1">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<div id="chart4"></div>
						</div>
						<div class="widget-data">
							<div class="h4 mb-0">$6060</div>
							<div class="weight-600 font-14">Worth</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-8 mb-30">
				<div class="card-box height-100-p pd-20">
					<h2 class="h4 mb-20">Activity</h2>
					<div id="chart5"></div>
				</div>
			</div>
			<div class="col-xl-4 mb-30">
				<div class="card-box height-100-p pd-20">
					<h2 class="h4 mb-20">Lead Target</h2>
					<div id="chart6"></div>
				</div>
			</div>
		</div>
		<div class="card-box mb-30">
			<h2 class="h4 pd-20">Best Selling Products</h2>
			<table class="data-table table nowrap">
				<thead>
					<tr>
						<th class="table-plus datatable-nosort">No</th>
						<th>Gambar</th>
						<th>Nama Supplier</th>
						<th>Nama Barang</th>
						<th>Kategori Barang</th>
						<th>Stock Barang</th>
						<th class="datatable-nosort">Deskripsi Barang</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($barang_kurang as $key => $value) { ?>
						<tr>
							<td class="table-plus"><?= $no++ ?></td>
							<td>
								<img src="<?= base_url('/assets/barang/' . $value->gambar) ?>" width="70" height="70" alt="">
							</td>
							<td><?= $value->nama_user ?></td>
							<td><?= $value->nama_barang ?></td>
							<td><?= $value->kategori_barang ?></td>
							<td><?= $value->stock ?></td>
							<td><?= $value->deskripsi ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>