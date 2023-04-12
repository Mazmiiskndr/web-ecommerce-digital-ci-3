<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Coupon</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/coupon') ?>">Coupon</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/coupon') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
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
                                <form action="<?= base_url('admin/coupon/edit_data_aksi') ?>" method="post">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="form-label">Nama Coupon</label>
                                            <input type="hidden" name="id_coupon" value="<?= $row->id_coupon ?>">
                                            <input type="text" class="form-control" name="nama_coupon" value="<?= $row->nama_coupon ?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Harga Coupon</label>
                                            
                                            <input type="number" class="form-control" name="harga_coupon" value="<?= $row->harga_coupon ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Sampai Tanggal</label>
                                            
                                            <input type="date" class="form-control" name="sampai_tanggal_coupon" value="<?= $row->sampai_tanggal_coupon ?>">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-info mb-0"><i class="fa fa-edit"></i> Edit</button>
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