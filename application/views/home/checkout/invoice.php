
<!doctype html>
    <html lang="en" dir="ltr">

    <head>

        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

        <!-- Favicons -->
        <link rel="shortcut icon" href="<?= base_url('assets/uploads/') ?>faviconjangmar.png">

        <!-- TITLE -->
        <title><?= $title ?></title>
        
        <!-- BOOTSTRAP CSS -->
        <link id="style" href="<?= base_url('assets/admin/') ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="<?= base_url('assets/admin/') ?>/assets/css/style.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin/') ?>/assets/css/dark-style.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin/') ?>/assets/css/transparent-style.css" rel="stylesheet">
        <link href="<?= base_url('assets/admin/') ?>/assets/css/skin-modes.css" rel="stylesheet" />

        <!--- FONT-ICONS CSS -->
        <link href="<?= base_url('assets/admin/') ?>/assets/css/icons.css" rel="stylesheet" />

        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/admin/') ?>/assets/colors/color1.css" />

    </head>

    <body class="">

        <!--app-content open-->
        <div class="main-content mt-0">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>

                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <?php 

                $total = 0;
                $total_bayar = 0;
                foreach($produk_transaksi as $pt){

                    $total = $pt->harga_satuan * $pt->qty;
                    $total_bayar += $total;
                }

                ?>
                <?php foreach($detail as $row){ ?>
                    <!-- ROW-1 OPEN -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a class="header-brand" href="index.html">
                                                <img src="<?= base_url('assets/uploads/') ?>textjangmar3.png" class="header-brand-img logo-3" alt="JangmarArt">
                                                <!-- <img src="<?= base_url('assets/admin/') ?>/assets/images/brand/logo.png" class="header-brand-img logo" alt="Sash logo"> -->
                                            </a>
                                            <div>
                                                <address class="">
                                                    <?= $contact['alamat_contact'] ?><br>
                                                    <?= $contact['no_telp_contact'] ?>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-end border-bottom border-lg-0">
                                            <h3>No. Pesanan : #<?= strtoupper($row->no_transaksi)  ?></h3>
                                            <h5>Tanggal : <?= date('Y-m-d') ?></h5>
                                            <?php if($row->no_resi){ ?>
                                                <h4><strong>No. Resi : <?= strtoupper($row->no_resi)  ?></strong></h4>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row pt-5">
                                        <div class="col-lg-6">
                                            <address>
                                                Nama Pembeli : <?= $row->nama_users ?><br>
                                                Alamat Pembeli : <?= $row->alamat_users ?><br>
                                                <?= $row->provinsi ?>, <?= $row->kota ?><br>
                                                Nomor HP Pembeli : <?= $row->no_telp_users ?><br><br>

                                            </address>
                                            <strong>Rincian Pesanan : </strong>
                                        </div>
                                        <div class="col-lg-6 text-end">
                                            <p class="h4 fw-semibold">Detail Pembayaran:</p>
                                            
                                            <p class="mb-1">Nama Bank : <?= $row->nama_bank ?></p>
                                            <p class="">A/n Rekening : <?= $row->nama_rekening ?> <br>
                                                Jasa Kirim : <?= strtoupper($row->expedisi)  ?> - <?= $row->paket ?> 
                                            </p>
                                            <p class="mb-3">Status Pembayaran : 
                                                <?php if( $row->status_pembayaran == 0 ){ ?>
                                                    <span class="text-danger">Belum dibayar!</span>
                                                <?php }elseif( $row->status_pembayaran == 1 ){ ?>
                                                    <span class="text-warning">Pembayaran sedang di cek!</span>
                                                <?php }elseif( $row->status_pembayaran == 2 ){ ?>
                                                    <span class="text-success">Pembayaran di terima!</span>
                                                <?php }elseif( $row->status_pembayaran == 3 ){ ?>
                                                    <span class="text-danger">Pembayaran di tolak!</span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="table-responsive push">
                                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                                            <tbody>
                                                <tr class=" ">
                                                    <th class="text-center"></th>
                                                    <th>Item</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-end">Unit Price</th>
                                                    <th class="text-end">Sub Total/Unit</th>

                                                    <?php if($row->status_transaksi == 4 ){ ?>
                                                        <th class="text-center">Reviews</th>
                                                    <?php } ?>

                                                </tr>

                                                <?php 
                                                $no = 1;

                                                foreach($produk_transaksi as $item){ ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++ ?></td>
                                                        <td> 
                                                            <p class="font-w600 mb-1">
                                                                <?php if($item->nama_softfile_only){
                                                                    echo $item->nama_softfile_only;
                                                                }elseif($item->nama_softfile_print){
                                                                    echo $item->nama_softfile_print;
                                                                }elseif($item->nama_package){
                                                                    echo $item->nama_package;
                                                                }elseif($item->nama_print_only){
                                                                    echo $item->nama_print_only;
                                                                } ?> 
                                                            </p>
                                                            <div class="text-muted">
                                                                <div class="text-muted"><?php if($item->id_softfile_only){ ?>

                                                                    <?php if($item->nama_tambahan_biaya_produk_transaksi){ ?>
                                                                        <?= $item->nama_variasi_cart ?> Rp. <?= number_format($item->harga_variasi,0,',','.') ?>
                                                                        <br>
                                                                        + <?= $item->nama_tambahan_biaya_produk_transaksi . ' Rp. ' . number_format($item->harga_tambahan_biaya_produk_transaksi,0,',','.') ?>
                                                                    <?php }else{ ?>
                                                                        <?= $item->nama_variasi_cart ?> Rp. <?= number_format($item->harga_variasi,0,',','.') ?>
                                                                    <?php } ?>

                                                                <?php }elseif($item->id_softfile_print){ ?>
                                                                    <small>
                                                                        <?php if($item->nama_tambahan_biaya_produk_transaksi){ ?>
                                                                            <?= $item->nama_variasi_cart ?> Rp. <?= number_format($item->harga_variasi,0,',','.') ?>
                                                                            <?php if($item->nama_sub_jenis_cetakan_produk_transaksi){ ?>
                                                                                <br>
                                                                                <?= $item->nama_sub_jenis_cetakan_produk_transaksi ?>
                                                                            <?php } ?>
                                                                            <br>

                                                                            + <?= $item->nama_tambahan_biaya_produk_transaksi . ' Rp. ' . number_format($item->harga_tambahan_biaya_produk_transaksi,0,',','.') ?>
                                                                        <?php }else{ ?>
                                                                            <?= $item->nama_variasi_cart ?> Rp. <?= number_format($item->harga_variasi,0,',','.') ?>
                                                                        <?php } ?>
                                                                        
                                                                        <br>
                                                                        + <?= $item->nama_packaging_produk_transaksi . ' Rp. ' . number_format($item->harga_packaging_produk_transaksi,0,',','.') ?>
                                                                        <br>
                                                                        + <?= $item->nama_ukuran_jenis_cetakan_produk_transaksi . ' Rp. ' . number_format($item->harga_ukuran_jenis_cetakan_produk_transaksi,0,',','.') ?>
                                                                    </small>
                                                                    
                                                                <?php }elseif($item->id_package){ ?>
                                                                    <small>
                                                                        <?php if($item->nama_tambahan_biaya_produk_transaksi){ ?>
                                                                            + <?= $item->nama_tambahan_biaya_produk_transaksi . ' + Rp. ' . number_format($item->harga_tambahan_biaya_produk_transaksi,0,',','.') ?>
                                                                        <?php }else{ ?>
                                                                            Rp. <?= number_format($item->harga_package,0,',','.') ?> - Diskon Rp. <?= number_format($item->diskon_package,0,',','.') ?>
                                                                        <?php } ?>
                                                                        <br>
                                                                        +
                                                                        <?= $item->nama_packaging_produk_transaksi . ' Rp. ' . number_format($item->harga_packaging_produk_transaksi,0,',','.') ?>
                                                                    </small>
                                                                <?php }elseif($item->id_print_only){ ?>
                                                                    <small>
                                                                        <?php if($item->nama_tambahan_biaya_produk_transaksi){ ?>
                                                                            <?= $item->nama_tambahan_biaya_produk_transaksi . ' + Rp. ' . number_format($item->harga_tambahan_biaya_produk_transaksi,0,',','.') ?>
                                                                        <?php }else{ ?>
                                                                           <?php if ($item->diskon_print_only){ ?>
                                                                               Rp. <?= number_format($item->harga_print_only,0,',','.') ?> - Diskon Rp. <?= number_format($item->diskon_print_only,0,',','.') ?>
                                                                           <?php }else{ ?>
                                                                            Rp. <?= number_format($item->harga_print_only,0,',','.') ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <br>
                                                                    + <?= $item->nama_packaging_produk_transaksi . ' Rp. ' . number_format($item->harga_packaging_produk_transaksi,0,',','.') ?>
                                                                    <br>
                                                                    + <?= $item->nama_sub_jenis_cetakan_produk_transaksi . ' Rp. ' . number_format($item->harga_sub_jenis_cetakan_produk_transaksi,0,',','.') ?>
                                                                    <br>
                                                                    + <?= $item->nama_ukuran_jenis_cetakan_produk_transaksi . ' Rp. ' . number_format($item->harga_ukuran_jenis_cetakan_produk_transaksi,0,',','.') ?>
                                                                </small>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </td> 
                                                <td class="text-center"><?= $item->qty ?></td>
                                                <td class="text-end">Rp. <?= number_format($item->harga_satuan,0,',','.') ?></td>
                                                <td class="text-end">Rp. <?= number_format($item->harga_total_satuan,0,',','.') ?></td>
                                                <?php if($row->status_transaksi == 4 ){ ?>

                                                 <?php if($item->id_softfile_only){ ?>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('home/shop/reviews_softfile_only/'.$item->id_softfile_only) ?>" class="btn btn-block btn-dark"><i class="fa fa-star"></i> Review</a> 
                                                    </td>
                                                <?php }elseif($item->id_softfile_print){ ?>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('home/shop/reviews_softfile_print/'.$item->id_softfile_print) ?>" class="btn btn-block btn-dark"><i class="fa fa-star"></i> Review</a>
                                                    </td>
                                                <?php }elseif($item->id_package){ ?>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('home/shop/reviews_package/'.$item->id_package) ?>" class="btn btn-block btn-dark"><i class="fa fa-star"></i> Review</a>
                                                    </td>
                                                <?php }elseif($item->id_print_only){ ?>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('home/shop/reviews_print_only/'.$item->id_print_only) ?>" class="btn btn-block btn-dark"><i class="fa fa-star"></i> Review</a>
                                                    </td>
                                                <?php } ?>

                                            <?php } ?>
                                        </tr>
                                    <?php } ?>  
                                    <?php if($row->ongkir || $row->berat){ ?>
                                        <?php if($row->status_transaksi == 4 ){ ?>
                                            <tr>
                                                <td colspan="5" class="fw-bold text-uppercase text-end">Sub Total</td>
                                                <td class="fw-bold text-end h4"><?= number_format($total_bayar,0,',','.') ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="fw-bold text-uppercase text-end">Ongkir</td>
                                                <td class="fw-bold text-end h4">Rp. <?= number_format($row->ongkir,0,',','.') ?></td>
                                            </tr>
                                        <?php }else{ ?>
                                            <tr>
                                                <td colspan="4" class="fw-bold text-uppercase text-end">Sub Total</td>
                                                <td class="fw-bold text-end h4"><?= number_format($total_bayar,0,',','.') ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="fw-bold text-uppercase text-end">Ongkir</td>
                                                <td class="fw-bold text-end h4">Rp. <?= number_format($row->ongkir,0,',','.') ?></td>
                                            </tr>
                                        <?php } ?>

                                        
                                    <?php } ?>
                                    <?php if($coupon){ ?>
                                        <?php if($coupon['id_users'] == $this->session->userdata('id_users')){ ?>
                                            <?php if($row->status_transaksi == 4 ){ ?>
                                                <tr>
                                                    <td colspan="5" class="fw-bold text-uppercase text-end">Coupon</td>
                                                    <td class="fw-bold text-end h4">- Rp. <?= number_format($coupon['harga_coupon'],0,',','.') ?></td>
                                                </tr>

                                            <?php }else{ ?>
                                                <tr>
                                                    <td colspan="4" class="fw-bold text-uppercase text-end">Coupon</td>
                                                    <td class="fw-bold text-end h4">- Rp. <?= number_format($coupon['harga_coupon'],0,',','.') ?></td>
                                                </tr>
                                            <?php } ?>

                                        <?php } ?>
                                    <?php }else{} ?>
                                    <?php if($row->status_transaksi == 4 ){ ?>  
                                        <tr>
                                            <td colspan="5" class="fw-bold text-uppercase text-end">Total</td>
                                            <td class="fw-bold text-end h4">Rp. 
                                                <?php 
                                                if($row->total_bayar == 0){
                                                 echo number_format($total_bayar - $coupon['harga_coupon'],0,',','.');
                                             }else{
                                                if($coupon){
                                                   echo number_format($row->total_bayar - $coupon['harga_coupon'] ,0,',','.');
                                               }else{
                                                   echo number_format($row->total_bayar ,0,',','.');
                                               }
                                               
                                           } ?>    
                                       </td>
                                   </tr>
                               <?php }else{ ?>
                                <tr>
                                    <td colspan="4" class="fw-bold text-uppercase text-end">Total</td>
                                    <td class="fw-bold text-end h4">Rp. 
                                       <?php 
                                       if($row->total_bayar == 0){
                                         echo number_format($total_bayar - $coupon['harga_coupon'],0,',','.');
                                     }else{
                                        if($coupon){
                                           echo number_format($row->total_bayar - $coupon['harga_coupon'] ,0,',','.');
                                       }else{
                                           echo number_format($row->total_bayar ,0,',','.');
                                       }
                                       
                                   } ?>  
                               </td>
                           </tr>
                       <?php } ?>

                   </tbody>
               </table>
           </div>
       </div> 
       <div class="card-footer text-end">
        <a href="<?= base_url('home/profil/detail/'.$this->session->userdata('id_users')) ?>" class="btn btn-danger mb-1" ><i class="fa fa-credit-card-alt"></i> Transaksi</a>
        <a href="<?= base_url('home/checkout/print_invoice/'.$row->no_transaksi) ?>" class="btn btn-secondary mb-1"><i class="si si-printer"></i> Print</a>
        <?php if($row->status_transaksi == 4 ){ ?> 
            <a href="<?= base_url('') ?>" class="btn btn-success mb-1"><i class="fa fa-check-circle"></i> Selesai</a> 
        <?php }else{ ?> 
            <button type="button" class="btn btn-success mb-1"  data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8"><i class="si si-wallet"></i> Upload Bukti Pembayaran</button>
        <?php } ?>
    </div>
</div>
</div>
<!-- COL-END -->
</div>
<!-- ROW-1 CLOSED -->

</div>  
<!-- CONTAINER CLOSED -->
</div>
<!--app-content closed-->

<!-- MODAL EFFECTS -->
<div class="modal fade" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Upload Bukti Pembayaran</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('home/checkout/upload_bukti_pembayaran') ?>" method="post" enctype="multipart/form-data">

                  <div class="row">

                    <div class="form-group">
                        <label class="form-label">Nama Bank <span class="text-red">*</span></label>
                        <input type="text" name="nama_bank" class="form-control" value="<?= set_value('nama_bank') ?>" required placeholder="Masukan Nama Bank"> 
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Rekening <span class="text-red">*</span></label>
                        <input type="text" name="nama_rekening" class="form-control" value="<?= set_value('nama_bank') ?>" required placeholder="Masukan Nama Rekening"> 
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nomor Rekening <span class="text-red">*</span></label>
                        <input type="text" name="nomor_rekening" class="form-control" value="<?= set_value('nama_bank') ?>" required placeholder="Masukan Nomor Rekening "> 
                    </div>

                    <div class="form-group">
                        <label class="form-label">Upload <span class="text-red">*</span></label>
                        <input type="hidden" name="id_transaksi" class="form-control" value="<?= $row->id_transaksi  ?>" required> 

                        <input type="file" name="bukti_pembayaran" class="form-control" value="<?= set_value('bukti_pembayaran') ?>" required> 
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Upload</button> 
                <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>

            </div>
        </form>
    </div>
</div>
</div>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if($row->bukti_pembayaran == NULL){ ?>
        Swal.fire({
          title: '<strong>Tujuan Tranfer</strong>',
          html:

          '<div class="form-group">' +
          <?php foreach($bank as $bank){ ?>
            '<input type="text" class="form-control mt-3 border" value="(<?= $bank->nama_bank ?>)  <?= $bank->nama_rekening ?> - <?= $bank->nomor_rekening ?>" readonly>' +
        <?php } ?>
        '</div>',

        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText:
        'Ok!',
        confirmButtonColor: '#4BB543',
        confirmButtonAriaLabel: 'Thumbs up, great!',
    })

    <?php } ?>
    <?php if($this->session->flashdata('upload_bukti')){ ?>
        var isi = <?php echo json_encode($this->session->flashdata('upload_bukti')) ?>;
        Swal.fire({
            title: 'Silahkan Kirim Foto Terbaikmu',
            html:

            '<a href="https://api.whatsapp.com/send?phone=6287727563939" class="btn btn-sm btn-success btn-lg" target="_blank"><i class="fa fa-whatsapp"></i> Whatsapp</a>' ,

            showCloseButton: true,
            showConfirmButton: false,
        })
    <?php } ?>
</script>
<?php } ?>
<!-- JQUERY JS -->
<script src="<?= base_url('assets/admin/') ?>/assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="<?= base_url('assets/admin/') ?>/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SPARKLINE JS-->
<script src="<?= base_url('assets/admin/') ?>/assets/js/jquery.sparkline.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="<?= base_url('assets/admin/') ?>/assets/js/circle-progress.min.js"></script>

<!-- INPUT MASK JS-->
<script src="<?= base_url('assets/admin/') ?>/assets/plugins/input-mask/jquery.mask.min.js"></script>

<!-- SIDE-MENU JS -->
<script src="<?= base_url('assets/admin/') ?>/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- SIDEBAR JS -->
<script src="<?= base_url('assets/admin/') ?>/assets/plugins/sidebar/sidebar.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="<?= base_url('assets/admin/') ?>/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="<?= base_url('assets/admin/') ?>/assets/plugins/p-scroll/pscroll.js"></script>
<script src="<?= base_url('assets/admin/') ?>/assets/plugins/p-scroll/pscroll-1.js"></script>

<!-- Color Theme js -->
<script src="<?= base_url('assets/admin/') ?>/assets/js/themeColors.js"></script>

<!-- Sticky js -->
<script src="<?= base_url('assets/admin/') ?>/assets/js/sticky.js"></script>

<!-- CUSTOM JS -->
<script src="<?= base_url('assets/admin/') ?>/assets/js/custom.js"></script>

</body>

</html>