<?php
    global $messFromLogin;
    $connection=mysqli_connect('localhost','root','','onlinestore');
    if(!$connection){
        die("QUERY FAILED");
    }
?>