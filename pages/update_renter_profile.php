<?php  

if (!isset($_SESSION['cust_login']) || $_SESSION['cust_login'] != 'true'.$_SESSION['getCustomerId']) {
	echo "<script> window.location.href='".base_url()."'</script>";
}

if (isset($_POST['submit'])) {
	if ($_POST['submit']=='add') {
		array_pop($_POST);
		$obj->Update("customers",$_POST,"cid",array($_GET['id']));
           echo '<script>alert("Data updated successfully")</script>';
		echo "<script> window.location.href='".base_url('customer_individual_details.php')."'</script>";
	}
}

if (isset($_GET['action']) && $_GET['action']=='e') {
	$edit = $obj->Select("customers","*","cid",array($_GET['id']));
	
	if(!$edit){
		echo "<script> window.location.href='".base_url('customer_individual_details.php')."'</script>";
	
	}
	
}


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


<div class="container pt-4" style="margin-top:-4rem ;">
    
    <div class="row">
<div class="col-md-6 pt-4">
	<h4 class="font-weight-bold">Edit Your Profile</h4><hr>
    <form action="" method="post" class="form-group">
        <div class="form-group">
		  <label>Name</label>
            <input type="text" name="customer_name" class="form-control" required value="<?=$edit[0]['customer_name'] ; ?>">
            <br>

              <label>Address</label>
            <input type="text" name="taddress" class="form-control" required value="<?=$edit[0]['taddress'] ; ?>"><br>

            <label>Email</label>
            <input type="text" name="address" class="form-control" required value="<?=$edit[0]['address'] ; ?>"> <br>

            <label>Address</label>
            <input type="text" name="address" class="form-control" required value="<?=$edit[0]['address'] ; ?>"><br>


            <label>Bank Name</label>
            <input type="text" name="phone" class="form-control" required value="<?=$edit[0]['phone'] ; ?>"><br>

            <label>Bank a/c no Phone</label>
            <input type="text" name="tphone" class="form-control" required value="<?=$edit[0]['tphone'] ; ?>"><br>
        </div>


        <button class="btn btn-success" name="submit" value="add">Update</button>
    </form>
</div>
</div>
</div>