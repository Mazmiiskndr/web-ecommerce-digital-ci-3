<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Packaging</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/packaging') ?>">Packaging</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Packaging</li>
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
                            <?php foreach($detail as $row){ ?>
                                <form action="<?= base_url('admin/packaging/edit_data_aksi') ?>" method="post">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="form-label">Nama Packaging</label>
                                            <input type="hidden" name="id_packaging" value="<?= $row->id_packaging ?>">
                                            <input type="text" class="form-control"name="nama_packaging" value="<?= $row->nama_packaging ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Harga</label>
                                            <input type="number" class="form-control"name="harga_packaging" value="<?= $row->harga_packaging ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Berat</label>
                                            <input type="number" class="form-control"name="berat_packaging" value="<?= $row->berat_packaging ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi_packaging" class="form-control" rows="3"><?= $row->deskripsi_packaging ?></textarea>
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