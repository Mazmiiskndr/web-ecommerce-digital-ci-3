<!--APP-SIDEBAR-->
<div class="sticky">
	<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
	<div class="app-sidebar">
		<div class="side-header">
			<a class="header-brand1" href="<?= base_url('admin/dashboard') ?>">
				<img src="<?= base_url('assets/uploads/') ?>logo-text-admin-white3.png" class="header-brand-img desktop-logo" alt="logo" width="50px">
				<img src="<?= base_url('assets/uploads/') ?>logo-admin.png" class="header-brand-img toggle-logo"
				alt="logo">
				<img src="<?= base_url('assets/uploads/') ?>logo-admin.png" class="header-brand-img light-logo" alt="logo">
				<img src="<?= base_url('assets/uploads/') ?>logo-text-admin3.png" class="header-brand-img light-logo1"
				alt="logo">
			</a> 
			<!-- LOGO -->
		</div>
		<div class="main-sidemenu">
			<div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
				fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
				<path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
			</svg></div>
			<ul class="side-menu">
				<li class="sub-category">
					<h3>Menu</h3>
				</li>
				<li class="slide">
					<a class="side-menu__item" data-bs-toggle="slide" href="<?= base_url('admin') ?>"><i
						class="side-menu__icon fe fe-home"></i><span
						class="side-menu__label">Dashboard</span></a>
					</li>
					<?php if($this->session->userdata('role_id') == 1){ ?>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
								class="side-menu__icon fe fe-shopping-bag"></i><span
								class="side-menu__label">Produk</span><i
								class="angle fe fe-chevron-right"></i></a>
								<ul class="slide-menu">
									<li class="side-menu-label1"><a href="javascript:void(0)">Produk</a></li>
									<?php foreach($kategori_produk as $kp){ ?>
										<li><a href="<?= base_url('admin/produk/kategori_produk/'.$kp->slug_kategori_produk) ?>" class="slide-item"> <?= $kp->nama_kategori_produk ?></a></li>
									<?php } ?>
								<!-- <li><a href="<?= base_url('admin/softfile_print') ?>" class="slide-item"> Soft File & Print</a></li>
								<li><a href="<?= base_url('admin/package') ?>" class="slide-item"> Package</a></li>
								<li><a href="<?= base_url('admin/print_only') ?>" class="slide-item"> Print Only</a></li> -->
							</ul>
						</li>


						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
								class="side-menu__icon fe fe-layers"></i><span
								class="side-menu__label">Kategori</span><i
								class="angle fe fe-chevron-right"></i></a>
								<ul class="slide-menu">
									<li class="side-menu-label1"><a href="javascript:void(0)">Kategori</a></li>

									<li><a href="<?= base_url('admin/kategori_produk') ?>" class="slide-item"> Kategori Produk</a></li>
									<li><a href="<?= base_url('admin/packaging') ?>" class="slide-item"> Packaging</a></li>
									<li><a href="<?= base_url('admin/tambahan_biaya') ?>" class="slide-item"> Tambahan Biaya</a></li>

									<li class="sub-slide">
										<a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
											class="sub-side-menu__label">Jenis Cetakan</span><i
											class="sub-angle fe fe-chevron-right"></i></a>
											<ul class="sub-slide-menu">

												<li><a class="sub-slide-item" href="<?= base_url('admin/jenis_cetakan') ?>">Kategori Jenis Cetakan</a></li>
												<li><a class="sub-slide-item" href="<?= base_url('admin/sub_jenis_cetakan') ?>">Sub Kategori Jenis Cetakan</a></li>
												<li><a class="sub-slide-item" href="<?= base_url('admin/ukuran_jenis_cetakan') ?>">Ukuran Cetakan</a></li>

											</ul>
										</li>
									</ul>
								</li>

							<?php } ?>
							<li class="slide">
								<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
									class="side-menu__icon fe fe-package"></i><span
									class="side-menu__label">Penjualan</span><i
									class="angle fe fe-chevron-right"></i></a>
									<ul class="slide-menu">
										<li class="side-menu-label1"><a href="javascript:void(0)">Bootstrap</a></li>
										<li><a href="<?= base_url('admin/penjualan/belum_bayar') ?>" class="slide-item"> Belum di Bayar</a></li>
										<li><a href="<?= base_url('admin/penjualan/dikemas') ?>" class="slide-item"> Dikemas</a></li>
										<li><a href="<?= base_url('admin/penjualan/dikirim') ?>" class="slide-item"> Dikirim</a></li>
										<li><a href="<?= base_url('admin/penjualan/retur') ?>" class="slide-item"> Retur</a></li>
										<li><a href="<?= base_url('admin/penjualan/selesai') ?>" class="slide-item"> Selesai</a></li>
									</ul>
								</li>
								<?php if($this->session->userdata('role_id') == 1){ ?>
									<li class="slide">
										<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
											class="side-menu__icon fe fe-users"></i><span
											class="side-menu__label">Data User</span><i
											class="angle fe fe-chevron-right"></i></a>
											<ul class="slide-menu">
												<li class="side-menu-label1"><a href="javascript:void(0)">Data User</a></li>
												<li><a href="<?= base_url('admin/users/manager') ?>" class="slide-item"> Manager</a></li>
												<li><a href="<?= base_url('admin/users') ?>" class="slide-item"> Administrator</a></li>
												<li><a href="<?= base_url('admin/users/customer') ?>" class="slide-item"> Customer</a></li>
											</ul>
										</li>
										<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="<?= base_url('admin/role') ?>"><i
												class="side-menu__icon fe fe-cpu"></i><span
												class="side-menu__label">Role</span></a>
											</li>
											<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="<?= base_url('admin/bank') ?>"><i
												class="side-menu__icon fe fe-credit-card"></i><span
												class="side-menu__label">Bank</span></a>
											</li>
											<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="<?= base_url('admin/coupon') ?>"><i
												class="side-menu__icon fe fe-percent"></i><span
												class="side-menu__label">Coupon</span></a>
											</li>
										<?php } ?>
										<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="<?= base_url('admin/users/edit_data_profil/'.$this->session->userdata('id_users')) ?>"><i
												class="side-menu__icon fe fe-user"></i><span
												class="side-menu__label">Profil</span></a>
											</li>

											<li class="slide">
												<a class="side-menu__item" data-bs-toggle="slide" href="<?= base_url('admin/transaksi') ?>"><i
													class="side-menu__icon fe fe-file-text"></i><span
													class="side-menu__label">Laporan & Hasil</span></a>
												</li>
												<li class="slide">
													<a class="side-menu__item" data-bs-toggle="slide" href="<?= base_url('admin/pesan') ?>"><i
														class="side-menu__icon fe fe-message-square"></i><span
														class="side-menu__label">Pesan</span></a>
													</li>
													<?php if($this->session->userdata('role_id') == 1){ ?>
														<li class="slide">
															<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
																class="side-menu__icon fe fe-settings"></i><span
																class="side-menu__label">Pengaturan</span><i
																class="angle fe fe-chevron-right"></i></a>
																<ul class="slide-menu">
																	<li class="side-menu-label1"><a href="javascript:void(0)">Pengaturan</a></li>
																	<li><a href="<?= base_url('admin/home') ?>" class="slide-item"> Home</a></li>
																	<li><a href="<?= base_url('admin/gallery') ?>" class="slide-item"> Gallery</a></li>
																	<li><a href="<?= base_url('admin/contact') ?>" class="slide-item"> Contact</a></li>
																	<li><a href="<?= base_url('admin/about') ?>" class="slide-item"> About</a></li>
																</ul>
															</li>
														<?php } ?>
														<li class="slide">
															<a class="side-menu__item" data-bs-toggle="slide" href="<?= base_url('auth/login/logout') ?>" onclick="return confirm('Logout?')"><i
																class="side-menu__icon fe fe-power text-danger"></i><span
																class="side-menu__label">Logout</span></a>
															</li>



														</ul>
														<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
															width="24" height="24" viewBox="0 0 24 24">
															<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
														</svg></div>
													</div>
												</div>
												<!--/APP-SIDEBAR-->
											</div>