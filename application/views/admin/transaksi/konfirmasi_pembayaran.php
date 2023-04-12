<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Konfirmasi Status Pembayaran</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/transaksi') ?>">Transaksi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Konfirmasi Status Pembayaran</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/transaksi') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <?php foreach($detail as $row){ ?>
                                <form action="<?= base_url('admin/transaksi/konfirmasi_pembayaran_aksi') ?>" method="post">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Status Pembayaran <span class="text-red">*</span></label>
                                                    <input type="hidden" name="id_transaksi" value="<?= $row->id_transaksi ?>">
                                                    <select name="status_pembayaran" id="" class="form-select">
                                                     <?php if($row->status_pembayaran == 0){ ?>
                                                            <option value="0" selected hidden="">-- Belum dibayar! --</option>
                                                        <?php }elseif($row->status_pembayaran == 1){ ?>
                                                            <option value="1" selected hidden="">-- Pembayaran sedang di cek! --</option>
                                                        <?php }elseif($row->status_pembayaran == 2){ ?>
                                                            <option value="2" selected hidden="">-- Pembayaran di terima! --</option>
                                                        <?php }elseif($row->status_pembayaran == 3){ ?>
                                                            <option value="3" selected hidden="">-- Pembayaran di tolak! --</option>
                                                        <?php } ?>

                                                        <option value="0">Belum dibayar!</option>
                                                        <option value="2">Pembayaran di terima!</option>
                                                        <option value="3">Pembayaran di tolak!</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Download Bukti Pembayaran <span class="text-red">*</span></label>

                                                <a href="<?= base_url('admin/transaksi/download_bukti_pembayaran/'.$row->id_transaksi) ?>" class="btn col-xl-3 col-md-6 btn-block btn-secondary mb-0"><i class="fa fa-download"></i> Download</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-success mb-0 mt-5"><i class="fa fa-check-circle"></i> Konfirmasi</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- CONTAINER END -->
</div>
</div>
<!--app-content close-->

</div>