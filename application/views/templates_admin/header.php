<!doctype html>
    <html lang="en" dir="ltr">

    <head>

        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

        <!-- Favicons -->
        <link rel="shortcut icon" href="<?= base_url('assets/uploads/') ?>faviconjangmar.png">

        <!-- TITLE -->
        <title>
            <?php 

            if($this->uri->segment(4) == "soft_file_only"){
                echo 'Produk Soft File Only';
            }elseif($this->uri->segment(4) == "soft_file_print"){
                echo 'Produk Soft File Print';
            }elseif($this->uri->segment(4) == "package"){
                echo 'Produk Package';
            }elseif($this->uri->segment(4) == "print_only"){
                echo 'Produk Print Only';
            }else{
                echo $title;
            }
            ?>
        </title>

        <!-- BOOTSTRAP CSS -->
        <link id="style" href="<?= base_url('assets/admin/') ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <!-- STYLE CSS -->
        <link href="<?= base_url('assets/admin/') ?>/assets/css/style.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin/') ?>/assets/css/dark-style.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin/') ?>/assets/css/transparent-style.css" rel="stylesheet">
        <link href="<?= base_url('assets/admin/') ?>/assets/css/skin-modes.css" rel="stylesheet" />
        
        <!--- FONT-ICONS CSS -->
        <link href="<?= base_url('assets/admin/') ?>/assets/css/icons.css" rel="stylesheet" />

        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/admin/') ?>/assets/colors/color1.css" />

    </head>

    <body class="app sidebar-mini ltr light-mode">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="<?= base_url('assets/admin/') ?>/assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main"> 