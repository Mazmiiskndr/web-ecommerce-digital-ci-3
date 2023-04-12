<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Tambah Packaging</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/packaging') ?>">Packaging</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Packaging</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/packaging') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/packaging/tambah_data_aksi') ?>" method="post">
                                <div class="">
                                    <div class="form-group">
                                        <label class="form-label">Nama Packaging</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nama Packaging" name="nama_packaging">
                                        <?= form_error('nama_packaging', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Harga</label>
                                        <input type="number" class="form-control" placeholder="Masukan Harga" name="harga_packaging">
                                        <?= form_error('harga_packaging', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Berat</label>
                                        <input type="number" class="form-control" placeholder="Masukan Berat" name="berat_packaging">
                                        <?= form_error('berat_packaging', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi_packaging" id="" class="form-control" rows="3" placeholder="Deskripsi.."></textarea>
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