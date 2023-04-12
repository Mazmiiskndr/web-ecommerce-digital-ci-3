<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Tambah Tambahan Biaya</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/tambahan_biaya') ?>">Tambahan Biaya</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Tambahan Biaya</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/tambahan_biaya') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/tambahan_biaya/tambah_data_aksi') ?>" method="post">
                                <div class="">
                                    <div class="form-group">
                                        <label class="form-label">Nama Tambahan Biaya</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nama Tambahan Biaya" name="nama_tambahan_biaya">
                                        <?= form_error('nama_tambahan_biaya', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Harga</label>
                                        <input type="number" class="form-control" placeholder="Masukan Harga" name="harga_tambahan_biaya">
                                        <?= form_error('harga_tambahan_biaya', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi_tambahan_biaya" id="" class="form-control" rows="3" placeholder="Deskripsi.."></textarea>
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