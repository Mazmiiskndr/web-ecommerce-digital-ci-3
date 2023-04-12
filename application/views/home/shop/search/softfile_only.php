 <!-- Breadcrumb Section Start -->
 <div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Soft File Only</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active"> Soft File Only</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Shop Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-12 col-custom">

                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper flex-column flex-md-row mb-10">

                    <!-- Shop Top Bar Left start -->
                    <div class="shop-top-bar-left mb-md-0 mb-2">
                        <div class="shop-top-show">
                            <span>Showing 1 – <?= $jumlah_softfile_only ?> results</span>
                        </div>
                    </div>
                    <!-- Shop Top Bar Left end -->
 
                    <!-- Shopt Top Bar Right Start -->
                    <div class="shop-top-bar-right">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-4" title="Grid"><i class="fa fa-th"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="fa fa-th-list"></i></button>
                        </div>
                    </div>
                    <!-- Shopt Top Bar Right End -->

                </div>
                <!--shop toolbar end-->

                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_3">

                    <?php foreach($softfile_only as $so){ ?>
                        <!-- Single Product Start -->
                        <div class="col-lg-4 col-md-4 col-sm-6 product" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-inner">
                                <div class="thumb">
                                    <a href="<?= base_url('home/shop/detail_softfile_only/'.$so->slug_softfile_only) ?>" class="image">
                                        <img class="first-image" src="<?= base_url('assets/uploads/softfile_only/'.$so->gambar_softfile_only) ?>" alt="Product" />
                                        <?php if($so->gambar1_softfile_only){ ?>
                                            <img class="second-image" src="<?= base_url('assets/uploads/softfile_only/'.$so->gambar1_softfile_only) ?>" alt="Product" />
                                        <?php }else{ ?>
                                            <img class="second-image" src="<?= base_url('assets/uploads/softfile_only/'.$so->gambar_softfile_only) ?>" alt="Product" />
                                        <?php } ?>

                                    </a>
                                    <?php if($so->diskon_softfile_only){ ?>
                                        <span class="badges">
                                            <span class="sale">-<?= round(($so->diskon_softfile_only/$so->harga_softfile_only)*100) ?>%</span>
                                        </span>
                                    <?php } ?>
                                    <div class="actions">
                                        <a href="<?= base_url('home/shop/detail_softfile_only/'.$so->slug_softfile_only) ?>" class="action compare"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="content">
                                    <h4 class="sub-title"><a href="<?= base_url('home/shop/detail_softfile_only/'.$so->slug_softfile_only) ?>"><?= $so->nama_kategori_produk ?></a></h4>
                                    <h5 class="title"><a href="<?= base_url('home/shop/detail_softfile_only/'.$so->slug_softfile_only) ?>"><?= $so->nama_softfile_only ?></a></h5>
                                    <span class="ratings">
                                     <span class="rating-num"><i>Reviews</i> (4)</span>
                                </span>
                                <span class="price">
                                    <!-- <span class="new"> Rp. <?= number_format($so->harga_softfile_only - $so->diskon_softfile_only,0,',','.'); ?></span>
                                    <?php if($so->diskon_softfile_only){ ?>
                                        <span class="old">Rp. <?= number_format($so->harga_softfile_only,0,',','.'); ?></span>
                                    <?php } ?> -->
                                    <span class="new">Rp. <?= number_format($variasi['harga_terendah_variasi'] ,0,',','.'); ?> 
                                        -
                                        Rp. <?= number_format($variasi['harga_tertinggi_variasi'] ,0,',','.'); ?></span>
                                </span>
                                <div class="shop-list-btn">
                                    <a title="Wishlist" href="#" class="btn btn-sm btn-outline-dark btn-hover-primary wishlist"><i class="fa fa-heart"></i></a>
                                    <button class="btn btn-sm btn-outline-dark btn-hover-primary" title="Add To Cart">Add To Cart</button>
                                    <a title="Compare" href="#" class="btn btn-sm btn-outline-dark btn-hover-primary compare"><i class="fa fa-random"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->
                <?php } ?>



            </div>
            <!-- Shop Wrapper End -->

        </div>
        <div class="col-lg-3 col-12 col-custom">
            <!-- Sidebar Widget Start -->
            <aside class="sidebar_widget mt-10 mt-lg-0">
                <div class="widget_inner" data-aos="fade-up" data-aos-delay="200">
                    <div class="widget-list mb-10">
                        <form action="<?= base_url('home/shop/search_softfile_only') ?>" method="post">
                            <h3 class="widget-title mb-4">Search</h3>
                            <div class="search-box">
                                <input type="text" class="form-control" name="keyword_softfile_only" placeholder="Search..." aria-label="Search Our Store">
                                <button class="btn btn-dark btn-hover-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button> 
                            </div> 
                        </form>
                    </div>
                    <div class="widget-list mb-10">
                        <h3 class="widget-title mb-4">Produk Kategori</h3>
                        <!-- Widget Menu Start -->
                        <nav>
                            <ul class="category-menu mb-n3">
                                <?php foreach($kategori_produk as $kp){ ?>
                                    <?php if($kp->slug_kategori_produk != "soft_file_only"){ ?>
                                        <li class="menu-item-has-children pb-4">
                                            <a href="<?= base_url('home/shop/categories/'.$kp->slug_kategori_produk) ?>"><?= $kp->nama_kategori_produk ?></a>

                                        </li>
                                    <?php } ?>
                                <?php } ?>

                            </ul>
                        </nav>
                        <!-- Widget Menu End -->
                    </div>
                    
                </div>
            </div>
        </div>
    </aside>
    <!-- Sidebar Widget End -->
</div>
</div>
</div>
</div>
<!-- Shop Section End -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if($this->session->flashdata('success')){ ?>
        var isi = <?php echo json_encode($this->session->flashdata('success')) ?>;
        Swal.fire({
            title: 'Berhasil',
            text: isi,
            icon: 'success',
        })
    <?php } ?>
    <?php if($this->session->flashdata('error')){ ?>
        var isi = <?php echo json_encode($this->session->flashdata('error')) ?>;
        Swal.fire({
            title: 'Gagal',
            text: isi,
            icon: 'error',
        })
    <?php } ?>
</script>