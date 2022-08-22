<?php  
 require_once ("config/config.php");
require_once ("config/db.php");


     if(!empty($_POST) && $_POST['submit']=='submit'){
      
        $email=$_POST['email'];
        // $password=md5($_POST['password']);
         $password=$_POST['password'];

        $user_select=$obj->Query("SELECT * FROM admin_regis WHERE email='$email' and password='$password'");
        
      if($user_select){
        $user_select= $user_select[0];

    session_start();
        // $_SESSION['users_data']=$user_select;
        // $_SESSION['whois']=$user_select->name;
            $_SESSION['whois']=$user_select->fullname;

        $_SESSION['admin-status']="loggedin";
       echo "<script>window.location.href='".base_url()."'</script>";

      }else {
        $error['adminError'] = "Invalid username or password !";
      }


      }


      // $pagePath=root('pages/'.$url);
require_once root('layouts/header.php');
?>

<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">

            <div class="login-wrap">
                <div class="login-content" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">

                    <div class="login-logo">

                        <a href="<?= exit_url();?>">
                            <h3 style="color: blue"><i class="fa fa-backward"></i> Go to MainSite</h3>
                        </a>

                        <hr>
                        <h3>Admin Login</h3>
                     
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="au-input au-input--full" type="text" name="email"
                                    placeholder="Enter your email address">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password"
                                    placeholder="Password" id="Visible">
                            </div>



                             <div class="form-group">
                            <span>
                                 <span class="float-left">

                                    <input type="checkbox" name="remember"
                                        <?php if(isset($_COOKIE['admin_remember']) && $_COOKIE['admin_remember'] == 'true'){ ?>checked
                                        <?php }?>>Remember Me

                                  </span>
                                    <span class="float-right">
                                        
                                        <input type="checkbox" onclick="showMe();" style="margin:5px;">Show Password  
                                        
                                    </span>
                            </span>


                        </div>
                        <br>
                           <p style="color: red; text-align:center; margin-top:30px;">
                            <?php if(isset($error['adminError'])){echo $error['adminError'];} ?></p>


                            <button class="au-btn au-btn--block au-btn--blue m-b-20 mt-3" name="submit" value="submit"><i
                                    class="fa fa-power-off"></i> sign in</button>
                            <div class="login-checkbox">
                                
                                <label>
                                    <!-- <a href="<?=base_url('admin_forget_password.php');?>">Forgotten Password?</a> -->
                                </label>
                            </div>
                        </form>

                        <!-- <div class="register-link"> -->
                            
            <span>
                 <span class="float-left">No account ? </span>
                    <span class="float-right"><a href="create_admin_account.php">Sign up now!</a></span>
            </span>
            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php 
require_once root('layouts/footer.php');
?>