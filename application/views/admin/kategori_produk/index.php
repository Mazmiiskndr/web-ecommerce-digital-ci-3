<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Kategori Produk</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori Produk</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row row-cards">
                <!-- COL-END -->
                <div class="col-xl-12 col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-11">
                            <div class="row">
                                <?php foreach($kategori_produk as $row){ ?>
                                    <div class="col-sm-6 col-md-6 col-xl-6 alert">
                                        <div class="card">
                                            <div class="product-grid6">
                                                <div class="product-image6 p-5">
                                                 
                                                    <a href="<?= base_url('admin/kategori_produk/edit_data/'.$row->id_kategori_produk) ?>" class="bg-light">
                                                        <img class="img-fluid br-7 w-100" src="<?= base_url('assets/uploads/kategori_produk/'.$row->gambar_kategori_produk) ?>" alt="img">
                                                    </a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="product-content text-center">
                                                        <h1 class="title fw-bold fs-20"><a href="<?= base_url('admin/kategori_produk/edit_data/'.$row->id_kategori_produk) ?>"><?= $row->nama_kategori_produk ?></a></h1>
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <a href="<?= base_url('admin/kategori_produk/edit_data/'.$row->id_kategori_produk) ?>" class="btn btn-info mx-2 mb-1"><i class="fe fe-edit me-2"></i>Edit</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div>
                <!-- ROW-1 CLOSED -->
            </div>
            <!-- ROW-1 END-->
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
<!--app-content closed-->
</div>