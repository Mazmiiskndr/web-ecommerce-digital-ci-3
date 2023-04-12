<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Tambahan Biaya</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambahan Biaya</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/tambahan_biaya/tambah_data') ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Tambahan Biaya</a>
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
                            <h3 class="card-title">List Tambahan Biaya</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">No.</th>
                                            <th class="border-bottom-0">Nama Tambahan Biaya</th>
                                            <th class="border-bottom-0">Deskripsi</th>
                                            <th class="border-bottom-0">Harga</th>
                                            <th class="border-bottom-0">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($tambahan_biaya as $row){
                                            ?>
                                            <tr>

                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_tambahan_biaya ?></td>
                                                <td><?= word_limiter($row->deskripsi_tambahan_biaya, 5) ?></td>
                                                <td>Rp. <?= number_format($row->harga_tambahan_biaya,0,',','.'); ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/tambahan_biaya/edit_data/'.$row->id_tambahan_biaya) ?>" class="btn btn-sm btn-icon btn-facebook"><i class="fa fa-edit"></i></a>
                                                    <a href="<?= base_url('admin/tambahan_biaya/hapus_data/'.$row->id_tambahan_biaya) ?>" class="btn btn-sm btn-icon btn-youtube" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
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