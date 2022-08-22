<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}
  

  if (isset($_POST['submit'])) {
	if ($_POST['submit']=='Update') {
		array_pop($_POST);
		// $pass=md5($_POST['plane_password']);
		// $_POST['password'] = $pass;

		$obj->Update("admin_bank_ac",$_POST,"id",array($_GET['id']));
		   echo '<script>alert("Account updated successfully")</script>';
		echo "<script> window.location.href='".base_url('add-bank.php')."'</script>";
	}
}



if (isset($_GET['action']) && $_GET['action']=='e') {
	$edit = $obj->Select("admin_bank_ac","*","id",array($_GET['id']));
	
	if(!$edit){
		echo "<script> window.location.href='".base_url('add-bank.php')."'</script>";
	
	}
	
}

if (isset($_GET['action'])) {
    if ($_GET['action']=='d') {
        $obj->Delete("admin_bank_ac","id",array($_GET['id']));
        
        echo "<script> window.location.href='".base_url('add-bank.php')."'</script>";
        
    }
    
}
?>
<h2 class="ml-3">Edit Bank Account</h2><hr>
<div class="col-md-5">
    <form action="" method="post">

        <div class="form-group">
        <label for="bank name">Bank Name</label>
         <input type="text" name="bank_name" class="form-control" required value="<?=$edit[0]['bank_name'] ; ?>">

          
        </div>
        <div class="form-group">
            <label for="ac name">Account Name</label>
            <input type="text" name="ac_name" class="form-control" required value="<?=$edit[0]['ac_name'] ; ?>">

        </div>

        <div class="form-group">
            <label for="ac no">Account No</label>
            <input type="text" name="ac_no" class="form-control" pattern="\d*" maxlength="17" required value="<?=$edit[0]['ac_no']; ?>">

        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit" name="submit" value="Update">Update</button>
        </div>
    </form>

</div>