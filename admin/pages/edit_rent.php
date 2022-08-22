<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}
  

  if (isset($_POST['submit'])) {
	if ($_POST['submit']=='Update') {
		array_pop($_POST);
		// $pass=md5($_POST['plane_password']);
		// $_POST['password'] = $pass;

		$obj->Update("issue_rent",$_POST,"issue_id",array($_GET['id']));
		   echo '<script>alert("Rent updated successfully")</script>';
		echo "<script> window.location.href='".base_url('issue_rent.php')."'</script>";
	}
}



if (isset($_GET['action']) && $_GET['action']=='e') {
	$edit = $obj->Select("issue_rent","*","issue_id",array($_GET['id']));
	
	if(!$edit){
		echo "<script> window.location.href='".base_url('issue_rent.php')."'</script>";
	
	}
	
}

if (isset($_GET['action'])) {
    if ($_GET['action']=='d') {
        $obj->Delete("issue_rent","issue_id",array($_GET['id']));
        
        echo "<script> window.location.href='".base_url('issue_rent.php')."'</script>";
        
    }
    
}
?>




<h2 class="ml-3">Edit Rent</h2><br>
<div class="col-md-5">
    <form action="" method="post">

        <div class="gorm-group">
            <label for="Year">Year</label>
            <input type="text" name="year" class="form-control" readonly value="<?=date('Y');?>">
        </div>
       
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" required value="<?=$edit[0]['amount'] ; ?>">

        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit" name="submit" value="Update">Post</button>
        </div>
    </form>
</div>