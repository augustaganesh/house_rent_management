<?php
if (!isset($_SESSION['admin-status']) || $_SESSION['admin-status']!='loggedin') {
	echo "<script> window.location.href='".base_url()."'</script>";
}

if(isset($_GET['action']) && $_GET['action'] == 'd')
{
    $obj->delete('roominfo','id',array($_GET['id']));
    echo "<script>window.location.href='".base_url('display_room_details')."'</script>";
}

	$admin = $obj->Select("roominfo");
	
if(isset($_GET['action']) && $_GET['action'] == 'showRentDetails'){
    $rentData = $obj->select('rent_status','*','customer',array($_GET['id']));
    // echo "<pre>";
    // $cusDetails = $rentData[0];
    // $custmer_details = $obj->select('issue_rent','*','issue_id',array($cusDetails));
    // print_r($custmer_details); die;

}else{
    $rentData = '';
}
if(isset($_POST['submit']) && $_POST['submit'] == 'send'){
    unset($_POST['submit']);
    $obj->update('roominfo',$_POST,'room_owner',array($_GET['id']));
    echo '<script>alert("Message has been sent")</script>';
}

?>


<h3>Payment Status</h3><br>


<div class="col-md-12">
    <table class="table table-bordered table-hover">
        <thead style="background:#f5f5f5">
            <tr>
                <th>SN</th>
                  <th>Room No.</th>
                <th>Room Holder's Name &nbsp; &nbsp;</th>
              
                 <th>View Payment Details.</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admin as $key => $value): ?>
            <tr>
                <td><?=++$key?></td>
                  <td><?=$value['room_no']?></td>
                <td>
                    <?php 
                    $user = $obj->select('customers','*','cid',array($value['room_owner'])); ?>
                      <?= $user[0]['customer_name']; ?></a>
                </td>
              
                
                <td><a href="<?=base_url('payment.php?action=showRentDetails&id='.$user[0]['cid'].'&cusName='.$user[0]['customer_name']);?>"><button class="btn btn-info">View</button></a></td>



            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
<?php if($rentData) { ?>  
    <h3 class="text-center pb-3">Payment Details</h3>

<table class="table table-centered table-bordered text-center p-4">
    <thead style="background:#f5f5f5!important;">
        <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Paid Month</th>
            <!-- <th>Unpaid Month</th> -->
            <th>Total Paid</th>
            <th>Total Remaining</th>
            <th>Send Message!</th>
        </tr>
    </thead>
    <tbody>

       
                    <tr>
                        <td>1</td>
                        <td>
                            <?php if(isset($_GET['cusName']) && $_GET['cusName'] != '')
                            {
                                    echo $_GET['cusName'];
                            }
                            ?>
                        </td>
                        
                        <td>
                             <?php foreach($rentData as $key=>$data) : ?>
                            <?php   
                                $month = $obj->select('issue_rent','*','issue_id',array($data['rent']));

                                if(isset($month[0]['month'])){
                                    for($m=1;$m<13;$m++){
                                        if($month[0]['month'] == $m ){
                                            $paidArr[] = $m;
                                        // echo $m;
                                            // print_r($paidArr); 
                                       
                                    }
                                    
                                    }

                                }
                                elseif(empty($month)){
                                      $paidArr[] = '';

                                      
                                }else{
                                    echo "0";
                                }

                            ?>
                        <?php endforeach ;
                         $paidArr = array_unique($paidArr);
                                    foreach($paidArr as $key1 => $p)
                                    {
                                        echo $p;
                                        if(++$key1 < sizeof($rentData)-1)
                                        {
                                            echo ",";
                                        }
                                    }
                                      ?>
                        </td>
                        <!-- <td>
                                 <?php  
                                // if(isset($month[0]['month'])){
                                    for($mm=1;$mm<13;$mm++){
                                        $monthArr[] = $mm;
                                    }
                                   
                                    $monthArr = array_unique($monthArr);
                                    $xyz = array_diff($monthArr, $paidArr);

                                   foreach($xyz as $key=> $xyz1){
                                    echo $xyz1;
                                    // echo ++$key; echo sizeof($xyz);
                                    if(++$key != 12)
                                    {
                                        echo ",";
                                    }
                                   }
                                    // }
                                // }
                            ?>
                        </td> -->
                                               <td>
                             <?php $amt = 0; foreach($rentData as $key=>$data) : ?>
                            <?php   
                                $month = $obj->select('issue_rent','*','issue_id',array($data['rent']));

                                if(isset($month[0]['amount'])){
                                    $amt += $month[0]['amount'];
                       

                                    } 

                            ?>
                        <?php endforeach ;
                         echo $amt/2;


                                 ?>
                        </td>
                        <td>
                            
                            <?php 
                            $amtr = $obj->Query("SELECT SUM(amount) as total FROM issue_rent  ");
                            $totalAmt =  $amtr[0]->total;
                            $dueAmt= $totalAmt - $amt/2;
                            echo $dueAmt;
                            if($dueAmt == '')
                                echo "";

                            ?>

                        </td>
                        <td>
                            <style>
                                textarea{
                                    /*background: #f9f9f9;*/
                                    border: 1px solid #e0e0e0;
                                    padding: 10px;
                                }
                            </style>
                            <form method="POST" class="" style="padding:4px 6px">
                            <textarea name="msg" rows="2" cols="20" required></textarea>
                            <br>    
                            <input type="submit" name="submit" value="send" class="btn-sm btn-success">
                            <br>
                        </form>
                        </td>
                    </tr>

       
    </tbody>
</table>
<br><br>
<?php } else{
    if (isset($_GET['action'])) {
    echo "<hr><h6 style='color:red;'>The renter you requested has not paid any rent yet.
</p><hr>";
    }

}
?>
</div>