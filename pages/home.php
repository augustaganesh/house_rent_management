<!-- <?php  
$customers = $obj->select('roominfo');
	
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
            <h1 class="pt-4 text-center">ABC House Kathmandu Renter's List</h1><hr>
        </div>
        <?php 
            foreach($customers as $cust): ?>

        <div class="col-md-4 renters shadow-sm mb-4">
            <?php $roomHolderDetail = $obj->select('customers','*','cid',array($cust['room_owner'])); ?>
            <a href="<?=base_url('customer_login').'?cid='.$cust['room_owner'];?>"> <img src="assets/profile/<?=$roomHolderDetail[0]['profile'];?>" alt="Room Holder" class="img-fluid"> </a>
            <h2><?=$roomHolderDetail[0]['customer_name'];?></h2>
        </div>

        <?php endforeach ;
        ?>
 </div>
</div>

<style>
.renters img {
  
    height:30vh;
    width:70%;
}
</style>

 -->