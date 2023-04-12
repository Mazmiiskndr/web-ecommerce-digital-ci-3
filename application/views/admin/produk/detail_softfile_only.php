<!-- app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Detail Soft File Only</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/produk/kategori_produk/soft_file_only/') ?>">Soft File Only</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Soft File Only</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/produk/kategori_produk/soft_file_only/') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <?php foreach($detail as $row){ ?>
                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row row-sm">
                                    <div class="col-xl-5 col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="product-carousel">
                                                    <div id="Slider" class="carousel slide border" data-bs-ride="false">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active"><img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar_softfile_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                                <div class="text-center mt-5 mb-5 btn-list">
                                                                </div>
                                                            </div>


                                                            <?php if($row->gambar1_softfile_only && $row->gambar2_softfile_only && $row->gambar3_softfile_only){ ?>
                                                             <!-- Gambar Banyak Belum -->
                                                             <div class="carousel-item"> <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar1_softfile_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                                <div class="text-center mb-5 mt-5 btn-list">
                                                                </div>
                                                            </div>
                                                            <div class="carousel-item"> <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar2_softfile_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                                <div class="text-center mb-5 mt-5 btn-list">
                                                                </div>
                                                            </div>
                                                            <div class="carousel-item"> <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar3_softfile_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                                <div class="text-center mb-5 mt-5 btn-list">
                                                                </div>
                                                            </div>
                                                        <?php }elseif($row->gambar1_softfile_only){ ?>
                                                           <div class="carousel-item"> <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar1_softfile_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                            <div class="text-center mb-5 mt-5 btn-list">
                                                            </div>
                                                        </div>

                                                    <?php }elseif($row->gambar2_softfile_only){ ?>
                                                       <div class="carousel-item"> <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar2_softfile_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                        <div class="text-center mb-5 mt-5 btn-list">
                                                        </div>
                                                    </div>
                                                <?php }elseif($row->gambar3_softfile_only){ ?>
                                                   <div class="carousel-item"> <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar3_softfile_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                    <div class="text-center mb-5 mt-5 btn-list">
                                                    </div>
                                                </div>
                                            <?php }else{} ?>

                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix carousel-slider">
                                    <div id="thumbcarousel" class="carousel slide" data-bs-interval="t">
                                        <div class="carousel-inner">
                                            <ul class="carousel-item active">
                                                <li data-bs-target="#Slider" data-bs-slide-to="0" class="thumb active m-2"><img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar_softfile_only) ?>" alt="img"></li>
                                                <?php if($row->gambar1_softfile_only && $row->gambar2_softfile_only && $row->gambar3_softfile_only){ ?>
                                                    <!-- Gambar Banyak Belum -->
                                                    <li data-bs-target="#Slider" data-bs-slide-to="1" class="thumb m-2"><img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar1_softfile_only) ?>" alt="img"></li>
                                                    <li data-bs-target="#Slider" data-bs-slide-to="2" class="thumb m-2"><img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar2_softfile_only) ?>" alt="img"></li>
                                                    <li data-bs-target="#Slider" data-bs-slide-to="3" class="thumb m-2"><img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar3_softfile_only) ?>" alt="img"></li>
                                                <?php }elseif($row->gambar1_softfile_only){ ?>
                                                    <li data-bs-target="#Slider" data-bs-slide-to="1" class="thumb m-2"><img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar1_softfile_only) ?>" alt="img"></li>
                                                <?php }elseif($row->gambar2_softfile_only){ ?>
                                                    <li data-bs-target="#Slider" data-bs-slide-to="1" class="thumb m-2"><img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar2_softfile_only) ?>" alt="img"></li>
                                                <?php }elseif($row->gambar3_softfile_only){ ?>
                                                    <li data-bs-target="#Slider" data-bs-slide-to="1" class="thumb m-2"><img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar3_softfile_only) ?>" alt="img"></li>
                                                <?php } ?>


                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                        <div class="mt-2 mb-4">
                            <h3 class="mb-3 fw-semibold"><?= $row->nama_softfile_only ?></h3>
                            <p class="text-muted float-start me-3">
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star-half-o text-warning"></span>
                                <span class="fa fa-star-o text-warning"></span>
                            </p>
                            <p class="text-muted mb-4">( 40 Customers Reviews) </p>
                            <h4 class="mt-4"><b> Deskripsi</b></h4>
                            <p><?= $row->deskripsi_softfile_only ?></p>
                            <!-- <?php if($row->diskon_softfile_only){ ?>
                                <h3 class="mb-4"><span class="me-2 fw-bold fs-25">Rp. <?= number_format($row->harga_softfile_only - $row->diskon_softfile_only,0,',','.'); ?>/</span><span><del class="fs-18 text-muted">Rp. <?= number_format($row->harga_softfile_only,0,',','.'); ?></del></span></h3>
                            <?php }else{ ?>
                                <h3 class="mb-4"><span class="me-2 fw-bold fs-25">Rp. <?= number_format($row->harga_softfile_only,0,',','.'); ?></span></h3>
                                <?php } ?> -->
                                <h3 class="mb-4"><span class="me-2 fw-bold fs-25">Rp. <?= number_format($variasi['harga_terendah_variasi'],0,',','.'); ?> - Rp. <?= number_format($variasi['harga_tertinggi_variasi'],0,',','.'); ?></span></h3>
                                <div class=" mt-4 mb-5"><span class="fw-bold me-2">Variasi :</span><span class="fw-bold text-primary"><?= $row->variasi_softfile_only ?> </span></div>
                                <div class=" mt-4 mb-5"><span class="fw-bold me-2">Availability :</span><span class="fw-bold text-success">In-stock</span></div>


                                <hr>
                                <div class="btn-list mt-4">
                                    <a href="<?= base_url('admin/produk/edit_softfile_only/'.$row->slug_softfile_only) ?>" class="btn ripple btn-secondary"><i class="fe fe-edit"> </i> Edit</a>
                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                        <a href="<?= base_url('admin/produk/hapus_softfile_only/'.$row->slug_softfile_only) ?>" class="btn ripple btn-danger" onclick="return confirm('Hapus?')"><i class="fe fe-trash"> </i> Hapus</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="card productdesc">
                <div class="card-body">
                    <div class="panel panel-primary">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li><a href="#tab5" class="active" data-bs-toggle="tab">Spesifikasi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab5">
                                    <h4 class="mb-5 mt-3 fw-bold">Deskripsi :</h4>
                                    <p class="mb-3 fs-15"><?= $row->deskripsi_softfile_only ?></p>

                                    <h4 class="mb-5 mt-3 fw-bold">Spesifikasi :</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="fw-bold">Nama</td>
                                                <td> <?= $row->nama_softfile_only ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Variasi</td>
                                                <td><?= $row->variasi_softfile_only ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Harga </td>
                                                <td>
                                                   <!--  <?php if($row->diskon_softfile_only){ ?>
                                                        Rp. <?= number_format($row->harga_softfile_only - $row->diskon_softfile_only,0,',','.'); ?> /
                                                        <del class="text-muted"><small>Rp. <?= number_format($row->harga_softfile_only,0,',','.'); ?></small></del>

                                                    <?php }else{ ?>
                                                        Rp. <?= number_format($row->harga_softfile_only,0,',','.'); ?>
                                                        <?php } ?> -->
                                                        Rp. <?= number_format($variasi['harga_terendah_variasi'] ,0,',','.'); ?> 
                                                        -
                                                        Rp. <?= number_format($variasi['harga_tertinggi_variasi'] ,0,',','.'); ?>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="fw-bold">Tanggal Di Buat</td>
                                                    <td><?= date('d M, Y', strtotime($row->created_at)) ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Reviews</div>
                    </div>
                    <div class="card-body">
                        <?php foreach($reviews as $review){ ?>
                            <?php if($review->id_softfile_only == $row->id_softfile_only){ ?>
                                <div class="media mb-5">
                                    <div class="me-3">
                                        <a href="javascript:void(0)"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= base_url('assets/uploads/reviews/'.$review->gambar_reviews) ?>" width="64px"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-0"><?= $review->nama_reviews ?> - <small><?= date('d M, Y', strtotime($review->tanggal_reviews)) ?></small></h5>
                                        <h6 class="mt-0 mb-"><small><?= $review->email_reviews ?></small></h6>
                                <!-- <div class="text-warning mb-0">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div> -->
                                <p class="font-13 text-muted"><?= $review->deskripsi_reviews ?></p>
                                
                            </div>
                        </div>
                    <?php }} ?>
                </div>
            </div>
        </div>


        <h3 class="p-3 mb-5">Related Products</h3>
        <?php foreach($softfile_only as $sfonly){ ?>
            <?php if($sfonly->id_softfile_only != $row->id_softfile_only){ ?>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="product-grid6">
                            <div class="product-image6 p-5">
                                <a href="<?= base_url('admin/produk/detail_softfile_only/'.$sfonly->slug_softfile_only) ?>" class="bg-light">
                                    <img class="img-fluid br-7 w-100" src="<?= base_url('assets/uploads/softfile_only/'.$sfonly->gambar_softfile_only) ?>" alt="img">
                                </a>
                            </div>
                            <div class="card-body pt-0">
                                <div class="product-content text-center">
                                    <h1 class="title fw-bold fs-20"><a href="<?= base_url('admin/produk/detail_softfile_only/'.$sfonly->slug_softfile_only) ?>"><?= $sfonly->nama_softfile_only ?></a></h1>
                                    <div class="mb-2 text-warning">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star-half-o text-warning"></i>
                                        <i class="fa fa-star-o text-warning"></i>
                                    </div>
                                    <div class="price">
                                        <!-- <?php if($sfonly->diskon_softfile_only){ ?>
                                            <span class="ms-4">Rp. <?= number_format($sfonly->harga_softfile_only,0,',','.'); ?></span>
                                        <?php } ?>
                                        Rp. <?= number_format($sfonly->harga_softfile_only - $sfonly->diskon_softfile_only,0,',','.'); ?> -->
                                        Rp. <?= number_format($variasi['harga_terendah_variasi'],0,',','.'); ?> - Rp. <?= number_format($variasi['harga_tertinggi_variasi'],0,',','.'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= base_url('admin/produk/detail_softfile_only/'.$sfonly->slug_softfile_only) ?>" class="btn btn-info mb-1"><i class="fe fe-eye me-2"></i>Detail</a>
                                <a href="<?= base_url('admin/produk/edit_softfile_only/'.$sfonly->slug_softfile_only) ?>" class="btn btn-primary mb-1"><i class="fe fe-edit me-2 wishlist-icon"></i>Edit</a>
                                <a href="<?= base_url('admin/produk/hapus_softfile_only/'.$sfonly->slug_softfile_only) ?>" class="btn btn-danger mb-1" onclick="return confirm('Hapus?')"><i class="fe fe-x me-2 wishlist-icon"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } }?>
        </div>
        <!-- ROW-1 CLOSED -->
    <?php } ?>
</div>
<!-- CONTAINER CLOSED -->
</div>
</div>
            <!--app-content closed