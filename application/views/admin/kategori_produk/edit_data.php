<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Kategori Produk</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/kategori_produk') ?>">Kategori Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kategori Produk</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/kategori_produk') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <?php foreach($detail as $row){ ?>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?= base_url('admin/kategori_produk/edit_data_aksi') ?>" method="post" enctype="multipart/form-data">
                                    <div class="">
                                            
                                        <div class="form-group">
                                            <input type="hidden" name="id_kategori_produk" value="<?= $row->id_kategori_produk ?>">
                                            <input type="hidden" name="slug_kategori_produk" value="<?= $row->slug_kategori_produk ?>">
                                             <input type="hidden" name="nama_kategori_produk" value="<?= $row->nama_kategori_produk ?>">
                                            <label>Upload Gambar</span>
                                            </label>
                                            <input type="file" name="gambar_kategori_produk" class="form-control" value="<?= set_value('gambar_kategori_produk') ?>">
                                            <small class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</small>
                                            <?= form_error('gambar_kategori_produk', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-info mb-0"><i class="fa fa-edit"></i> Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="product-grid6">
                                <div class="product-image6 p-5">
                                    <a href="#" class="bg-light">
                                        <img class="img-fluid br-7 w-100" src="<?= base_url('assets/uploads/kategori_produk/'.$row->gambar_kategori_produk) ?>" alt="Gambar">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- End Row -->

    </div>
    <!-- CONTAINER END -->
</div>
</div>
<!--app-content close-->

</div>