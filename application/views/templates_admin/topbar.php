<!-- app-Header -->
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="<?= base_url('admin/dashboard') ?>">
                <img src="<?= base_url('assets/uploads/') ?>logo-text-admin3.png" class="header-brand-img light-logo1">
                <img src="<?= base_url('assets/uploads/') ?>logo-text-admin-white3.png" class="header-brand-img desktop-logo" alt="logo" width="50px">
            </a>
            <!-- LOGO -->
            <div class="main-header-center ms-3 d-none d-lg-block">
                <input class="form-control" placeholder="Search for results..." type="search">
                <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
            </div>
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <div class="dropdown d-none">
                    <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                        <i class="fe fe-search"></i>
                    </a>
                    <div class="dropdown-menu header-search dropdown-menu-start">
                        <div class="input-group w-100 p-2">
                            <input type="text" class="form-control" placeholder="Search....">
                            <div class="input-group-text btn btn-primary">
                                <i class="fe fe-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
            </button>
            <div class="navbar navbar-collapse responsive-navbar p-0">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="d-flex order-lg-2">
                        
                        <!-- SEARCH -->
                        <div class="dropdown  d-flex">
                            <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                <span class="light-layout"><i class="fe fe-sun"></i></span>
                            </a>
                        </div>
                        <!-- Theme-Layout -->
                        <div class="dropdown d-flex">
                            <a class="nav-link icon full-screen-link nav-link-bg">
                                <i class="fe fe-minimize fullscreen-button"></i>
                            </a>
                        </div>
                        
                        <!-- SIDE-MENU -->
                        <div class="dropdown d-flex profile-1">
                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                <span style="margin-right: 10px;" class="text-dark"><?= $this->session->userdata('nama_users') ?></span>
                                <img src="<?= base_url('assets/uploads/users/'.$this->session->userdata('gambar_users')) ?>" alt="profile-user"
                                class="avatar  profile-user brround cover-image">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <div class="drop-heading">
                                    <div class="text-center">
                                        <h5 class="text-dark mb-0 fs-14 fw-semibold"><?= $this->session->userdata('nama_users') ?></h5>
                                        <small class="text-muted"><?= $this->session->userdata('email_users') ?></small>
                                    </div>
                                </div>
                                <div class="dropdown-divider m-0"></div>
                                <a class="dropdown-item" href="<?= base_url('admin/users/edit_data_profil/'.$this->session->userdata('id_users')) ?>">
                                    <i class="dropdown-icon fe fe-user"></i> Profil
                                </a>
                                
                                <a class="dropdown-item text-danger" href="<?= base_url('auth/login/logout') ?>" onclick="return confirm('Logout?')" >
                                    <i class="dropdown-icon fe fe-log-out text-danger"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
            <!-- /app-Header -->