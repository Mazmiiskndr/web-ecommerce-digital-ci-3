<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Pesan</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesan</li>
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
                            <h3 class="card-title">List Pesan</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">No.</th>
                                            <th class="border-bottom-0">Nama</th>
                                            <th class="border-bottom-0">Email</th>
                                            <th class="border-bottom-0">Subjek</th>
                                            <th class="border-bottom-0">Deskripsi</th>
                                            <th class="border-bottom-0">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($pesan as $row){
                                            ?>
                                            <tr>

                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_pesan ?></td>
                                                <td><?= $row->email_pesan ?></td>
                                                <td><?= $row->subject_pesan ?></td>
                                                <td><?= word_limiter($row->deskripsi_pesan, 5) ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/pesan/detail_data/'.$row->id_pesan) ?>" class="btn btn-sm btn-icon btn-twitter"><i class="fa fa-eye"></i></a>
                                                    <a href="<?= base_url('admin/pesan/edit_data/'.$row->id_pesan) ?>" class="btn btn-sm btn-icon btn-facebook"><i class="fa fa-edit"></i></a>
                                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                                        <a href="<?= base_url('admin/pesan/hapus_data/'.$row->id_pesan) ?>" class="btn btn-sm btn-icon btn-youtube" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
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