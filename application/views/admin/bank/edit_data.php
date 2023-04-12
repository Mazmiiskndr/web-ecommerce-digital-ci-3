<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Bank</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/bank') ?>">Bank</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Bank</li>
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
                            <?php foreach($detail as $row){ ?>
                                <form action="<?= base_url('admin/bank/edit_data_aksi') ?>" method="post">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="form-label">Nama Bank</label>
                                            <input type="hidden" name="id_bank" value="<?= $row->id_bank ?>">
                                            <input type="text" class="form-control"name="nama_bank" value="<?= $row->nama_bank ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nama Rekening</label>
                                            <input type="text" class="form-control"name="nama_rekening" value="<?= $row->nama_rekening ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nomor Rekening</label>
                                            <input type="text" class="form-control"name="nomor_rekening" value="<?= $row->nomor_rekening ?>">
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