<!-- Header Top Start -->
<div class="header-top bg-light">
    <div class="container">
        <div class="row row-cols-xl-2 align-items-center">

            <!-- Header Top Language, Currency & Link Start -->
            <div class="col d-none d-lg-block">
                <div class="header-top-lan-curr-link">
                    
                </div>
            </div>
            <!-- Header Top Language, Currency & Link End -->

            <!-- Header Top Message Start -->
            <div class="col">
                <p class="header-top-message"><a href="<?= base_url('home/categories') ?>">Shop Now</a></p>
            </div>
            <!-- Header Top Message End -->

        </div>
    </div>
</div> 
<!-- Header Top End -->

<!-- Header Bottom Start -->
<div class="header-bottom">
    <div class="header-sticky">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col-xl-2 col-6">
                    <div class="header-logo">
                        <a href="<?= base_url('') ?>"><img src="<?= base_url('assets/uploads/') ?>textjangmar3.png" alt="Site Logo" /></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Menu Start -->
                <div class="col-xl-8 d-none d-xl-block">
                    <div class="main-menu position-relative">
                        <ul>
                            <li class="has-children">
                                <a href="<?= base_url('') ?>"><span>Home</span></a>
                                
                            </li>
                            <li class="has-children">
                                <a href="<?= base_url('home/gallery') ?>"><span>Gallery</span></a>
                                
                            </li> 
                            <li class="has-children">
                                <a href="#"><span>Shop</span> <i class="fa fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <?php foreach($kategori_produk as $kp){ ?>
                                        <li><a href="<?= base_url('home/shop/categories/'.$kp->slug_kategori_produk) ?>"><?= $kp->nama_kategori_produk ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            
                            <li><a href="<?= base_url('home/about') ?>"> <span>About Us</span></a></li>
                            <li><a href="<?= base_url('home/contact') ?>"> <span>Contact</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Menu End -->

                <!-- Header Action Start -->
                <div class="col-xl-2 col-6">
                    <div class="header-actions">


                        <!-- Wishlist Header Action Button Start -->
                        <!-- <a href="wishlist.html" class="header-action-btn header-action-btn-wishlist d-none d-md-block">
                            <i class="pe-7s-like"></i>
                        </a> -->
                        <!-- Wishlist Header Action Button End -->

                        <?php if($this->session->userdata('email_users')){ ?>
                            <!-- Shopping Cart Header Action Button Start -->
                            <a href="javascript:void(0)" class="header-action-btn header-action-btn-cart">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="header-action-num"><?= $jumlah_cart ?></span>
                            </a>
                            <!-- Shopping Cart Header Action Button End -->

                            <!-- User Account Header Action Button Start -->
                            <a href="<?= base_url('home/profil/detail/'.$this->session->userdata('id_users')) ?>" class="header-action-btn d-none d-md-block"><i class="pe-7s-user"></i></a>
                            <!-- User Account Header Action Button End -->
                            <a href="<?= base_url('home/profil/detail/'.$this->session->userdata('id_users')) ?>" class="header-action-btn d-none d-md-block" ><?= strtok($this->session->userdata('nama_users'), " ") ?></a>

                            <!-- User Account Header Action Button End -->
                        <?php }else{ ?>
                            <!-- User Account Header Action Button Start -->
                            <a href="<?= base_url('auth/login') ?>" class="header-action-btn d-none d-md-block">Login</a>
                            <!-- User Account Header Action Button End -->
                        <?php } ?>

                        <!-- Mobile Menu Hambarger Action Button Start -->
                        <a href="javascript:void(0)" class="header-action-btn header-action-btn-menu d-xl-none d-lg-block">
                            <i class="fa fa-bars"></i>
                        </a>
                        <!-- Mobile Menu Hambarger Action Button End -->

                    </div>
                </div>
                <!-- Header Action End -->

            </div>
        </div>
    </div>
</div>
<!-- Header Bottom End -->

<!-- Mobile Menu Start -->
<div class="mobile-menu-wrapper">
    <div class="offcanvas-overlay"></div>

    <!-- Mobile Menu Inner Start -->
    <div class="mobile-menu-inner">

        <!-- Button Close Start -->
        <div class="offcanvas-btn-close">
            <i class="pe-7s-close"></i>
        </div>
        <!-- Button Close End -->

        <!-- Mobile Menu Start -->
        <div class="mobile-navigation">
            <nav>
                <ul class="mobile-menu">
                    <li class="has-children">
                        <a href="<?= base_url('') ?>">Home</a>
                        
                    </li>
                    
                    <li><a href="<?= base_url('home/gallery') ?>">Gallery</a></li>
                    <li class="has-children">
                        <a href="#">Shop <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown">
                            <?php foreach($kategori_produk as $kp){ ?>
                                <li><a href="<?= base_url('home/shop/categories/'.$kp->slug_kategori_produk) ?>"><?= $kp->nama_kategori_produk ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    
                    <li><a href="<?= base_url('home/about') ?>">About Us</a></li>
                    <li><a href="<?= base_url('home/contact') ?>">Contact</a></li>
                    <?php if($this->session->userdata('email_users')){ ?>
                        <li class="has-children">
                            <a href="#">Profil <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="dropdown">
                                <li><a href="<?= base_url('home/profil/detail/'.$this->session->userdata('id_users')) ?>">Edit Profil</a></li>
                                <li><a href="<?= base_url('auth/login/logout') ?>" onclick="return confirm('Logout?')">Logout</a></li>
                            </ul>
                        </li>
                    <?php }else{ ?>
                        <li><a href="<?= base_url('auth/login') ?>">Login</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <!-- Mobile Menu End -->

        <!-- Contact Links/Social Links Start -->
        <div class="mt-auto">

            <!-- Contact Links Start -->
            <ul class="contact-links">
                <li><i class="fa fa-phone"></i><a href="#"> +<?= $contact['no_telp_contact'] ?></a></li>
                <li><i class="fa fa-envelope-o"></i><a href="#"> <?= $contact['email_contact'] ?></a></li>
                <li><i class="fa fa-map-marker"></i> <span><?= $contact['alamat_contact'] ?></span> </li>
            </ul>
            <!-- Contact Links End -->

            <!-- Social Widget Start -->
            <div class="widget-social">
                <a title="Facebook" href="#"><i class="fa fa-facebook-f"></i></a>
                <a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                <a title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                <a title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                <a title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
            </div>
            <!-- Social Widget Ende -->
        </div>
        <!-- Contact Links/Social Links End -->
    </div>
    <!-- Mobile Menu Inner End -->
</div>
<!-- Mobile Menu End -->

<!-- Offcanvas Search Start -->
<div class="offcanvas-search">
    <div class="offcanvas-search-inner">

        <!-- Button Close Start -->
        <div class="offcanvas-btn-close">
            <i class="pe-7s-close"></i>
        </div>
        <!-- Button Close End -->

        <!-- Offcanvas Search Form Start -->
        <form class="offcanvas-search-form" action="#">
            <input type="text" placeholder="Search Product..." class="offcanvas-search-input">
        </form>
        <!-- Offcanvas Search Form End -->

    </div>
</div>
<!-- Offcanvas Search End -->

<!-- Cart Offcanvas Start -->
<div class="cart-offcanvas-wrapper">
    <div class="offcanvas-overlay"></div>

    <!-- Cart Offcanvas Inner Start -->
    <div class="cart-offcanvas-inner">

        <!-- Button Close Start -->
        <div class="offcanvas-btn-close">
            <i class="pe-7s-close"></i>
        </div>
        <!-- Button Close End -->

        <!-- Offcanvas Cart Content Start -->
        <div class="offcanvas-cart-content">
            <!-- Offcanvas Cart Title Start -->
            <h2 class="offcanvas-cart-title mb-10">Shopping Cart</h2>
            <!-- Offcanvas Cart Title End -->

            <?php foreach($cart as $item ){ ?> 

                <!-- Cart Product/Price Start -->
                <div class="cart-product-wrapper mb-6">
                    <!-- Single Cart Product Start -->
                    <div class="single-cart-product">
                        <div class="cart-product-thumb">
                            <a href="<?= base_url('home/cart') ?>">
                                <?php if($item->nama_kategori_produk == "Soft File Only"){ ?>
                                    <img class="img-fluid" src="<?= base_url('assets/uploads/softfile_only/'.$item->gambar_cart) ?>" alt="Product" />

                                <?php }elseif($item->nama_kategori_produk == "Soft File Print"){  ?>
                                    <img class="img-fluid" src="<?= base_url('assets/uploads/softfile_print/'.$item->gambar_cart) ?>" alt="Product" />

                                <?php }elseif($item->nama_kategori_produk == "Package"){  ?>
                                    <img class="img-fluid" src="<?= base_url('assets/uploads/package/'.$item->gambar_cart) ?>" alt="Product" />

                                <?php }elseif($item->nama_kategori_produk == "Print Only"){  ?>
                                    <img class="img-fluid" src="<?= base_url('assets/uploads/print_only/'.$item->gambar_cart) ?>" alt="Product" />

                                <?php } ?>
                            </a>
                        </div>
                        <div class="cart-product-content">
                            <h3 class="title"><a href="<?= base_url('home/cart') ?>"><?= $item->nama_cart ?></a></h3>
                            <span class="price">
                                <span class="new">
                                    <?php if($item->nama_kategori_produk == "Soft File Only"){ ?>

                                        Rp. <?= number_format($item->harga_variasi,0,',','.') ?>
                                    <?php }elseif($item->nama_kategori_produk == "Soft File Print"){ ?>
                                        Rp. <?= number_format($item->harga_variasi,0,',','.') ?>
                                    <?php }else{ ?>
                                        Rp. <?= number_format($item->harga_diskon,0,',','.') ?>
                                    <?php } ?>
                                </span> 
                                <?php if($item->nama_kategori_produk == "Soft File Only"){ ?>
                                    <?php if($item->harga_tambahan_biaya){ ?>
                                        <span class="">&nbsp; + <small style="font-size: 12px;">Rp. <?= number_format($item->harga_tambahan_biaya,0,',','.') ?></small></span>

                                    <?php }else{ ?>     
                                    <?php } ?>

                                <?php }else{ ?> 
                                    <?php if($item->harga_tambahan_biaya){ ?>
                                        <span class="">&nbsp; + <small style="font-size: 12px;">Rp. <?= number_format($item->harga_ukuran_jenis_cetakan + $item->harga_sub_jenis_cetakan + $item->harga_packaging + $item->harga_tambahan_biaya,0,',','.') ?></small></span>
                                    <?php }else{ ?> 
                                        <span class="">&nbsp; + <small style="font-size: 12px;">Rp. <?= number_format($item->harga_ukuran_jenis_cetakan + $item->harga_sub_jenis_cetakan + $item->harga_packaging,0,',','.') ?></small></span>
                                    <?php } ?>
                                <?php } ?>
                            </span>
                            <span class="price">
                                <?php if($item->nama_kategori_produk == "Soft File Only"){ ?>
                                        <span class=""><small style="font-size: 12px;"><h6><strong>SubSub Total</strong></h6> : Rp. <?= number_format($item->price * $item->qty,0,',','.') ?> </small></span>
                                <?php }elseif($item->nama_kategori_produk == "Package"){ ?>

                                    <?php if($item->nama_tambahan_biaya){ ?>
                                        <span class=""><small style="font-size: 12px;"><h6><strong>SubSub Total</strong></h6> : Rp. <?= number_format($item->price * $item->qty,0,',','.') ?> </small></span>
                                    <?php }else{ ?>
                                        <span class=""><small style="font-size: 12px;"><h6><strong>SubSub Total</strong></h6> : Rp. <?= number_format($item->price * $item->qty,0,',','.') ?> </small></span>

                                    <?php } ?>

                                <?php }else{ ?>

                                    <span class=""><small style="font-size: 12px;"><h6><strong>SubSub Total</strong></h6> : Rp. <?= number_format($item->price * $item->qty,0,',','.') ?> </small></span>

                                <?php } ?>
                            </span>




                        </div>
                    </div>
                    <!-- Single Cart Product End -->

                    <!-- Product Remove Start -->
                    <div class="cart-product-remove">
                        <a href="<?= base_url('home/cart/delete_cart/'.$item->id_cart) ?>" onclick="return confirm('Yakin Hapus?')"><i class="fa fa-trash"></i></a>
                        <br>
                        <a href="#"><?= $item->qty ?></a>

                    </div>
                    <!-- Product Remove End -->

                </div>
                <!-- Cart Product/Price End -->




            <?php } ?>

            <?php 

            $total = 0;
            $total_bayar = 0;
            foreach($cart as $c){

                $total = $c->price * $c->qty;
                $total_bayar += $total;
            }

            ?>


            <!-- Cart Product Total Start -->
            <div class="cart-product-total">
                <span class="value">Sub Total</span>
                <span class="price">

                  Rp. <?= number_format($total_bayar,0,',','.') ?>

              </span>
          </div>
          <!-- Cart Product Total End -->

          <!-- Cart Product Button Start -->
          <div class="cart-product-btn mt-4">
            <a href="<?= base_url('home/cart') ?>" class="btn btn-dark btn-hover-primary rounded-0 w-100">View cart</a>
            <a href="<?= base_url('home/checkout/show/'.$this->session->userdata('id_users')) ?>" class="btn btn-dark btn-hover-primary rounded-0 w-100 mt-4">Checkout</a>
        </div>
        <!-- Cart Product Button End -->

    </div>
    <!-- Offcanvas Cart Content End -->

</div>
<!-- Cart Offcanvas Inner End -->
</div>
<!-- Cart Offcanvas End -->

</div>