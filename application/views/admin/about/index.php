<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">About</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>              
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pengaturan About </h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/about/edit_data_aksi') ?>" method="post"
                                 enctype="multipart/form-data">
                                <div class="form-row mb-3">
                                    <div class="col">
                                        <label>Judul</label>
                                        <input type="hidden" name="id_about" class="form-control" value="<?= $about['id_about'] ?>">
                                        <input type="text" name="judul_about" class="form-control" value="<?= $about['judul_about'] ?>">
                                    </div>
                                    <div class="col">
                                        <label>Subjek</label>
                                        <input type="text" name="subjek_about" class="form-control" value="<?= $about['subjek_about'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control mb-4" name="deskripsi_about" placeholder="Textarea" rows="4"><?= $about['deskripsi_about'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Gambar About</label>
                                    <input type="file" name="gambar_about" class="form-control" value="<?= set_value('gambar_about') ?>">
                                    <small class="text-danger ml-3" style="margin-left: 5px;">Ukuran gambar harus 1772x1772 !</small>
                                    <br>
                                    <img src="<?= base_url('assets/uploads/about/'.$about['gambar_about']) ?>" alt="Slider Image" class="img-thumbnail mt-3" width="345px"/>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Visi Misi</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Visi Misi 1</label>
                                    <input type="text" class="form-control" name="visi_misi1" value="<?= $about['visi_misi1'] ?>" required>
                                    <?= form_error('visi_misi1', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Visi Misi 1</label>
                                    <textarea class="form-control mb-4" name="deskripsi_visi_misi1" placeholder="Textarea" rows="4"><?= $about['deskripsi_visi_misi1'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Visi Misi 2</label>
                                    <input type="text" class="form-control" name="visi_misi2" value="<?= $about['visi_misi2'] ?>" required>
                                    <?= form_error('visi_misi2', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Visi Misi 2</label>
                                    <textarea class="form-control mb-4" name="deskripsi_visi_misi2" placeholder="Textarea" rows="4"><?= $about['deskripsi_visi_misi2'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Visi Misi 3</label>
                                    <input type="text" class="form-control" name="visi_misi3" value="<?= $about['visi_misi3'] ?>" required>
                                    <?= form_error('visi_misi3', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Visi Misi 3</label>
                                    <textarea class="form-control mb-4" name="deskripsi_visi_misi3" placeholder="Textarea" rows="4"><?= $about['deskripsi_visi_misi3'] ?></textarea>
                                </div>

                            </div>
                            
                        </div>

                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="btn btn-block btn-info"><i class="fa fa-edit"></i> Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->

    </div>
    <!-- CONTAINER END -->
</div>
</div>
<!--app-content close-->

</div>