    <?php 
    session_start(); 
    require_once ("config/config.php");
    require_once ("config/db.php");

if(isset($_GET['cid']))
{
  if(isset($_SESSION['getCustomerId'])){
     if( $_SESSION['getCustomerId'] == $_GET['cid'])
   {
    if (isset($_SESSION['cust_login'])) {
        if ($_SESSION['cust_login']=='true'.$_SESSION['getCustomerId']) {
        
        echo "<script> window.location.href='".base_url('customer_individual_details.php')."'</script>";

    }
    }
   }

  }
  }
    

        if(!empty($_POST) && $_POST['submit']=='submit'){
           
           
            // $old = $_POST;
            $username=$_POST['username'];
            $cust_username = $obj->select('customers','*','email',array($username));
            if($cust_username){
                $username_cust = $cust_username[0]['cid'];
            }else{
                $username_cust = '';
            }
            $_POST['password'] = trim($_POST['password']);
            $password=md5($_POST['password']);
           
           
            $user_select=$obj->Query("SELECT * FROM customer_login WHERE room_holder='$username_cust' AND password='$password'");
            
            
           
        if($user_select){

            // print_r($user_select); die;
          
            $user_select= $user_select[0];
          
    $_SESSION['getCustomerId'] = $user_select->room_holder;
        
            $_SESSION['customer_name']=$user_select->room_holder;
            $_SESSION['cust_login'] = "true".$user_select->room_holder;
            // print_r($_SESSION);die;
                
            echo "<script> window.location.href='".base_url('customer_individual_details.php')."'</script>";
        }else {
            $error['loginError'] = "Invalid username or password";
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
                            <p style="padding-bottom:1px;text-align:left;"><a href="<?=base_url('index.php')?>"
                                    style="color:blue;"><i class="fa fa-backward"></i> Back to home</a></p><br>
                            
                            <h3 style="text-align:center">Renter Login</h3   >
                            <p class="text-left" style="color:red">
                                <?php if(isset($error['loginError'])){echo $error['loginError'];}?></p>
                            
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="email" name="username"
                                        placeholder="Must be verified email" required
                                        value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password" required id="Visible"
                                        value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>">
                                </div>

                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="rememberMe"
                                            <?php if(isset($_COOKIE['rememberMe']) && $_COOKIE['rememberMe'] == 'true'){ ?>checked
                                            <?php }?>>Remember Me

                                    </label>

                                    <label for="">
                                        <input type="checkbox" onclick="showMe();" style="margin:5px;">Show Password
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" name="submit" value="submit"><i
                                        class="fa fa-power-off"></i> sign in</button>

                            </form>
                            <div class="register-link">
                                                                <p>
                                    New renter ?
                                    <a href="register.php"class="ml-2">Register Now !</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script>
function showMe() {
    var x = document.getElementById('Visible');

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

}
    </script>
    <?php 
    require_once root('layouts/footer.php');
    ?>