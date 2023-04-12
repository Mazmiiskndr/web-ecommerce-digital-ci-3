<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- container -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Gallery</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                    <div class="mt-3" style="float: right;">
                        <a href="<?= base_url('admin/gallery/tambah_data') ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah Gallery</a>
                    </div>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- GALLERY DEMO OPEN -->
            <?= $this->session->flashdata('pesan'); ?>
            
            <div class="demo-gallery card">
                <div class="card-header">
                    <div class="card-title">Light Gallery</div>
                </div>
                <div class="card-body">
                    <ul id="lightgallery" class="list-unstyled row">
                        <?php foreach($gallery as $row){ ?>
                            <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom border" data-responsive="<?= base_url('assets/uploads/gallery/'.$row->gambar_gallery) ?>" data-src="<?= base_url('assets/uploads/gallery/'.$row->gambar_gallery) ?>" data-sub-html="<a href='<?= base_url('admin/gallery/edit_data/'.$row->id_gallery) ?>' class='btn btn-sm btn-primary'><i class='fa fa-edit'></i> Edit</a>  <a href='<?= base_url('admin/gallery/hapus_data/'.$row->id_gallery) ?>' class='btn btn-sm btn-danger' onclick='return confirm(`Yakin ingin menghapus?`)'><i class='fa fa-trash'></i> Hapus</a>">
                                <a href="">
                                    <img class="img-responsive br-5" src="<?= base_url('assets/uploads/gallery/'.$row->gambar_gallery) ?>" alt="Thumb-1">
                                </a>
                                
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- GALLERY DEMO CLOSED -->


        </div>
        <!-- container closed -->
    </div>
</div>
<!--app-content open-->
</div>