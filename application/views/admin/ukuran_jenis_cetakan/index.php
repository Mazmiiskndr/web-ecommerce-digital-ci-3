<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Ukuran Cetakan</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ukuran Cetakan</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/ukuran_jenis_cetakan/tambah_data') ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Ukuran Cetakan</a>
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
                            <h3 class="card-title">List Ukuran Cetakan</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">No.</th>
                                            <th class="border-bottom-0">Ukuran</th>
                                            <th class="border-bottom-0">Nama Cetakan</th>
                                            <th class="border-bottom-0">Harga</th>
                                            <th class="border-bottom-0">Berat</th>
                                            <th class="border-bottom-0">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($ukuran_jenis_cetakan as $row){
                                            ?>
                                            <tr>

                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_ukuran_jenis_cetakan ?></td>
                                                <td><?= $row->nama_jenis_cetakan ?></td>
                                                <td>Rp. <?= number_format($row->harga_ukuran_jenis_cetakan,0,',','.'); ?></td>
                                                <td><?= $row->berat_ukuran_jenis_cetakan ?> gr</td>
                                                <td>
                                                    <a href="<?= base_url('admin/ukuran_jenis_cetakan/edit_data/'.$row->id_ukuran_jenis_cetakan) ?>" class="btn btn-sm btn-icon btn-facebook"><i class="fa fa-edit"></i></a>
                                                    <a href="<?= base_url('admin/ukuran_jenis_cetakan/hapus_data/'.$row->id_ukuran_jenis_cetakan) ?>" class="btn btn-sm btn-icon btn-youtube" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
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