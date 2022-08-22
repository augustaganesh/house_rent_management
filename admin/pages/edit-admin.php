<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}
if (isset($_POST['submit'])) {
	if ($_POST['submit']=='add') {
		array_pop($_POST);
		if($_POST['fullname'] != $_SESSION['whois']){
			$_SESSION['whois'] = $_POST['fullname'];
		}
		$password=md5($_POST['password']);
		// $_POST['password'] = $pass;
		// print_r($_POST);

		$obj->Update("admin_regis",$_POST,"id",array($_GET['id']));
		echo "<script> window.location.href='".base_url('admin-control.php')."'</script>";
	}
}

if (isset($_GET['action']) && $_GET['action']=='e') {
	$edit = $obj->Select("admin_regis","*","id",array($_GET['id']));
	
}


?>

<h3>Edit Profile</h3><hr>
<div class="col-md-6">
    <form action="" method="post" class="form-group">
    	<div class="form-group">
            <label>Name</label>
            <input type="text" name="fullname" class="form-control" required value="<?=$edit[0]['fullname']?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="<?=$edit[0]['email']?>">
        </div>
       
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required value="<?=$edit[0]['phone']?>">
        </div>
<!-- 
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required class="form-control"
               placeholder="Enter a new password">
        </div> -->
        <button class="btn btn-success" name="submit" value="add">Update</button>
    </form>
</div>