<?php 
session_start(); 
 require_once ("config/config.php");
require_once ("config/db.php");


if(isset($_POST['submit']) && $_POST['submit'] == "submit"){
    unset($_POST['submit']);
  
        $_POST['fullname'] = $_POST['fullname'];
        $_POST['email'] = $_POST['email'];  
        $_POST['phone'] = $_POST['phone'];           
        $_POST['password'] = md5($_POST['password']);

        $obj->insert("admin_regis",$_POST);
        echo "<h2>Account created successfully</h2>";
        echo "<script> window.location.href='".base_url('admin')."'</script>";
}

require_once root('layouts/header.php');
?>


        <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                
                    <div class="login-content" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
                    <h6 style="color:skyblue;padding-bottom:15px;"><a href="<?=base_url('index.php')?>"  style="color:#0387e7" ><i class="fa fa-chevron-left"></i>&nbsp; Back to home</a></h6> 

                       <div style="text-align:center;" class="m-b-5"> <?php if(isset($error['exist'])){ ?><a href="<?=base_url('admin')?>" style="color:#fff;" class="btn btn-info" > Proceed to login</a><?php } ?></div>
                        <div class="login-logo">
                            <h3>Register account</h3><hr>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" onsubmit="return validation()">
                                
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="fullname" class="form-control " value="" required="required" placeholder="Enter your full name">
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control " value="" required="required" placeholder="Your email address">
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control " value="" required="required">
                
            </div>
                

            <div class="form-group">
                 <label>Password</label>
                       <input class="au-input au-input--full"  type="password" name="password" value="<?php if(isset($old['password'])){echo $old['password'];} ?>" placeholder="Password" required id="Visible" >
            </div>
            <a id="passError" style="color:red;"> </a> <br>

             <input type="checkbox" onclick="showMe();" style="margin-bottom:2px;">Show Password
             <button class="au-btn au-btn--block au-btn--green m-b-20"  name="submit" value="submit" style="margin-top:10px;">Create</button>
                               
            </form>

            <span>
                 <span class="float-left">Already have an account? </span>
                    <span class="float-right"><a href="login.php">Proceed to login</a></span>
            </span>
            <br>
        </div>
     </div>
</div> 
</div>
</div>

    </div>



<script>
    function showMe(){
        var x = document.getElementById('Visible');
        
        if (x.type === "password" ) {
            x.type = "text";
        }else{
            x.type = "password";
        }
       
    }
function validation(){
    var val = document.getElementById('Visible').value;
    if(val == ''|null){
        document.getElementById('passError').innerHTML = 'Password is required!';
        return false;
    }
    var exp = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{5,16}$/g;
    if(exp.test(val)){
        document.getElementById('Visible').style.border = '2px solid';
        document.getElementById('Visible').style.borderColor = 'blue';
        document.getElementById('passError').innerHTML = '';
    }else{
        if(val.length<5){
          document.getElementById('passError').innerHTML = 'Password must be atleast 4 charecter';

        }else{
            document.getElementById('passError').innerHTML = 'Password must contain at least 1 (uppercase,special character and number)';
        }
        
        document.getElementById('Visible').style.border = '2px solid';
        document.getElementById('Visible').style.borderColor = 'red';
        return false;
    }
}
</script>
    <?php 
require_once root('layouts/footer.php');
?>
