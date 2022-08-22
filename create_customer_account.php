<?php 
    session_start(); 
    require_once ("config/config.php");
    require_once ("config/db.php");


    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']=='yes') {
        // header('Location:'.base_url('teachers.php'));
        echo "<script> window.location.href='".base_url('customer_individual_details.php')."'</script>";

    }
    }

        if(!empty($_POST) && $_POST['submit']=='submit'){
           
           
            // $old = $_POST;
            $username=$_POST['username'];
            $cust_username = $obj->select('customers','*','email',array($username));
            if($cust_username){
                $username_cust = $cust_username[0]['cid'];
                $_POST['password'] = trim($_POST['password']);
            $password=md5($_POST['password']);
           
           
            $user_select=$obj->Query("SELECT * FROM customer_login WHERE room_holder='$username_cust' ");
            
            
           
        if($user_select){

                $error['loginError'] = 'Account already created please proceed to login';
        }else {
            unset($_POST['submit']);
            $_POST['password'] = trim($_POST['password']);
            $_POST['password']=md5($_POST['password']);
            $_POST['room_holder'] = $username_cust;
            unset($_POST['username']);
            $obj->insert('customer_login',$_POST);
            echo "<script> window.location.href='".base_url('customer_login.php')."'</script>";

        }
            }else{
                $error['loginError'] = "Email doesn't exist!";
            }
            


        }


        // $pagePath=root('pages/'.$url);
    require_once root('layouts/header.php');
    ?>


<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">

                <div class="login-content">
                    <div class="login-logo">
                        <p style="padding-bottom:4px;text-align:left;"><a href="<?=base_url('index.php')?>"
                                style="color:blue;"><i class="fa fa-backward"></i> &nbsp; Back to home</a></p>
                        <br>
                        <h3 class="text-left">Create an account</h3><br>                      

                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="au-input au-input--full" type="email" name="username"
                                    placeholder="Enter your email" required
                                    value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>">
                                    
                                     <p class="text-center" style="color:red">
                            <?php if(isset($error['loginError'])){echo $error['loginError'];}?></p>
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password"
                                    placeholder="Password" required id="Visible"
                                    value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>">
                            </div>

                            <div class="login-checkbox">
                                <!-- <label>
                                    <input type="checkbox" name="rememberMe"
                                        <?php if(isset($_COOKIE['rememberMe']) && $_COOKIE['rememberMe'] == 'true'){ ?>checked
                                        <?php }?>>Remember Me

                                </label> -->

                                <label for="">
                                    <input type="checkbox" onclick="showMe();" style="margin:5px;">Show Password
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--blue m-b-20" name="submit" value="submit"><i
                                    class="fa fa-power-off"></i> Create </button>


                        </form>
                        <span>
                            <span class="float-left">Have an account? </span>
                            <span class="float-right"><a href="customer_login.php">Proceed to login</a></span>
                        </span>
                        <br><br>


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