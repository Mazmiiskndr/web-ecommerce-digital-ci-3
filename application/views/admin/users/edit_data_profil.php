<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Profile</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/users') ?>">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/users/manager') ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <?php foreach($detail as $row){ ?>
                    <div class="col-lg-12 mb-3">
                        
                        <?= $this->session->flashdata('pesan'); ?>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Password</div>
                            </div>
                            <div class="card-body">
                                <div class="text-center chat-image mb-5">
                                    <div class="chat-profile mb-3 brround">
                                        <img alt="avatar" src="<?= base_url('assets/uploads/users/'.$row->gambar_users) ?>" class="brround" style="width: 200px;">
                                    </div>
                                    <div class="main-chat-msg-name">
                                        <a href="#">
                                            <h5 class="mb-1 text-dark fw-semibold"><?= $row->nama_users ?></h5>
                                        </a>
                                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">Role <?= $row->nama_role ?></p>
                                    </div>
                                </div>
                                <form action="<?= base_url('admin/users/edit_data_profil_aksi') ?>" method="post"  enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="form-label">Ganti Password</label>
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input class="form-control" type="password" name="password_users" placeholder="Ganti Password">
                                        </div>
                                        <small class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</small>
                                        <!-- <input type="password" class="form-control" value="password"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Profile</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="hidden" name="id_users" value="<?= $row->id_users ?>">
                                        <input type="text" class="form-control" name="email_users" value="<?= $row->email_users ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_users" value="<?= $row->nama_users ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat_users" value="<?= $row->alamat_users ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>No. HP</label>
                                        <input type="text" class="form-control" name="no_telp_users" value="<?= $row->no_telp_users ?>">
                                    </div>
                                    <?php if($this->session->userdata('role_id') == 1){ ?>
                                        <div class="form-group">
                                            <label class="form-label">Role</label>
                                            <select name="role_id" class="form-control select2 form-select">
                                                <option value="<?= $row->role_id ?>"  hidden=""><?= $row->nama_role ?></option>
                                                <?php foreach($role as $role){ 
                                                    if($role->nama_role != $row->nama_role){
                                                        ?>

                                                        <option value="<?= $role->id_role ?>"><?= $role->nama_role ?></option>
                                                    <?php } ?>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label>Upload Gambar</span>
                                        </label>
                                        <input type="file" name="gambar_users" class="form-control" value="<?= set_value('gambar_users') ?>">
                                        <small class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</small>
                                        <?= form_error('gambar_users', '<small class="text-danger" style="color: red;">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-block btn-info my-1"><i class="fa fa-edit"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- ROW-1 CLOSED -->

        </div>
        <!-- CONTAINER END -->
    </div>
</div>
<!--app-content close-->

</div>