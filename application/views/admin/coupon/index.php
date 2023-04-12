<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Coupon</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Coupon</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/coupon/tambah_data') ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Coupon</a>
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
                            <h3 class="card-title">List Coupon</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">No.</th>
                                            <th class="border-bottom-0">Nama/Kode Coupon</th>
                                            <th class="border-bottom-0">Harga</th>
                                            <th class="border-bottom-0">Sampai Tanggal</th>
                                            <th class="border-bottom-0">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($coupon as $row){
                                            ?>
                                            <tr> 

                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_coupon ?></td>
                                                <td>Rp. <?= number_format($row->harga_coupon,0,',','.'); ?></td>
                                                <td><?= date('d F, Y', strtotime($row->sampai_tanggal_coupon)) ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/coupon/edit_data/'.$row->id_coupon) ?>" class="btn btn-sm btn-icon btn-facebook"><i class="fa fa-edit"></i></a>
                                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                                        <a href="<?= base_url('admin/coupon/hapus_data/'.$row->id_coupon) ?>" class="btn btn-sm btn-icon btn-youtube" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
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