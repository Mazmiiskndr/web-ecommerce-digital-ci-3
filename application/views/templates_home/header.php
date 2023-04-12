<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php 

    if($this->uri->segment(4) == "soft_file_only"){
        echo 'Produk Soft File Only - Website OTD';
    }elseif($this->uri->segment(4) == "soft_file_print"){
        echo 'Produk Soft File Print - Website OTD';
    }elseif($this->uri->segment(4) == "package"){
        echo 'Produk Package - Website OTD';
    }elseif($this->uri->segment(4) == "print_only"){
        echo 'Produk Print Only - Website OTD';
    }else{
        echo $title;
    }
?></title>
<!-- Favicons -->
<link rel="shortcut icon" href="<?= base_url('assets/uploads/') ?>faviconjangmar.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Vendor CSS (Icon Font) -->

    <!-- 
    <link rel="stylesheet" href="assets/css/vendor/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.min.css"> 
-->

<!-- Plugins CSS (All Plugins Files) -->

    <!-- 
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css" /> 
-->

<!-- Main Style CSS -->

    <!-- 
    <link rel="stylesheet" href="assets/css/style.css" /> 
-->


<!-- Use the minified version files listed below for better performance and remove the files listed above -->



<link rel="stylesheet" href="<?= base_url('assets/destry/') ?>assets/css/vendor.min.css">
<link rel="stylesheet" href="<?= base_url('assets/destry/') ?>assets/css/plugins.min.css">
<link rel="stylesheet" href="<?= base_url('assets/destry/') ?>assets/css/style.min.css">


</head>

<body>
    <div class="header section">