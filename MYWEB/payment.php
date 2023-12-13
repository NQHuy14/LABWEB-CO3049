<?php include "includes/header.php" ?>
<?php ob_start();?>
<?php include "includes/db.php";?>

<?php

    if(isset($_POST['submit'])){
        $amount=$_POST['amount'];
        $amount+=$_SESSION['amount'];
        $id=$_SESSION['id'];
        $userLevel="";
        if($amount>=100&&$amount<=500){
            $userLevel="Silver Member";
        }else if($amount>500&&$amount<=5000){
            $userLevel="Gold Member";
        }else if($amount>5000){
            $userLevel="Diamond Member";
        }


        $query="UPDATE users SET ";
        $query.="amout = $amount, ";
        $query.="userLevel = '$userLevel' ";
        $query.="WHERE userID = $id ";
        $result_update=mysqli_query($connection,$query);
        if(!$result_update){
            die("QUERY FAILED" . mysqli_error($connection) .mysqli_errno($connection));
        }
        $_SESSION['amount']=$amount;
        $_SESSION['userLevel']=$userLevel;
    }
?>


<?php if(!isset($_SESSION['name'])){
      echo '<script type="text/javascript">window.location = "index.php?page=login";</script>';
} ?>




<section style="background-color: #eee; margin-top:2rem;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card rounded-3">
          <div class="card-body mx-1 my-2">
            <div class="d-flex align-items-center">
              <div>
                <i class="fab fa-cc-visa fa-4x text-black pe-3"></i>
              </div>
              <div>
                <p class="d-flex flex-column mb-0">
                  <b><?php echo $_SESSION['name'];?></b>
                </p>
              </div>
            </div>

            <div class="pt-3">
              <div class="d-flex flex-row pb-3">
                <div class="rounded border border-primary border-2 d-flex w-100 p-3 align-items-center"
                  style="background-color: rgba(18, 101, 241, 0.07);">
                  <div class="d-flex align-items-center pe-3">
                    <input class="form-check-input" type="radio" name="radioNoLabelX" id="radioNoLabel11"
                      value="" aria-label="..." checked />
                  </div>
                  <div class="d-flex flex-column">
                    <p class="mb-1 small text-primary">Total amount due</p>
                    <h6 class="mb-0 text-primary">$<?php echo $_SESSION['amount'];?></h6>
                  </div>
                </div>
              </div>
           <form action="payment.php" method="post">
              <div class="d-flex flex-row pb-3">
                <div class="rounded border d-flex w-100 px-3 py-2 align-items-center">
                  <div class="d-flex align-items-center pe-3">
                    
                  </div>
                  <div class="d-flex flex-column py-1">
                    <p class="mb-1 small text-primary">Amount of money you wan to add</p>
                    <div class="d-flex flex-row align-items-center">
                      <h6 class="mb-0 text-primary pe-1">$</h6>
                      <input type="number" class="form-control form-control-sm" id="numberExample" name="amount"
                        style="width: 55px;" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between align-items-center pb-1">
              <a href="index.php?page=home" class="text-muted">Go back</a>
              
              <input type="submit" role="button" class="btn btn-primary btn-lg" value="Deposit" name="submit"/>
              
            </div>
        </form>




          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include "includes/footer.php" ?>