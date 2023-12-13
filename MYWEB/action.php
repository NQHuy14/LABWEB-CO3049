<?php include 'includes/db.php';?>

<?php 

if (isset($_POST['value'])) {

	
	$key = "%{$_POST['value']}%";

	$sql = "SELECT * FROM `products` WHERE productName LIKE '%$key%'";

  $result=mysqli_query($connection,$sql);
  if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    echo '<li><a href="index.php?page=detailProduct&price='.$row['prices'].'&image='.$row['image'].'&productName='.$row['productName'].'">'.'<img src="'.'img/'.$row['image'].'" alt="" class="smallSearchImage">'.' '.$row['productName'].'</a></li>';
      
  }
}else echo '<li><a href="#">'.'Products not found'.'</a></li>';


}


?>

<style>
  .smallSearchImage{
      width: 2.5rem;
  }
</style>
