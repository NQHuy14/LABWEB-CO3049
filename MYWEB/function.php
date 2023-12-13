<?php

function redirectPage(){
$page=isset($_GET['page'])?$_GET['page']:'home';
    
switch($page){
  case 'home':
      include 'home.php';
      break;
  case 'product':
      include 'product.php';
      break;
  case 'register':
      include 'register.php';
      break;
  case 'about':
      include 'about.php';
      break;
      case 'login':
        include 'login.php';
        break;
      case 'logout':
        include 'logout.php';
       break;
      case 'payment':
        include 'payment.php';
      case 'detailProduct':
        include 'displayProductDetail.php';
        break;
  default:
    break;
}
}

function checkLoadQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection) .mysqli_errno($connection));
    }
}

?>