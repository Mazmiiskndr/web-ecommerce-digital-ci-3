<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Tambah Bank</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/bank') ?>">Bank</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Bank</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/bank') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/bank/tambah_data_aksi') ?>" method="post">
                                <div class="">
                                    <div class="form-group">
                                        <label class="form-label">Nama Bank</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nama Bank" name="nama_bank" value="<?= set_value('nama_bank') ?>">
                                        <?= form_error('nama_bank', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nama Rekening</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nama Rekening" name="nama_rekening" value="<?= set_value('nama_rekening') ?>">
                                        <?= form_error('nama_rekening', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nomor Rekening</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nomor Rekening" name="nomor_rekening" value="<?= set_value('nomor_rekening') ?>">
                                        <?= form_error('nomor_rekening', '<small class="text-danger" style="color: red;">','</small>'); ?>
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