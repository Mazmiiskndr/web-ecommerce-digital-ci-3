<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Edit Reviews</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active"> Edit Reviews</li>
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

                <div class="col-lg-12 col-custom">

                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative">

                        <!-- Product Head Start -->
                        <form action="<?= base_url('home/shop/edit_reviews_aksi/') ?>" method="post">
                            <h4>Edit a reviews</h4>
                            <div class="row mb-2">

                                <div class="col">
                                    <small class="text-dart">Nama <span class="text-danger">*</span></small>

                                    <input type="hidden" name="id_reviews" value="<?= $row->id_reviews ?>" readonly>
                                    <input type="text" name="nama_reviews" class="form-control" placeholder="Masukan Nama" value="<?= $row->nama_reviews ?>" required>
                                </div>
                                <div class="col">
                                    <small class="text-dart">Email <span class="text-danger">*</span></small>
                                    <input type="email" name="email_reviews" class="form-control" placeholder="Masukan Email" value="<?= $row->email_reviews ?>" readonly required>
                                </div>

                            </div>
                            <div class="row mb-3">

                                <div class="col">
                                    <small class="text-dart">Deskripsi <span class="text-danger">*</span></small>
                                    <textarea name="deskripsi_reviews" class="form-control" rows="3" placeholder="Deskripsi..." required><?= $row->deskripsi_reviews ?></textarea>
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
        </div>
    </div>
    <!-- Single Product Section End -->
    <?php } ?>