<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}



	$admin = $obj->Select("admin_regis","*","fullname",array($_SESSION['whois']));
	

?>

 <h3>Admin Profile</h3><br>
<!-- <div class="container">
    <div class="row">
         <div class="col-md-6 aprofile">
           
           
            <div style="border-top: 2px solid #e7e7e7;"></div>
       <style>
       .aprofile span a:hover{
        color: blue!important;
       }
       .desc p span{
        color: #222;
        font-size: 18px;
       }
       .desc p{
        line-height: 2.1;
        font-size: 16px;
        font-weight: 500;
        color: #444;
        font-family: nunito, sans-serif;
       }
        </style>
        <div class="desc">
        <p><span>Name:</span> <?=$value['fullname']?></p>
        <p><span>Email:</span> <?=$value['email']?></p >
        <p><span>Phone:</span> <?=$value['phone']?></p >
    </div>


    </div>
</div>
 -->







<div class="col-md-12">
    <table class="table table-bordered table-hover table-responsive-lite">
        <thead style="background:#f9f9f9!important;">
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
              

            </tr>
        </thead>
        <tbody>
            <?php foreach ($admin as $key => $value): ?>
            <tr>
                <td><?=++$key?></td>
                <td><?=$value['fullname']?></td>
                <td><?=$value['email']?></td>
                <td><?=$value['phone']?></td>

                <td><a href="<?=base_url('edit-admin.php?action=e&id='.$value['id'])?>" class="btn btn-info btn-sm"
                        onclick="return confirm('Are you sure you want to edit this?')">Edit</a></td>
                 

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>