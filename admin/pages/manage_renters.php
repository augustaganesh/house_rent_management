<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}
$renters = $obj->select('customers');
if(isset($_POST['submit']) && $_POST['submit'] == 'pay')
{
    unset($_POST['submit']);
   $obj->insert('rent_status',$_POST);
		echo "<script> window.location.href='".base_url('manage_renters.php')."'</script>";
   
}
?>
<h2>Manage Renters</h2>
<div class="col-md-5">
    <form action="" method="post">
        <div class="form-group">
            <label for="Name">Room holder's Name</label>
            <select name="name" id="" class="form-control">
                <option selected disabled>Select</option>
                <?php foreach($renters as $data) : ?>
                <option value="<?=$data['cid'];?>"><?=$data['customer_name'];?></option>
                <?php endforeach ;?>
            </select>
        </div>
        <div class="gorm-group">
            <label for="Year">Year</label>
            <input type="text" name="year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Month">Month</label>

            <select name="month" id="" class="form-control">
                <option selected disabled>Select</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>

            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="status" value="1">

        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit" name="submit" value="pay">Pay</button>
        </div>
    </form>
</div>