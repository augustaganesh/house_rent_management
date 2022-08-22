<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo-img" style="display:flex; box-shadow: 0px 3px 1px 0px rgba(0, 0, 0, 0.1);background: #fff!important"><img src="<?=base_url('/images/house_logo.jpg')?>" style="border-radius: 50%;;">

        <a href="<?=base_url() ;?>"
            class="logo-text"><span style=" color: #0c2e8a;font-size:20px!important;">Rent<span style="color: darkred;">Collection</span></span>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a href="<?=base_url('index.php');?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                </li>
            
                 <li>
                    <a href="<?=base_url('payment.php');?>">
                      <i class="fas fa-money-check"></i>Payment Status</a>

                </li>

                 <li>
                    <a href="<?=base_url('add-bank.php');?>">
                      <i class="fas fa-money-check"></i>Bank a/c</a>

                </li>

                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-city"></i>Manage renter <!-- <i class="fas fa-caret-down"></i> --></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">

                        <li>
                            <a href="<?=base_url('add-room.php');?> "><i class="fas fa-plus"></i>Add room</a>
                        </li>

                        <li>
                            <a href="<?=base_url('display_room_details.php');?>"><i class="fas fa-info-circle"></i>Renter Details</a>
                        </li>
                        <li>
                            <!-- <a href="<?=base_url('admin-control.php');?>"></a> -->
                        </li>



                    </ul>
                </li>
                <!-- <li class="has-sub">
                    <a href="<?=base_url('manage_renters.php');?>">
                        <i class="fas fa-users"></i>Manage Renters</a>

                </li> -->
                <li class="has-sub">
                    <a href="<?=base_url('issue_rent.php');?>">
                      <i class="fas fa-clone"></i>Issue Rent</a>

                </li>





                <li>
                    <a href="<?=base_url('logout.php');?> "><i class="fas fa-sign-out-alt"></i>Log Out</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
   <?php 
        $admin = $obj->Select("admin_regis","*","fullname",array($_SESSION['whois'])); ?>
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <div class="header-desktop">
        <h4 class="mr-4 mt-4 pr-3" style="float: right;font-family: poppins, sans-serif!important;">
            <a href="<?=base_url('admin-control.php');?>" class="text-muted"> <i class="fas fa-circle"></i> &nbsp;
     
            <?php foreach ($admin as $key => $value): ?>
                 <?=$value['fullname']?>
                    <?php endforeach; ?>
              </a>


</div>