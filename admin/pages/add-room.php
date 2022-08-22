<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}

$customer = $obj->select('customers'); 
$admin = $obj->Select("roominfo");

if (isset($_POST['submit'])) {
    $owner = $_POST['room_owner'];
	$users = $obj->Select("roominfo","*","room_no",array($_POST['room_no'])," OR room_owner='$owner'");
   

	if ($users) {
		$_SESSION['nameError'] = "Room is already taken!";     
	}else{
        
		unset($_POST['submit']);
		$obj->Insert("roominfo",$_POST);
        echo '<script>alert("Room added successfully!")</script>';

		echo "<script> window.location.href='".base_url('add-room.php')."'</script>";
}
	
}


?>
<div class="row">
    <div class="col-md-4">
        <h3> Add Room</h3><br>

        <form action="" method="post" class="form-group">
            
                <label>Room No.</label>
                <input type="text" name="room_no" class="form-control" required
                    value="<?php if(isset($old)){echo $old['room_no'];} ?>">
                <a style="color: red;">
                    <?php if(isset($_SESSION['nameError'])){echo $_SESSION['nameError'];unset($_SESSION['nameError']);} ?></a>
            
            <br>
                <label>Room Owner</label>
                <select name="room_owner" id="" class="form-control" required="required">
                    <option selected disabled>Select your renter</option>
                    <?php

                foreach ($customer as $data): ?>
                    <option value="<?=$data['cid'];?>"><?= $data['customer_name'];?></option>
                    <?php endforeach ;
				 ?>
                </select>
           <br>

            <button class="btn btn-success" name="submit" value="add">Add</button>
        </form>
    </div>

<!-- <td><a href="<?=base_url('display_room_details.php');?>"><i class="fa fa-eye"></i></a></td> -->



    <!-- <div class="col-md-1"></div> -->
    <div class="col-md-7">
        <h3 class="text-left">Room Holder's Detail</h3><br>

        <table class="table table-hover table-responsive-lite">
            <thead style="background:#f5f5f5!important;">
                <tr>
                    <th>SN</th>
                    <th>Room Holder's Name</th>
                    <!-- <th>Email</th> -->

                    <th>Room No.</th>
                    <th colspan="2">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($admin as $key => $value): ?>
                <tr>
                    <td><?=++$key?></td>
                    <td>
                        <?php 
                    $user = $obj->select('customers','*','cid',array($value['room_owner']));
                    echo $user[0]['customer_name'];
                ?>
                    </td>
                    <td><?=$value['room_no']?></td>
                    <td><a class="btn btn-sm btn-info"
                        href="<?=base_url('edit_room_details.php?id='.$value['id']);?>">Edit</a><a class="btn btn-sm ml-4 btn-primary" onclick="return confirm('Are you sure you want to delete it?')"
                        href="<?=base_url('display_room_details.php?action=d&id='.$value['id']);?>">Delete</a></td>



                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>