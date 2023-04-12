<!--app-content open-->
<?php foreach($detail as $row){ ?>
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Transaksi - #<?= strtoupper($row->no_transaksi)  ?></h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/transaksi') ?>">Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
                        </ol>
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
                                                <th class="text-end">Sub Total</th>
                                                <th class="text-center" width="90px">Upload File</th>
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
                                            <?php if($item->id_print_only){ ?>
                                                <td class="text-center"><a href="#" class="btn btn-icon btn-dark"> -</a></td>
                                            <?php }else{ ?>

                                                <td class="text-center">
                                                    <form action="<?= base_url('admin/transaksi/upload_file/') ?>" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_produk_transaksi" class="form-control" value="<?= $item->id_produk_transaksi ?>">

                                                        <input type="file" name="dokumen_file" class="form-control" value="<?= set_value('dokumen_file') ?>" required>

                                                        <button type="submit" class="mt-3 btn btn-sm btn-facebook"><i class="fa fa-upload"></i> Upload</button>
                                                    </form>
                                                </td>


                                            <?php } ?>
                                        </tr>
                                    <?php } ?> 
                                    <tr>
                                        <td colspan="5" class="fw-bold text-uppercase text-end">Sub Total</td>
                                        <td class="fw-bold text-end h4"><?= number_format($total_bayar,0,',','.') ?></td> 
                                    </tr>
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
                                    <?php if($coupon){ ?>                                            <?php if($row->status_transaksi == 4 ){ ?>
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

                                    <?php }else{} ?>
                                    <?php if($row->status_transaksi == 4 ){ ?>  
                                        <tr>
                                            <td colspan="5" class="fw-bold text-uppercase text-end">Total</td>
                                            <td class="fw-bold text-end h4">Rp. 
                                                <?php 
                                                if($row->total_bayar == 0){
                                                 echo number_format($total_bayar - $coupon['harga_coupon'],0,',','.');
                                             }else{

                                                echo number_format($row->total_bayar - $coupon['harga_coupon'],0,',','.');
                                            } ?>    
                                        </td>
                                    </tr>
                                <?php }else{ ?>
                                    <tr>
                                        <td colspan="4" class="fw-bold text-uppercase text-end">Total</td>
                                        <td class="fw-bold text-end h4">Rp. <?php 
                                        if($row->total_bayar == 0){
                                         echo number_format($total_bayar - $coupon['harga_coupon'],0,',','.');
                                     }else{

                                        echo number_format($row->total_bayar - $coupon['harga_coupon'],0,',','.');
                                    } ?>   
                                </td>
                            </tr>
                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="<?= base_url('admin/transaksi/') ?>" class="btn btn-danger mb-1" ><i class="fa fa-backward"></i> Kembali</a>
                        <button type="button" class="btn btn-secondary mb-1" onclick="javascript:window.print();"><i class="si si-printer"></i> Print</button>
                        <a href="<?= base_url('admin/transaksi/edit_data/'.$row->no_transaksi) ?>" class="btn btn-info mb-1" ><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?= base_url('admin/transaksi/download_bukti_pembayaran/'.$row->id_transaksi) ?>" class="btn btn-success mb-1"><i class="fa fa-download"></i> Download Bukti Pembayaran</a>
                    </div>
                </div>
            </div>
            <!-- COL-END -->
        </div>
        <!-- ROW-1 CLOSED -->
    </div>
    <!-- CONTAINER CLOSED -->
</div>
</div>
<!--app-content closed-->
</div>
<?php } ?>