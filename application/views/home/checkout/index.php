 <!-- Breadcrumb Section Start -->
 <div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Checkout</h1>
                <ul>
                    <li>
                        <a href="<?= base_url('') ?>">Home </a>
                    </li>
                    <li class="active"> Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Coupon Accordion Start -->
                <div class="coupon-accordion">

                    <!-- Title Start -->
                    <!-- <h3 class="title">Returning customer? <span id="showlogin">Click here to login</span></h3> -->
                    <!-- Title End -->

                    <!-- Checkout Login Start -->
                    <!-- <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text mb-2">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p> -->

                            <!-- Form Start -->
                            <!-- <form action="#"> --> 
                                <!-- Input Email Start -->
                                <!-- <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text">
                                </p> -->
                                <!-- Input Email End -->

                                <!-- Input Password Start -->
                                <!-- <p class="form-row-last">
                                    <label>Password <span class="required">*</span></label>
                                    <input type="password">
                                </p> -->
                                <!-- Input Password End -->

                                <!-- Remember Password Start -->
                                <!-- <p class="form-row mb-2">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me" class="checkbox-label">Remember me</label>
                                </p> -->
                                <!-- Remember Password End -->

                                <!-- Lost Password Start -->
                                <!-- <p class="lost-password"><a href="#">Lost your password?</a></p> -->
                                <!-- Lost Password End -->

                                <!-- </form> -->
                                <!-- Form End -->

                        <!-- </div>
                        </div> -->
                        <!-- Checkout Login End -->

                        <!-- Title Start -->
                        <!--  <h3 class="title">Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3> -->
                        <!-- Title End -->

                        <!-- Checkout Coupon Start -->
                        <!-- <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon d-flex">
                                        <input placeholder="Coupon code" type="text">
                                        <input class="btn btn-dark btn-hover-primary rounded-0" value="Apply Coupon" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div> -->
                        <!-- Checkout Coupon End -->

                    </div>
                    <!-- Coupon Accordion End -->
                </div>
            </div>
            <div class="row mb-n4">
                <div class="col-lg-6 col-12 mb-4">
                    <?php 
                    $no_transaksi = "jma-".strtolower(random_string('alnum',8)) . date('-Ymd');

                    foreach($detail as $row){ 
                        ?>
                        <!-- Checkbox Form Start -->
                        <form action="<?= base_url('home/checkout/place_order_aksi') ?>" method="post">
                            <div class="checkbox-form">

                                <!-- Checkbox Form Title Start -->
                                <h3 class="title">Billing Details</h3>
                                <!-- Checkbox Form Title End -->

                                <div class="row">

                                    <!-- NameInput Start -->
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Nama Penerima</label>
                                            <input placeholder="Nama Penerima" name="nama_users" value="<?= $row->nama_users ?>" type="text">

                                        </div>
                                    </div>
                                    <!-- NameInput End -->

                                    <!-- Email Address Input Start -->
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input placeholder="Email" name="email_users" value="<?= $row->email_users ?>" type="email" required readonly style="background: #d3d3d3;">
                                        </div>
                                    </div>
                                    <!-- Email Address Input End --> 

                                    <!-- Phone Number Input Start -->
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>No. Telepon <span class="required">*</span></label>
                                            <input type="number" class="form-control" name="no_telp_users" value="<?= $row->no_telp_users ?>" placeholder="No. Telepon" required>
                                        </div>
                                    </div>
                                    <?php 



                                    ?>
                                    <!-- Phone Number Input End -->
                                    <?php 
                                    $total_berat = 0; 
                                    $total = 0;
                                    $total_bayar = 0;
                                    ?>
                                    <?php foreach($cart as $item){ ?>
                                        <?php if($item->nama_kategori_produk != "Soft File Only"){
                                            $berat = ($item->berat_ukuran_jenis_cetakan + $item->berat_packaging) * $item->qty;
                                            $total_berat += $berat;
                                            
                                        } ?>
                                        <?php 
                                        $total = $item->price * $item->qty ;
                                        $total_bayar += $total;
                                        ?>
                                    <?php } ?>
                                    <?php if($total_berat == 0){

                                    }else{ ?>
                                        <!-- Select Country Name Start -->
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Provinsi </label>
                                                <select class="form-select" name="provinsi" required>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- Select Country Name End -->

                                        <!-- Select Country Name Start -->
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Kota/Kabupaten </label>
                                                <select class="form-select" name="kota" required>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- Select Country Name End -->

                                        <!-- Kode Pos End -->
                                    <?php } ?>

                                    <!-- Address Input Start -->
                                    <div class="order-notes">
                                        <div class="checkout-form-list checkout-form-list-2">
                                            <label>Alamat <span class="required">*</span></label>
                                            <input type="text" name="alamat_users" value="<?= $row->alamat_users ?>" placeholder="Alamat Lengkap" required>
                                        </div>
                                    </div>
                                    <small class="text-danger" style="font-size: 12px; margin-left: 5px;">Alamat harus detail!</small>
                                    <!-- Address Input End -->

                                    <!-- Bank Input Start -->
                                    <!-- <div class="col-md-6 mt-3">
                                        <div class="checkout-form-list">
                                            <label>Nama Bank <span class="required">*</span></label>
                                            <input placeholder="Nama Bank" name="nama_bank" type="text" required>
                                        </div>
                                    </div> -->
                                    <!-- Bank Input End -->

                                    <!-- Nama Rekening Start -->
                                    <!-- <div class="col-md-6 mt-3">
                                        <div class="checkout-form-list">
                                            <label>Nama Rekening <span class="required">*</span></label>
                                            <input type="text" name="nama_rekening"  placeholder="Nama Rekening" >
                                        </div>
                                    </div> -->
                                    <!-- Nama Rekening End -->

                                    <!-- Nomor Rekening Input Start -->
                                    <!-- <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Nomor Rekening <span class="required">*</span></label>
                                            <input type="number" class="form-control" name="nomor_rekening"  placeholder="Nomor Rekening" required>
                                        </div>
                                    </div> -->
                                    <!-- Nomor Rekening Input End -->
                                    <?php if($total_berat == 0){

                                    }else{ ?>
                                        <!-- Ekspesdisi Name Start -->
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Expedisi </label>
                                                <select class="form-select" name="expedisi" required>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- Ekspesdisi Name End -->

                                        <!-- Paket Name Start -->
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Paket </label>
                                                <select class="form-select" name="paket" required>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- Paket Name End -->

                                    <?php } ?>

                                    <!-- Catatan Input Start -->
                                    <div class="order-notes mb-n2">
                                        <div class="checkout-form-list checkout-form-list-2">
                                            <label>Catatan</label>
                                            <textarea cols="30" rows="10" name="catatan_transaksi" placeholder="Catatan Order"></textarea>

                                            <!-- Transaksi Value -->
                                            <input name="no_transaksi" value="<?= $no_transaksi ?>" type="hidden" readonly>
                                            <input name="id_users" value="<?= $row->id_users ?>" type="hidden" readonly>

                                            <input name="berat" value="<?= $total_berat ?>" type="hidden" readonly>
                                            <input name="ongkir" type="hidden"> 
                                            <?php if($coupon){ ?>
                                                <input name="sub_total" value="<?= $total_bayar-$coupon['harga_coupon'] ?>" type="hidden" readonly>

                                            <?php }else{ ?>
                                                <input name="sub_total" value="<?= $total_bayar ?>" type="hidden" readonly>

                                            <?php } ?>

                                            
                                            <input name="estimasi" type="hidden">
                                            <input name="total_bayar" type="hidden">
                                            <!-- End Transaksi Value -->

                                            <!-- Detak Transaksi Value -->
                                            <?php 
                                            $i = 1;
                                            foreach($cart as $item){ 
                                                ?>
                                                <?= form_hidden('qty' . $i++, $item->qty); ?>
                                                <?= form_hidden('harga_satuan' . $i++, $item->price); ?>
                                                <?= form_hidden('harga_total_satuan' . $i++, $item->price * $item->qty); ?>
                                                <?= form_hidden('nama_variasi_cart' . $i++, $item->nama_variasi_cart); ?>
                                                <?= form_hidden('harga_variasi' . $i++, $item->harga_variasi); ?>
                                            <?php } ?>
                                            <!-- End Detak Transaksi Value -->

                                        </div>
                                    </div>
                                    <!-- Catatan Input End -->

                                    <!-- Address Input Start -->
                                <!-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text">
                                    </div>
                                </div> -->
                                <!-- Address Input End -->

                                <!-- Optional Text Input Start -->
                                <!-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                </div> -->
                                <!-- Optional Text Input End -->

                                <!-- Town or City Name Input Start -->
                                <!-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div> -->
                                <!-- Town or City Name Input End -->

                                <!-- State or Country Input Start -->
                                <!-- <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div> -->
                                <!-- State or Country Input End -->

                                <!-- Postcode or Zip Input Start -->
                               <!--  <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div> -->
                                <!-- Postcode or Zip Input End -->


                                <!-- Checkout Form List checkbox Start -->
                                <!-- <div class="col-md-12">
                                    <div class="checkout-form-list create-acc">
                                        <input id="cbox" type="checkbox">
                                        <label for="cbox" class="checkbox-label">Create an account?</label>
                                    </div>
                                    <div id="cbox-info" class="checkout-form-list create-account">
                                        <p class="mb-2">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                        <label>Account password <span class="required">*</span></label>
                                        <input placeholder="Password" type="password">
                                    </div>
                                </div> -->
                                <!-- Checkout Form List checkbox End -->

                            </div>

                            <!-- Different Address Start -->
                            <!-- <div class="different-address">
                                <div class="ship-different-title">
                                    <div>
                                        <input id="ship-box" type="checkbox">
                                        <label for="ship-box" class="checkbox-label">Ship to a different address?</label>
                                    </div>
                                </div>
 
                                <div id="ship-box-info" class="row mt-2">

    
                                    <div class="col-md-12">
                                        <div class="myniceselect country-select clearfix">
                                            <label>Country <span class="required">*</span></label>
                                            <select class="myniceselect nice-select wide rounded-0">
                                                <option data-display="Bangladesh">Bangladesh</option>
                                                <option value="uk">London</option>
                                                <option value="rou">Romania</option>
                                                <option value="fr">French</option>
                                                <option value="de">Germany</option>
                                                <option value="aus">Australia</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Company Name</label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input placeholder="Street address" type="text">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>State / County <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input placeholder="" type="email">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>No. Telepon <span class="required">*</span></label>
                                            <input type="text" name="no_telp_users" value="<?= $row->no_telp_users ?>" placeholder="No. Telepon">
                                        </div>
                                    </div>
                                   
                                </div>
                              

                                <div class="order-notes mt-3 mb-n2">
                                    <div class="checkout-form-list checkout-form-list-2">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                              

                            </div> -->
                            <!-- Different Address End -->
                        </div>

                        <!-- Checkbox Form End -->
                    <?php } ?>

                </div>

                <div class="col-lg-6 col-12 mb-4">

                    <!-- Your Order Area Start -->
                    <div class="your-order-area border">

                        <!-- Title Start -->
                        <h3 class="title">Your order</h3>
                        <!-- Title End -->

                        <!-- Your Order Table Start -->
                        <div class="your-order-table table-responsive">
                            <table class="table">

                                <!-- Table Head Start -->
                                <thead>
                                    <tr class="cart-product-head">
                                        <th class="cart-product-name text-start">Product</th>
                                        <?php if($total_berat == 0 ){ ?>
                                            <th class="cart-product-total text-end">Total</th>
                                        <?php }else{ ?>
                                            <th class="cart-product-total text-end">Sub Total</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <!-- Table Head End -->

                                <!-- Table Body Start -->
                                <tbody>
                                   <?php foreach($cart as $item){ ?>
                                    <tr class="cart_item">
                                        <td class="cart-product-name text-start ps-0"><?= $item->nama_cart ?><strong class="product-quantity"> × <?= $item->qty ?></strong></td>
                                        <?php if($total_berat == 0 ){ ?>
                                            <td class="cart-product-total text-end pe-0"><span class="amount">Rp. <?= number_format($item->price * $item->qty,0,',','.') ?></span></td>
                                        <?php }else{ ?>
                                            <td class="cart-product-total text-end pe-0"><span class="amount">Rp. <?= number_format($item->price,0,',','.') ?></span></td>
                                        <?php } ?>


                                    </tr>

                                <?php } ?>
                            </tbody>
                            <!-- Table Body End -->

                            <!-- Table Footer Start -->
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th class="text-start ps-0">Cart Total</th>
                                    <td class="text-end pe-0"><span class="amount">Rp. <?= number_format($total_bayar,0,',','.') ?> </span></td>
                                </tr>
                                <?php if($total_berat){ ?>
                                    <tr class="cart_item">
                                        <td class="cart-product-name text-start ps-0">Shipping Cost</td>
                                        <td class="cart-product-total text-end pe-0"><span class="amount" id="ongkir"></span></td>
                                    </tr>
                                <?php } ?>
                                <?php if($coupon){ ?>
                                    <?php if($coupon['id_users'] == $this->session->userdata('id_users')){ ?>
                                        <tr class="cart_item">
                                            <td class="cart-product-name text-start ps-0">Coupon</td>
                                            <td class="cart-product-total text-end pe-0"><span class="amount">- Rp. <?= number_format($coupon['harga_coupon'],0,',','.') ?></span></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                
                                <tr class="order-total">
                                    <th class="text-start ps-0">Order Total</th>
                                    <td class="text-end pe-0"><strong><span class="amount" id="order_total">
                                        <?php if($coupon){ ?>
                                            <?php if($coupon['id_users'] == $this->session->userdata('id_users')){ ?>
                                                Rp. <?= number_format($total_bayar - $coupon['harga_coupon'],0,',','.') ?>
                                            <?php }else{ ?>
                                                Rp. <?= number_format($total_bayar,0,',','.') ?>

                                            <?php } ?>
                                        <?php }else{ ?>
                                            Rp. <?= number_format($total_bayar,0,',','.') ?>
                                        <?php } ?>
                                    </span></strong></td>
                                </tr>
                                <?php if($total_berat){ ?>
                                 <tr class="order-total">
                                    <th class="text-start ps-0">Total Berat</th>
                                    <td class="text-end pe-0"><strong><span class="amount">
                                        <?= $total_berat ?> <small>gr</small>
                                    </span></strong></td>
                                </tr>
                            <?php } ?>
                        </tfoot>
                        <!-- Table Footer End -->

                    </table>
                </div>
                <!-- Your Order Table End -->

                <!-- Payment Accordion Order Button Start -->
                <div class="payment-accordion-order-button">
                    
                    <div class="order-button-payment">
                        <button type="submit" class="btn btn-dark btn-hover-primary rounded-0 w-100">Place Order</button>
                    </div>
                </div>
                <!-- Payment Accordion Order Button End -->
            </form>
        </div>
        <!-- Your Order Area End -->
    </div>
</div>
</div>
</div>
<!-- Checkout Section End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            url: "<?= base_url('home/checkout/provinsi') ?>",
            success: function(hasil_provinsi){
                    // console.log(hasil_provinsi);
                    $("select[name=provinsi]").html(hasil_provinsi);
                }
            });
        $("select[name=provinsi]").on("change",function(){
            var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('home/checkout/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota){
                    // console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
        $("select[name=kota]").on("change",function(){
            $.ajax({
                type: "POST",
                url: "<?= base_url('home/checkout/expedisi') ?>",
                success: function(hasil_expedisi){
                    // console.log(hasil_expedisi);
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });

        });

        $("select[name=expedisi]").on("change",function(){
         var expedisi_terpilih = $("select[name=expedisi]").val();

         var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr("id_kota");
         var total_berat = <?= $total_berat ?>;
         $.ajax({
            type: "POST",
            url: "<?= base_url('home/checkout/paket') ?>",
            data: 'expedisi=' + expedisi_terpilih + '&id_kota='+ id_kota_tujuan_terpilih + '&berat=' + total_berat,
            success: function(hasil_paket){
                    // console.log(hasil_paket);
                    $("select[name=paket]").html(hasil_paket);
                }
            });

     });

        function number_format(number, decimals, decPoint, thousandsSep){
            decimals = decimals || 0;
            number = parseFloat(number);

            if(!decPoint || !thousandsSep){
                decPoint = '.';
                thousandsSep = ',';
            }

            var roundedNumber = Math.round( Math.abs( number ) * ('1e' + decimals) ) + '';
            var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
            var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
            var formattedNumber = "";

            while(numbersString.length > 3){
                formattedNumber += thousandsSep + numbersString.slice(-3)
                numbersString = numbersString.slice(0,-3);
            }

            return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
        }

        $("select[name=paket]").on("change",function(){
         // Menampilkan Harga Ongkir
         var data_ongkir = $("option:selected",this).attr("ongkir");
         $('#ongkir').html("+ Rp. " + number_format(data_ongkir, 0, '.', '.' ));

         // Menampilkan Total Bayar
         var ongkir = $("option:selected",this).attr("ongkir");


         var tot_bayar = parseInt(ongkir) + 
         <?php if($coupon){?>
            <?php if($coupon['id_users'] == $this->session->userdata('id_users')){ ?>
                parseInt(<?= $total_bayar - $coupon['harga_coupon']?> )
            <?php }else{ ?>
                parseInt(<?= $total_bayar ?>)
            <?php } ?>
        <?php }else{ ?>
            parseInt(<?= $total_bayar ?>)
        <?php } ?>
        $('#order_total').html("Rp. " + number_format(tot_bayar, 0, '.', '.' ));

       // Menampilkan Estimasi dan Ongkir 
       var estimasi =  $("option:selected",this).attr("estimasi");
       $("input[name=estimasi]").val(estimasi);
       $("input[name=ongkir]").val(data_ongkir);
       $("input[name=total_bayar]").val(tot_bayar);
   }); 

    });
</script>