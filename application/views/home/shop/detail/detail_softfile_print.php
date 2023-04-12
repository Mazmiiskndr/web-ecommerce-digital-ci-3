<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Detail Product</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active"> Detail Product</li>
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
                                <a class="swiper-slide w-100" href="<?= base_url('assets/uploads/softfile_print/'.$row->gambar_softfile_print) ?>">
                                    <img class="w-100" src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar_softfile_print) ?>" alt="Product">
                                </a>

                                <a class="swiper-slide w-100" href="<?= base_url('assets/uploads/softfile_print/'.$row->gambar1_softfile_print) ?>">
                                    <img class="w-100" src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar1_softfile_print) ?>" alt="Product">
                                </a>

                                <a class="swiper-slide w-100" href="<?= base_url('assets/uploads/softfile_print/'.$row->gambar2_softfile_print) ?>">
                                    <img class="w-100" src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar2_softfile_print) ?>" alt="Product">
                                </a>

                                <a class="swiper-slide w-100" href="<?= base_url('assets/uploads/softfile_print/'.$row->gambar3_softfile_print) ?>">
                                    <img class="w-100" src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar3_softfile_print) ?>" alt="Product">
                                </a>


                            </div>
                        </div>
                        <!-- Single Product Image End -->

                        <!-- Single Product Thumb Start -->
                        <div class="single-product-thumb swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar_softfile_print) ?>" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar1_softfile_print) ?>" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar2_softfile_print) ?>" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar3_softfile_print) ?>" alt="Product">
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
                            <h2 class="product-title"><?= $row->nama_softfile_print ?></h2>
                        </div>
                        <!-- Product Head End -->

                        <!-- Price Box Start -->
                        <div class="price-box mb-2">
                            <!-- <?php if($row->diskon_softfile_print){ ?>
                                <span class="regular-price">Rp. <?= number_format($row->harga_softfile_print - $row->diskon_softfile_print,0,',','.'); ?></span>
                                <span class="old-price"><del>Rp. <?= number_format($row->harga_softfile_print,0,',','.'); ?></del></span>
                            <?php }else{ ?>
                                <span class="regular-price">Rp. <?= number_format($row->harga_softfile_print,0,',','.'); ?></span>
                                <?php } ?> -->
                                <span class="regular-price">Rp. <?= number_format($variasi_rentang['harga_terendah_variasi'] + $row->harga_terendah + $harga_packaging['harga_terendah_packaging'],0,',','.'); ?> 
                                        -
                                        Rp. <?= number_format($variasi_rentang['harga_tertinggi_variasi'] + $row->harga_tertinggi + $harga_packaging['harga_tertinggi_packaging'],0,',','.'); ?></span> 
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
                            <p class="desc-content mb-5"><?= $row->deskripsi_softfile_print ?></p>
                            <!-- Description End -->

                            <form action="<?= base_url('home/cart/tambah_cart_softfile_print/'.$row->id_softfile_print) ?>" method="post">
                                <div class="row">
                                    <div class="col">
                                        <small class="text-danger">Pilih salah satu Variasi!</small>
                                        <select class="form-select mb-3" name="id_variasi" required>
                                            <option value="">-- Pilih Variasi -- </option>
                                            <?php foreach($variasi as $variasi){ ?>

                                                <option value="<?= $variasi->id_variasi ?>"><?= $variasi->nama_variasi_cart ?> - Rp . <?= number_format($variasi->harga_variasi,0,',','.'); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if($row->id_jenis_cetakan == 1){ ?>
                                        <div class="col">
                                           <select class="form-select mb-3" name="id_sub_jenis_cetakan" required>
                                            <option value="" selected disabled hidden="">-- Pilih Jenis Cetakan -- </option>
                                            <?php foreach($sub_jenis_cetakan2 as $sjc){ ?>
                                                <?php if($sjc->id_jenis_cetakan == $row->jc_id_jc && $row->sp_id_jc == $row->jc_id_jc){ ?>
                                                    <option value="<?= $sjc->id_sub_jenis_cetakan ?>"><?= $sjc->nama_sub_jenis_cetakan ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    <?php }else{ ?>

                                    <?php } ?>
                                    <div class="col">
                                      <select class="form-select mb-3" name="id_ukuran_jenis_cetakan" required>
                                        <option value="" selected disabled hidden="">-- Pilih Ukuran Cetakan -- </option>
                                        <?php foreach($ukuran_jenis_cetakan2 as $ujc){ ?>
                                            <?php if($ujc->id_jenis_cetakan == $row->jc_id_jc && $row->sp_id_jc == $row->jc_id_jc){ ?>
                                                <option value="<?= $ujc->id_ukuran_jenis_cetakan ?>"><?= $ujc->nama_ukuran_jenis_cetakan ?> - Rp . <?= number_format($ujc->harga_ukuran_jenis_cetakan,0,',','.'); ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>

                                </div> 

                                <div class="row mb-6">
                                    <div class="col">
                                        <select class="form-select mb-3" name="id_packaging" required>
                                            <option value="" selected disabled hidden="">-- Pilih Packaging -- </option>
                                            <?php foreach($packaging as $packaging){ ?>
                                                <option value="<?= $packaging->id_packaging ?>"><?= $packaging->nama_packaging ?> - Rp . <?= number_format($packaging->harga_packaging,0,',','.'); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <hr>
                                <div class="row mb-6">
                                    <div class="col">
                                      <select class="form-select mb-3" name="id_tambahan_biaya">
                                        <option value="">-- Tambahan Biaya -- </option>
                                        <?php foreach($tambahan_biaya as $tb){ ?>

                                            <option value="<?= $tb->id_tambahan_biaya ?>"><?= $tb->nama_tambahan_biaya ?> - Rp . <?= number_format($tb->harga_tambahan_biaya,0,',','.'); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Quantity Start -->
                            <div class="quantity mb-5">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" name="qty" type="text">
                                    <div class="dec qtybutton"></div>
                                    <div class="inc qtybutton"></div>
                                </div>
                            </div>
                            <!-- Quantity End -->


                            <!-- Cart & Wishlist Button Start -->
                            <div class="cart-wishlist-btn mb-4">
                                <div class="add-to_cart">
                                    <button class="btn btn-outline-dark btn-hover-primary" type="submit">Add to cart</button>
                                    <a href="<?= base_url('home/categories') ?>" class="btn btn-outline-dark btn-hover-primary ml-3" type="submit">Continue Shopping</a>
                                </div>
                            </div>
                            <!-- Cart & Wishlist Button End -->
                        </form>

                         <div class="coupon-accordion">
                            <!-- Title Start -->
                            <h3 class="title"><span id="showcoupon"><strong><i class="fa fa-money"></i> &nbsp;Tambahan Biaya</span></strong></h3>
                            <!-- Title End -->

                            <!-- Checkout Coupon Start -->
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <ul class="product-delivery-policy border-top pt-4 border-bottom pb-4">
                                        <?php foreach($tambahan_biaya as $tb){ ?>
                                            <li><span> - <?= $tb->nama_tambahan_biaya ?></span></li>
                                            <li><span><?= $tb->deskripsi_tambahan_biaya ?></span></li>
                                        <?php } ?>   
                                            <li><span><strong>DETAIL PACKAGING : </strong></span></li>
                                         <?php foreach($packaging2 as $pack){ ?>
                                            <li><span> - <?= $pack->nama_packaging ?></span></li>
                                            <li><span><?= $pack->deskripsi_packaging ?></span></li>
                                        <?php } ?>                           
                                    </ul>
                                </div>
                            </div>
                            <!-- Checkout Coupon End -->
                        </div>
                        <!-- Social Shear Start -->
                        <!-- <div class="social-share">
                            <span> <i class="fa fa-money"></i> Tambahan Biaya</span>

                        </div> -->
                        <!-- Social Shear End -->

                        <!-- Product Delivery Policy Start -->
                        <!-- <ul class="product-delivery-policy border-top pt-4 border-bottom pb-4">
                            <?php foreach($tambahan_biaya as $tb){ ?>
                                <li><span> - <?= $tb->nama_tambahan_biaya ?></span></li>
                                <li><span><?= $tb->deskripsi_tambahan_biaya ?></span></li>
                            <?php } ?>                           
                        </ul> -->
                        <!-- Product Delivery Policy End -->

                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>

            <div class="row section-margin">
                <!-- Single Product Tab Start -->
                <div class="col-lg-12 col-custom single-product-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase" id="review-tab" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Specifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Start Single Content -->
                            <div class="product_tab_content  border p-3">

                                <?php foreach($reviews as $ulasan){ ?>
                                    <?php if($row->id_softfile_print == $ulasan->id_softfile_print){ ?>
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
                                                    <h5 class="title"><?= $ulasan->nama_reviews ?> - </h5><span> <?= date('F d, Y', strtotime($ulasan->tanggal_reviews)) ?></span>
                                                    
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
                    
                    <div class="tab-pane fade show active" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                        <div class="size-tab table-responsive-lg">
                            <table class="table border mb-0">
                                <tbody>
                                    <tr>
                                        <td class="cun-name"><span>Dimensi</span></td>
                                        <td>:</td>
                                        <td><?= $row->dimensi_softfile_print ?></td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Cetakan</span></td>
                                        <td>:</td>
                                        <td><?= $row->nama_jenis_cetakan ?></td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Ukuran Cetakan</span></td>
                                        <td>:</td>
                                        <td>
                                            <?php foreach($ukuran_jenis_cetakan2 as $ujc){ ?>
                                                <?php if($ujc->id_jenis_cetakan == $row->jc_id_jc && $row->sp_id_jc == $row->jc_id_jc){ ?>

                                                    <?= $ujc->nama_ukuran_jenis_cetakan ?>,&nbsp;

                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Berat</span></td>
                                        <td>:</td>
                                        <td>
                                         <!-- Berat Cetakan -->
                                         <?php if($row->jc_id_jc == $row->ujc_id_jc && $row->sp_id_jc == $row->jc_id_jc){ ?>
                                            <?php if($row->harga_terendah == $row->harga_tertinggi){ ?>
                                                <?= $row->berat_terendah ?><small>gr</small>

                                            <?php }elseif($row->harga_terendah == $row->harga_tertinggi){ ?>
                                               <?= $row->berat_tertinggi ?><small>gr</small>

                                           <?php }elseif($row->harga_terendah != $row->harga_tertinggi){ ?>
                                               <?= $row->berat_terendah ?><small>gr</small> s/d <?= $row->berat_tertinggi ?><small>gr</small>
                                           <?php } ?>
                                       <?php } ?>
                                       <!-- End Berat Cetakan -->
                                   </td>
                               </tr>
                               <tr>
                                <td class="cun-name"><span>Harga Cetakan</span></td>
                                <td>:</td>
                                <td>
                                   <!-- Harga Cetakan -->
                                   <?php if($row->jc_id_jc == $row->ujc_id_jc && $row->sp_id_jc == $row->jc_id_jc){ ?>
                                    <?php if($row->harga_terendah == $row->harga_tertinggi){ ?>
                                        Rp . <?= number_format($row->harga_tertinggi,0,',','.'); ?>

                                    <?php }elseif($row->harga_terendah == $row->harga_tertinggi){ ?>
                                        Rp . <?= number_format($row->harga_terendah,0,',','.'); ?>
                                    <?php }elseif($row->harga_terendah != $row->harga_tertinggi){ ?>
                                        Rp . <?= number_format($row->harga_terendah,0,',','.'); ?> s/d
                                        <?= number_format($row->harga_tertinggi,0,',','.'); ?>
                                    <?php } ?>
                                <?php } ?>
                                <!-- End Harga Cetakan -->

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                    <?php foreach($softfile_print as $sp){ ?>
                        <?php if($sp->id_softfile_print != $row->id_softfile_print){ ?>
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
                                            <span class="new">Rp. <?= number_format($variasi_rentang['harga_terendah_variasi'] + $sp->harga_terendah + $harga_packaging['harga_terendah_packaging'],0,',','.'); ?> 
                                        -
                                        Rp. <?= number_format($variasi_rentang['harga_tertinggi_variasi'] + $sp->harga_tertinggi + $harga_packaging['harga_tertinggi_packaging'],0,',','.'); ?></span>
                                        </span>
                                        <a href="<?= base_url('home/shop/detail_softfile_print/'.$sp->slug_softfile_print) ?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Order Now</a>
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