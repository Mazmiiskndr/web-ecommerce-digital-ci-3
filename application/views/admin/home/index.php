<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Home</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>                </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <?= $this->session->flashdata('pesan'); ?>
                    </div>

                    <form action="<?= base_url('admin/home/edit_data_aksi') ?>" method="post" enctype="multipart/form-data">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Home</h3>
                                </div> 
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Judul Banner 1</label>
                                        <input type="hidden" name="id_home" value="<?= $home['id_home'] ?>">
                                        <input type="text" class="form-control" name="judul_home1" value="<?= $home['judul_home1'] ?>" required>
                                        <?= form_error('judul_home1', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Banner 1</label>
                                        <textarea class="form-control mb-4" name="deskripsi_home1" placeholder="Textarea" rows="4"><?= $home['deskripsi_home1'] ?></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label>Judul Banner 2</label>
                                        <input type="text" class="form-control" name="judul_home2" value="<?= $home['judul_home2'] ?>" required>
                                        <?= form_error('judul_home2', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Banner 2</label>
                                        <textarea class="form-control mb-4" name="deskripsi_home2" placeholder="Textarea" rows="4"><?= $home['deskripsi_home2'] ?></textarea>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col">
                                            <label>Gambar Banner 1</label>
                                            <input type="file" name="gambar_home1" class="form-control" value="<?= set_value('gambar_home1') ?>">
                                            <small class="text-danger ml-3" style="margin-left: 5px;">Ukuran gambar harus 1920x753 !</small>
                                            <img src="<?= base_url('assets/uploads/home/'.$home['gambar_home1']) ?>" alt="Slider Image" class="img-thumbnail mt-3" />

                                        </div>
                                        <div class="col">
                                            <label>Gambar Banner 2</label>
                                            <input type="file" name="gambar_home2" class="form-control" value="<?= set_value('gambar_home2') ?>">
                                            <small class="text-danger ml-3" style="margin-left: 5px;">Ukuran gambar harus 1920x753 !</small>
                                            <img src="<?= base_url('assets/uploads/home/'.$home['gambar_home2']) ?>" alt="Slider Image" class="img-thumbnail mt-3" />
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-block btn-info my-1"><i class="fa fa-edit"></i> Update</button>
                                </div>
                            </div>
                        </div>


                    </div>

                </form>
                <!-- ROW-1 CLOSED -->

            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
    <!--app-content close-->

</div>
