<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Tambah Data Soft File Print</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/produk/kategori_produk/soft_file_print/') ?>">Soft File Print</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Soft File Print</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/produk/kategori_produk/soft_file_print/') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row row-cards">

                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data</h3>
                        </div>
                        <form action="<?= base_url('admin/produk/tambah_data_softfile_print_aksi') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Nama <span class="text-red">*</span></label>
                                            <input type="text" name="nama_softfile_print" class="form-control" placeholder="Masukan Nama">
                                            <?= form_error('nama_softfile_print', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                             <label class="form-label">Variasi <span class="text-red">*</span></label>
                                            <input type="text" name="variasi_softfile_print" class="form-control" placeholder="Masukan Variasi">
                                            <?= form_error('variasi_softfile_print', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Dimensi <span class="text-red">*</span></label>
                                            <input type="text" name="dimensi_softfile_print" class="form-control" placeholder="Masukan Dimensi">
                                                <small class="text-info" style="margin-left: 10px;">Boleh dikosongkan!</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Harga <span class="text-red">*</span></label>
                                            <input type="number" name="harga_softfile_print" class="form-control" placeholder="Masukan Jumlah Harga">
                                            <?= form_error('harga_softfile_print', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Diskon <span class="text-red">*</span></label>
                                            <input type="number" name="diskon_softfile_print" class="form-control" placeholder="Masukan Jumlah Diskon">
                                                <small class="text-info" style="margin-left: 10px;">Tidak perlu diisi jika tidak ada Diskon!</small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Jenis Cetakan <span class="text-red">*</span></label>
                                            
                                            <select name="id_jenis_cetakan" class="form-control select" required>
                                                <option value="" selected disabled hidden="">-- Pilih Jenis Cetakan -- </option>
                                                <?php foreach($jenis_cetakan as $jc){ ?>
                                                    <option value="<?= $jc->id_jenis_cetakan ?>"><?= $jc->nama_jenis_cetakan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Deskripsi <span class="text-red">*</span></label>
                                            <textarea name="deskripsi_softfile_print" class="content" cols="0" rows="3" placeholder="Masukan Deskripsi"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Thumbnail<span class="text-red">*</span></label>
                                            <input type="file" name="gambar_softfile_print" class="form-control" value="<?= set_value('gambar_softfile_print') ?>" required> 
                                            <small class="text-info">Thumbnail adalah tampilah pertama dari Produk!</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Gambar 1 <span class="text-red">*</span></label>
                                            <input type="file" name="gambar1_softfile_print" class="form-control" value="<?= set_value('gambar1_softfile_print') ?>" > 
                                            <small class="text-info">Tidak perlu diisi jika ingin dikosongkan!</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Gambar 2 <span class="text-red">*</span></label>
                                            <input type="file" name="gambar2_softfile_print" class="form-control" value="<?= set_value('gambar2_softfile_print') ?>" > 
                                            <small class="text-info">Tidak perlu diisi jika ingin dikosongkan!</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Gambar 3 <span class="text-red">*</span></label>
                                            <input type="file" name="gambar3_softfile_print" class="form-control" value="<?= set_value('gambar3_softfile_print') ?>"> 
                                            <small class="text-info">Tidak perlu diisi jika ingin dikosongkan!</small>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus-circle"></i> Tambah Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW-1 CLOSED -->
            </div>
            <!-- ROW-1 END -->


        </div>
        <!-- CONTAINER END -->
    </div>
</div>
<!--app-content close-->

</div>