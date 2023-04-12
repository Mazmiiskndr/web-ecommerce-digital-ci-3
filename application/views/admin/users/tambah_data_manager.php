<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Tambah Data Manager</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/users/manager') ?>">Manager</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Manager</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/users/manager') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/users/tambah_data_manager_aksi') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama_users" placeholder="Masukan Nama Lengkap" value="<?= set_value('nama_users') ?>">
                                            <?= form_error('nama_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="no_telp_users" placeholder="Masukan No. Telepon/WA" value="<?= set_value('no_telp_users') ?>">
                                            <?= form_error('no_telp_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <input type="email" class="form-control" name="email_users" placeholder="Masukan Email" value="<?= set_value('email_users') ?>">
                                    <?= form_error('email_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                </div>
                                <div class="form-group ">
                                    <input type="password" class="form-control" name="password_users" placeholder="Masukan Password" value="<?= set_value('password_users') ?>">
                                    <?= form_error('password_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                </div>
                                <div class="form-group ">
                                    <textarea name="alamat_users" cols="0" rows="2" class="form-control" placeholder="Masukan Alamat"></textarea>
                                    <?= form_error('alamat_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="gambar_users" class="form-control" value="<?= set_value('gambar_users') ?>">
                                    <small class="text-warning">Kosongkan saja jika tidak ingin memakai photo Profil!</small>
                                    <?= form_error('gambar_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                </div>
                                <div class="form-footer mt-2">
                                    <button type="submit"class="btn btn-block btn-primary"><i class="fa fa-plus-circle"></i> Tambah</button>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
    <!--app-content close-->

</div>