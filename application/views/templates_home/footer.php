    <!-- Footer Section Start -->
    <footer class="section footer-section">
        <!-- Footer Top Start -->
        <div class="footer-top section-padding">
            <div class="container">
                <div class="row mb-n10">
                    <div class="col-12 col-sm-6 col-lg-5 col-xl-5 mb-10" data-aos="fade-up" data-aos-delay="200">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Contact Us</h2>
                            <p class="desc-content">Lorem ipsum dolor sit amet, consectetur adipisicing sed do eiusmod tempor incididun</p>
                            <!-- Contact Address Start -->
                            <ul class="widget-address">
                                <li><span>Address: </span> <?= $contact['alamat_contact'] ?></li>
                                <li><span>Call to: </span> <a href="#"> <?= $contact['no_telp_contact'] ?></a></li>
                                <li><span>Mail to: </span> <a href="#"> <?= $contact['email_contact'] ?></a></li>
                            </ul>
                            <!-- Contact Address End -->

                            <!-- Soclial Link Start -->
                            <div class="widget-social justify-content-start mt-4">
                                <a title="Facebook" href="#"><i class="fa fa-facebook-f"></i></a>
                                <a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                <a title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                <a title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                                <a title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                            </div>
                            <!-- Social Link End -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2 col-xl-2 mb-10" data-aos="fade-up" data-aos-delay="300">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Information</h2>
                            <ul class="widget-list">
                                <li><a href="<?= base_url('home/gallery') ?>">Gallery</a></li>
                                <li><a href="<?= base_url('home/about') ?>">About Us</a></li>
                                <li><a href="<?= base_url('home/contact') ?>">Contact</a></li>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-5 col-xl-5 mb-10" data-aos="fade-up" data-aos-delay="500">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Newsletter</h2>
                            <div class="widget-body">
                                <p class="desc-content mb-0">Get E-mail updates about our latest shop and special offers.</p>

                                <!-- Newsletter Form Start -->
                                <div class="newsletter-form-wrap pt-4">
                                    <form id="mc-form" class="mc-form">
                                        <input type="email" id="mc-email" class="form-control email-box mb-4" placeholder="Enter your email here.." name="EMAIL">
                                        <button id="mc-submit" class="newsletter-btn btn btn-primary btn-hover-dark" type="submit">Subscribe</button>
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts text-centre">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                                    </div>
                                    <!-- mailchimp-alerts end -->
                                </div>
                                <!-- Newsletter Form End -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
                        <div class="copyright-content">
                            <p class="mb-0">Copyright © <?= date('Y') ?> <a href="#">JangmarArt. </a>  All Rights Reserved.</p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </footer>
    <!-- Footer Section End -->
    <style>
        .btn-floating {
            position: fixed;
            left: 30px;
            overflow: hidden;
            width: 50px;
            height: 50px;
            border-radius: 100px;
            border:  0;
            z-index: 9999;
        }

        .btn-floating:hover {
            width: 60px;
            height: 60px;
            padding: 0 0px;
            cursor: pointer;

        }
        .btn-floating span {
            font-size: 16px;   
            margin-left: 5px;
            transition: .2s;
            line-height: 0px;
            display: none;


        }
        .btn-floating:hover span{
            display: inline-block;


        }
        .btn-floating img{
            display: block;
            margin: -15px ;           
            margin-left: -11px;

        }
        .btn-floating.whatsapp {
            bottom: 30px;
            padding: 20px;
            background-color: #34af23;
            border: 2px solid #fff;


        }

        .btn-floating.whatsapp:hover{

        }
    </style>

    <a href="https://api.whatsapp.com/send?phone=6287727563939" target="_blank">
        <button class="btn-floating whatsapp">
            <img src="<?= base_url('assets/uploads/') ?>whatsapp.png" alt="" width="30">
        </button>

    </a>
   

    <!-- Scroll Top Start -->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top fa fa-long-arrow-up"></i>
        <i class="arrow-bottom fa fa-long-arrow-up"></i>
    </a>
    <!-- Scroll Top End -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if($this->session->flashdata('success')){ ?>
            var isi = <?php echo json_encode($this->session->flashdata('success')) ?>;
            Swal.fire({
                position: 'top-end',
                title: 'Berhasil',
                text: isi,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            })
        <?php } ?>
        <?php if($this->session->flashdata('error')){ ?>
            var isi = <?php echo json_encode($this->session->flashdata('error')) ?>;
            Swal.fire({
                position: 'top-end',
                title: 'Gagal',
                text: isi,
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
            })
        <?php } ?>
        <?php if($this->session->flashdata('reviews')){ ?>
            var isi = <?php echo json_encode($this->session->flashdata('reviews')) ?>;
            Swal.fire({
                position: 'center',
                title: isi,
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            })
        <?php } ?>
        
    </script>

    <!-- Scripts -->
    <!-- Scripts -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendors JS -->

    <!--     
    <script src="<?= base_url('assets/destry/') ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/vendor/modernizr-3.11.2.min.js"></script> 
-->

<!-- Plugins JS -->

    <!--     
    <script src="<?= base_url('assets/destry/') ?>assets/js/plugins/countdown.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/plugins/aos.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/plugins/nice-select.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/plugins/jquery-ui.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/plugins/lightgallery-all.min.js"></script>
    <script src="<?= base_url('assets/destry/') ?>assets/js/plugins/thia-sticky-sidebar.min.js"></script> 
-->

<!-- Use the minified version files listed below for better performance and remove the files listed above -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="<?= base_url('assets/destry/') ?>assets/js/vendor.min.js"></script>
<script src="<?= base_url('assets/destry/') ?>assets/js/plugins.min.js"></script>



<!--Main JS-->
<script src="<?= base_url('assets/destry/') ?>assets/js/main.js"></script>

</body>

</html>