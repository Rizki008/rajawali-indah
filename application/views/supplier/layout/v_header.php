<body>
	<?php $keranjang = $this->cart->contents();
	$jml_item = 0;
	foreach ($keranjang as $key => $value) {
		$jml_item = $jml_item + $value['qty'];
	} ?>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?= base_url() ?>deskapp-master/vendors/images/user.png" alt="">
						</span>
						<span class="user-name"><?= $this->session->userdata('nama_user'); ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>

		</div>
	</div>