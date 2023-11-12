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
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="invoice-wrap">
				<div class="invoice-box">
					<div class="invoice-header">
						<div class="logo text-center">
							<img src="vendors/images/deskapp-logo.png" alt="">
						</div>
					</div>
					<h4 class="text-center mb-30 weight-600">INVOICE</h4>
					<?php foreach ($pembayaran as $key => $value) { ?>
					<?php } ?>
					<div class="row pb-30">
						<div class="col-md-6">
							<h5 class="mb-15"><?= $value->nama_user ?></h5>
							<p class="font-14 mb-5">Tanggal Pemesanan: <strong class="weight-600"><?= $value->tanggal_kirim ?></strong></p>
							<p class="font-14 mb-5">Invoice No: <strong class="weight-600"><?= $value->no_pengiriman ?></strong></p>
						</div>
						<!-- <div class="col-md-6">
							<div class="text-right">
								<p class="font-14 mb-5"><strong>Your Name</strong></p>
								<p class="font-14 mb-5">Your Address</p>
								<p class="font-14 mb-5">City</p>
								<p class="font-14 mb-5">Postcode</p>
							</div>
						</div> -->
					</div>
					<div class="invoice-desc pb-30">
						<div class="invoice-desc-head clearfix">
							<div class="invoice-sub">Nama Barang</div>
							<div class="invoice-rate">Harga</div>
							<div class="invoice-hours">Qty</div>
							<div class="invoice-subtotal">Subtotal</div>
						</div>
						<div class="invoice-desc-body">
							<?php foreach ($pembayaran as $key => $detail) { ?>
								<ul>
									<li class="clearfix">
										<div class="invoice-sub"><?= $detail->nama_barang ?></div>
										<div class="invoice-rate">Rp. <?= number_format($detail->harga, 0) ?></div>
										<div class="invoice-hours"><?= $detail->qty ?></div>
										<div class="invoice-subtotal"><span class="weight-600">Rp. <?= number_format($detail->harga * $detail->qty, 0) ?></span></div>
									</li>
								</ul>
							<?php } ?>
							<br>
							<h5>Bukti Bayar :</h5>
							<br>
							<img src="<?= base_url('assets/transaksi/' . $detail->bukti_bayar) ?>" width="500px" alt="">
							<br>
							<br>
						</div>
						<div class="invoice-desc-footer">
							<div class="invoice-desc-head clearfix">
								<div class="invoice-sub">Nama Pembayar</div>
								<div class="invoice-rate">Tanggal Bayar</div>
								<div class="invoice-subtotal">Total Bayar</div>
							</div>
							<div class="invoice-desc-body">
								<ul>
									<li class="clearfix">
										<div class="invoice-sub">
											<p class="font-14 mb-5"><strong class="weight-600"><?= $value->nama_user ?></strong></p>
											<!-- <p class="font-14 mb-5">Code: <strong class="weight-600">4556</strong></p> -->
										</div>
										<div class="invoice-rate font-10 weight-500"><?= $value->tanggal_kirim ?></div>
										<div class="invoice-subtotal"><span class="weight-500 font-20 text-danger">Rp. <?= number_format($value->pembayaran, 0) ?></span></div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<h4 class="text-center pb-20">Thank You!!</h4>
					<?php if ($detail->status === '4') { ?>
						<button class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
					<?php } ?>
					<br>
					<a href="<?= base_url('status_barang_admin/selesai/' . $value->id_barang_masuk) ?>" class="btn btn-outline-success"><i class="fa fa-check-square-o"></i>Selesai Pembayaran</a>
				</div>
			</div>
		</div>
		<br>