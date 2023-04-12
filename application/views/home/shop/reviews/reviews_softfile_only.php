<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Reviews Product</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active"> Reviews Product</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End --> 

</div>
<!-- Breadcrumb Section End -->
<?php foreach($detail as $row){ ?>
    <!-- Single Product Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">

                    <!-- Product Details Image Start -->
                    <div class="product-details-img"> 

                        <!-- Single Product Image Start -->
                        <div class="single-product-img swiper-container gallery-top">
                            <div class="swiper-wrapper popup-gallery">
                                <a class="swiper-slide w-100" href="<?= base_url('assets/uploads/softfile_only/'.$row->gambar_softfile_only) ?>">
                                    <img class="w-100" src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar_softfile_only) ?>" alt="Product">
                                </a>

                                <a class="swiper-slide w-100" href="<?= base_url('assets/uploads/softfile_only/'.$row->gambar1_softfile_only) ?>">
                                    <img class="w-100" src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar1_softfile_only) ?>" alt="Product">
                                </a>

                                <a class="swiper-slide w-100" href="<?= base_url('assets/uploads/softfile_only/'.$row->gambar2_softfile_only) ?>">
                                    <img class="w-100" src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar2_softfile_only) ?>" alt="Product">
                                </a>

                                <a class="swiper-slide w-100" href="<?= base_url('assets/uploads/softfile_only/'.$row->gambar3_softfile_only) ?>">
                                    <img class="w-100" src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar3_softfile_only) ?>" alt="Product">
                                </a>


                            </div>
                        </div>
                        <!-- Single Product Image End -->

                        <!-- Single Product Thumb Start -->
                        <div class="single-product-thumb swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar_softfile_only) ?>" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar1_softfile_only) ?>" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar2_softfile_only) ?>" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar3_softfile_only) ?>" alt="Product">
                                </div>
                            </div>

                            <!-- Next Previous Button Start -->
                            <div class="swiper-button-horizental-next  swiper-button-next"><i class="pe-7s-angle-right"></i></div>
                            <div class="swiper-button-horizental-prev swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
                            <!-- Next Previous Button End -->

                        </div>
                        <!-- Single Product Thumb End -->

                    </div>
                    <!-- Product Details Image End -->

                </div>
                <div class="col-lg-7 col-custom">

                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative">

                        <!-- Product Head Start -->
                        <div class="product-head mb-3">
                            <h2 class="product-title"><?= $row->nama_softfile_only ?></h2>
                        </div>
                        <!-- Product Head End -->

                        <!-- Price Box Start -->
                        <div class="price-box mb-2">
                            <!-- <?php if($row->diskon_softfile_only){ ?>
                                <span class="regular-price">Rp. <?= number_format($row->harga_softfile_only - $row->diskon_softfile_only,0,',','.'); ?></span>
                                <span class="old-price"><del>Rp. <?= number_format($row->harga_softfile_only,0,',','.'); ?></del></span>
                            <?php }else{ ?>
                                <span class="regular-price">Rp. <?= number_format($row->harga_softfile_only,0,',','.'); ?></span>
                                <?php } ?> -->
                                <span class="regular-price">Rp. <?= number_format($variasi['harga_terendah_variasi'],0,',','.'); ?> - Rp. <?= number_format($variasi['harga_tertinggi_variasi'],0,',','.'); ?></span>
                            </div>
                            <!-- Price Box End -->

                            <!-- Rating Start -->
                            <span class="ratings justify-content-start">
                                <span class="rating-wrap">
                                    <span class="star" style="width: 100%"></span>
                                </span>
                                <span class="rating-num">(4)</span>
                            </span>
                            <!-- Rating End -->

                            <!-- SKU Start -->
                            <div class="sku mb-3">
                                <span><?= $row->nama_kategori_produk ?></span>
                            </div>
                            <!-- SKU End -->

                            <!-- Description Start -->
                            <p class="desc-content mb-6"><?= $row->deskripsi_softfile_only ?></p>
                            <!-- Description End -->
                            <hr>
                            <form action="<?= base_url('home/shop/tambah_reviews_softfile_only/') ?>" method="post">
                                <h4>Add a reviews</h4>
                                <div class="row mb-2">

                                    <div class="col">
                                        <small class="text-dart">Nama <span class="text-danger">*</span></small>
                                        <input type="hidden" name="id_users" value="<?= $this->session->userdata('id_users') ?>" readonly>
                                        <input type="hidden" name="id_softfile_only" value="<?= $row->id_softfile_only ?>" readonly>
                                        <input type="text" name="nama_reviews" class="form-control" placeholder="Masukan Nama" value="<?= $this->session->userdata('nama_users') ?>" required>
                                    </div>
                                    <div class="col">
                                        <small class="text-dart">Email <span class="text-danger">*</span></small>
                                        <input type="email" name="email_reviews" class="form-control" placeholder="Masukan Email" value="<?= $this->session->userdata('email_users') ?>" readonly required>
                                    </div>

                                </div>
                                <div class="row mb-3">

                                    <div class="col">
                                        <small class="text-dart">Deskripsi <span class="text-danger">*</span></small>
                                        <textarea name="deskripsi_reviews" class="form-control" rows="3" placeholder="Deskripsi..." required></textarea>
                                    </div>


                                </div>

                                <!-- Cart & Wishlist Button Start -->
                                <div class="cart-wishlist-btn mb-4">
                                    <div class="add-to_cart">
                                        <button class="btn btn-block btn-outline-dark btn-hover-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                                <!-- Cart & Wishlist Button End -->
                            </form>

                        </div>
                        <!-- Product Summery End -->

                    </div>
                </div>

                <div class="row section-margin">
                    <!-- Single Product Tab Start -->
                    <div class="col-lg-12 col-custom single-product-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews</a>
                            </li>

                            <!-- <li class="nav-item">
                                <a class="nav-link text-uppercase" id="review-tab" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Size Chart</a>
                            </li> -->
                        </ul>
                        <div class="tab-content mb-text" id="myTabContent">
                            <div class="tab-pane fade show active" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Start Single Content -->
                                <div class="product_tab_content  border p-3">

                                    <?php foreach($reviews as $ulasan){ ?>
                                        <?php if($row->id_softfile_only == $ulasan->id_softfile_only){ ?>
                                            <!-- Start Single Review -->
                                            <div class="single-review d-flex mb-4">

                                                <!-- Review Thumb Start -->
                                                <div class="review_thumb">
                                                    <img alt="review images" src="<?= base_url('assets/uploads/reviews/'.$ulasan->gambar_reviews) ?>" style="width: 70px;">
                                                </div>
                                                <!-- Review Thumb End -->

                                                <!-- Review Details Start -->
                                                <div class="review_details">
                                                    <div class="review_info mb-2">

                                                        <!-- Rating Start -->
                                                <!-- <span class="ratings justify-content-start mb-3">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                                    </span>
                                                    <span class="rating-num">(1)</span>
                                                </span> -->
                                                <!-- Rating End -->

                                                <!-- Review Title & Date Start -->
                                                <div class="review-title-date d-flex">
                                                    <h5 class="title"><?= $ulasan->nama_reviews ?> - </h5><span> <?= date('F d, Y', strtotime($ulasan->tanggal_reviews)) ?></span>&nbsp;&nbsp;
                                                    <?php if($ulasan->edit_reviews == 0 && $ulasan->id_users == $this->session->userdata('id_users')){ ?>
                                                        <a href="<?= base_url('home/shop/edit_reviews/'.$ulasan->id_reviews) ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                    <?php } ?>
                                                    
                                                </div>
                                                <small><?= $ulasan->email_reviews ?></small>
                                                <!-- Review Title & Date End -->

                                            </div>
                                            <p><?= $ulasan->deskripsi_reviews ?></p>
                                        </div>
                                        <!-- Review Details End -->
                                    </div>
                                    <!-- End Single Review -->
                                <?php } ?>
                            <?php } ?>



                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
            <!-- Single Product Tab End -->
        </div>

        <!-- Products Start -->
        <div class="row">

            <div class="col-12">
                <!-- Section Title Start -->
                <div class="section-title aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="title pb-3">You Might Also Like</h2>
                    <span></span>
                    <div class="title-border-bottom"></div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col">
                <div class="product-carousel">

                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!-- Product Start -->
                            <?php foreach($softfile_only as $so){ ?>
                                <?php if($so->id_softfile_only != $row->id_softfile_only){ ?>
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
                                                    <a href="#" class="action wishlist"><i class="fa fa-shopping-cart"></i></a>
                                                    <a href="<?= base_url('home/shop/detail_softfile_only/'.$so->slug_softfile_only) ?>" class="action compare"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h4 class="sub-title"><a href="<?= base_url('home/shop/detail_softfile_only/'.$so->slug_softfile_only) ?>"><?= $so->nama_kategori_produk ?></a></h4>
                                                <h5 class="title"><a href="<?= base_url('home/shop/detail_softfile_only/'.$so->slug_softfile_only) ?>"><?= $so->nama_softfile_only ?></a></h5>
                                                <span class="ratings">
                                                 <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">(4)</span>
                                            </span>
                                            <span class="price">
                                                <!-- <span class="new"> Rp. <?= number_format($so->harga_softfile_only - $so->diskon_softfile_only,0,',','.'); ?></span>
                                                <?php if($so->diskon_softfile_only){ ?>
                                                    <span class="old">Rp. <?= number_format($so->harga_softfile_only,0,',','.'); ?></span>
                                                    <?php } ?> -->
                                                    <span class="new">Rp. <?= number_format($variasi_rentang['harga_terendah_variasi'] ,0,',','.'); ?> 
                                                    -
                                                    Rp. <?= number_format($variasi_rentang['harga_tertinggi_variasi'] ,0,',','.'); ?></span>
                                                </span>
                                                <button class="btn btn-sm btn-outline-dark btn-hover-primary">Add To Cart</button>
                                            </div>
                                        </div>
                                        <!-- Single Product End -->

                                    </div>
                                <?php }} ?>
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
            <!-- Products End -->

        </div>
    </div>
    <!-- Single Product Section End -->
    <?php } ?>