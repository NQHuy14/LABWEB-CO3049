<?php include "includes/db.php"; ?>
<?php include "function.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php

  if(isset($_POST['signin'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $_SESSION['retainEmail']=$email;
    $_SESSION['checkRetain']=false;
    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password);
    if(empty($password)||empty($email)){
        $_SESSION['message']="Field should not be empty";
        header("Location: index.php?page=login");
    }


    $query="SELECT * FROM users WHERE email= '{$email}' ";
    $select_user_query=mysqli_query($connection,$query);
    checkLoadQuery($select_user_query);
    if(mysqli_num_rows($select_user_query) != 0){// check whether the data exist in database or not 
    

    while($row=mysqli_fetch_assoc($select_user_query)){
        $db_name=$row['userName'];
        $db_email=$row['email'];
        $db_password=$row['password'];
        $db_level=$row['userLevel'];
        $db_amount=$row['amout'];
        $db_id=$row['userID'];
      
            
        if($email!==$db_email||(crypt($password,$db_password)!==$db_password)){// not correct password
            $_SESSION['message']="incorrect email or password";
            $_SESSION['checkRetain']=true;
            header("Location: index.php?page=login");


        }else if($email===$db_email&&(crypt($password,$db_password)===$db_password)){// correct
            $_SESSION['checkRetain']=false;
            $timer=time()+(60*60*24*7);
            setcookie('someName',100,$timer);
            $_SESSION['name']=$db_name;
            $_SESSION['userLevel']=$db_level;
            $_SESSION['amount']=$db_amount;
            $_SESSION['id']=$db_id;
            
            header("Location: index.php?page=home");

        }else{
            $_SESSION['checkRetain']=true;
            $_SESSION['message']="incorrect email or password";
            header("Location: index.php?page=login");
        }




    }

}else{
    $_SESSION['message']="incorrect email or password";
    header("Location: index.php?page=login");
}





  }



?>








