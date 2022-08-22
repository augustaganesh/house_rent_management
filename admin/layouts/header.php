<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Rentbox Admin Pannel</title>

    <!-- Fontfaces CSS-->
    <link href="<?=base_url('layouts/css/font-face.css" rel="stylesheet')?>" media="all">
    <link href="<?=base_url('layouts/vendor/font-awesome-4.7/css/font-awesome.min.css')?>" rel="stylesheet" media="all">
    <link href="<?=base_url('layouts/vendor/font-awesome-5/css/fontawesome-all.min.css')?>" rel="stylesheet"
        media="all">
    <link href="<?=base_url('layouts/vendor/mdi-font/css/material-design-iconic-font.min.css')?>" rel="stylesheet"
        media="all">
        <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('layouts/css/bootstrap.min.css')?>">


    <!-- custom styles -->
    <link href="<?=base_url('layouts/css/theme.css')?>" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="<?=base_url('layouts/css/style.css')?>">
</head>

<body class="">
    <?php if(isset($_SESSION['admin-status'])=='loggedin') { ?>

    <div class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo-img" href="<?=base_url();?> ">
                        <img src="images/icon.PNG" alt="AMS" />
                        <a href="<?= exit_url();?>">
                            <h2 class="mobile-logo-text"> H<span>MS</span></h2>
                        </a>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Admin Control</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <!-- <li>
                                    <a href="login.php">Login</a>
                                </li> -->
                            <!-- <li class="has-sub" style="margin-left: 35px;">
                                    <a  href="<?=base_url('add-admin.php');?> "> <i class="fas fa-user"></i>Add Admin</a>
                                </li> -->
                            <li class="has-sub" style="margin-left: 35px;">
                                <a href="<?=base_url('admin-control.php');?>"><i class="fas fa-tv"></i>Display Admin</a>
                            </li>



                        </ul>
                    </li>

                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-users"></i>Manage Renters</a>

                    </li>
                    <li>
                        <a href="<?=base_url('logout.php');?> ">
                            <i class="fas fa-sign-out-alt"></i>Logout</a>

                    </li>


                </ul>
            </div>
        </nav>
    </div>




    <?php } ?>