<!DOCTYPE html>
<html lang="en">
  <head>
    <!--  Title -->
    <title><?=$title?></title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Cross River State Universal Health Coverage Monitor" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?=base_url('assets/uploads/app_favicon.png')?>" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?=base_url()?>assets/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/libs/select2/dist/css/select2.min.css">
    <!-- Core Css -->
    <link  id="themeColors"  rel="stylesheet" href="<?=base_url()?>assets/css/style.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="<?=base_url('assets/css/select2.min.css')?>" rel="stylesheet" />

    <script src="<?=base_url()?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css"/>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

    <!-- Include the DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.min.css">
    <!-- Include the DataTables Buttons CSS -->
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.0/b-3.0.0/b-colvis-3.0.0/b-html5-3.0.0/b-print-3.0.0/r-3.0.0/sl-2.0.0/datatables.min.css" rel="stylesheet">
  </head>
  <body>

    <style>
      .body-wrapper>.container-fluid, .body-wrapper>.container-lg, .body-wrapper>.container-md, .body-wrapper>.container-sm, .body-wrapper>.container-xl, .body-wrapper>.container-xxl {
        max-width: inherit !important;
      }

      h1,h2,h3,h4,h5,h6{
        /* font-family: 'Darker Grotesque', sans-serif !important;
        font-weight: 700 !important; */
      }

      .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* 0.5 opacity black */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
      }

      .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #fff;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
      }

      @keyframes spin {
        to { transform: rotate(360deg); }
      }


    </style>
    <!-- Preloader -->
    <div class="preloader">
      <img src="<?=base_url('assets/uploads/app_favicon.png')?>" style="width: 100px;" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme"  data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <div id="activityRunner" class="overlay d-none"><div class="spinner"></div></div>