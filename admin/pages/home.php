<?php  
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}

$total_rooms = $obj->query("SELECT count(cid) as customers FROM customers");
// $total_renters = $obj->query("SELECT count(rid) as customers FROM customer_login");
$total_renters = $obj->query("SELECT count(id) as renters FROM roominfo");

$admin = $obj->Select("roominfo");
$admin_name = $obj->Select("admin_regis");

?>

   <style>
	#more {display: none;}

	.welcome{
		color: #0c2e8a;
		 position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
	}
	.welcome:after{
		 background: blue;
    height: 2px;
    border-radius: 50%;
    flex: 1;
    content: '';
    margin-top:15px!important;
    margin: 0 1px;
	}
	</style>

<h3 class="welcome">Welcome to dashboard </h3>
<div class="container mt-5 text-center">
	<div class="row">
		<div class="col-md-5 shadow mr-2 mb-4">
			<h4 class="mt-3">Total Renters</h4>
			<h3 class="mt-1"><?=$total_renters[0]->renters;?></h3>
			 
		 <a href="<?=base_url('display_room_details.php');?>"><button class="btn btn-outline-info font-weight-bold mt-3 mb-4 rounded-pill" ><i class="fa fa-eye mr-2"></i>View Details.. </button></a>
		</div>
		 <div class="col-md-1"></div>
		<div class="col-md-5 shadow mr-2 mb-3">
			<h4 class="mt-2" style="line-height: 1.6;">Payment<br>Info</h4>
				 <a href="<?=base_url('payment.php');?>">
				 	<button class="btn btn-outline-info font-weight-bold mt-3 mb-4 rounded-pill"><i class="fa fa-eye mr-2"></i>View Details.. </button>
				 </a>
		</div>
				</div>
		 
	</div>

</div>
  <script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");
  btnText.innerHtml='<i class="fa fa-eye mr-2"></i>'

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = '<i class="fa fa-eye mr-2"></i> View Details..'; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = '<i class="fa fa-minus-circle"></i> Show less'; 
    moreText.style.display = "inline";
  }
}
</script>

