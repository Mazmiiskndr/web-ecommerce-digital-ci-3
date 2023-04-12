<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Tambahan Biaya</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/tambahan_biaya') ?>">Tambahan Biaya</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Tambahan Biaya</li>
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
                            <?php foreach($detail as $row){ ?>
                                <form action="<?= base_url('admin/tambahan_biaya/edit_data_aksi') ?>" method="post">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="form-label">Nama Tambahan Biaya</label>
                                            <input type="hidden" name="id_tambahan_biaya" value="<?= $row->id_tambahan_biaya ?>">
                                            <input type="text" class="form-control"name="nama_tambahan_biaya" value="<?= $row->nama_tambahan_biaya ?>">
                                        </div>
                                         <div class="form-group">
                                            <label class="form-label">Harga</label>
                                            <input type="number" class="form-control"name="harga_tambahan_biaya" value="<?= $row->harga_tambahan_biaya ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi_tambahan_biaya" class="form-control" rows="3"><?= $row->deskripsi_tambahan_biaya ?></textarea>
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