<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}

$customer = $obj->select('customers'); 
$admin = $obj->Select("roominfo");

if (isset($_POST['submit']) && $_POST['submit'] == 'update') {
    $owner = $_POST['room_owner'];
	$users = $obj->Select("roominfo","*","room_no",array($_POST['room_no']));
   
   

	if ($users) {
		echo "<script> window.location.href='".base_url('display_room_details.php')."'</script>";
		
	}else{
        
		unset($_POST['submit']);
		$obj->update("roominfo",$_POST,'id',array($_GET['id']));
		echo "<script> window.location.href='".base_url('display_room_details.php')."'</script>";
}
	
}
$old = $obj->select('roominfo','*','id',array($_GET['id']));
$old = $old[0];

?>
<div class="row">
    <div class="col-md-4">
        <h3>Edit Room</h3><hr>

        <form action="" method="post" class="form-group">
            <div class="form-group">
                <label>Room No.</label>
                <input type="text" name="room_no" class="form-control" required
                    value="<?php if(isset($old)){echo $old['room_no'];} ?>">
                <a style="color: red;">
                    <?php if(isset($_SESSION['nameError'])){echo $_SESSION['nameError'];unset($_SESSION['nameError']);} ?></a>
            </div>
            <div class="form-group">
                <label>Room Owner</label>
                <select name="room_owner" id="" class="form-control">
                    <option selected disabled> Select Your Customer</option>
                    <?php

                foreach ($customer as $data): ?>
                    <option value="<?=$data['cid'];?>" <?php if($data['cid']==$old['room_owner']) echo "selected";?>>
                        <?= $data['customer_name'];?></option>
                    <?php endforeach ;
				 ?>
                </select>
            </div>

            <button class="btn btn-success" name="submit" value="update">Update</button>
        </form>
    </div>


</div>