<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Data Administrator</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Administrator</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/users/tambah_data_admin') ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Administrator</a>
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
                            <h3 class="card-title">List Administrator</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">No.</th>
                                            <th class="border-bottom-0">Gambar</th>
                                            <th class="border-bottom-0">Nama</th>
                                            <th class="border-bottom-0">Email</th>
                                            <th class="border-bottom-0">No. HP</th>
                                            <th class="border-bottom-0">Role</th>
                                            <th class="border-bottom-0">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($users as $row){
                                            if($row->role_id == 2){
                                                ?>
                                                <tr>

                                                    <td><?= $no++ ?></td>
                                                    <td class="text-center"><img src="<?= base_url('assets/uploads/users/'.$row->gambar_users) ?>" alt="Gambar" width="40" class="img-circle avatar avatar-md br-7"></td>
                                                    <td><?= $row->nama_users ?></td>
                                                    <td><?= $row->email_users ?></td>
                                                    <td><?= $row->no_telp_users ?></td>
                                                    <td><?= $row->nama_role ?></td>

                                                    <td>
                                                        <a href="<?= base_url('admin/users/edit_data_admin/'.$row->id_users) ?>" class="btn btn-sm btn-icon btn-facebook"><i class="fa fa-edit"></i></a>
                                                        <a href="<?= base_url('admin/users/hapus_data_admin/'.$row->id_users) ?>" class="btn btn-sm btn-icon btn-youtube" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            <?php } ?>
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