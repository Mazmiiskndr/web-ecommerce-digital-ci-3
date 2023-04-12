<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Gallery</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active"> Gallery</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Gallery Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row mb-n8">
            <?php foreach($gallery as $row){ ?>
                <div class="col-md-6 col-lg-4 mb-3" data-aos="fade-up" data-aos-delay="200">
                    <!-- Single Gallery Start -->
                    <div class="blog-single-post-wrapper border">
                        <div class="blog-thumb popup-gallery">
                            <a class="blog-overlay" href="<?= base_url('assets/uploads/gallery/'.$row->gambar_gallery) ?>">
                                <img src="<?= base_url('assets/uploads/gallery/'.$row->gambar_gallery) ?>" alt="Blog Post">
                            </a>
                        </div>
                        
                    </div>
                    <!-- Single Gallery End -->


                </div>

            <?php } ?>

        </div>

    </div>
</div>
    <!-- Gallery Section End -->