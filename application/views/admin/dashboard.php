<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Dashboard</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total User</h6>
                                            <h2 class="mb-0 number-font"><?= $jumlah_users ?></h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="saleschart"
                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total Produk</h6>
                                            <h2 class="mb-0 number-font"><?= $jumlah_softfile_only + $jumlah_softfile_print + $jumlah_package + $jumlah_print_only ?></h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="leadschart"
                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total Penjualan</h6>
                                            <h2 class="mb-0 number-font"><?= ($jumlah_transaksi) ? $jumlah_transaksi : '0'?></h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="profitchart"
                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total Pendapatan</h6>
                                            <h2 class="mb-0 number-font">
                                                Rp. 
                                                <?= 
                                                ($jumlah_pendapatan) ?
                                                number_format($jumlah_pendapatan,0,',','.')
                                                :
                                                "0"
                                                ?>
                                                
                                            </h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="costchart"
                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 END -->

            <!-- ROW-2 -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Transaksi</h3>
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
                <!-- COL END -->
            </div>
            <!-- ROW-2 END -->
        </div>
        <!-- CONTAINER END -->
    </div>
</div>
<!--app-content close-->

</div>
