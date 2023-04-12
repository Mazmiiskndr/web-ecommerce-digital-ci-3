<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Gallery</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/gallery') ?>">Gallery</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Gallery</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/gallery') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
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
                            <form action="<?= base_url('admin/gallery/edit_data_aksi') ?>" method="post" enctype="multipart/form-data">
                                <div class="">

                                    <div class="form-group">
                                        <label class="form-label">Gambar Gallery</label>
                                        <input type="hidden" name="id_gallery" value="<?= $row->id_gallery ?>">
                                        <input type="file" class="form-control" name="gambar_gallery" value="<?= $row->gambar_gallery ?>" required>
                                        <?= form_error('gambar_gallery', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary mb-0"><i class="fa fa-plus-circle"></i> Edit</button>
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