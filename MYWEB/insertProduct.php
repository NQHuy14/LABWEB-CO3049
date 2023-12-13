<?php include"includes/header.php" ?>
<?php include"includes/db.php" ?>
<?php include "function.php" ?>
<?php session_start(); ?>
<?php
  if(isset($_POST['create_post'])){
    $nameProduct=$_POST['nameProduct'];
    $prices=$_POST['prices'];
    $number=$_POST['number'];
    $post_image=$_POST['post_image'];

    $query="INSERT INTO products(productName,prices,number_of_product,image) VALUE('$nameProduct','$prices',$number,'$post_image')";
    $result=mysqli_query($connection,$query);
    checkLoadQuery($result);
  }



?>
<div class="container" style="background-color: #eee; margin-top:3rem; ">
    <div class="row">
        <div class="col-lg-12 justify-content-center">
            <h1 class="justify-content-center">Post Product</h1>
            <form action="insertProduct.php" method="post">
                <div class="form-group px-5">
                    <label for="">Product name</label>
                    <input type="text" class="form-control" name="nameProduct">
                </div>

                <div class="form-group px-5">
                    <label for="">Prices</label>
                    <input type="text" class="form-control" name="prices">
                </div>

                <div class="form-group px-5">
                    <label for="">Number of product</label>
                    <input type="text" class="form-control" name="number">
                </div>

                <div class="form-group px-5">
                    <label for="">images</label>
                    <input type="text" name="post_image" class="form-control" >
                </div>
                <div class="form-group px-5" >
                    <input type="submit" class="btn btn-primary" name="create_post" value="Post">
                </div>


            </form>

        </div>



    </div> 
</div>


<?php include "includes/footer.php" ?>