<?php 
session_start();
unset($_SESSION['isTeacher']);
session_destroy();
// setcookie('username','',time()-86400);
 // setcookie('password','',time()-86400);
require_once ("config/config.php");
// header("location:".base_url());
echo "<script> window.location.href='".base_url()."'</script>";

?>