<?php include "includes/db.php" ?>
<?php include "function.php" ?>

<?php 
    $result=mysqli_query($connection,"SELECT * FROM `users`");
   $data= array();
   while($row=mysqli_fetch_assoc($result)){
      $data[]= $row;
   }

   echo json_encode($data);
?>




