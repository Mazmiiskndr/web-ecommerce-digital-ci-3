<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">About Us</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active"> About Us</li>
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
            <div class="col-lg-6 align-self-center mb-6" data-aos="fade-right" data-aos-delay="600">
                <div class="about_content">
                    <h2 class="title"><?= $about['judul_about'] ?></h2>
                    <h3 class="sub-title"><?= $about['subjek_about'] ?></h3>
                    <p><?= $about['deskripsi_about'] ?></p>
                </div>
            </div>
            <div class="col-lg-6 mb-6" data-aos="fade-left" data-aos-delay="600">
                <div class="about_thumb popup-gallery">
                        <img class="fit-image " src="<?= base_url('assets/uploads/about/'.$about['gambar_about']) ?>" alt="About Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Feature Section Start -->
<div class="section about-feature-bg section-padding">
    <div class="container">
        <div class="row mb-n5">
            <!-- Feature Start -->
            <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="feature flex-column text-center">
                    <div class="icon w-100 mb-4">
                        <img src="<?= base_url('assets/destry/') ?>assets/images/icons/feature-icon-2.png" alt="Feature Icon">
                    </div>
                    <div class="content ps-0 w-100">
                        <h5 class="title mb-2">Free Shipping</h5>
                        <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit</p>
                    </div>
                </div>
            </div>
            <!-- Feature End -->

            <!-- Feature Start -->
            <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="400">
                <div class="feature flex-column text-center">
                    <div class="icon w-100 mb-4">
                        <img src="<?= base_url('assets/destry/') ?>assets/images/icons/feature-icon-3.png" alt="Feature Icon">
                    </div>
                    <div class="content ps-0 w-100">
                        <h5 class="title mb-2">Support 24/7</h5>
                        <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit</p>
                    </div>
                </div>
            </div>
            <!-- Feature End -->
            
            <!-- Feature Start -->
            <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="500">
                <div class="feature flex-column text-center">
                    <div class="icon w-100 mb-4">
                        <img src="<?= base_url('assets/destry/') ?>assets/images/icons/feature-icon-4.png" alt="Feature Icon">
                    </div>
                    <div class="content ps-0 w-100">
                        <h5 class="title mb-2">Money Return</h5>
                        <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit</p>
                    </div>
                </div>
            </div>
            <!-- Feature End -->

            <!-- Feature Start -->
            <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="600">
                <div class="feature flex-column text-center">
                    <div class="icon w-100 mb-4">
                        <img src="<?= base_url('assets/destry/') ?>assets/images/icons/feature-icon-1.png" alt="Feature Icon">
                    </div>
                    <div class="content ps-0 w-100">
                        <h5 class="title mb-2">Order Discount</h5>
                        <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit</p>
                    </div>
                </div>
            </div>
            <!-- Feature End -->
        </div>
    </div>
</div>
<!-- Feature Section End -->

<!-- Service Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row mb-n6">
            <div class="col-lg-4 col-md-6 text-center mb-6" data-aos="fade-up" data-aos-delay="200">
                <!-- Single Service Start -->
                <div class="single-service">
                    <h2 class="title"><?= $about['visi_misi1'] ?></h2>
                    <p><?= $about['deskripsi_visi_misi1'] ?></p>
                </div>
                <!-- Single Service End -->
            </div>
            <div class="col-lg-4 col-md-6 text-center mb-6" data-aos="fade-up" data-aos-delay="400">
                <!-- Single Service Start -->
                <div class="single-service">
                    <h2 class="title"><?= $about['visi_misi2'] ?></h2>
                    <p><?= $about['deskripsi_visi_misi2'] ?></p>
                </div>
                <!-- Single Service End -->
            </div>
            <div class="col-lg-4 col-md-6 text-center mb-6" data-aos="fade-up" data-aos-delay="600">
                <!-- Single Service Start -->
                <div class="single-service">
                    <h2 class="title"><?= $about['visi_misi3'] ?></h2>
                    <p><?= $about['deskripsi_visi_misi3'] ?></p>
                </div>
                <!-- Single Service End -->
            </div>
        </div>
    </div>
</div>
<!-- Service Section End -->

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