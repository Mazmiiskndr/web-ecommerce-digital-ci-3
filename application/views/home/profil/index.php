<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">My Account</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active"> My Account</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- My Account Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <?= $this->session->flashdata('pesan'); ?>
                <?php foreach($detail as $row){ ?>

                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <?php if($produk_transaksi){ ?>
                                        <a href="#dashboad" class="" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>Dashboard</a>
                                    <?php }else{ ?>
                                        <a href="#dashboad" class="<?php if($row->alamat_users == NULL) { echo ''; }elseif($row->alamat_users != NULL || $produk_transaksi){echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>Dashboard</a>
                                    <?php } ?>
                                    <?php if($produk_transaksi){ ?>
                                        <a href="#orders" class="<?php if($row->alamat_users == NULL) { echo ''; }elseif($row->alamat_users != NULL || $produk_transaksi){echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                    <?php }else{ ?>
                                        <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                    <?php } ?>
                                    <a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
                                    
                                    <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                                    <a href="#account-info" class="<?php if($row->alamat_users == NULL) { echo 'active'; }elseif($row->alamat_users != NULL){echo '';} ?>" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                    <a href="<?= base_url('auth/login/logout') ?>" onclick="return confirm('Logout?')"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <?php if($produk_transaksi){ ?>
                                        <div class="tab-pane fade" id="dashboad" role="tabpanel">
                                        <?php }else{ ?>
                                            <div class="tab-pane fade show <?php if($row->alamat_users == NULL) { echo ''; }elseif($row->alamat_users != NULL){echo 'active';} ?>" id="dashboad" role="tabpanel">
                                            <?php } ?>

                                            <div class="myaccount-content">
                                                <h3 class="title">Dashboard</h3>
                                                <div class="welcome">
                                                    <p>Hello, <strong><?= $row->nama_users ?></strong> (If Not <strong><?= $row->nama_users ?> !</strong><a href="<?= base_url('auth/login/logout') ?>" class="logout" onclick="return confirm('Logout?')"> Logout</a>)</p>
                                                </div>
                                                <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <?php if($produk_transaksi){ ?>
                                            <div class="tab-pane fade show <?php if($row->alamat_users == NULL) { echo ''; }elseif($row->alamat_users != NULL || $produk_transaksi){echo 'active';}?>" id="orders" role="tabpanel">
                                            <?php }else{ ?>
                                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <?php } ?>
                                                <div class="myaccount-content">
                                                    <h3 class="title">Your Orders</h3>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Status Pembayaran</th>
                                                                    <th>Status Transaksi</th>
                                                                    <th>Bukti Pembayaran</th>
                                                                    <th>Total</th>
                                                                    <th>Aksi</th>
                                                                    <th>Retur</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  
                                                                $no = 1;
                                                                foreach($produk_transaksi as $pt){ 
                                                                    if($pt->id_users == $this->session->userdata('id_users')){
                                                                        ?>
                                                                        <tr>
                                                                            <td><?= $no++; ?></td>
                                                                            <td><?= date('d F, Y', strtotime($pt->created_at)) ?></td>

                                                                            <!-- Status Pembayaran -->
                                                                            <?php if($pt->status_pembayaran == 0){ ?>
                                                                                <td><span class="badge badge-danger btn-sm"><i class="fa fa-exclamation-circle"></i> Belum di bayar!</span></td>
                                                                            <?php }elseif($pt->status_pembayaran == 1){ ?>
                                                                                <td><span class="badge badge-secondary btn-sm"><i class="fa fa-refresh"></i> Pembayaran sedang di cek!</span></td>
                                                                            <?php }elseif($pt->status_pembayaran == 2){ ?>
                                                                                <td><span class="badge badge-success btn-sm"><i class="fa fa-check-circle"></i> Pembayaran di terima!</span></td>
                                                                            <?php }elseif($pt->status_pembayaran == 3){ ?>
                                                                                <td><span class="badge badge-danger btn-sm"><i class="fa fa-times-circle"></i> Pembayaran di tolak!</span></td>
                                                                            <?php } ?>
                                                                            <!-- End Status Pembayaran -->

                                                                            <!-- Belum Selesai -->
                                                                            <!-- Status Transaksi -->
                                                                            <?php if($pt->status_transaksi == 0){ ?>
                                                                                <td><span class="badge badge-dark btn-sm"> - </span></td>
                                                                            <?php }elseif($pt->status_transaksi == 1){ ?>
                                                                                <td><span class="badge badge-primary btn-sm"><i class="fa fa-cube"></i> Dikemas!</span></td>
                                                                            <?php }elseif($pt->status_transaksi == 2){ ?>
                                                                                <td><span class="badge badge-info btn-sm"><i class="fa fa-truck"></i> Dikirim!</span></td>
                                                                            <?php }elseif($pt->status_transaksi == 3){ ?>
                                                                                <td><span class="badge badge-warning btn-sm"><i class="fa fa-refresh"></i> Retur!</span></td>
                                                                            <?php }elseif($pt->status_transaksi == 4){ ?>
                                                                                <td><span class="badge badge-success btn-sm"><i class="fa fa-check-circle"></i> Selesai!</span></td>
                                                                            <?php }elseif($pt->status_transaksi == 5){ ?>
                                                                                <td><span class="badge badge-info btn-sm"><i class="fa fa-refresh"></i> Retur sedang dicek!</span></td>
                                                                            <?php }elseif($pt->status_transaksi == 6){ ?>
                                                                                <td><span class="badge badge-danger btn-sm"><i class="fa fa-times"></i> Retur di tolak!</span></td>
                                                                            <?php }  ?>
                                                                            <!-- End Status Transaksi -->

                                                                            <!-- Bukti Pembayaran -->
                                                                            <?php if($pt->bukti_pembayaran == NULL){ ?>
                                                                                <td><a href="<?= base_url('home/checkout/place_order/'.$pt->no_transaksi) ?>" class="btn btn-sm btn-info btn-sm"><i class="fa fa-upload"></i> Upload!</a></td>
                                                                            <?php }elseif($pt->status_pembayaran == 3){ ?>
                                                                                <td><a href="<?= base_url('home/profil/upload_bukti_pembayaran/'.$pt->id_transaksi) ?>" class="btn btn-sm btn-dark btn-sm"><i class="fa fa-upload"></i> Upload Ulang?</a></td>
                                                                            <?php }else{ ?>
                                                                                <td><span class="badge badge-success btn-sm"><i class="fa fa-check-circle"></i> Selesai!</span></td>
                                                                            <?php } ?>
                                                                            <!-- End Bukti Pembayaran -->
                                                                            <td>Rp. <?= number_format($pt->total_bayar,0,',','.') ?></td>
                                                                            <td>
                                                                                <?php if($pt->status_transaksi == 2){ ?>
                                                                                    <a href="<?= base_url('home/checkout/pesanan_diterima/'.$pt->no_transaksi) ?>" class="badge badge-success btn-sm" onclick="return confirm('Pesanan diterima?')"><i class="fa fa-check"></i> Pesanan diterima?</a>
                                                                                <?php }elseif($pt->status_transaksi == 4){ ?>
                                                                                    <a href="<?= base_url('home/checkout/place_order/'.$pt->no_transaksi) ?>" class="badge badge-dark btn-sm"><i class="fa fa-star"></i> Review</a>


                                                                                <?php }else{ ?>
                                                                                    <a href="<?= base_url('home/checkout/place_order/'.$pt->no_transaksi) ?>" class="btn btn btn-info btn-hover-primary btn-sm rounded"><i class="fa fa-eye"></i></a>
                                                                                    <?php if($pt->status_pembayaran == 0){ ?>
                                                                                        <a href="<?= base_url('home/profil/hapus_data_transaksi/'.$pt->no_transaksi) ?>" class="btn btn btn-danger btn-hover-success btn-sm rounded" onclick="return confirm('Delete?')"><i class="fa fa-trash"></i></a>
                                                                                    <?php } ?>

                                                                                <?php } ?>

                                                                            </td>
                                                                            <td>
                                                                                <?php if($pt->status_transaksi == 2){ ?>
                                                                                    <a href="<?= base_url('home/profil/retur/'.$pt->id_transaksi) ?>" class="badge badge-warning btn-sm" onclick="return confirm('Retur?')"><i class="fa fa-refresh"></i> Retur?</a>
                                                                                <?php }elseif($pt->status_transaksi == 6){ ?>
                                                                                    <a href="<?= base_url('home/profil/retur/'.$pt->id_transaksi) ?>" class="badge badge-danger btn-sm" onclick="return confirm('Upload Ulang?')"><i class="fa fa-refresh"></i> Upload Ulang?</a>
                                                                                <?php }else{ ?>
                                                                                    <a href="#" class="badge badge-dark btn-sm"> - </a>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                    <?php }} ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Single Tab Content End -->

                                                <!-- Single Tab Content Start -->

                                                <div class="tab-pane fade" id="download" role="tabpanel">

                                                    <div class="myaccount-content">
                                                        <h3 class="title">Downloads</h3>
                                                        <div class="myaccount-table table-responsive text-center">
                                                            <table class="table table-bordered">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Product</th>
                                                                        <th>Download</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    $no=1;
                                                                    foreach($upload_transaksi as $upload){ 
                                                                        ?>
                                                                        <?php if($upload->id_users == $this->session->userdata('id_users')){ ?>
                                                                            <?php if($upload->dokumen_file){ ?>
                                                                                <tr>
                                                                                    <td><?= $no++ ?></td>
                                                                                    <td>
                                                                                        <?php if($upload->id_softfile_only){
                                                                                            echo $upload->nama_softfile_only;
                                                                                        }elseif($upload->id_softfile_print){
                                                                                            echo $upload->nama_softfile_print;
                                                                                        }elseif($upload->id_package){
                                                                                            echo $upload->nama_package;
                                                                                        }elseif($upload->id_print_only){
                                                                                            echo $upload->nama_print_only;
                                                                                        } ?>

                                                                                    </td>
                                                                                    <td><a href="<?= base_url('home/profil/download_file/'.$upload->id_produk_transaksi) ?>" class="btn btn btn-dark btn-hover-primary rounded-0"><i class="fa fa-cloud-download me-1"></i> Download File</a></td>

                                                                                </tr>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Single Tab Content End -->
                                                <!-- Single Tab Content Start -->
                                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                                    <div class="myaccount-content">
                                                        <h3 class="title">Billing Address</h3>
                                                        <address>
                                                            <p><strong><?= $row->nama_users ?></strong></p>
                                                            <p><?= ($row->alamat_users) ? $row->alamat_users : "-" ?></p>
                                                            <p>No. Telepon : <?= $row->no_telp_users ?></p>
                                                        </address>

                                                    </div>
                                                </div>
                                                <!-- Single Tab Content End -->

                                                <!-- Single Tab Content Start -->
                                                <div class="tab-pane fade show <?php if($row->alamat_users == NULL) { echo 'active'; }elseif($row->alamat_users != NULL){echo '';} ?>" id="account-info" role="tabpanel">
                                                    <div class="myaccount-content">
                                                        <?php if($row->alamat_users == NULL){ ?>
                                                            <small class="text-danger">Silahkan lengkapi data akun Anda!</small>
                                                        <?php }else{ ?>
                                                        <?php } ?>
                                                        <h3 class="title">Account Details</h3>
                                                        <div class="account-details-form">
                                                            <form action="<?= base_url('home/profil/edit_data_aksi') ?>" method="post">

                                                                <div class="single-input-item mb-3">
                                                                    <label class="required mb-1">Email </label>
                                                                    <input type="hidden" name="id_users" value="<?= $row->id_users ?>">
                                                                    <input type="email" placeholder="Email" name="email_users" value="<?= $row->email_users ?>" readonly  style="background-color: #3333;"/>
                                                                </div>
                                                                <div class="single-input-item mb-3">
                                                                    <label class="required mb-1">Nama Lengkap</label>
                                                                    <input type="text" placeholder="Nama Lengkap" name="nama_users" value="<?= $row->nama_users ?>" />
                                                                </div>
                                                                <div class="single-input-item mb-3">
                                                                    <label class="required mb-1">No. Telepon </label>
                                                                    <input type="text" placeholder="Email" name="no_telp_users" value="<?= $row->no_telp_users ?>" />
                                                                </div>
                                                                <div class="single-input-item mb-3">
                                                                    <label class="required mb-1">Alamat </label>
                                                                    <input type="text" placeholder="Alamat" name="alamat_users" value="<?= $row->alamat_users ?>" />
                                                                    <?php if($row->alamat_users == NULL){ ?>
                                                                        <small class="text-danger">Silahkan isi alamat dengan detail!</small>
                                                                    <?php }else{ ?>
                                                                    <?php } ?>
                                                                </div>
                                                                <fieldset>
                                                                    <legend>Password change</legend>
                                                                    <div class="single-input-item mb-3">
                                                                        <label class="required mb-1">Ganti Password</label>
                                                                        <input type="password" placeholder="Ganti Password" name="password_users" />
                                                                        <small class="text-danger">Jika tidak ingin diganti tidak perlu di Isi!</small>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="single-input-item single-item-button">
                                                                    <button type="submit" class="btn btn btn-dark btn-hover-primary rounded-0">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> <!-- Single Tab Content End -->
                                            </div>
                                        </div> <!-- My Account Tab Content End --> 
                                    </div>
                                </div>
                                <!-- My Account Page End -->
                            <?php } ?>

                        </div>
                    </div>

                </div>
            </div>
            <!-- My Account Section End -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                <?php if($this->session->flashdata('upload_bukti')){ ?>
                    var isi = <?php echo json_encode($this->session->flashdata('upload_bukti')) ?>;
                    Swal.fire({
                        title: 'Silahkan Kirim Foto Terbaikmu',
                        html:

                        '<a href="https://api.whatsapp.com/send?phone=6287727563939" class="badge badge-success" target="_blank"><i class="fa fa-whatsapp"></i> Whatsapp</a>' ,

                        showCloseButton: true,
                        showConfirmButton: false,
                    })
                <?php } ?>
            </script>