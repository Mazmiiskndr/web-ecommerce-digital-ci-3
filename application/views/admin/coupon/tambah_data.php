<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Tambah Coupon</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/coupon') ?>">Coupon</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Coupon</li>
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
                            <form action="<?= base_url('admin/coupon/tambah_data_aksi') ?>" method="post">
                                <div class="">
                                    <div class="form-group">
                                        <label class="form-label">Nama Coupon</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nama Coupon" name="nama_coupon">
                                        <?= form_error('nama_coupon', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Harga Coupon</label>
                                        <input type="number" class="form-control" placeholder="Masukan Harga Coupon" name="harga_coupon">
                                        <?= form_error('harga_coupon', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Sampai Tanggal</label>
                                        <input type="date" class="form-control" name="sampai_tanggal_coupon" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary mb-0"><i class="fa fa-plus-circle"></i> Tambah</button>
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