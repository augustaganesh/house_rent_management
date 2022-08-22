<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}

if(isset($_GET['action']) && $_GET['action'] == 'd')
{
    $obj->delete('roominfo','id',array($_GET['id']));
   // echo '<script>alert("Renter added successfully!")</script>';

    echo "<script>window.location.href='".base_url('display_room_details')."'</script>";
}

	$admin = $obj->Select("roominfo");
    $customers = $obj->Select("customers");
	

?>

<h3 class="mb-4">Renter's Detail</h3>

<div class="col-md-12">

<table class="table table-centered table-hover">
        <thead style="background:#f5f5f5!important;">
            <tr>
                <th>SN</th>
                <th>Renter's Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone<th>
                <th>Registered Bank<th>
                <th>Citizenship</th>
              
             </tr>
        </thead>
          <?php foreach ($customers as $key => $value): ?>
        <tbody>
          
            <tr>

                <td><?=++$key?></td>
                <td><img src="../assets/profile/<?=$value['profile'];?>" alt="Room Holder" class="rounded-circle img-thumbnail" style="cursor: pointer;max-width: 50px;min-height: 50px;"> <br><?=$value['customer_name']?></td>
                <td><?=$value['address']?></td>
                <td><?=$value['email']?></td>
                <td><?=$value['phone']?></td>
                 <td style="opacity: 0;"><img src="../assets/profile/<?=$value['profile'];?>" alt="Room Holder" class="rounded-circle" style="cursor: pointer;max-width: 30px;min-height: 30px;">
                </td>
                <td ><?=$value['bank_name']?></td>
                <td></td>
                <td><img src="../assets/profile/<?=$value['citizenship'];?>" alt="Citizenship photo" style="cursor: pointer;max-width: 30px;min-height: 30px;border: 2px solid #e7e7e7;">
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>