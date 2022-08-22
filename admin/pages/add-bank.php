<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}

if (isset($_POST['submit'])) {
    $old = $_POST;
    $ac = $obj->Select("admin_bank_ac","*","ac_no",array($_POST['ac_no']));
    // print_r($ac);

    if ($ac) {
        $_SESSION['nameError'] = "Account already exists!";     
    }else{
    
        if ($_POST['submit']=='add') {
        array_pop($_POST);

        $obj->Insert("admin_bank_ac",$_POST);
        echo '<script>alert("account added successfully")</script>';
         echo "<script> window.location.href='".base_url('add-bank.php')."'</script>";

}
}
}


$acdetail = $obj->select('admin_bank_ac');

?>
<div class="container">

 <div class="row">
<div class="col-md-3">
    <h3>Add account</h3><hr>
    <?php if(isset($_SESSION['error'])){ ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>

    <?php } ?>
    <form action="" method="post">

        <div class="form-group">
        <label for="bank name">Bank Name</label>
         <input type="text" name="bank_name" class="form-control" required>

          
        </div>
        <div class="form-group">
            <label for="ac name">Account Name</label>
            <input type="text" name="ac_name" class="form-control" required>

        </div>

        <div class="form-group">
            <label for="ac no">Account No</label>
            <input type="number" name="ac_no" class="form-control" maxlength="17" required>

        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit" name="submit" value="add">Add</button>
        </div>
    </form>
</div>
<hr>
<div class="col-md-9" style="border-left: 1px solid #e7e7e7;">
      <h3 class="font-weight-bold">Account Details</h3><br>
        <?php if($acdetail){ ?>

        <div class="col-md-12" >
            <table class="table table-hover table-responsive-lite   ">
                <thead>
                    <tr class="text-muted" style="background: #f1f1f1;">
                        <th>SN</th>
                                <th>Bank Name</th>
                        <th>Account Name</th>
                 
                        <th>Account No</th>
                        <th colspan="2">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acdetail as $key => $value): ?>
                    <tr>
                        <td><?=++$key?></td>
                            <td><?=$value['bank_name'];?></td>
                        <td><?=$value['ac_name'];?></td>

                        <td><?=$value['ac_no'];?></td>
                        <td><a href="<?=base_url('edit-bank-account.php?action=e&id='.$value['id'])?>"
                                class="btn btn-outline-info btn-sm"
                                onclick="return confirm('Are you sure want to edit?')"><i class="fas fa-edit"></i></a>
                        </td>


                        <td><a href="<?=base_url('edit-bank-account.php?action=d&id='.$value['id'])?>"
                                class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Confirm delete?')"><i class="fas fa-trash-alt"></i></a></td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php }else{ ?>
        <p style="color:red;">No account added yet !</p>

        <?php } ?>
    </div>
</div>
</div>