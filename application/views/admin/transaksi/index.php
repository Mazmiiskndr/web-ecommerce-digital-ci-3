<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Laporan & Hasil</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan & Hasil</li>
                    </ol>
                    
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Laporan & Hasil</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">No.</th>
                                            <th class="border-bottom-0">Nama Pembeli</th>
                                            <th class="border-bottom-0">No. Transaksi</th>
                                            <th class="border-bottom-0">Status Pembayaran</th>
                                            <th class="border-bottom-0">Status Transaksi</th>
                                            <?php if($this->session->userdata('role_id') == 1){ ?>
                                                <th class="border-bottom-0">Pembayaran</th>
                                            <?php } ?>
                                            
                                            <th class="border-bottom-0">Tanggal</th>
                                            <th class="border-bottom-0">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($transaksi as $row){
                                            ?>
                                            <tr>

                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_users ?></td>
                                                <td>#<?= strtoupper($row->no_transaksi) ?></td>
                                                <td class="text-center">
                                                    <?php if($row->status_pembayaran == 0 ){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-danger rounded-pill text-white p-2 px-3"><i class="fa fa-exclamation-circle"></i> Belum di bayar!</span>
                                                        </div>
                                                    <?php }elseif($row->status_pembayaran == 1){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-warning rounded-pill text-white p-2 px-3"><i class="fa fa-refresh"></i> Pembayaran Sedang di cek!</span>
                                                        </div>
                                                    <?php }elseif($row->status_pembayaran == 2){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-success rounded-pill text-white p-2 px-3"><i class="fa fa-check-circle"></i> Pembayaran di terima!</span>
                                                        </div>
                                                    <?php }elseif($row->status_pembayaran == 3){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-danger rounded-pill text-white p-2 px-3"><i class="fa fa-times-circle"></i> Pembayaran di tolak!</span>
                                                        </div>
                                                    <?php } ?> 
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php if($row->status_transaksi == 0 ){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-dark rounded-pill text-white p-2 px-3"> - </span>
                                                        </div>
                                                    <?php }elseif($row->status_transaksi == 1){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-info rounded-pill text-white p-2 px-3"><i class="fa fa-cube"></i> Dikemas!</span>
                                                        </div>
                                                    <?php }elseif($row->status_transaksi == 2){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-primary rounded-pill text-white p-2 px-3"><i class="fa fa-truck"></i> Dikirim!</span>
                                                        </div>
                                                    <?php }elseif($row->status_transaksi == 3){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-warning rounded-pill text-white p-2 px-3"><i class="fa fa-undo"></i> Retur!</span>
                                                        </div>
                                                    <?php }elseif($row->status_transaksi == 4){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-success rounded-pill text-white p-2 px-3"><i class="fa fa-check-circle"></i> Selesai!</span>
                                                        </div>
                                                    <?php }elseif($row->status_transaksi == 5){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-info rounded-pill text-white p-2 px-3"><i class="fa fa-refresh"></i> Retur sedang dicek!</span>
                                                        </div>
                                                    <?php }elseif($row->status_transaksi == 6){ ?>
                                                        <div class="mt-sm-1 d-block">
                                                            <span
                                                            class="btn btn-sm bg-danger rounded-pill text-white p-2 px-3"><i class="fa fa-times"></i> Retur di tolak!</span>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <?php if($this->session->userdata('role_id') == 1){ ?>
                                                    <td class="text-center">
                                                        <?php if($row->bukti_pembayaran == NULL ){ ?>
                                                            <div class="mt-sm-1 d-block">
                                                                <a href="#" 
                                                                class="btn btn-sm bg-danger rounded-pill text-white p-2 px-3"><i class="fa fa-exclamation-circle"></i> Kosong!</a>
                                                            </div>
                                                        <?php }else{ ?>
                                                            <div class="mt-sm-1 d-block">
                                                                <a href="<?= base_url('admin/transaksi/konfirmasi_pembayaran/'.$row->id_transaksi) ?>" 
                                                                    class="btn btn-sm bg-success rounded-pill text-white p-2 px-3"><i class="fa fa-pencil"></i> Konfirmasi!</a>
                                                                </div>
                                                            <?php } ?>
                                                        </td>
                                                    <?php } ?>
                                                    <td><?= date('d F, Y', strtotime($row->created_at)) ?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/transaksi/detail_data/'.$row->no_transaksi) ?>" class="btn btn-sm btn-icon btn-twitter"><i class="fa fa-eye"></i></a>
                                                        <a href="<?= base_url('admin/transaksi/edit_data/'.$row->no_transaksi) ?>" class="btn btn-sm btn-icon btn-facebook"><i class="fa fa-edit"></i></a>
                                                        <?php if($this->session->userdata('role_id') == 1){ ?>
                                                            <a href="<?= base_url('admin/transaksi/hapus_data/'.$row->no_transaksi) ?>" class="btn btn-sm btn-icon btn-youtube" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
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