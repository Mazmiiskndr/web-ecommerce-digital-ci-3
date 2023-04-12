<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Data Print Only</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/produk/kategori_produk/print_only/') ?>">Print Only</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Print Only</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/produk/kategori_produk/print_only/') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <?php foreach($detail as $row){ ?>
                <!-- ROW-1 OPEN -->
                <div class="row row-cards">

                    <div class="col-xl-12 col-lg-12">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row row-sm">
                                        <div class="col-xl-5 col-lg-12 col-md-12">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="product-carousel">
                                                        <div id="Slider" class="carousel slide border" data-bs-ride="false">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active"><img src="<?= base_url('assets/uploads/print_only/'.$row->gambar_print_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                                    <div class="text-center mt-5 mb-5 btn-list">
                                                                    </div>
                                                                </div>


                                                                <?php if($row->gambar1_print_only && $row->gambar2_print_only && $row->gambar3_print_only){ ?>
                                                                   <!-- Gambar Banyak Belum -->
                                                                   <div class="carousel-item"> <img src="<?= base_url('assets/uploads/print_only/'.$row->gambar1_print_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                                    <div class="text-center mb-5 mt-5 btn-list">
                                                                    </div>
                                                                </div>
                                                                <div class="carousel-item"> <img src="<?= base_url('assets/uploads/print_only/'.$row->gambar2_print_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                                    <div class="text-center mb-5 mt-5 btn-list">
                                                                    </div>
                                                                </div>
                                                                <div class="carousel-item"> <img src="<?= base_url('assets/uploads/print_only/'.$row->gambar3_print_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                                    <div class="text-center mb-5 mt-5 btn-list">
                                                                    </div>
                                                                </div>
                                                            <?php }elseif($row->gambar1_print_only){ ?>
                                                             <div class="carousel-item"> <img src="<?= base_url('assets/uploads/print_only/'.$row->gambar1_print_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                                <div class="text-center mb-5 mt-5 btn-list">
                                                                </div>
                                                            </div>

                                                        <?php }elseif($row->gambar2_print_only){ ?>
                                                         <div class="carousel-item"> <img src="<?= base_url('assets/uploads/print_only/'.$row->gambar2_print_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                            <div class="text-center mb-5 mt-5 btn-list">
                                                            </div>
                                                        </div>
                                                    <?php }elseif($row->gambar3_print_only){ ?>
                                                     <div class="carousel-item"> <img src="<?= base_url('assets/uploads/print_only/'.$row->gambar3_print_only) ?>" alt="img" class="img-fluid mx-auto d-block">
                                                        <div class="text-center mb-5 mt-5 btn-list">
                                                        </div>
                                                    </div>
                                                <?php }else{} ?>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix carousel-slider">
                                        <div id="thumbcarousel" class="carousel slide" data-bs-interval="t">
                                            <div class="carousel-inner">
                                                <ul class="carousel-item active">
                                                    <li data-bs-target="#Slider" data-bs-slide-to="0" class="thumb active m-2"><img src="<?= base_url('assets/uploads/print_only/'.$row->gambar_print_only) ?>" alt="img"></li>
                                                    <?php if($row->gambar1_print_only && $row->gambar2_print_only && $row->gambar3_print_only){ ?>
                                                        <!-- Gambar Banyak Belum -->
                                                        <li data-bs-target="#Slider" data-bs-slide-to="1" class="thumb m-2"><img src="<?= base_url('assets/uploads/print_only/'.$row->gambar1_print_only) ?>" alt="img"></li>
                                                        <li data-bs-target="#Slider" data-bs-slide-to="2" class="thumb m-2"><img src="<?= base_url('assets/uploads/print_only/'.$row->gambar2_print_only) ?>" alt="img"></li>
                                                        <li data-bs-target="#Slider" data-bs-slide-to="3" class="thumb m-2"><img src="<?= base_url('assets/uploads/print_only/'.$row->gambar3_print_only) ?>" alt="img"></li>
                                                    <?php }elseif($row->gambar1_print_only){ ?>
                                                        <li data-bs-target="#Slider" data-bs-slide-to="1" class="thumb m-2"><img src="<?= base_url('assets/uploads/print_only/'.$row->gambar1_print_only) ?>" alt="img"></li>
                                                    <?php }elseif($row->gambar2_print_only){ ?>
                                                        <li data-bs-target="#Slider" data-bs-slide-to="1" class="thumb m-2"><img src="<?= base_url('assets/uploads/print_only/'.$row->gambar2_print_only) ?>" alt="img"></li>
                                                    <?php }elseif($row->gambar3_print_only){ ?>
                                                        <li data-bs-target="#Slider" data-bs-slide-to="1" class="thumb m-2"><img src="<?= base_url('assets/uploads/print_only/'.$row->gambar3_print_only) ?>" alt="img"></li>
                                                    <?php } ?>



                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <div class="mt-2 mb-4">

                                <form action="<?= base_url('admin/produk/edit_data_print_only_aksi') ?>" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nama <span class="text-red">*</span></label>
                                                    <input type="hidden" name="id_print_only" value="<?= $row->id_print_only ?>">
                                                    <input type="text" name="nama_print_only" class="form-control" value="<?= $row->nama_print_only ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Variasi <span class="text-red">*</span></label>
                                                    <input type="text" name="variasi_print_only" class="form-control" value="<?= $row->variasi_print_only ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Harga <span class="text-red">*</span></label>
                                                    <input type="number" name="harga_print_only" class="form-control" value="<?= $row->harga_print_only ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Diskon <span class="text-red">*</span></label>
                                                    <input type="number" name="diskon_print_only" class="form-control" value="<?= $row->diskon_print_only ?>" placeholder="Diskon">
                                                    <small class="text-info" style="margin-left: 10px;">Tidak perlu diisi jika tidak ada Diskon!</small>
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Dimensi <span class="text-red">*</span></label>
                                                    <input type="text" name="dimensi_print_only" class="form-control" value="<?= $row->dimensi_print_only ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Jenis Cetakan <span class="text-red">*</span></label>
                                                    
                                                    <select name="id_jenis_cetakan" class="form-control select" required>
                                                        <option value="<?= $row->id_jenis_cetakan ?>" selected hidden="">-- <?= $row->nama_jenis_cetakan ?> -- </option>
                                                        <?php foreach($jenis_cetakan as $jc){ ?>
                                                            <option value="<?= $jc->id_jenis_cetakan ?>"><?= $jc->nama_jenis_cetakan ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Deskripsi <span class="text-red">*</span></label>
                                                    <textarea name="deskripsi_print_only" class="content" cols="0" rows="3" ><?= $row->deskripsi_print_only ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Thumbnail<span class="text-red">*</span></label>
                                                    <input type="file" name="gambar_print_only" class="form-control" value="<?= set_value('gambar_print_only') ?>"> 
                                                    <small class="text-info">Thumbnail adalah tampilah pertama dari Produk!</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Gambar 1 <span class="text-red">*</span></label>
                                                    <input type="file" name="gambar1_print_only" class="form-control" value="<?= set_value('gambar1_print_only') ?>" > 
                                                    <small class="text-info">Tidak perlu diisi jika tidak ingin diganti!</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Gambar 2 <span class="text-red">*</span></label>
                                                    <input type="file" name="gambar2_print_only" class="form-control" value="<?= set_value('gambar2_print_only') ?>" > 
                                                    <small class="text-info">Tidak perlu diisi jika tidak ingin diganti!</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Gambar 3 <span class="text-red">*</span></label>
                                                    <input type="file" name="gambar3_print_only" class="form-control" value="<?= set_value('gambar3_print_only') ?>"> 
                                                    <small class="text-info">Tidak perlu diisi jika tidak ingin diganti!</small>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info btn-block"><i class="fa fa-edit"></i> Update Data</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ROW-1 CLOSED -->
<?php } ?>
</div>
<!-- ROW-1 END -->


</div>
<!-- CONTAINER END -->
</div>
</div>
<!--app-content close-->

</div>