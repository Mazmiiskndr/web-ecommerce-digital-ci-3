<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Shop Now</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active"> Shop Now</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- About Section Start -->
<div class="section section-margin overflow-hidden">
    <div class="container">
        <div class="row mb-n6">
            <div class="col-lg-12 align-self-center mb-6" data-aos="fade-right" data-aos-delay="600">
                <div class="about_content">
                    <h2 class="title text-center" style="margin-bottom: 50px;">Pilih Kategori Produk Keinginanmu </h2>
                </div>
            </div>
        </div>
        <!-- Banners Start -->
        <div class="row mb-n6 overflow-hidden">

            <?php foreach($kategori_produk as $kp){ ?>
                <!-- Banner Start -->
                <div class="col-md-6 col-12 mb-6" data-aos="fade-right" data-aos-delay="300">
                    <div class="banner">
                        <div class="banner-image">
                            <a href="<?= base_url('home/shop/categories/'.$kp->slug_kategori_produk) ?>"><img src="<?= base_url('assets/uploads/kategori_produk/'.$kp->gambar_kategori_produk) ?>" alt="Banner Image"></a>
                        </div>
                        <div class="info">
                            <div class="small-banner-content">
                                <h3 class="title"><?= $kp->nama_kategori_produk ?></h3>
                                <a href="<?= base_url('home/shop/categories/'.$kp->slug_kategori_produk) ?>" class="btn btn-primary btn-hover-dark btn-sm">Shop Now</a>
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
<!-- About Section End -->

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
