<?php ob_start(); ?>

<?php 
      
      unset($_SESSION['name']);
      $_SESSION['userLevel']="N/A";
    //   header("Location: index.php?page=home");
    $_SESSION['amount']=0;
    echo '<script type="text/javascript">window.location = "index.php?page=home";</script>';
    
?>