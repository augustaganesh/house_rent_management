<?php

if(isset($_POST['submit']) && $_POST['submit'] == 'pay'){
    $acname = $_POST['ac_name'];
    $ac = $_POST['bac_no'];
    $user = $_SESSION['customer_name'];
    $userDetails = $obj->select("customers","*","cid",array($user));
    $userBank = $userDetails[0]['ac_name'];
    $userac = $userDetails[0]['bac_no'];
    if($acname == $userBank && $ac == $userac){
        // header("Location:customer_individual_details.php?action=showpay");
         $data['customer'] = $_SESSION['customer_name'];
    $data['rent'] = $_POST['id'];
    $data['status'] = 1;
    // print_r($data); die;
    $obj->insert('rent_status',$data);
      echo '<script>alert("Your rent is successfully paid")</script>';
    echo "<script> window.location.href='".base_url("customer_individual_details.php?action=pay&id=".$_POST['id'])."'</script>";
    }else{
         $_SESSION['error'] = "Invalid entry ! <br> Please enter valid a/c number and try again.";
        
    }
}
$acdetail = $obj->select('admin_bank_ac');
?>
<style>
body{
    font-family: ubuntu,sans-serif!important;
  
}

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

 <div class="container" style="margin-top:-2rem;overflow: hidden!important">
 	<div class="row justify-content-center">
 	<div class="col-md-6 shadow p-4">
        <h2 class="font-weight-bold">Rent Payment <span class="text-success font-weight-bold" style="font-size: 23px!important;  font-family: ubuntu,sans-serif!important;"><small>*Secure</small></h2>
            <h5 style="font-family: ubuntu, sans-serif;">Your payment will be send into this account.</h5>
 		<form  method="post">
                        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                        <div class="p-2" style="border:1px solid #e7e7e7;border-left: 3px solid blue; padding-left: 4px;  font-family: ubuntu,sans-serif!important;">
                         <?php if($acdetail){ ?>
                        <h5 class="h66" style="border-bottom: 1px solid #e7e7e7;padding-bottom:7px;">Your owner's bank a/c details</h5>
                        <style>
                            .h66{
                                line-height: 0.5!important;
                                font-family: ubuntu, sans-serif;
                            }
                        </style>
                            <?php foreach ($acdetail as $key => $value): ?>
                             <h6 class="h66">Bank Name : <?=$value['bank_name'];?> </h6>
                            <h6 class="h66">Account Name : <?=$value['ac_name'];?> </h6>
                            <h6 class="h66">Account No : <?=$value['ac_no'];?> </h6>
                             <?php endforeach; ?>
                             

                        <?php }else{ ?>
                          <p style="color:red;">Your owner haven't added any account!</p>

                             <?php } ?>

                         </div><br>

                        <div style="border-bottom: 2px solid #e7e7e7;"></div><br>

                         <div class="form-group">
                          <label>Your Bank name</label> 

                          <input type="text" class="form-control" name="bank_name" id="bankname" placeholder="Enter your bank name" required>
                          </div>


                        <div class="form-group">
                          <label>Your a/c name</label> 

                          <input type="text" class="form-control" name="ac_name" id="acname" placeholder="Enter your bank account name" required>
                          </div>


                          <div class="form-group">
                          	 <label>Your bank a/c no</label>
                            <input type="text" class="form-control" name="bac_no" id="acno" aria-describedby="emailHelp" placeholder="Enter valid bank a/c number" required="required" maxlength="14">
                           
                          </div>
                            
                             <?php if (isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['error'];unset($_SESSION['error']);  ?>
                                </div>
                            <?php }  ?>


                          <button type="submit" class="btn btn-block btn-primary" name="submit" value="pay" onclick="return confirm('Are you sure you want to pay?')">Pay</button>
                        </form>
           </div>
 	</div>
 </div>
 </div>
 <div style="min-height:40vh;"></div>