<?php if($this->uri->segment(4) == "soft_file_only"){ ?>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Soft File Only</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Soft File Only</li>
                        </ol>

                    </div>
                </div>
                <!-- PAGE-HEADER END --> 

                <!-- ROW-1 OPEN -->
                <div class="row row-cards">

                    <div class="col-xl-12 col-lg-12">
                        <div class="row">

                            <div class="col-xl-12"> 
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="card p-0">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                                                <form action="<?= base_url('admin/produk/search_softfile_only') ?>" method="post" class="">
                                                    <div class="input-group d-flex w-100 float-start">
                                                        <input type="text" name="keyword_softfile_only" class="form-control border-end-0 my-2" placeholder="Search ...">
                                                        <button type="submit" class="btn input-group-text bg-transparent border-start-0 text-muted my-2">
                                                            <i class="fe fe-search text-muted" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                <ul class="nav item2-gl-menu float-end my-2">
                                                    <li class="border-end"><a href="#tab-11" class="show active" data-bs-toggle="tab" title="List style"><i class="fa fa-th"></i></a></li>
                                                    <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid"><i class="fa fa-list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-3 col-lg-12">
                                                <a href="<?= base_url('admin/produk/tambah_data_softfile_only') ?>" class="btn btn-primary btn-block float-end my-2"><i class="fa fa-plus-square me-2"></i>Tambah Data</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-11">
                                <div class="row">
                                    <?php foreach($softfile_only as $row){ ?>
                                        <div class="col-md-6 col-xl-4 col-sm-6">
                                            <div class="card">
                                                <div class="product-grid6">
                                                    <div class="product-image6 p-5">
                                                        <a href="<?= base_url('admin/produk/detail_softfile_only/'.$row->slug_softfile_only) ?>" class="bg-light">
                                                            <img class="img-fluid br-7 w-100" src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar_softfile_only) ?>" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="product-content text-center">
                                                            <h1 class="title fw-bold fs-20"><a href="<?= base_url('admin/produk/detail_softfile_only/'.$row->slug_softfile_only) ?>"><?= $row->nama_softfile_only ?></a></h1> 
                                                            <div class="mb-2 text-warning">
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star-half-o text-warning"></i>
                                                                <i class="fa fa-star-o text-warning"></i>
                                                            </div>
                                                            <div class="price">
                                                                <!-- <?php if($row->diskon_softfile_only){ ?>
                                                                    <span class="ms-4">Rp. <?= number_format($row->harga_softfile_only,0,',','.'); ?></span>
                                                                <?php } ?>
                                                                Rp. <?= number_format($row->harga_softfile_only - $row->diskon_softfile_only,0,',','.'); ?> -->
                                                                Rp. <?= number_format($variasi['harga_terendah_variasi'] ,0,',','.'); ?> 
                                                                -
                                                                Rp. <?= number_format($variasi['harga_tertinggi_variasi'] ,0,',','.'); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="<?= base_url('admin/produk/detail_softfile_only/'.$row->slug_softfile_only) ?>" class="btn btn-info mb-1"><i class="fe fe-eye me-2"></i>Detail</a>
                                                        <a href="<?= base_url('admin/produk/edit_softfile_only/'.$row->slug_softfile_only) ?>" class="btn btn-primary mb-1"><i class="fe fe-edit me-2 wishlist-icon"></i>Edit</a>
                                                        <?php if($this->session->userdata('role_id') == 1){ ?>
                                                            <a href="<?= base_url('admin/produk/hapus_softfile_only/'.$row->slug_softfile_only) ?>" class="btn btn-danger mb-1" onclick="return confirm('Hapus?')"><i class="fe fe-x me-2 wishlist-icon"></i>Hapus</a>
                                                        <?php } ?>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="tab-pane" id="tab-12">
                                <div class="row">
                                    <?php foreach($softfile_only as $dt){ ?>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="row g-0">
                                                        <div class="col-xl-3 col-lg-12 col-md-12">
                                                            <div class="product-list">
                                                                <div class="br-be-0 br-te-0">
                                                                    <a href="<?= base_url('admin/produk/detail_softfile_only/'.$dt->slug_softfile_only) ?>" class=""> </a>
                                                                    <img src="<?= base_url('assets/uploads/softfile_only/'.$dt->gambar_softfile_only) ?>" class="cover-image br-7 w-100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-12 col-md-12 border-end my-auto">
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <a href="<?= base_url('admin/produk/detail_softfile_only/'.$dt->slug_softfile_only) ?>" class="">
                                                                        <h3 class="fw-bold fs-30 mb-3"><?= $dt->nama_softfile_only ?></h3>
                                                                        <div class="mb-2 text-warning">
                                                                            <i class="fa fa-star fs-18 text-warning"></i>
                                                                            <i class="fa fa-star fs-18 text-warning"></i>
                                                                            <i class="fa fa-star fs-18 text-warning"></i>
                                                                            <i class="fa fa-star-half-o fs-18 text-warning"></i>
                                                                            <i class="fa fa-star-o fs-18 text-warning"></i>
                                                                        </div>
                                                                    </a>
                                                                    <p class="fs-16"><?= word_limiter($dt->deskripsi_softfile_only, 25) ?> </p>
                                                                    <a href="<?= base_url('admin/produk/detail_softfile_only/'.$dt->slug_softfile_only) ?>" class="btn btn-info"><i class="fe fe-eye me-2"></i>Detail</a>
                                                                    <a href="<?= base_url('admin/produk/edit_softfile_only/'.$dt->slug_softfile_only) ?>" class="btn btn-primary"><i class="fe fe-edit me-2 wishlist-icon"></i>Edit</a>
                                                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                                                        <a href="<?= base_url('admin/produk/hapus_softfile_only/'.$dt->slug_softfile_only) ?>" class="btn btn-danger"><i class="fe fe-x me-2 wishlist-icon"></i>Hapus</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-lg-12 col-md-12 my-auto">
                                                            <div class="card-body p-0">
                                                                <div class="price h3 text-center mb-5 fw-bold">
                                                                    <small>
                                                                        <strong>
                                                                            <!-- <?php if($dt->diskon_softfile_only){ ?>
                                                                                <br><s><small>Rp. <?= number_format($dt->harga_softfile_only,0,',','.'); ?></small></s><br>
                                                                            <?php } ?>
                                                                            Rp. <?= number_format($dt->harga_softfile_only - $dt->diskon_softfile_only,0,',','.'); ?> -->
                                                                            Rp. <?= number_format($variasi['harga_terendah_variasi'],0,',','.'); ?> - Rp. <?= number_format($variasi['harga_tertinggi_variasi'],0,',','.'); ?>
                                                                        </strong>
                                                                    </small>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <!-- COL-END -->
                    </div>
                    <!-- ROW-1 CLOSED -->
                </div>
                <!-- ROW-1 END -->


            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
    <!--app-content close-->

</div>

<?php }elseif($this->uri->segment(4) == "soft_file_print"){ ?>

    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Soft File Print</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Soft File Print</li>
                        </ol>

                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <div class="row row-cards">

                    <div class="col-xl-12 col-lg-12">
                        <div class="row">

                            <div class="col-xl-12"> 
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="card p-0">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                                               <form action="<?= base_url('admin/produk/search_softfile_print') ?>" method="post" class="">
                                                <div class="input-group d-flex w-100 float-start">
                                                    <input type="text" name="keyword_softfile_print" class="form-control border-end-0 my-2" placeholder="Search ...">
                                                    <button type="submit" class="btn input-group-text bg-transparent border-start-0 text-muted my-2">
                                                        <i class="fe fe-search text-muted" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <ul class="nav item2-gl-menu float-end my-2">
                                                <li class="border-end"><a href="#tab-11" class="show active" data-bs-toggle="tab" title="List style"><i class="fa fa-th"></i></a></li>
                                                <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid"><i class="fa fa-list"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-3 col-lg-12">
                                            <a href="<?= base_url('admin/produk/tambah_data_softfile_print') ?>" class="btn btn-primary btn-block float-end my-2"><i class="fa fa-plus-square me-2"></i>Tambah Data</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-11">
                            <div class="row">
                                <?php foreach($softfile_print as $row){ ?>
                                    <div class="col-md-6 col-xl-4 col-sm-6">
                                        <div class="card">
                                            <div class="product-grid6">
                                                <div class="product-image6 p-5">
                                                    <a href="<?= base_url('admin/produk/detail_softfile_print/'.$row->slug_softfile_print) ?>" class="bg-light">
                                                        <img class="img-fluid br-7 w-100" src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar_softfile_print) ?>" alt="img">
                                                    </a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="product-content text-center">
                                                        <h1 class="title fw-bold fs-20"><a href="<?= base_url('admin/produk/detail_softfile_print/'.$row->slug_softfile_print) ?>"><?= $row->nama_softfile_print ?></a></h1>
                                                        <div class="mb-2 text-warning">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star-half-o text-warning"></i>
                                                            <i class="fa fa-star-o text-warning"></i>
                                                        </div>
                                                        <div class="price">

                                                            <!-- Harga Diskon dan Tidak Diskon -->
                                                            <!-- <?php if($row->diskon_softfile_print){ ?>
                                                                <span class="ms-4">Rp. <?= number_format($row->harga_softfile_print,0,',','.'); ?></span>
                                                            <?php } ?> 
                                                            Rp. <?= number_format($row->harga_softfile_print - $row->diskon_softfile_print,0,',','.'); ?> -->
                                                            <!-- End Harga Diskon dan Tidak Diskon -->
                                                            Rp. <?= number_format($variasi['harga_terendah_variasi'] + $row->harga_terendah + $harga_packaging['harga_terendah_packaging'],0,',','.'); ?> - Rp. <?= number_format($variasi['harga_tertinggi_variasi'] + $row->harga_tertinggi + $harga_packaging['harga_tertinggi_packaging'],0,',','.'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <a href="<?= base_url('admin/produk/detail_softfile_print/'.$row->slug_softfile_print) ?>" class="btn btn-info mb-1"><i class="fe fe-eye me-2"></i>Detail</a>
                                                    <a href="<?= base_url('admin/produk/edit_softfile_print/'.$row->slug_softfile_print) ?>" class="btn btn-primary mb-1"><i class="fe fe-edit me-2 wishlist-icon"></i>Edit</a>
                                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                                        <a href="<?= base_url('admin/produk/hapus_softfile_print/'.$row->slug_softfile_print) ?>" class="btn btn-danger mb-1" onclick="return confirm('Hapus?')"><i class="fe fe-x me-2 wishlist-icon"></i>Hapus</a>
                                                    <?php } ?>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="tab-pane" id="tab-12">
                            <div class="row">
                                <?php foreach($softfile_print as $dt){ ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="row g-0">
                                                    <div class="col-xl-3 col-lg-12 col-md-12">
                                                        <div class="product-list">
                                                            <div class="br-be-0 br-te-0">
                                                                <a href="<?= base_url('admin/produk/detail_softfile_print/'.$dt->slug_softfile_print) ?>" class=""> </a>
                                                                <img src="<?= base_url('assets/uploads/softfile_print/'.$dt->gambar_softfile_print) ?>" class="cover-image br-7 w-100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12 col-md-12 border-end my-auto">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <a href="<?= base_url('admin/produk/detail_softfile_print/'.$dt->slug_softfile_print) ?>" class="">
                                                                    <h3 class="fw-bold fs-30 mb-3"><?= $dt->nama_softfile_print ?></h3>
                                                                    <div class="mb-2 text-warning">
                                                                        <i class="fa fa-star fs-18 text-warning"></i>
                                                                        <i class="fa fa-star fs-18 text-warning"></i>
                                                                        <i class="fa fa-star fs-18 text-warning"></i>
                                                                        <i class="fa fa-star-half-o fs-18 text-warning"></i>
                                                                        <i class="fa fa-star-o fs-18 text-warning"></i>
                                                                    </div>
                                                                </a>
                                                                <p class="fs-16"><?= word_limiter($dt->deskripsi_softfile_print, 25) ?> </p>
                                                                <a href="<?= base_url('admin/produk/detail_softfile_print/'.$dt->slug_softfile_print) ?>" class="btn btn-info"><i class="fe fe-eye me-2"></i>Detail</a>
                                                                <a href="<?= base_url('admin/produk/edit_softfile_print/'.$dt->slug_softfile_print) ?>" class="btn btn-primary"><i class="fe fe-edit me-2 wishlist-icon"></i>Edit</a>
                                                                <?php if($this->session->userdata('role_id') == 1){ ?>
                                                                    <a href="<?= base_url('admin/produk/hapus_softfile_print/'.$dt->slug_softfile_print) ?>" class="btn btn-danger"><i class="fe fe-x me-2 wishlist-icon"></i>Hapus</a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-12 col-md-12 my-auto">
                                                        <div class="card-body p-0">
                                                            <div class="price h3 text-center mb-5 fw-bold">
                                                                <small>
                                                                    <strong>
                                                                     <!-- Harga Diskon dan Tidak Diskon -->
                                                                       <!-- <?php if($dt->diskon_softfile_print){ ?>
                                                                        <br><s><small>Rp. <?= number_format($dt->harga_softfile_print,0,',','.'); ?></small></s>
                                                                    <?php } ?>
                                                                    Rp. <?= number_format($dt->harga_softfile_print - $dt->diskon_softfile_print,0,',','.'); ?> -->
                                                                    <!-- End Harga Diskon dan Tidak Diskon -->
                                                                   Rp. <?= number_format($variasi['harga_terendah_variasi'] + $dt->harga_terendah + $harga_packaging['harga_terendah_packaging'],0,',','.'); ?> - Rp. <?= number_format($variasi['harga_tertinggi_variasi'] + $dt->harga_tertinggi + $harga_packaging['harga_tertinggi_packaging'],0,',','.'); ?>
                                                                    
                                                                </strong>
                                                            </small>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="mb-5">
                                <div class="float-end">
                                    <ul class="pagination ">
                                        <li class="page-item page-prev disabled">
                                            <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                                        <li class="page-item page-next">
                                            <a class="page-link" href="javascript:void(0)">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->
        </div>
        <!-- ROW-1 END -->


    </div>
    <!-- CONTAINER END -->
</div>
</div>
<!--app-content close-->

</div>
<?php }elseif($this->uri->segment(4) == "package"){ ?>

    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Package</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Package</li>
                        </ol>

                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <div class="row row-cards">

                    <div class="col-xl-12 col-lg-12">
                        <div class="row">

                            <div class="col-xl-12"> 
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="card p-0"> 
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                                                <form action="<?= base_url('admin/produk/search_package') ?>" method="post" class="">
                                                    <div class="input-group d-flex w-100 float-start">
                                                        <input type="text" name="keyword_package" class="form-control border-end-0 my-2" placeholder="Search ...">
                                                        <button type="submit" class="btn input-group-text bg-transparent border-start-0 text-muted my-2">
                                                            <i class="fe fe-search text-muted" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                <ul class="nav item2-gl-menu float-end my-2">
                                                    <li class="border-end"><a href="#tab-11" class="show active" data-bs-toggle="tab" title="List style"><i class="fa fa-th"></i></a></li>
                                                    <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid"><i class="fa fa-list"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-3 col-lg-12">
                                                <a href="<?= base_url('admin/produk/tambah_data_package') ?>" class="btn btn-primary btn-block float-end my-2"><i class="fa fa-plus-square me-2"></i>Tambah Data</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-11">
                                <div class="row">
                                    <?php foreach($package as $row){ ?>
                                        <div class="col-md-6 col-xl-4 col-sm-6">
                                            <div class="card">
                                                <div class="product-grid6">
                                                    <div class="product-image6 p-5">
                                                        <a href="<?= base_url('admin/produk/detail_package/'.$row->slug_package) ?>" class="bg-light">
                                                            <img class="img-fluid br-7 w-100" src="<?= base_url('assets/uploads/package/'.$row->gambar_package) ?>" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="product-content text-center">
                                                            <h1 class="title fw-bold fs-20"><a href="<?= base_url('admin/produk/detail_package/'.$row->slug_package) ?>"><?= $row->nama_package ?></a></h1>
                                                            <div class="mb-2 text-warning">
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star-half-o text-warning"></i>
                                                                <i class="fa fa-star-o text-warning"></i>
                                                            </div>
                                                            <div class="price">

                                                                <!-- Harga Diskon dan Tidak Diskon --> 
                                                                <!-- <?php if($row->diskon_package){ ?>
                                                                    <span class="ms-4">Rp. <?= number_format($row->harga_package,0,',','.'); ?></span>
                                                                <?php } ?> 
                                                                Rp. <?= number_format($row->harga_package - $row->diskon_package,0,',','.'); ?> -->
                                                                <!-- End Harga Diskon dan Tidak Diskon -->

                                                                 Rp. <?= number_format( ($row->harga_package - $row->diskon_package) + $row->harga_terendah + $harga_packaging['harga_terendah_packaging'],0,',','.'); ?> - Rp. <?= number_format( ($row->harga_package - $row->diskon_package) + $row->harga_tertinggi + $harga_packaging['harga_tertinggi_packaging'],0,',','.'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="<?= base_url('admin/produk/detail_package/'.$row->slug_package) ?>" class="btn btn-info mb-1"><i class="fe fe-eye me-2"></i>Detail</a>
                                                        <a href="<?= base_url('admin/produk/edit_package/'.$row->slug_package) ?>" class="btn btn-primary mb-1"><i class="fe fe-edit me-2 wishlist-icon"></i>Edit</a>
                                                        <?php if($this->session->userdata('role_id') == 1){ ?>
                                                            <a href="<?= base_url('admin/produk/hapus_package/'.$row->slug_package) ?>" class="btn btn-danger mb-1" onclick="return confirm('Hapus?')"><i class="fe fe-x me-2 wishlist-icon"></i>Hapus</a>
                                                        <?php } ?>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="tab-pane" id="tab-12">
                                <div class="row">
                                    <?php foreach($package as $dt){ ?>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="row g-0">
                                                        <div class="col-xl-3 col-lg-12 col-md-12">
                                                            <div class="product-list">
                                                                <div class="br-be-0 br-te-0">
                                                                    <a href="<?= base_url('admin/produk/detail_package/'.$dt->slug_package) ?>" class=""> </a>
                                                                    <img src="<?= base_url('assets/uploads/package/'.$dt->gambar_package) ?>" class="cover-image br-7 w-100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-12 col-md-12 border-end my-auto">
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <a href="<?= base_url('admin/produk/detail_package/'.$dt->slug_package) ?>" class="">
                                                                        <h3 class="fw-bold fs-30 mb-3"><?= $dt->nama_package ?></h3>
                                                                        <div class="mb-2 text-warning">
                                                                            <i class="fa fa-star fs-18 text-warning"></i>
                                                                            <i class="fa fa-star fs-18 text-warning"></i>
                                                                            <i class="fa fa-star fs-18 text-warning"></i>
                                                                            <i class="fa fa-star-half-o fs-18 text-warning"></i>
                                                                            <i class="fa fa-star-o fs-18 text-warning"></i>
                                                                        </div>
                                                                    </a>
                                                                    <p class="fs-16"><?= word_limiter($dt->deskripsi_package, 25) ?> </p>
                                                                    <a href="<?= base_url('admin/produk/detail_package/'.$dt->slug_package) ?>" class="btn btn-info"><i class="fe fe-eye me-2"></i>Detail</a>
                                                                    <a href="<?= base_url('admin/produk/edit_package/'.$dt->slug_package) ?>" class="btn btn-primary"><i class="fe fe-edit me-2 wishlist-icon"></i>Edit</a>
                                                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                                                        <a href="<?= base_url('admin/produk/hapus_package/'.$dt->slug_package) ?>" class="btn btn-danger"><i class="fe fe-x me-2 wishlist-icon"></i>Hapus</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-lg-12 col-md-12 my-auto">
                                                            <div class="card-body p-0">
                                                                <div class="price h3 text-center mb-5 fw-bold">
                                                                    <small>
                                                                        <strong>
                                                                         <!-- Harga Diskon dan Tidak Diskon -->
                                                                         <!-- <?php if($dt->diskon_package){ ?>
                                                                            <br><s><small>Rp. <?= number_format($dt->harga_package,0,',','.'); ?></small></s>
                                                                        <?php } ?>
                                                                        Rp. <?= number_format($dt->harga_package - $dt->diskon_package,0,',','.'); ?> -->
                                                                        <!-- End Harga Diskon dan Tidak Diskon -->

                                                                        Rp. <?= number_format( ($row->harga_package - $row->diskon_package) + $row->harga_terendah + $harga_packaging['harga_terendah_packaging'],0,',','.'); ?> - Rp. <?= number_format( ($row->harga_package - $row->diskon_package) + $row->harga_tertinggi + $harga_packaging['harga_tertinggi_packaging'],0,',','.'); ?>
                                                                        
                                                                    </strong>
                                                                </small>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="mb-5">
                                    <div class="float-end">
                                        <ul class="pagination ">
                                            <li class="page-item page-prev disabled">
                                                <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                                            <li class="page-item page-next">
                                                <a class="page-link" href="javascript:void(0)">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div>
                <!-- ROW-1 CLOSED -->
            </div>
            <!-- ROW-1 END -->


        </div>
        <!-- CONTAINER END -->
    </div>
</div>
<!--app-content close-->

</div>
<?php }elseif($this->uri->segment(4) == "print_only"){ ?>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Print Only</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Print Only</li>
                        </ol>

                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <div class="row row-cards">

                    <div class="col-xl-12 col-lg-12">
                        <div class="row">

                            <div class="col-xl-12"> 
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="card p-0">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                                             <form action="<?= base_url('admin/produk/search_print_only') ?>" method="post" class="">
                                                <div class="input-group d-flex w-100 float-start">
                                                    <input type="text" name="keyword_print_only" class="form-control border-end-0 my-2" placeholder="Search ...">
                                                    <button type="submit" class="btn input-group-text bg-transparent border-start-0 text-muted my-2">
                                                        <i class="fe fe-search text-muted" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <ul class="nav item2-gl-menu float-end my-2">
                                                <li class="border-end"><a href="#tab-11" class="show active" data-bs-toggle="tab" title="List style"><i class="fa fa-th"></i></a></li>
                                                <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid"><i class="fa fa-list"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-3 col-lg-12">
                                            <a href="<?= base_url('admin/produk/tambah_data_print_only') ?>" class="btn btn-primary btn-block float-end my-2"><i class="fa fa-plus-square me-2"></i>Tambah Data</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-11">
                            <div class="row">
                                <?php foreach($print_only as $row){ ?>
                                    <div class="col-md-6 col-xl-4 col-sm-6">
                                        <div class="card">
                                            <div class="product-grid6">
                                                <div class="product-image6 p-5">
                                                    <a href="<?= base_url('admin/produk/detail_print_only/'.$row->slug_print_only) ?>" class="bg-light">
                                                        <img class="img-fluid br-7 w-100" src="<?= base_url('assets/uploads/print_only/'.$row->gambar_print_only) ?>" alt="img">
                                                    </a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="product-content text-center">
                                                        <h1 class="title fw-bold fs-20"><a href="<?= base_url('admin/produk/detail_print_only/'.$row->slug_print_only) ?>"><?= $row->nama_print_only ?></a></h1>
                                                        <div class="mb-2 text-warning">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star-half-o text-warning"></i>
                                                            <i class="fa fa-star-o text-warning"></i>
                                                        </div>
                                                        <div class="price">

                                                            <!-- Harga Diskon dan Tidak Diskon -->
                                                            <?php if($row->diskon_print_only){ ?>
                                                                <span class="ms-4">Rp. <?= number_format($row->harga_print_only,0,',','.'); ?></span>
                                                            <?php } ?> 
                                                            Rp. <?= number_format($row->harga_print_only - $row->diskon_print_only,0,',','.'); ?>
                                                            <!-- End Harga Diskon dan Tidak Diskon -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <a href="<?= base_url('admin/produk/detail_print_only/'.$row->slug_print_only) ?>" class="btn btn-info mb-1"><i class="fe fe-eye me-2"></i>Detail</a>
                                                    <a href="<?= base_url('admin/produk/edit_print_only/'.$row->slug_print_only) ?>" class="btn btn-primary mb-1"><i class="fe fe-edit me-2 wishlist-icon"></i>Edit</a>
                                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                                        <a href="<?= base_url('admin/produk/hapus_print_only/'.$row->slug_print_only) ?>" class="btn btn-danger mb-1" onclick="return confirm('Hapus?')"><i class="fe fe-x me-2 wishlist-icon"></i>Hapus</a>
                                                    <?php } ?>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="tab-pane" id="tab-12">
                            <div class="row">
                                <?php foreach($print_only as $dt){ ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="row g-0">
                                                    <div class="col-xl-3 col-lg-12 col-md-12">
                                                        <div class="product-list">
                                                            <div class="br-be-0 br-te-0">
                                                                <a href="<?= base_url('admin/produk/detail_print_only/'.$dt->slug_print_only) ?>" class=""> </a>
                                                                <img src="<?= base_url('assets/uploads/print_only/'.$dt->gambar_print_only) ?>" class="cover-image br-7 w-100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12 col-md-12 border-end my-auto">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <a href="<?= base_url('admin/produk/detail_print_only/'.$dt->slug_print_only) ?>" class="">
                                                                    <h3 class="fw-bold fs-30 mb-3"><?= $dt->nama_print_only ?></h3>
                                                                    <div class="mb-2 text-warning">
                                                                        <i class="fa fa-star fs-18 text-warning"></i>
                                                                        <i class="fa fa-star fs-18 text-warning"></i>
                                                                        <i class="fa fa-star fs-18 text-warning"></i>
                                                                        <i class="fa fa-star-half-o fs-18 text-warning"></i>
                                                                        <i class="fa fa-star-o fs-18 text-warning"></i>
                                                                    </div>
                                                                </a>
                                                                <p class="fs-16"><?= word_limiter($dt->deskripsi_print_only, 25) ?> </p>
                                                                <a href="<?= base_url('admin/produk/detail_print_only/'.$dt->slug_print_only) ?>" class="btn btn-info"><i class="fe fe-eye me-2"></i>Detail</a>
                                                                <a href="<?= base_url('admin/produk/edit_print_only/'.$dt->slug_print_only) ?>" class="btn btn-primary"><i class="fe fe-edit me-2 wishlist-icon"></i>Edit</a>
                                                                <?php if($this->session->userdata('role_id') == 1){ ?>
                                                                    <a href="<?= base_url('admin/produk/hapus_print_only/'.$dt->slug_print_only) ?>" class="btn btn-danger"><i class="fe fe-x me-2 wishlist-icon"></i>Hapus</a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-12 col-md-12 my-auto">
                                                        <div class="card-body p-0">
                                                            <div class="price h3 text-center mb-5 fw-bold">
                                                                <small>
                                                                    <strong>
                                                                     <!-- Harga Diskon dan Tidak Diskon -->
                                                                     <?php if($dt->diskon_print_only){ ?>
                                                                        <br><s><small>Rp. <?= number_format($dt->harga_print_only,0,',','.'); ?></small></s>
                                                                    <?php } ?>
                                                                    Rp. <?= number_format($dt->harga_print_only - $dt->diskon_print_only,0,',','.'); ?>
                                                                    <!-- End Harga Diskon dan Tidak Diskon -->

                                                                </strong>
                                                            </small>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="mb-5">
                                <div class="float-end">
                                    <ul class="pagination ">
                                        <li class="page-item page-prev disabled">
                                            <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                                        <li class="page-item page-next">
                                            <a class="page-link" href="javascript:void(0)">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->
        </div>
        <!-- ROW-1 END -->


    </div>
    <!-- CONTAINER END -->
</div>
</div>
<!--app-content close-->

</div>
<?php }else{} ?>