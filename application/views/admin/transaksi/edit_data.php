<!--app-content open-->
<?php foreach($detail as $row){ ?>
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Edit Data Transaksi - #<?= strtoupper($row->no_transaksi)  ?></h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/transaksi') ?>">Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data Transaksi </li>
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

                                <form action="<?= base_url('admin/transaksi/edit_data_aksi') ?>" method="post">
                                    <div class=""> 
                                        <div class="row">
                                            <?php if($this->session->userdata('role_id') == 1){ ?>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Status Pembayaran <span class="text-red">*</span></label>
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
                                        <?php } ?>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Status Transaksi <span class="text-red">*</span></label>
                                                <?php if($this->session->userdata('role_id') == 2){ ?>
                                                    <input type="hidden" name="status_pembayaran" value="<?= $row->status_pembayaran ?>">
                                                <?php } ?>

                                                <input type="hidden" name="id_transaksi" value="<?= $row->id_transaksi ?>">
                                                <select name="status_transaksi" id="" class="form-select">
                                                 <?php if($row->status_transaksi == 0){ ?>

                                                    <option value="0" selected hidden="">-- Pilih Status Transaksi --</option>
                                                <?php }elseif($row->status_transaksi == 1){ ?>
                                                    <option value="1" selected hidden="">-- Dikemas! --</option>
                                                <?php }elseif($row->status_transaksi == 2){ ?>
                                                    <option value="2" selected hidden="">-- Dikirim! --</option>
                                                <?php }elseif($row->status_transaksi == 3){ ?>
                                                    <option value="3" selected hidden="">-- Retur! --</option>
                                                <?php }elseif($row->status_transaksi == 4){ ?>
                                                    <option value="4" selected hidden="">-- Selesai! --</option>
                                                <?php }elseif($row->status_transaksi == 5){ ?>
                                                    <option value="5" selected hidden="">-- Retur sedang di cek! --</option>
                                                <?php }elseif($row->status_transaksi == 5){ ?>
                                                    <option value="5" selected hidden="">-- Retur di tolak! --</option>
                                                <?php } ?>

                                                <option value="0">Batal!</option>
                                                <?php if($this->session->userdata('role_id') == 1){ ?>
                                                    <option value="1">Dikemas!</option>
                                                <?php } ?>
                                                <option value="2">Dikirim!</option>
                                                <?php if($this->session->userdata('role_id') == 1){ ?>
                                                    <option value="3">Retur!</option>
                                                    <option value="6">Retur di tolak!</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                        <div class="col-sm-12 col-md-12">
                                        <?php }else{ ?>
                                            <div class="col-sm-6 col-md-6">
                                            <?php } ?>
                                            <?php if($this->session->userdata('role_id') == 2){ ?>
                                                <div class="form-group">
                                                    <label class="form-label">Input No. Resi <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="no_resi" value="<?= $row->no_resi ?>" placeholder="Masukan No. Resi">
                                                </select>
                                            </div>
                                        <?php } ?>
                                        

                                    </div>
                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                        <?php if($row->bukti_pembayaran){ ?>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Download Bukti Pembayaran <span class="text-red">*</span></label>
                                                    <a href="<?= base_url('admin/transaksi/download_bukti_pembayaran/'.$row->id_transaksi) ?>" class="btn col-xl-3 col-md-6 btn-block btn-secondary mb-0"><i class="fa fa-download"></i> Download</a> 

                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                        <?php if($row->file_retur){ ?>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Download Bukti Retur <span class="text-red">*</span></label>
                                                    <a href="<?= base_url('admin/transaksi/download_retur/'.$row->id_transaksi) ?>" class="btn col-xl-3 col-md-6 btn-block btn-info mb-0"><i class="fa fa-download"></i> Download</a> 

                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-success mb-0 mt-5"><i class="fa fa-check-circle"></i> Konfirmasi</button>
                        </form>

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
<?php } ?>