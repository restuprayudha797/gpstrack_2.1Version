<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title><?= $title ?></title>

    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?= base_url('assets/backend/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/backend/') ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>build/css/custom.min.css" rel="stylesheet">

    <!-- data tables -->
    <link href="<?= base_url('assets/backend/') ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/backend/') ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/92aabb25e4.js" crossorigin="anonymous"></script>

    <style>
        :root {

            scroll-behavior: smooth;
        }

        #notification {

            animation: fade 15s infinite;
        }

        @keyframes fade {
            50% {
                opacity: 0.00;
            }
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">