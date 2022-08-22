<?php
// print_r($_SESSION);
if (!isset($_SESSION['cust_login']) || $_SESSION['cust_login'] != 'true'.$_SESSION['getCustomerId']) {
	echo "<script> window.location.href='".base_url()."'</script>";
}
if(isset($_GET['action']) && $_GET['action'] == 'cancel')
{
    $cus = $_SESSION['getCustomerId'];
    $obj->delete('rent_status',"rent_id",array($_GET['id']));
	echo "<script> window.location.href='".base_url('customer_individual_details')."'</script>";


}
if(isset($_GET['action']) && $_GET['action'] == 'pay')
{
    $data['customer'] = $_SESSION['getCustomerId'];
    $data['rent'] = $_GET['id'];
    $data['status'] = 1;
    $obj->insert('rent_status',$data);
	echo "<script> window.location.href='".base_url('customer_individual_details')."'</script>";

}
// $cust_name = $_SESSION['getCustomerId'];
$msg = $obj->select('roominfo','msg','room_owner',array($_SESSION['getCustomerId']));
$msg = $msg[0]['msg'];
$rentList = $obj->select('issue_rent');


?>
<style>
    #intro{
        display: none !important;
    }
    .mainbanner{
        display: none;
    }
    .header{
        display: none;
    }
</style>
<div class="container-fluid" style="margin-top:-55px;">
    <div class="row justify-content-center">
        <div class="col-md-5" style="min-height:80vh;">
               <h4 class="font-weight-bold"> Dear <br>
                <?php
                $name=$_SESSION['customer_name'];
                $c_name=$obj->select('customers','*','cid',array($name));
                echo $c_name[0]['customer_name'];
                ?> !</h4>       
                <h5>This is your rentlist for year <em> <?=date('Y');?>.</em></h5>
            
                <br>

            <table class="table table table-responsive-lite table-hover">

                <tr style="background: #f1f1f1;">
                    <th>SN</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th>Payment</th>
                   
                </tr>
                <?php foreach($rentList as $key=>$value) : $x= $y = $k = 0; ?>
                <tr>
                    <td><?=++$key;?></td>
                    <td><?=$value['month'];?></td>
                    <td><?=$value['amount'];?></td>


                    <td><?php
                        $rentID = $value['issue_id'];
                        $cus = $_SESSION['getCustomerId'];
                        $rentStatus = $obj->select('rent_status','*','rent',array($rentID),"AND customer = '$cus'");
                        if($rentStatus){ ?>
                        <button readonly class="btn btn-sm btn-info"><i class="fa fa-check"></i>  Paid</button>
                        
                        <!-- <a href="<?=base_url('customer_individual_details.php?action=cancel&id='.$rentStatus[0]['rent_id']);?>"
                            class="text-danger">Undo</a> -->


                        <?php }else{ ?>
                        <a href="<?=base_url('verify_customer_payment.php?action=verify&id='.$value['issue_id']);?>"
                            class="btn btn-sm btn-primary">Pay</a>
                            <!-- modal  -->
          
                            <!-- end model  -->

                        <?php   }  ?>


                    </td>
                    <?php endforeach ; ?>
            <td>
             <!-- Button trigger modal -->
               
                <!-- Modal -->
          
         </tr>
            
            </table>
        </div>

        <div class="col-md-1"></div>
         <div class="col-md-2">
            <h6 style="cursor: pointer;" onclick="showNotification()">
              <i class="fa fa-bell text-dark"></i> Notifications</h6>
                <div class="hidden shadow-sm p-2" id="msg">
                    <h5 class="text-dark pt-2 pb-2"><?php
                     if($msg != '') {
                         echo "<p style='font-size:14px;'>"."Your house owner sent you a message."."<hr>";
                     

                        echo "<p style='color:#000;font-size:14px;font-family:verdana;'>".$msg . "</p>";
                    }else{
                        echo "<p style='font-size:16px;'>"."No new message."."";
                     
                    }
                    ?><h5>

                 </div> 
        </div>

        <div class="col-md-3">
            <div onclick="showProfile()">
                <img src="assets/profile/<?=$c_name[0]['profile'];?>" alt="Room Holder" class="rounded-circle" style="cursor: pointer;max-width: 30px;min-height: 30px;">

                     <span style="color:darkslategrey;cursor: pointer;font-weight: bold;"><?php echo $c_name[0]['customer_name']; ?> <i class="fa fa-caret-down text-dark"></i></span>
                 </div>

                    <div class="profile shadow p-2 myprofile" id="profDetail" style="margin-top:10px;margin-left:5px;border: 2px solid #e7e7e7;">
                     <h5 style="border-bottom:2px solid #c7c7c7;font-weight: 500;font-family: roboto, sans-serif;">Profile 

                        <span class="ml-4"      style="font-size: 1rem!important;">
                        <a href="<?=base_url('update_renter_profile.php')?>"
                        class="text-info"><i class="fa fa-edit text-info"></i> Update Profile
                       </a>
                        </span>
                    </h5>
    
                        <p style="font-weight:bold;margin-top: -10px;color: darkslategrey;">
                            
                        </p>
                        <p><i class="fa fa-map-marker text-dark" aria-hidden="true"></i> Address : <?php echo $c_name[0]['address']; ?> 
                        </p>

                        <p><i class="fa fa-phone text-dark" aria-hidden="true"></i> Phone : <?php echo $c_name[0]['phone']; ?>
                        </p>

                        <p><i class="fa fa-envelope text-dark" aria-hidden="true"></i> Email : <?php echo $c_name[0]['email']; ?>
                        </p>

                     

                       <p> <i class="fa fa-building text-dark" aria-hidden="true"></i> Bank Name :   <?php echo $c_name[0]['bank_name']; ?></p>
                       
                       <p><i class="fa fa-money  text-dark" aria-hidden="true"></i> Bank a/c no :  <?php echo $c_name[0]['bac_no']; ?></p>

                   <hr>
                        <p style="font-size:1.1rem">
                            <a href="<?=base_url('renterlogout.php');?>" class="text-secondary">Logout <i class="fa fa-sign-out  text-dark"></i></a>
                        </p>


                 </div>








           
        </div>
        <div class="col-md-2">

    </div>
           
        <style>
        .myprofile p{
            line-height: 1.2!important;
            font-size: 0.6rem;
        }
             .hidden{
            display : none;
            }       
        </style>


        <style>
             .profile{
            display : none;
            }       
        </style>


         <script>
               function showNotification() {
                var div = document.getElementById("msg");
                div.classList.toggle('hidden'); 
                }

                 function showProfile() {
                var div = document.getElementById("profDetail");
                div.classList.toggle('profile'); 
                }

          </script>


        
        


            