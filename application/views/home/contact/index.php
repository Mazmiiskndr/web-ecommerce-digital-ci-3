 <!-- Breadcrumb Section Start -->
 <div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Contact Us</h1>
                <ul>
                    <li>
                        <a href="index.html">Home </a>
                    </li>
                    <li class="active"> Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Contact Us Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row mb-n10">
            <div class="col-12 col-lg-8 mb-10">

                <!-- Section Title Start -->
                <div class="section-title" data-aos="fade-up" data-aos-delay="300">

                    <h2 class="title pb-3">Get In Touch</h2>
                    <span></span>
                    <div class="title-border-bottom"></div>
                </div>
                <!-- Section Title End -->
                <!-- Contact Form Wrapper Start -->
                <div class="contact-form-wrapper contact-form">
                    <form action="<?= base_url('home/contact/tambah_data_aksi') ?>" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                        <div class="input-item mb-4">
                                            <input class="input-item" type="text" placeholder="Your Name *" name="nama_pesan">
                                            <?= form_error('nama_pesan', '<small class="text-danger" style="color: red; margin-left: 5px;">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                        <div class="input-item mb-4">
                                            <input class="input-item" type="email" placeholder="Email *" name="email_pesan">
                                            <?= form_error('email_pesan', '<small class="text-danger" style="color: red; margin-left: 5px;">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                                        <div class="input-item mb-4">
                                            <input class="input-item" type="text" placeholder="Subject *" name="subject_pesan">
                                            <?= form_error('subject_pesan', '<small class="text-danger" style="color: red; margin-left: 5px;">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                                        <div class="input-item mb-8">
                                            <textarea class="textarea-item" name="deskripsi_pesan" placeholder="Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <button type="submit" class="btn btn-dark btn-hover-primary rounded-0">Send A Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Contact Form Wrapper End -->
            </div>
            <div class="col-12 col-lg-4 mb-10">
                <!-- Section Title Start -->
                <div class="section-title" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="title pb-3">Contact Info</h2>
                    <span></span>
                    <div class="title-border-bottom"></div>
                </div>
                <!-- Section Title End -->

                <!-- Contact Information Wrapper Start -->
                <div class="row contact-info-wrapper mb-n6">

                    <!-- Single Contact Information Start -->
                    <div class="col-lg-12 col-md-6 col-sm-12 col-12 single-contact-info mb-6" data-aos="fade-up" data-aos-delay="300">

                        <!-- Single Contact Icon Start -->
                        <div class="single-contact-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <!-- Single Contact Icon End -->

                        <!-- Single Contact Title Content Start -->
                        <div class="single-contact-title-content">
                            <h4 class="title">Alamat</h4>
                            <p class="desc-content"><?= $contact['alamat_contact'] ?> <br></p>
                        </div>
                        <!-- Single Contact Title Content End -->

                    </div>
                    <!-- Single Contact Information End -->

                    <!-- Single Contact Information Start -->
                    <div class="col-lg-12 col-md-6 col-sm-12 col-12 single-contact-info mb-6" data-aos="fade-up" data-aos-delay="400">

                        <!-- Single Contact Icon Start -->
                        <div class="single-contact-icon">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <!-- Single Contact Icon End -->

                        <!-- Single Contact Title Content Start -->
                        <div class="single-contact-title-content">
                            <h4 class="title">No. Telepon</h4>
                            <p class="desc-content"><?= $contact['no_telp_contact'] ?></p>
                        </div>
                        <!-- Single Contact Title Content End -->

                    </div>
                    <!-- Single Contact Information End -->

                    <!-- Single Contact Information Start -->
                    <div class="col-lg-12 col-md-6 col-sm-12 col-12 single-contact-info mb-6" data-aos="fade-up" data-aos-delay="500">

                        <!-- Single Contact Icon Start -->
                        <div class="single-contact-icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <!-- Single Contact Icon End -->

                        <!-- Single Contact Title Content Start -->
                        <div class="single-contact-title-content">
                            <h4 class="title">Email</h4>
                            <p class="desc-content"><a href="#"><?= $contact['email_contact'] ?></a> </p>
                        </div>
                        <!-- Single Contact Title Content End -->

                    </div>
                    <!-- Single Contact Information End -->

                </div>
                <!-- Contact Information Wrapper End -->
            </div>
        </div>
    </div>
</div>
<!-- Contact us Section End -->

<!-- Contact Map Start -->
<div class="section" data-aos="fade-up" data-aos-delay="300">
    <!--Google Map Area Start-->
    <div class="google-map-area w-100">
        <iframe class="contact-map" src="https://maps.google.com/maps?q=Jl.%20Bumi%20Resik%20Indah,%20Sukamanah,%20Kec.%20Cipedes,%20Kab.%20Tasikmalaya,%20Jawa%20Barat%2046131&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
    <!--Google Map Area Start-->
</div>
<!-- Contact Map End -->

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