<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-Ukuran title">Tambah Sub Kategori Jenis Cetakan</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/sub_jenis_cetakan') ?>">Sub Kategori Jenis Cetakan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Sub Kategori Jenis Cetakan</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/sub_jenis_cetakan') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/sub_jenis_cetakan/tambah_data_aksi') ?>" method="post">
                                <div class="">
                                    <div class="form-group">
                                        <label class="form-label">Sub  Jenis Cetakan</label>
                                        <input type="text" class="form-control" placeholder="Masukan Sub Kategori Jenis Cetakan" name="nama_sub_jenis_cetakan">
                                        <?= form_error('nama_sub_jenis_cetakan', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div> 
                                    <div class="form-group">
                                        <label class="form-label">Kategori Jenis Cetakan</label>
                                        <select name="id_jenis_cetakan"class="form-control select" required>

                                            <option value="" selected disabled hidden="">-- Pilih Kategori Jenis Cetakan --</option>

                                            <?php foreach($jenis_cetakan as $jc){ ?>
                                                <option value="<?= $jc->id_jenis_cetakan ?>"><?= $jc->nama_jenis_cetakan ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Harga Cetakan</label>
                                        <input type="number" class="form-control" placeholder="Masukan Harga Cetakan" name="harga_sub_jenis_cetakan">
                                        <?= form_error('harga_sub_jenis_cetakan', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-block btn-primary mb-0"><i class="fa fa-plus-circle"></i> Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
        <!-- CONTAINER END -->
    </div>
</div>
<!--app-content close-->

</div>