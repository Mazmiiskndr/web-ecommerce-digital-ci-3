
<div class="section">
    <div class="hero-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <!-- Hero Slider Item Start -->
                <div class="hero-slide-item swiper-slide">
                    <!-- Hero Slider Bg Image Start -->
                    <div class="hero-slide-bg">
                        <img src="<?= base_url('assets/uploads/home/'.$home['gambar_home1']) ?>" alt="Slider Image" />
                    </div>
                    <!-- Hero Slider Bg image End -->

                    <!-- Hero Slider Content Start -->
                    <div class="container">
                        <div class="hero-slide-content">
                            <h2 class="title text-dark">
                                <?= $home['judul_home1'] ?>
                            </h2>
                            <p>
                                <?= $home['deskripsi_home1'] ?>
                            </p>
                            <a href="<?= base_url('home/categories') ?>" class="btn btn-lg btn-primary btn-hover-dark">Shop Now</a>
                        </div>
                    </div>
                    <!-- Hero Slider Content End -->
                </div>
                <!-- Hero Slider Item End -->

                <!-- Hero Slider Item Start -->
                <div class="hero-slide-item swiper-slide">

                    <!-- Hero Slider Bg Image Start -->
                    <div class="hero-slide-bg">
                        <img src="<?= base_url('assets/uploads/home/'.$home['gambar_home2']) ?>" alt="Slider Image" />
                    </div>
                    <!-- Hero Slider Bg Image End -->

                    <!-- Hero Slider Content Start -->
                    <div class="container">
                        <div class="hero-slide-content">
                            <h2 class="title text-dark">
                                <?= $home['judul_home2'] ?>
                            </h2>
                            <p><?= $home['deskripsi_home2'] ?></p>
                            <a href="<?= base_url('home/categories') ?>" class="btn btn-lg btn-primary btn-hover-dark">Shop Now</a>
                        </div>
                    </div>
                    <!-- Hero Slider Content End -->

                </div>
                <!-- Hero Slider Item End -->

            </div>

            <!-- Swiper Pagination Start -->
            <div class="swiper-pagination d-md-none"></div>
            <!-- Swiper Pagination End -->

            <!-- Swiper Navigation Start -->
            <div class="home-slider-prev swiper-button-prev main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
            <div class="home-slider-next swiper-button-next main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
            <!-- Swiper Navigation End -->

        </div>
    </div>
</div>
<!-- Hero/Intro Slider End -->

<!-- Banner Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row mb-n6">
            <div class="col-lg-12 align-self-center mb-6" data-aos="fade-right" data-aos-delay="600">
                <div class="about_content">
                    <h2 class="title text-center" style="margin-bottom: 50px;">Pilih Kategori Produk Keinginanmu </h2>
                </div>
            </div>
        </div>
        <!-- Banners Start -->
        <div class="row mb-n6">
            <?php foreach($kategori_produk as $kp){ ?>
                <!-- Banner Start -->
                <div class="col-lg-6 col-md-6 col-12 mb-6">
                    <div class="banner" data-aos="fade-up" data-aos-delay="300">
                        <div class="banner-image">
                            <a href="<?= base_url('home/shop/categories/'.$kp->slug_kategori_produk) ?>"><img src="<?= base_url('assets/uploads/kategori_produk/'.$kp->gambar_kategori_produk) ?>" alt=""></a>
                        </div>
                        <div class="info">
                            <div class="small-banner-content">
                                <h3 class="title text-dark"><strong><?= $kp->nama_kategori_produk ?></strong></h3>
                                <a href="<?= base_url('home/shop/categories/'.$kp->slug_kategori_produk) ?>" class="btn btn-dark btn-sm">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Banner End -->
            <?php } ?>
        </div>
        <!-- Banners End -->
    </div>
</div>
<!-- Banner Section End -->

<!-- Feature Section Start -->
<div class="section">
    <div class="container">
        <div class="feature-wrap">
            <div class="row row-cols-lg-4 row-cols-xl-auto row-cols-sm-2 row-cols-1 justify-content-between mb-n5">
                <!-- Feature Start -->
                <div class="col mb-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature">
                        <div class="icon text-primary align-self-center">
                            <img src="<?= base_url('assets/destry/') ?>assets/images/icons/feature-icon-2.png" alt="Feature Icon">
                        </div>
                        <div class="content">
                            <h5 class="title">Free Shipping</h5>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <!-- Feature End -->

                <!-- Feature Start -->
                <div class="col mb-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature">
                        <div class="icon text-primary align-self-center">
                            <img src="<?= base_url('assets/destry/') ?>assets/images/icons/feature-icon-3.png" alt="Feature Icon">
                        </div>
                        <div class="content">
                            <h5 class="title">Support 24/7</h5>
                            <p>Support 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <!-- Feature End -->
                <!-- Feature Start -->
                <div class="col mb-5" data-aos="fade-up" data-aos-delay="700">
                    <div class="feature">
                        <div class="icon text-primary align-self-center">
                            <img src="<?= base_url('assets/destry/') ?>assets/images/icons/feature-icon-4.png" alt="Feature Icon">
                        </div>
                        <div class="content">
                            <h5 class="title">Money Return</h5>
                            <p>Back guarantee under 5 days</p>
                        </div>
                    </div>
                </div>
                <!-- Feature End -->

                <!-- Feature Start -->
                <div class="col mb-5" data-aos="fade-up" data-aos-delay="900">
                    <div class="feature">
                        <div class="icon text-primary align-self-center">
                            <img src="<?= base_url('assets/destry/') ?>assets/images/icons/feature-icon-1.png" alt="Feature Icon">
                        </div>
                        <div class="content">
                            <h5 class="title">Order Discount</h5>
                            <p>Onevery order over $150</p>
                        </div>
                    </div>
                </div>
                <!-- Feature End -->
            </div>
        </div>
    </div>
</div>
<!-- Feature Section End -->

<!-- Product Section Start -->
<div class="section section-padding mt-0">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <!-- Tab Start -->
            <div class="col-12">
                <ul class="product-tab-nav nav justify-content-center mb-10 title-border-bottom mt-n3">
                    <li class="nav-item" data-aos="fade-up" data-aos-delay="300"><a class="nav-link active mt-3" data-bs-toggle="tab" href="#soft_file_only">Soft File Only</a></li>
                    <?php foreach($kategori_produk as $kp) { ?>
                        <?php if($kp->slug_kategori_produk != "soft_file_only"){ ?>
                            <li class="nav-item" data-aos="fade-up" data-aos-delay="400"><a class="nav-link mt-3" data-bs-toggle="tab" href="#<?= $kp->slug_kategori_produk ?>"><?= $kp->nama_kategori_produk ?></a></li>
                        <?php }}
                        ?>
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <!-- Section Title & Tab End -->

            <!-- Products Tab Start -->
            <div class="row">
                <div class="col">
                    <div class="tab-content position-relative">
                        <div class="tab-pane fade show active" id="soft_file_only">
                            <div class="product-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper mb-n10">

                                        <!-- Product Start -->
                                        <?php foreach($softfile_only as $so){ ?>
                                            <div class="swiper-slide product-wrapper">

                                                <!-- Single Product Start -->
                                                <div class="product product-border-left mb-10" data-aos="fade-up" data-aos-delay="300">
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
                                                         <!-- <span class="rating-wrap">
                                                            <span class="star" style="width: 100%"></span>
                                                        </span> -->
                                                        <!-- <span class="rating-num"><i>Reviews</i></span> -->
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
                                                        <a href="<?= base_url('home/shop/detail_softfile_only/'.$so->slug_softfile_only) ?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Order Now</a> 
                                                    </div>
                                                </div>
                                                <!-- Single Product End -->

                                            </div>
                                        <?php } ?>
                                        <!-- Product End  -->

                                    </div>

                                    <!-- Swiper Pagination Start -->
                                    <div class="swiper-pagination d-md-none"></div>
                                    <!-- Swiper Pagination End -->

                                    <!-- Next Previous Button Start -->
                                    <div class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                                    <div class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                                    <!-- Next Previous Button End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="soft_file_print">
                            <div class="product-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper mb-n10">

                                        <!-- Product Start -->
                                        <?php foreach($softfile_print as $sp){ ?>
                                            <div class="swiper-slide product-wrapper">

                                                <!-- Single Product Start -->
                                                <div class="product product-border-left mb-10" data-aos="fade-up" data-aos-delay="300">
                                                    <div class="thumb">
                                                        <a href="<?= base_url('home/shop/detail_softfile_print/'.$sp->slug_softfile_print) ?>" class="image">
                                                            <img class="first-image" src="<?= base_url('assets/uploads/softfile_print/'.$sp->gambar_softfile_print) ?>" alt="Product" />
                                                            <?php if($sp->gambar1_softfile_print){ ?>
                                                                <img class="second-image" src="<?= base_url('assets/uploads/softfile_print/'.$sp->gambar1_softfile_print) ?>" alt="Product" />
                                                            <?php }else{ ?>
                                                                <img class="second-image" src="<?= base_url('assets/uploads/softfile_print/'.$sp->gambar_softfile_print) ?>" alt="Product" />
                                                            <?php } ?>

                                                        </a>
                                                        <?php if($sp->diskon_softfile_print){ ?>
                                                            <span class="badges">
                                                                <span class="sale">-<?= round(($sp->diskon_softfile_print/$sp->harga_softfile_print)*100) ?>%</span>
                                                            </span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="sub-title"><a href="<?= base_url('home/shop/detail_softfile_print/'.$sp->slug_softfile_print) ?>"><?= $sp->nama_kategori_produk ?></a></h4>
                                                        <h5 class="title"><a href="<?= base_url('home/shop/detail_softfile_print/'.$sp->slug_softfile_print) ?>"><?= $sp->nama_softfile_print ?></a></h5>
                                                        <!-- <span class="ratings">
                                                         <span class="rating-wrap">
                                                            <span class="star" style="width: 100%"></span>
                                                        </span>
                                                        <span class="rating-num">(4)</span>
                                                    </span> -->
                                                    <span class="price">
                                                      <!-- <span class="new"> Rp. <?= number_format($sp->harga_softfile_print - $sp->diskon_softfile_print,0,',','.'); ?></span>
                                                      <?php if($sp->diskon_softfile_print){ ?>
                                                        <span class="old">Rp. <?= number_format($sp->harga_softfile_print,0,',','.'); ?></span>
                                                        <?php } ?> -->
                                                        <span class="new">Rp. <?= number_format($variasi['harga_terendah_variasi'] + $sp->harga_terendah + $harga_packaging['harga_terendah_packaging'],0,',','.'); ?> 
                                                        -
                                                        Rp. <?= number_format($variasi['harga_tertinggi_variasi'] + $sp->harga_tertinggi + $harga_packaging['harga_tertinggi_packaging'],0,',','.'); ?></span>
                                                    </span>
                                                    <a href="<?= base_url('home/shop/detail_softfile_print/'.$sp->slug_softfile_print) ?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Order Now</a>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->

                                        </div>
                                    <?php } ?>
                                    <!-- Product End  -->

                                </div>

                                <!-- Swiper Pagination Start -->
                                <div class="swiper-pagination d-md-none"></div>
                                <!-- Swiper Pagination End -->

                                <!-- Next Previous Button Start -->
                                <div class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                                <div class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                                <!-- Next Previous Button End -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="package">
                        <div class="product-carousel">
                            <div class="swiper-container">
                                <div class="swiper-wrapper mb-n10">

                                    <!-- Product Start -->
                                    <?php foreach($package as $p){ ?>
                                        <div class="swiper-slide product-wrapper">

                                            <!-- Single Product Start -->
                                            <div class="product product-border-left mb-10" data-aos="fade-up" data-aos-delay="300">
                                                <div class="thumb">
                                                    <a href="<?= base_url('home/shop/detail_package/'.$p->slug_package) ?>" class="image">
                                                        <img class="first-image" src="<?= base_url('assets/uploads/package/'.$p->gambar_package) ?>" alt="Product" />
                                                        <?php if($p->gambar1_package){ ?>
                                                            <img class="second-image" src="<?= base_url('assets/uploads/package/'.$p->gambar1_package) ?>" alt="Product" />
                                                        <?php }else{ ?>
                                                            <img class="second-image" src="<?= base_url('assets/uploads/package/'.$p->gambar_package) ?>" alt="Product" />
                                                        <?php } ?>

                                                    </a>
                                                    <?php if($p->diskon_package){ ?>
                                                        <span class="badges">
                                                            <span class="sale">-<?= round(($p->diskon_package/$p->harga_package)*100) ?>%</span>
                                                        </span>
                                                    <?php } ?>

                                                </div>
                                                <div class="content">
                                                    <h4 class="sub-title"><a href="<?= base_url('home/shop/detail_package/'.$p->slug_package) ?>"><?= $p->nama_kategori_produk ?></a></h4>
                                                    <h5 class="title"><a href="<?= base_url('home/shop/detail_package/'.$p->slug_package) ?>"><?= $p->nama_package ?></a></h5>
                                                    <!-- <span class="ratings">
                                                     <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                                    </span>
                                                    <span class="rating-num">(4)</span>
                                                </span> -->
                                                <span class="price">
                                                   <!-- <span class="new"> Rp. <?= number_format($p->harga_package - $p->diskon_package,0,',','.'); ?></span>
                                                   <?php if($p->diskon_package){ ?>
                                                    <span class="old">Rp. <?= number_format($p->harga_package,0,',','.'); ?></span>
                                                    <?php } ?> -->
                                                    <span class="new">Rp. <?= number_format(($p->harga_package - $p->diskon_package) + $p->harga_terendah + $harga_packaging['harga_terendah_packaging'],0,',','.'); ?> 
                                                    -
                                                    Rp. <?= number_format(($p->harga_package - $p->diskon_package) + $p->harga_tertinggi + $harga_packaging['harga_tertinggi_packaging'],0,',','.'); ?></span>
                                                </span>
                                                <a href="<?= base_url('home/shop/detail_package/'.$p->slug_package) ?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Order Now</a>
                                            </div>
                                        </div>
                                        <!-- Single Product End -->

                                    </div>
                                <?php } ?>
                                <!-- Product End  -->

                            </div>

                            <!-- Swiper Pagination Start -->
                            <div class="swiper-pagination d-md-none"></div>
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <div class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                            <div class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                            <!-- Next Previous Button End -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="print_only">
                    <div class="product-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper mb-n10">

                                <!-- Product Start -->
                                <?php foreach($print_only as $po){ ?>
                                    <div class="swiper-slide product-wrapper">

                                        <!-- Single Product Start -->
                                        <div class="product product-border-left mb-10" data-aos="fade-up" data-aos-delay="300">
                                            <div class="thumb">
                                                <a href="<?= base_url('home/shop/detail_print_only/'.$po->slug_print_only) ?>" class="image">
                                                    <img class="first-image" src="<?= base_url('assets/uploads/print_only/'.$po->gambar_print_only) ?>" alt="Product" />
                                                    <?php if($po->gambar1_print_only){ ?>
                                                        <img class="second-image" src="<?= base_url('assets/uploads/print_only/'.$po->gambar1_print_only) ?>" alt="Product" />
                                                    <?php }else{ ?>
                                                        <img class="second-image" src="<?= base_url('assets/uploads/print_only/'.$po->gambar_print_only) ?>" alt="Product" />
                                                    <?php } ?>

                                                </a>
                                                <?php if($po->diskon_print_only){ ?>
                                                    <span class="badges">
                                                        <span class="sale">-<?= round(($po->diskon_print_only/$po->harga_print_only)*100) ?>%</span>
                                                    </span>
                                                <?php } ?>

                                            </div>
                                            <div class="content">
                                                <h4 class="sub-title"><a href="<?= base_url('home/shop/detail_print_only/'.$po->slug_print_only) ?>"><?= $po->nama_kategori_produk ?></a></h4>
                                                <h5 class="title"><a href="<?= base_url('home/shop/detail_print_only/'.$po->slug_print_only) ?>"><?= $po->nama_print_only ?></a></h5>
                                                <!-- <span class="ratings">
                                                 <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">(4)</span>
                                            </span> -->
                                            <span class="price">
                                                <span class="new"> Rp. <?= number_format($po->harga_print_only - $po->diskon_print_only,0,',','.'); ?></span>
                                                <?php if($po->diskon_print_only){ ?>
                                                    <span class="old">Rp. <?= number_format($po->harga_print_only,0,',','.'); ?></span>
                                                <?php } ?>
                                            </span>
                                            <a href="<?= base_url('home/shop/detail_print_only/'.$po->slug_print_only) ?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Order Now</a>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->

                                </div>
                            <?php } ?>
                            <!-- Product End  -->

                        </div>

                        <!-- Swiper Pagination Start -->
                        <div class="swiper-pagination d-md-none"></div>
                        <!-- Swiper Pagination End -->

                        <!-- Next Previous Button Start -->
                        <div class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                        <div class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                        <!-- Next Previous Button End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Products Tab End -->
</div>
</div>
<!-- Product Section End -->

<!-- Banner Fullwidth Start -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                <div class="banner">
                    <div class="banner-image">
                        <a href="#"><img src="<?= base_url('assets/uploads/home/') ?>banner-tengah.jpg" alt="Banner"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Fullwidth End -->


<!-- Product List Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row mb-n8">

            <div class="col-md-6 col-lg-6 col-12 mb-8" data-aos="fade-up" data-aos-delay="500">
                <!-- Product List Title Start -->
                <div class="product-list-title">
                    <h2 class="title pb-3 mb-0">New Products</h2>
                    <span></span>
                </div>
                <!-- Product List Title End -->

                <!-- Product List Start -->
                <div class="product-list-carousel-2">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <!-- Product List Wrapper Start -->
                            <div class="swiper-slide product-list-wrapper mb-n6">
                                <?php foreach($softfile_only2 as $so2){ ?>
                                    <!-- Single Product List Start -->
                                    <div class="single-product-list product-hover mb-6">
                                        <div class="thumb">
                                            <a href="<?= base_url('home/shop/detail_softfile_only/'.$so2->slug_softfile_only) ?>" class="image">
                                                <img class="first-image" src="<?= base_url('assets/uploads/softfile_only/'.$so2->gambar_softfile_only) ?>" alt="Product" width="100px" />
                                                <img class="second-image" src="<?= base_url('assets/uploads/softfile_only/'.$so2->gambar1_softfile_only) ?>" alt="Product" width="100px" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="<?= base_url('home/shop/detail_softfile_only/'.$so2->slug_softfile_only) ?>"><?= $so2->nama_softfile_only ?></a></h5>
                                            <span class="price">
                                             <!-- <span class="new"> Rp. <?= number_format($so2->harga_softfile_only - $so2->diskon_softfile_only,0,',','.'); ?></span>
                                             <?php if($so2->diskon_softfile_only){ ?>
                                                <span class="old">Rp. <?= number_format($so2->harga_softfile_only,0,',','.'); ?></span>
                                                <?php } ?> -->
                                                <span class="new">Rp. <?= number_format($variasi['harga_terendah_variasi'] ,0,',','.'); ?> 
                                                -
                                                Rp. <?= number_format($variasi['harga_tertinggi_variasi'] ,0,',','.'); ?></span>
                                            </span>
                                            <!-- <span class="ratings">
                                               <span class="rating-wrap">
                                                  <span class="star" style="width: 100%"></span>
                                              </span>
                                              <span class="rating-num">(4)</span>
                                          </span> -->
                                      </div>
                                  </div>
                                  <!-- Single Product List End -->
                              <?php } ?>

                          </div>
                          <!-- Product List Wrapper End -->

                          <!-- Product List Wrapper Start -->
                          <div class="swiper-slide product-list-wrapper mb-n6">

                            <?php foreach($softfile_print2 as $sp2){ ?>
                                <!-- Single Product List Start -->
                                <div class="single-product-list product-hover mb-6">
                                    <div class="thumb">
                                        <a href="<?= base_url('home/shop/detail_softfile_print/'.$sp2->slug_softfile_print) ?>" class="image">
                                            <img class="first-image" src="<?= base_url('assets/uploads/softfile_print/'.$sp2->gambar_softfile_print) ?>" alt="Product" width="100px" />
                                            <img class="second-image" src="<?= base_url('assets/uploads/softfile_print/'.$sp2->gambar1_softfile_print) ?>" alt="Product" width="100px" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="<?= base_url('home/shop/detail_softfile_print/'.$sp2->slug_softfile_print) ?>"><?= $sp2->nama_softfile_print ?></a></h5>
                                        <span class="price">
                                            <!-- <span class="new"> Rp. <?= number_format($sp2->harga_softfile_print - $sp2->diskon_softfile_print,0,',','.'); ?></span>
                                            <?php if($sp2->diskon_softfile_print){ ?>
                                                <span class="old">Rp. <?= number_format($sp2->harga_softfile_print,0,',','.'); ?></span>
                                                <?php } ?> -->
                                                <span class="new">Rp. <?= number_format($variasi['harga_terendah_variasi'] ,0,',','.'); ?> 
                                                -
                                                Rp. <?= number_format($variasi['harga_tertinggi_variasi'] ,0,',','.'); ?></span>
                                            </span>
                                           <!--  <span class="ratings">
                                               <span class="rating-wrap">
                                                  <span class="star" style="width: 100%"></span>
                                              </span>
                                              <span class="rating-num">(4)</span>
                                          </span> -->
                                      </div>
                                  </div>
                                  <!-- Single Product List End -->
                              <?php } ?>

                          </div>
                          <!-- Product List Wrapper End -->

                          <!-- Product List Wrapper Start -->
                          <div class="swiper-slide product-list-wrapper mb-n6">

                            <?php foreach($print_only2 as $po2){ ?>
                                <!-- Single Product List Start -->
                                <div class="single-product-list product-hover mb-6">
                                    <div class="thumb">
                                        <a href="<?= base_url('home/shop/detail_print_only/'.$po2->slug_print_only) ?>" class="image">
                                            <img class="first-image" src="<?= base_url('assets/uploads/print_only/'.$po2->gambar_print_only) ?>" alt="Product" width="100px" />
                                            <img class="second-image" src="<?= base_url('assets/uploads/print_only/'.$po2->gambar1_print_only) ?>" alt="Product" width="100px" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="<?= base_url('home/shop/detail_print_only/'.$po2->slug_print_only) ?>"><?= $po2->nama_print_only ?></a></h5>
                                        <span class="price">
                                            <span class="new"> Rp. <?= number_format($po2->harga_print_only - $po2->diskon_print_only,0,',','.'); ?></span>
                                            <?php if($po2->diskon_print_only){ ?>
                                                <span class="old">Rp. <?= number_format($po2->harga_print_only,0,',','.'); ?></span>
                                            <?php } ?>
                                        </span>
                                        <!-- <span class="ratings">
                                           <span class="rating-wrap">
                                              <span class="star" style="width: 100%"></span>
                                          </span>
                                          <span class="rating-num">(4)</span>
                                      </span> -->
                                  </div>
                              </div>
                              <!-- Single Product List End -->
                          <?php } ?>

                      </div>
                      <!-- Product List Wrapper End -->

                      <!-- Product List Wrapper Start -->
                      <div class="swiper-slide product-list-wrapper mb-n6">

                        <?php foreach($package2 as $p2){ ?>
                            <!-- Single Product List Start -->
                            <div class="single-product-list product-hover mb-6">
                                <div class="thumb">
                                    <a href="<?= base_url('home/shop/detail_package/'.$p2->slug_package) ?>" class="image">
                                        <img class="first-image" src="<?= base_url('assets/uploads/package/'.$p2->gambar_package) ?>" alt="Product" width="100px" />
                                        <img class="second-image" src="<?= base_url('assets/uploads/package/'.$p2->gambar1_package) ?>" alt="Product" width="100px" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="<?= base_url('home/shop/detail_package/'.$p2->slug_package) ?>"><?= $p2->nama_package ?></a></h5>
                                    <span class="price">
                                        <span class="new"> Rp. <?= number_format($p2->harga_package - $p2->diskon_package,0,',','.'); ?></span>
                                        <?php if($p2->diskon_package){ ?>
                                            <span class="old">Rp. <?= number_format($p2->harga_package,0,',','.'); ?></span>
                                        <?php } ?>
                                    </span>
                                   <!--  <span class="ratings">
                                       <span class="rating-wrap">
                                          <span class="star" style="width: 100%"></span>
                                      </span>
                                      <span class="rating-num">(4)</span>
                                  </span> -->
                              </div>
                          </div>
                          <!-- Single Product List End -->
                      <?php } ?>

                  </div>
                  <!-- Product List Wrapper End -->

              </div>


              <!-- Next Previous Button Start -->
              <div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i></div>
              <div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
              <!-- Next Previous Button End -->
          </div>
      </div>
      <!-- Product List End -->
  </div>
  <div class="col-md-6 col-lg-6 col-12 mb-8" data-aos="fade-up" data-aos-delay="700">
    <!-- Product List Title Start -->
    <div class="product-list-title">
        <h2 class="title pb-3 mb-0">Best Sellers</h2>
        <span></span>
    </div>
    <!-- Product List Title End -->

    <!-- Product List Start -->
    <div class="product-list-carousel-3">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <!-- Product List Wrapper Start -->
                <div class="swiper-slide product-list-wrapper mb-n6">
                    <?php foreach($softfile_only_best_seller as $so_best_seller){ ?>
                        <?php if($so_best_seller->status_pembayaran == 2){ ?>
                            <!-- Single Product List Start -->
                            <div class="single-product-list product-hover mb-6">
                                <div class="thumb">
                                    <a href="single-product.html" class="image">
                                        <img class="first-image" src="<?= base_url('assets/uploads/softfile_only/'.$so_best_seller->gambar_softfile_only) ?>" alt="Product" width="100px" />
                                        <img class="second-image" src="<?= base_url('assets/uploads/softfile_only/'.$so_best_seller->gambar1_softfile_only) ?>" alt="Product" width="100px" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="single-product.html"><?= $so_best_seller->nama_softfile_only ?></a></h5>
                                    <span class="price">
                                        <!-- <span class="new"> Rp. <?= number_format($so_best_seller->harga_softfile_only - $so_best_seller->diskon_softfile_only,0,',','.'); ?></span>
                                        <?php if($so_best_seller->diskon_softfile_only){ ?>
                                            <span class="old">Rp. <?= number_format($so_best_seller->harga_softfile_only,0,',','.'); ?></span>
                                            <?php } ?> -->
                                            <span class="new">Rp. <?= number_format($variasi['harga_terendah_variasi'] ,0,',','.'); ?> 
                                            -
                                            Rp. <?= number_format($variasi['harga_tertinggi_variasi'] ,0,',','.'); ?></span>
                                        </span>
                                       <!--  <span class="ratings">
                                           <span class="rating-wrap">
                                              <span class="star" style="width: 100%"></span>
                                          </span>
                                          <span class="rating-num">(4)</span>
                                      </span> -->
                                  </div>
                              </div>
                              <!-- Single Product List End -->
                          <?php } ?>
                      <?php } ?>
                  </div>
                  <!-- Product List Wrapper End -->

                  <!-- Product List Wrapper Start -->
                  <div class="swiper-slide product-list-wrapper mb-n6">
                    <?php foreach($softfile_print_best_seller as $sp_best_seller){ ?>
                        <?php if($sp_best_seller->status_pembayaran == 2){ ?>
                            <!-- Single Product List Start -->
                            <div class="single-product-list product-hover mb-6">
                                <div class="thumb">
                                    <a href="single-product.html" class="image">
                                        <img class="first-image" src="<?= base_url('assets/uploads/softfile_print/'.$sp_best_seller->gambar_softfile_print) ?>" alt="Product" width="100px" />
                                        <img class="second-image" src="<?= base_url('assets/uploads/softfile_print/'.$sp_best_seller->gambar1_softfile_print) ?>" alt="Product" width="100px" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="single-product.html"><?= $sp_best_seller->nama_softfile_print ?></a></h5>
                                    <span class="price">
                                        <!-- <span class="new"> Rp. <?= number_format($sp_best_seller->harga_softfile_print - $sp_best_seller->diskon_softfile_print,0,',','.'); ?></span>
                                        <?php if($sp_best_seller->diskon_softfile_print){ ?>
                                            <span class="old">Rp. <?= number_format($sp_best_seller->harga_softfile_print,0,',','.'); ?></span>
                                            <?php } ?> -->
                                            <span class="new">Rp. <?= number_format($variasi['harga_terendah_variasi'] ,0,',','.'); ?> 
                                            -
                                            Rp. <?= number_format($variasi['harga_tertinggi_variasi'] ,0,',','.'); ?></span>
                                        </span>
                                       <!--  <span class="ratings">
                                         <span class="rating-wrap">
                                          <span class="star" style="width: 100%"></span>
                                      </span>
                                      <span class="rating-num">(4)</span>
                                  </span> -->
                              </div>
                          </div>
                          <!-- Single Product List End -->
                      <?php } ?>
                  <?php } ?>
              </div>
              <!-- Product List Wrapper End -->
              <!-- Product List Wrapper Start -->
              <div class="swiper-slide product-list-wrapper mb-n6">
                <?php foreach($package_best_seller as $p_best_seller){ ?>
                    <?php if($p_best_seller->status_pembayaran == 2){ ?>
                        <!-- Single Product List Start -->
                        <div class="single-product-list product-hover mb-6">
                            <div class="thumb">
                                <a href="single-product.html" class="image">
                                    <img class="first-image" src="<?= base_url('assets/uploads/package/'.$p_best_seller->gambar_package) ?>" alt="Product" width="100px" />
                                    <img class="second-image" src="<?= base_url('assets/uploads/package/'.$p_best_seller->gambar1_package) ?>" alt="Product" width="100px" />
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="single-product.html"><?= $p_best_seller->nama_package ?></a></h5>
                                <span class="price">
                                    <span class="new"> Rp. <?= number_format($p_best_seller->harga_package - $p_best_seller->diskon_package,0,',','.'); ?></span>
                                    <?php if($p_best_seller->diskon_package){ ?>
                                        <span class="old">Rp. <?= number_format($p_best_seller->harga_package,0,',','.'); ?></span>
                                    <?php } ?>
                                </span>
                                <!-- <span class="ratings">
                                 <span class="rating-wrap">
                                  <span class="star" style="width: 100%"></span>
                              </span>
                              <span class="rating-num">(4)</span>
                          </span> -->
                      </div>
                  </div>
                  <!-- Single Product List End -->
              <?php } ?>
          <?php } ?>
      </div>
      <!-- Product List Wrapper End -->

      <!-- Product List Wrapper Start -->
      <div class="swiper-slide product-list-wrapper mb-n6">
        <?php foreach($print_only_best_seller as $po_best_seller){ ?>
            <?php if($po_best_seller->status_pembayaran == 2){ ?>
                <!-- Single Product List Start -->
                <div class="single-product-list product-hover mb-6">
                    <div class="thumb">
                        <a href="single-product.html" class="image">
                            <img class="first-image" src="<?= base_url('assets/uploads/print_only/'.$po_best_seller->gambar_print_only) ?>" alt="Product" width="100px" />
                            <img class="second-image" src="<?= base_url('assets/uploads/print_only/'.$po_best_seller->gambar1_print_only) ?>" alt="Product" width="100px" />
                        </a>
                    </div>
                    <div class="content">
                        <h5 class="title"><a href="single-product.html"><?= $po_best_seller->nama_print_only ?></a></h5>
                        <span class="price">
                            <span class="new"> Rp. <?= number_format($po_best_seller->harga_print_only - $po_best_seller->diskon_print_only,0,',','.'); ?></span>
                            <?php if($po_best_seller->diskon_print_only){ ?>
                                <span class="old">Rp. <?= number_format($po_best_seller->harga_print_only,0,',','.'); ?></span>
                            <?php } ?>
                        </span>
                        <!-- <span class="ratings">
                         <span class="rating-wrap">
                          <span class="star" style="width: 100%"></span>
                      </span>
                      <span class="rating-num">(4)</span>
                  </span> -->
              </div>
          </div>
          <!-- Single Product List End -->
      <?php } ?>
  <?php } ?>
</div>
<!-- Product List Wrapper End -->

</div>

<!-- Swiper Pagination Start -->
<!-- <div class="swiper-pagination d-md-none"></div> -->
<!-- Swiper Pagination End -->

<!-- Next Previous Button Start -->
<div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i></div>
<div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
<!-- Next Previous Button End -->

</div>
</div>
<!-- Product List End -->
</div>
</div>
</div>
</div>
<!-- Product List End -->

<!-- Brand Logo Start -->
<div class="section">
    <div class="container">
        <div class="border-top">
            <div class="row">
                <div class="col-12">
                    <!-- Brand Logo Wrapper Start -->
                    <div class="brand-logo-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach($gallery as $gallery){ ?>

                                    <!-- Single Brand Logo Start -->
                                    <div class="swiper-slide single-brand-logo" data-aos="fade-up" data-aos-delay="300">
                                        <a href="<?= base_url('home/gallery') ?>"><img src="<?= base_url('assets/uploads/gallery/'.$gallery->gambar_gallery) ?>" alt="Brand Logo" width="150px"></a>
                                    </div>
                                    <!-- Single Brand Logo End -->
                                <?php } ?>

                            </div>
                        </div>
                        
                    </div>

                    <!-- Brand Logo Wrapper End -->
                </div>
            </div> 
        </div>
    </div>
</div>
<!-- Brand Logo End -->

