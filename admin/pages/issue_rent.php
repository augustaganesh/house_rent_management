<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}
$addedMonth[] = $obj->Select('issue_rent','month');
$addedMonth = $addedMonth[0];
$i=0;
foreach($addedMonth as $addedMonth)
{
    $am[$i] = $addedMonth['month'];
 $i++;
}
// print_r($am);
$renters = $obj->select('customers');
if(isset($_POST['submit']) && $_POST['submit'] == 'post')
{
    unset($_POST['submit']);
   
$mon = $_POST['month'];
if(in_array($mon,$am))
{
    $_SESSION['error'] = "Already added for this month";
    
}else{
    $obj->insert('issue_rent',$_POST);
    echo '<script>alert("Rent posted successfully")</script>';
    echo "<script> window.location.href='".base_url('issue_rent.php')."'</script>";
}


}


$rent = $obj->select('issue_rent');
?>
<div class="container">

 <div class="row">
<div class="col-md-4">
    <h3>Issue Rent</h3><br>
    <?php if(isset($_SESSION['error'])){ ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>

    <?php } ?>
    <form action="" method="post">
    <div class="form-group">
            <label for="Year">Year</label>
            <input type="text" name="year" class="form-control" disabled value="<?=date('Y');?>">
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
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" required>

        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit" name="submit" value="post">Add</button>
        </div>
    </form>
</div>
<div class="col-md-1"></div>
<div class="col-md-5" style="border-left: 1px solid #e7e7e7;">
      <h3 class="font-weight-bold">Rent List</h3><br>
        <?php if($rent){ ?>

        <div class="col-md-12" >
            <table class="table table-hover table-responsive-lite   ">
                <thead>
                    <tr class="text-muted" style="background: #f1f1f1;">
                        <th>SN</th>
                        <th>Month</th>
                        <th>Amount</th>
                        <th colspan="2">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rent as $key => $value): ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$value['month'];?></td>
                        <td><?=$value['amount'];?></td>
                        <td><a href="<?=base_url('edit_rent.php?action=e&id='.$value['issue_id'])?>"
                                class="btn btn-outline-info btn-sm"
                                onclick="return confirm('Are you sure want to edit?')"><i class="fas fa-edit"></i></a>
                        </td>


                        <td><a href="<?=base_url('edit_rent.php?action=d&id='.$value['issue_id'])?>"
                                class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Confirm delete?')"><i class="fas fa-trash-alt"></i></a></td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php }else{ ?>
        <p>No rent is in the list!</p>

        <?php } ?>
    </div>
</div>
</div>