<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Sub Kategori Jenis Cetakan</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/sub_jenis_cetakan') ?>">Sub Kategori Jenis Cetakan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Sub Kategori Jenis Cetakan</li>
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
                            <?php foreach($detail as $row){ ?>
                                <form action="<?= base_url('admin/sub_jenis_cetakan/edit_data_aksi') ?>" method="post">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="form-label">Sub Jenis Cetakan</label>
                                            <input type="hidden" name="id_sub_jenis_cetakan" value="<?= $row->id_sub_jenis_cetakan ?>">
                                            <input type="text" class="form-control"name="nama_sub_jenis_cetakan" value="<?= $row->nama_sub_jenis_cetakan ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Kategori Jenis Cetakan</label>
                                            <select name="id_jenis_cetakan"class="form-control select2" required>

                                                <option value="<?= $row->id_jenis_cetakan ?>" selected hidden=""><?= $row->nama_jenis_cetakan ?></option>

                                                <?php foreach($jenis_cetakan as $jc){ ?>
                                                    <option value="<?= $jc->id_jenis_cetakan ?>"><?= $jc->nama_jenis_cetakan ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Harga Cetakan</label>
                                            
                                            <input type="number" class="form-control"name="harga_sub_jenis_cetakan" value="<?= $row->harga_sub_jenis_cetakan ?>">
                                        </div>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-block btn-info mb-0"><i class="fa fa-edit"></i> Edit</button>
                                </form>
                            <?php } ?>
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