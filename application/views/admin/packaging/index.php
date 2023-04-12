<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Packaging</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Packaging</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/packaging/tambah_data') ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Packaging</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Packaging</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">No.</th>
                                            <th class="border-bottom-0">Nama Packaging</th>
                                            <th class="border-bottom-0">Deskripsi</th>
                                            <th class="border-bottom-0">Harga</th>
                                            <th class="border-bottom-0">Berat</th>
                                            <th class="border-bottom-0">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($packaging as $row){
                                            ?>
                                            <tr>

                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_packaging ?></td>
                                                <td><?= word_limiter($row->deskripsi_packaging, 5) ?></td>
                                                <td>Rp. <?= number_format($row->harga_packaging,0,',','.'); ?></td>
                                                <td><?= $row->berat_packaging ?><small>gr</small></td>
                                                <td>
                                                    <a href="<?= base_url('admin/packaging/edit_data/'.$row->id_packaging) ?>" class="btn btn-sm btn-icon btn-facebook"><i class="fa fa-edit"></i></a>
                                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                                        <a href="<?= base_url('admin/packaging/hapus_data/'.$row->id_packaging) ?>" class="btn btn-sm btn-icon btn-youtube" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>

                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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