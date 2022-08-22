<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Rentbox</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Vendor CSS Files -->
    <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/ionicons/css/ionicons.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/animate.css/animate.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/venobox/venobox.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/owl.carousel/assets/owl.carousel.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" />
    <!-- Template Main CSS File -->
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/stylesheet.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/jquery.bxslider.css')?>">
    <!-- Favicons -->

</head>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous"></script>
<script>
history.pushState();
</script>

<!-- <body onload="fetch();" oncontextmenu="return false"> -->
    <body>

    <!-- ======= Header ======= -->
    <header id="header" class="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <h1><img src="<?=base_url('assets/img/house_logo.jpg')?>"/><a href="<?=base_url()?>" class="scrollto">
                        Rent<span>Collection</span></a></h1>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="<?=base_url()?>">Home</a></li>
                    <li class=""><a href="<?=base_url()?>">About us</a></li>
                     <li class="menu-has-children">
                   <a href="">Login</a>
                    
            <ul>
                 Choose login type
              <li><a href="<?=base_url('/admin')?>">Admin</a></li>
              <li><a href="<?=base_url('customer_login.php')?>">Renter</a></li>
            </ul>
          </li>
            
                    <?php if(isset($_SESSION['cust_login']) && $_SESSION['cust_login'] == 'true'.$_SESSION['getCustomerId']){ ?>
                    <li><a href="<?=base_url()."logout.php"?>">Log Out</a></li>
                    <?php  } ?>

                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- End Header -->


    <style>
        .item-bg {
      position: relative!important;
      /*text-align: center;*/
      color: white;
    }

        .top-left {
  position: absolute;
  top: 5%;
  left: 4%;
  
}
    </style>

    <div class="item-bg mainbanner" style="background-image: url('assets/img/bannerhome.jpg');">
          <div class="top-left">
              <h1 class="font-weight-bold" style="line-height: 1.2;color:brown;font-size: 3.5rem;">Pay your <br>rent online<br>
                    <h2 style="color: brown">Stay Home &#124;&#124; Stay Safe</h2>
              </h1>
          </div>
        
    </div>

        <!-------------For Notice Closing------------------------------- -->
        <!-------------------------------------------------------------- -->
        <script>
        var closebtns = document.getElementsByClassName("close");
        var i;

        for (i = 0; i < closebtns.length; i++) {
          closebtns[i].addEventListener("click", function() {
            this.parentElement.style.display = 'none';
          });
        }
        </script>