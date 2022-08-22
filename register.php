<?php 
session_start(); 
require_once ("config/config.php");
require_once ("config/db.php");


     if(!empty($_POST) && $_POST['submit']=='submit'){    

        // file upload

       if($_FILES['profile']['name'] !='')
       {
          
        $imgName = $_FILES['profile']['name'];
        $tmp_name = $_FILES['profile']['tmp_name'];
        $imageFileType = strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
        $filename= md5(microtime()).".".$imageFileType;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG  files are allowed.";

            
        }else{
           
            $location='assets/profile'.'/'.$filename;
            move_uploaded_file($tmp_name, $location);//upload file
            $_POST['profile'] = $filename;
        }       
       }


          if(!empty($_POST) && $_POST['submit']=='submit'){    

        // file upload

       if($_FILES['citizenship']['name'] !='')
       {
          
        $imgName = $_FILES['citizenship']['name'];
        $tmp_name = $_FILES['citizenship']['tmp_name'];
        $imageFileType = strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
        $filename= md5(microtime()).".".$imageFileType;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG  files are allowed.";

            
        }else{
           
            $location='assets/profile'.'/'.$filename;
            move_uploaded_file($tmp_name, $location);//upload file
            $_POST['citizenship'] = $filename;
        }       
       }
   }





        $old = $_POST;
        $username=$_POST['customer_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $bac_no = $_POST['bac_no'];
        $user_select=$obj->Query("SELECT * FROM customers WHERE customer_name='$username' OR email ='$email' OR phone = '$phone' OR bac_no = '$bac_no' ");

        if($user_select){
          
             if($user_select[0]->customer_name == $_POST['customer_name']){
                 $error['customer_name'] = "The name already exists";
             }
             if($user_select[0]->email == $_POST['email']){
                $error['email'] = "Email Already taken by another user!";
            }
            if($user_select[0]->phone == $_POST['phone']){
                
                $error['phone'] = "Phone Already Used by another user!";
            }
            if($user_select[0]->bac_no == $_POST['bac_no']){
               
                $error['bac_no'] = "bac_no Already Used by another user!";
            }
        
      }else {
            unset($_POST['submit']);

            $obj->insert('customers',$_POST);
             echo '<script>alert("Successfully registered. Please wait for an admin approval for signing up !")</script>';
            echo "<script> window.location.href='".base_url('register.php')."'</script>";
      }
        


      }


      // $pagePath=root('pages/'.$url);
require_once root('layouts/header.php');
?>


<div class="page-wrapper">
    <div class="page-content--bge5">

        <div class="container">

            <div class="login-wrap">

                <?php if(isset($_SESSION['register_status'])){ ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['register_status'];unset($_SESSION['register_status']); ?>
                </div>
                <?php    }  ?>

                <div class="login-content">
                    <?php if (isset($_SESSION['create'])) { ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['create'];unset($_SESSION['create']);  ?>
            </div>
        <?php }  ?>

                    <p style="padding-bottom:1px;text-align:left;"><a href="<?=base_url('index.php')?>"
                                    style="color:blue;"><i class="fa fa-backward"></i> Back to home</a></p><br>
                    <div class="login-logo">

                        <h3 class="text-left"> Become a renter<hr></h3>
                        
                    </div>
                    <div class="login-form">
                        <form action="" method="post" onsubmit="return validation()" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="au-input au-input--full" type="text" name="customer_name"
                                    value="<?php if(isset($old['customer_name'])){echo $old['customer_name'];} ?>"
                                    placeholder="Your Full Name" id="customer_name">
                                <a style="color:red"
                                    id="nameError"><?php if(isset($error['customer_name'])){echo $error['customer_name'];} ?></a>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="au-input au-input--full" type="text" name="address"
                                    value="<?php if(isset($old['address'])){echo $old['address'];} ?>"
                                    placeholder="Your Address" id="address">
                                <a style="color:red;" id="addressError"></a>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="au-input au-input--full" type="text" name="email"
                                    value="<?php if(isset($old['email'])){echo $old['email'];} ?>"
                                    placeholder=" Your Email" id="register_email">
                                <a style="color:red"
                                    id="emailError"><?php if(isset($error['email'])){echo $error['email'];} ?></a>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="au-input au-input--full" type="text" name="phone"
                                    value="<?php if(isset($old['phone'])){echo $old['phone'];} ?>"
                                    placeholder="Your phone number" id="phone" maxlength="10">
                                <a style="color:red"
                                    id="phoneError"><?php if(isset($error['phone'])){echo $error['phone'];} ?></a>
                            </div>
                         <!--    <div class="form-group">
                                <label>Guardian's Name</label>
                                <input class="au-input au-input--full" type="text" name="parent"
                                    value="<?php if(isset($old['parent'])){echo $old['parent'];} ?>"
                                    placeholder="Parent's name" id="parentName">
                                <a style="color:red" id="pnameError"></a>
                            </div> -->

                            <div class="form-group">
                                <label>Bank</label>
                                <input class="au-input au-input--full" type="text" name="bank_name"
                                    value="<?php if(isset($old['bank_name'])){echo $old['bank_name'];} ?>"
                                    placeholder="Your bank name" id="register_bank_name">
                                <a style="color:red"
                                    id="bac_noError"><?php if(isset($error['bac_no'])){ echo $error['bank_name']; } ?></a>

                            </div>

                            <div class="form-group">
                                <label>Bank A/c No.</label>
                                <input class="au-input au-input--full" type="text" name="bac_no"
                                    value="<?php if(isset($old['bac_no'])){echo $old['bac_no'];} ?>"
                                    placeholder="Enter bank account number" id="register_bac_no" maxlength="15">
                                <a style="color:red"
                                    id="bac_noError"><?php if(isset($error['bac_no'])){ echo $error['bac_no']; } ?></a>

                            </div>

                             <div class="form-group">
                                <label for="Citizenship">Attach your citizenship photo</label>
                                <input type="file" name="citizenship" class="form-control" required>
                            </div><br>
                            <div class="form-group">
                                <label for="Profile">Choose a profile photo</label>
                                <input type="file" name="profile" class="form-control" required>
                            </div>

                            <button class="au-btn au-btn--block au-btn--blue m-b-20" name="submit" value="submit"> <i
                                    class="fa fa-power-off"></i> Register</button>

                                    <!--   Have an id?
                                    <a href="create_customer_account.php">Sign up</a>
 -->
                        </form>
                     <span>
                            <span class="float-left"> Registered ? </span>
                            <span class="float-right"><a href="customer_login.php"><a href="create_customer_account">Create an account</a></span>
                     </span>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
// $(document).ready(function(){
//     $('#register_bac_no').keyup(function(){
//         let bac_noVal = $(this).val();
//         console.log(bac_noVal);
//         if(bac_noVal.length<6){
//             $('#bac_noError').html('bac_no must be longer than 5 digit!');
//             return false;
//         }
//     });
// });

function showMe() {
    var x = document.getElementById('Visible');

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

}

function validation() {

    // username validation

    var val = document.getElementById('customer_name').value;
    if (val == '' | null) {
        document.getElementById('nameError').innerHTML = 'Name is required!';
        return false;
    }
    var exp = /^[a-zA-Z .]{5,50}$/g;
    if (exp.test(val)) {
        document.getElementById('customer_name').style.border = '2px solid';
        document.getElementById('customer_name').style.borderColor = 'blue';
        document.getElementById('nameError').innerHTML = '';
    } else {

        if (val.length < 4) {
            document.getElementById('nameError').innerHTML = 'College Name must be more than 5 character';

        } else {
            document.getElementById('nameError').innerHTML = 'Invalid character used';
        }

        document.getElementById('customer_name').style.border = '2px solid';
        document.getElementById('customer_name').style.borderColor = 'red';
        return false;
    }

    // address validation
    var val = document.getElementById('address').value;
    if (val == '' | null) {
        document.getElementById('addressError').innerHTML = 'address is required!';
        return false;
    }


    var exp = /^[A-Za-z0-9 .,\-]{5,40}$/g;
    if (exp.test(val)) {
        document.getElementById('address').style.border = '2px solid';
        document.getElementById('address').style.borderColor = 'blue';
        document.getElementById('addressError').innerHTML = '';
    } else {

        if (val.length < 3) {
            document.getElementById('addressError').innerHTML = 'address cannot be less than 2 character';

        } else {
            document.getElementById('addressError').innerHTML = 'Invalid character used';
        }

        document.getElementById('address').style.border = '2px solid';
        document.getElementById('address').style.borderColor = 'red';
        return false;
    }
    // email validation
    var val = document.getElementById('register_email').value;
    if (val == '' | null) {
        document.getElementById('emailError').innerHTML = 'Email is required!';
        return false;
    } else {
        document.getElementById('emailError').innerHTML = '';
    }

    // phnoe validation
    var val = document.getElementById('phone').value;
    if (val == '' | null) {
        document.getElementById('phoneError').innerHTML = 'Phone number is required!';
        return false;
    } else {
        document.getElementById('phoneError').innerHTML = '';
    }
    //parent name calidatioin
    var val = document.getElementById('parentName').value;
    if (val == '' | null) {
        document.getElementById('pnameError').innerHTML = 'parent Name is required!';
        return false;
    }
    var exp = /^[a-zA-Z .]{5,50}$/g;
    if (exp.test(val)) {
        document.getElementById('parentName').style.border = '2px solid';
        document.getElementById('parentName').style.borderColor = 'blue';
        document.getElementById('pnameError').innerHTML = '';
    } else {

        if (val.length < 4) {
            document.getElementById('pnameError').innerHTML = ' Name must be more than 4 character';

        } else {
            document.getElementById('pnameError').innerHTML = 'Invalid character used';
        }

        document.getElementById('parentName').style.border = '2px solid';
        document.getElementById('parentName').style.borderColor = 'red';
        return false;
    }

    // bac_no validation
    var val = document.getElementById('register_bac_no').value;
    if (val == '' | null) {
        document.getElementById('bac_noError').innerHTML = 'bac_no is required!';
        return false;
    }
    // var exp = /^([a-zA-Z0-9-~!@#$%^&*]){6}$/g;
    // if (exp.test(val)) {
    //     document.getElementById('register_bac_no').style.border = '2px solid';
    //     document.getElementById('register_bac_no').style.borderColor = 'blue';
    //     document.getElementById('bac_noError').innerHTML = '';
    // } else {

    //     if (val.length < 7 || val.length > 8) {
    //         document.getElementById('bac_noError').innerHTML = ' bac_no must be exactly 6 character';

    //     } else {
    //         document.getElementById('bac_noError').innerHTML = 'Invalid character used';
    //     }

    //     document.getElementById('register_bac_no').style.border = '2px solid';
    //     document.getElementById('register_bac_no').style.borderColor = 'red';
    //     return false;
    // }

    //function end
}
</script>

<?php 
require_once root('layouts/footer.php');
?>