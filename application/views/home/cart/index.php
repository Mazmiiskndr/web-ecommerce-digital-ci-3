<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Shopping Cart</h1>
                <ul>
                    <li>
                        <a href="<?= base_url() ?>">Home </a>
                    </li>
                    <li class="active"> Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row">
            <div class="col-12">

                <!-- Cart Table Start -->
                <div class="cart-table table-responsive">
                    <form action="<?= base_url('home/cart/update_cart') ?>" method="post">
                        <table class="table table-bordered">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Gambar</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Sub Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                                <?php $i =1; foreach($cart as $row) { ?>
                                    <?php echo form_hidden($i.'[id_cart]', $row->id_cart); ?>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#">
                                            <?php if($row->nama_kategori_produk == "Soft File Only"){ ?>
                                                <img class="img-fluid" src="<?= base_url('assets/uploads/softfile_only/'.$row->gambar_cart) ?>" alt="Product" />

                                            <?php }elseif($row->nama_kategori_produk == "Soft File Print"){  ?>
                                                <img class="img-fluid" src="<?= base_url('assets/uploads/softfile_print/'.$row->gambar_cart) ?>" alt="Product" />

                                            <?php }elseif($row->nama_kategori_produk == "Package"){  ?>
                                                <img class="img-fluid" src="<?= base_url('assets/uploads/package/'.$row->gambar_cart) ?>" alt="Product" />

                                            <?php }elseif($row->nama_kategori_produk == "Print Only"){  ?>
                                                <img class="img-fluid" src="<?= base_url('assets/uploads/print_only/'.$row->gambar_cart) ?>" alt="Product" />

                                            <?php } ?>


                                        </a></td>
                                        <td class="pro-title">
                                            <small><?= $row->nama_kategori_produk ?></small>
                                            <br>
                                            <a href="#"><?= $row->nama_cart ?></a>
                                        </td>

                                        <td class="pro-price">
                                            <span>
                                                <?php if($row->nama_kategori_produk == "Soft File Only"){ ?>
                                                    Rp. <?= number_format($row->harga_variasi,0,',','.') ?>
                                                <?php }elseif($row->nama_kategori_produk == "Soft File Print"){ ?>
                                                    Rp. <?= number_format($row->harga_variasi,0,',','.') ?>
                                                <?php }else{ ?>
                                                    Rp. <?= number_format($row->harga_diskon,0,',','.') ?>
                                                <?php } ?>
                                            </span>
                                            <?php if($row->nama_kategori_produk == "Soft File Only"){ ?>
                                                <?php if($row->harga_tambahan_biaya){ ?>
                                                    <br>
                                                    <small style="color: #808080;"><?= $row->nama_variasi_cart ?></small>
                                                    <br>
                                                    <small style="color: #808080;"><?= $row->nama_tambahan_biaya ?> + Rp. <?= number_format($row->harga_tambahan_biaya,0,',','.') ?></small>
                                                    <br>
                                                <?php }else{ ?>
                                                    <br>
                                                    <small style="color: #808080;"><?= $row->nama_variasi_cart ?></small>

                                                <?php } ?>
                                            <?php }elseif($row->nama_kategori_produk == "Soft File Print"){ ?>
                                                <?php if($row->harga_tambahan_biaya){ ?>
                                                    <br>
                                                    <small style="color: #808080;"><?= $row->nama_variasi_cart ?></small>
                                                    <?php if($row->nama_sub_jenis_cetakan){ ?>
                                                    <br> <small style="color: #808080;"><?= $row->nama_sub_jenis_cetakan ?></small>
                                                    <?php } ?>
                                                    <br> <small style="color: #808080;"><?= $row->nama_ukuran_jenis_cetakan ?> + Rp. <?= number_format($row->harga_ukuran_jenis_cetakan,0,',','.') ?></small>
                                                    
                                                    <br> <small style="color: #808080;"><?= $row->nama_packaging ?> + Rp. <?= number_format($row->harga_packaging,0,',','.') ?></small>
                                                    <br> <small style="color: #808080;"><?= $row->nama_tambahan_biaya ?> + Rp. <?= number_format($row->harga_tambahan_biaya,0,',','.') ?></small>
                                                <?php }else{ ?>
                                                     <?php if($row->nama_sub_jenis_cetakan){ ?>
                                                    <br> <small style="color: #808080;"><?= $row->nama_sub_jenis_cetakan ?></small>
                                                    <?php } ?>
                                                    <br>
                                                    <small style="color: #808080;"><?= $row->nama_variasi_cart ?></small>
                                                    <br> <small style="color: #808080;"><?= $row->nama_ukuran_jenis_cetakan ?> + Rp. <?= number_format($row->harga_ukuran_jenis_cetakan,0,',','.') ?></small>
                                                   
                                                    <br> <small style="color: #808080;"><?= $row->nama_packaging ?> + Rp. <?= number_format($row->harga_packaging,0,',','.') ?></small>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <?php if($row->nama_kategori_produk == "Package"){ ?>
                                                    <?php if($row->harga_tambahan_biaya){ ?>
                                                        <br> <small style="color: #808080;"><?= $row->nama_packaging ?> + Rp. <?= number_format($row->harga_packaging,0,',','.') ?></small>
                                                        <br> <small style="color: #808080;"><?= $row->nama_tambahan_biaya ?> + Rp. <?= number_format($row->harga_tambahan_biaya,0,',','.') ?></small>
                                                    <?php }else{ ?>

                                                       <br> <small style="color: #808080;"><?= $row->nama_packaging ?> + Rp. <?= number_format($row->harga_packaging,0,',','.') ?></small>
                                                   <?php } ?>
                                               <?php }else{ ?>
                                                <?php if($row->harga_tambahan_biaya){ ?>
                                                    <br> <small style="color: #808080;"><?= $row->nama_ukuran_jenis_cetakan ?> + Rp. <?= number_format($row->harga_ukuran_jenis_cetakan,0,',','.') ?></small>
                                                    <br> <small style="color: #808080;"><?= $row->nama_sub_jenis_cetakan ?> + Rp. <?= number_format($row->harga_sub_jenis_cetakan,0,',','.') ?></small>
                                                    <br> <small style="color: #808080;"><?= $row->nama_packaging ?> + Rp. <?= number_format($row->harga_packaging,0,',','.') ?></small>
                                                    <br> <small style="color: #808080;"><?= $row->nama_tambahan_biaya ?> + Rp. <?= number_format($row->harga_tambahan_biaya,0,',','.') ?></small>
                                                <?php }else{ ?>
                                                 <br> <small style="color: #808080;"><?= $row->nama_ukuran_jenis_cetakan ?> + Rp. <?= number_format($row->harga_ukuran_jenis_cetakan,0,',','.') ?></small>
                                                 <br> <small style="color: #808080;"><?= $row->nama_sub_jenis_cetakan ?> + Rp. <?= number_format($row->harga_sub_jenis_cetakan,0,',','.') ?></small>
                                                 <br> <small style="color: #808080;"><?= $row->nama_packaging ?> + Rp. <?= number_format($row->harga_packaging,0,',','.') ?></small>
                                             <?php } ?>
                                         <?php } ?>

                                     <?php } ?>
                                 </td>

                                 <td class="pro-quantity">
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" name="<?= $i++ ?>[qty] " value="<?= $row->qty ?>" type="text">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                            <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                        </div>
                                    </div>
                                </td> 
                                <td class="pro-subtotal"><span>
                                    Rp. <?= number_format($row->price * $row->qty,0,',','.'); ?>

                                </span></td> 
                                <td class="pro-remove"><a href="<?= base_url('home/cart/delete_cart/'.$row->id_cart) ?>"><i class="pe-7s-trash"></i></a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <!-- Table Body End -->

                </table>
            </div>
            <!-- Cart Table End -->

            <!-- Cart Update Option Start -->
            <div class="cart-update-option d-block d-md-flex justify-content-between">

                <!-- Apply Coupon Wrapper Start -->
                <div class="apply-coupon-wrapper">
                    <span class="btn btn-dark btn-hover-primary " data-toggle="modal" data-target="#exampleModal">Apply Coupon</span>
                </div>
                <!-- Apply Coupon Wrapper End -->

                <!-- Cart Update Start -->
                <div class="cart-update mt-sm-16">
                    <button type="submit" class="btn btn-dark btn-hover-primary ">Update Cart</button>
                </div>
                <!-- Cart Update End -->

                <!-- Continue Shopping Start -->
                <div class="cart-update mt-sm-16">
                    <a href="<?= base_url('home/categories') ?>" class="btn btn-dark btn-hover-primary ">Continue Shopping</a>
                </div>
                <!-- Continue Shopping End -->

            </div>
            <!-- Cart Update Option End -->

        </div>
    </div>
</form>

<div class="row">
    <div class="col-lg-5 ms-auto col-custom">

        <!-- Cart Calculation Area Start -->
        <div class="cart-calculator-wrapper">

            <!-- Cart Calculate Items Start -->
            <div class="cart-calculate-items">

                <!-- Cart Calculate Items Title Start -->
                <h3 class="title">Cart Totals</h3>
                <!-- Cart Calculate Items Title End -->
                <?php 

                $total = 0;
                $total_bayar = 0;
                foreach($cart as $c){

                    $total = $c->price * $c->qty;
                    $total_bayar += $total;
                }

                ?>
                <!-- Responsive Table Start -->
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td>Sub Total</td>
                            <td> Rp. <?= number_format($total_bayar,0,',','.') ?></td>
                        </tr>
                        <?php if($cart){ ?>
                            <?php if($coupon){ ?>
                                <?php if($coupon['id_users'] == $this->session->userdata('id_users')){ ?>
                                    <tr>
                                        <td>Coupon</td>
                                        <td> - Rp. <?= number_format($coupon['harga_coupon'],0,',','.') ?></td>
                                    </tr>
                                <?php }else{} ?>
                            <?php } ?>
                        <?php } ?>

                        <tr class="total">
                            <td>Total</td>
                            <td class="total-amount"> 
                                <?php if($cart){ ?>
                                    <?php if($coupon){ ?>
                                        <?php if($coupon['id_users'] == $this->session->userdata('id_users')){ ?>
                                            Rp. <?= number_format($total_bayar - $coupon['harga_coupon'],0,',','.') ?>
                                        <?php }else{ ?>
                                         Rp. <?= number_format($total_bayar,0,',','.') ?>

                                     <?php } ?>
                                 <?php }else{?>
                                    Rp. <?= number_format($total_bayar,0,',','.') ?>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- Responsive Table End -->

        </div>
        <!-- Cart Calculate Items End -->

        <!-- Cart Checktout Button Start -->
        <a href="<?= base_url('home/checkout/show/'.$this->session->userdata('id_users')) ?>" class="btn btn-dark btn-hover-primary rounded-0 w-100">Proceed To Checkout</a>
        <!-- Cart Checktout Button End -->

    </div>
    <!-- Cart Calculation Area End -->

</div>
</div>

</div>
</div>
<!-- Shopping Cart Section End -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form action="<?= base_url('home/cart/applycoupon') ?>" method="post">
        <div class="form-group">
            <label>Coupon Code</label>
            <input type="text" name="nama_coupon" class="form-control" placeholder="Please Enter Coupon Code" required>
            <input type="hidden" name="sampai_tanggal_coupon" class="form-control" value="<?= date('Y-m-d') ?>">
        </div>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-dark">Save changes</button>
    </form>
</div>
</div>
</div>
</div>