<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Product Page</title>
</head>
<body> -->
    <?php include "includes/header.php"; ?>
    <!-- <div class="container"> -->
    <div class="container py-5" style="background-color: white; border-radius:5px;">
    <div class="row">
        <div class="wrapper">
            <div class="product-box">
                <div class="all-images">
                <div class="small-images">
                    <!-- <img src="img/<?php echo $_GET['image'];?>" onclick="clickimg(this)"> -->
                    <!-- <img src="<?php echo 'img/'.$_GET['image'].'1';?>" onclick="clickimg(this)"> -->
                    <?php 
                    $orginalImage=$_GET['image'];
                    $pos=strpos($_GET['image'],".");
                    $img1=substr_replace($orginalImage, '1', $pos, 0); 
                    $img2=substr_replace($orginalImage, '2', $pos, 0); 
                    $img3=substr_replace($orginalImage, '3', $pos, 0); 
                    ?>
                    <?php echo '<img src="img/'.$orginalImage.'" onclick="clickimg(this)">';?>
                    <?php echo '<img src="img/'.$img1.'" onclick="clickimg(this)">';?>
                    <?php echo '<img src="img/'.$img2.'" onclick="clickimg(this)">';?>
                    <?php echo '<img src="img/'.$img3.'" onclick="clickimg(this)">';?>
                    <!-- <img src="img/<? echo $_GET['image'].'2';?>" onclick="clickimg(this)">
                    <img src="img/<? echo $_GET['image'].'3';?> " onclick="clickimg(this)"> -->
                </div>
                <div class="main-images">
                    <img src="img/<?php echo $_GET['image'];?>" id="imagebox">
                </div>
                </div>
            </div>
            <div class="text">
                <div class="content">
                    <p class="brand">Brand: Apple</p>
                    <h2><?php echo $_GET['productName']; ?></h2>
                    <div class="review">
                        <span>(4.6)</span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="price-box">
                        <p class="price"><?php echo $_GET['price'];?></p>
                        <!-- <strike>$ 89,990</strike> -->
                    </div>

                    <p>color: <select name="size">
                        <option value="select color">select colour</option>
                        <option value="black">black</option>
                        <option value="select color">yellow</option>
                        <option value="select color">green</option>
                        <option value="select color">purple</option>
                    </select></p>

                    <p>Quantity <input type="text" value="1"></p>
                    <button>
                        <span class="fa fa-shopping-cart"></span>
                        Add to Cart
                    </button>
                    <button class="buy">
                        <span class="fa fa-shopping-cart"></span>
                        Buy now
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function clickimg(smallImg){
            var fullImg= document.getElementById("imagebox");
            fullImg.src=smallImg.src;
        }

    </script>


    
</body>
</html>

<style>
    *{
        margin:0;
        padding: 0;
        font-family: sans-serif;
        box-sizing: border-box;
       
    }
    body{
        background-color: white;
    }
    .container{
        width:100%;
    }
    .wrapper{
        width: 90%;
        height: 100vh;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
       
    }
    .text{
        flex-basis: 45%;
    }
    .all-images{
        height: 80vh;
        display: flex;

    }
.small-images{
    display: flex;
    flex-direction: column;

}
.small-images img{
    height: 19vh;
    margin-bottom: 9px;
    cursor: pointer;
    opacity:0.6;
}
.small-images img:hover{
    opacity:1;

}
.main-images img{
    height:100%;

}
p{
    margin-bottom: 20px;
}
.brand{
    background-color:#008000;
    width:fit-content;
    color: #fff;
    font-size: 12px;
    padding: 2px 5px;
}
h2{
    font-size: 35px;
    color:#555;
    margin-bottom: 20px;
}
.review{
    background-color: #008000;
    display: inline-block;
    color:#fff;
    padding: 4px;
    border-radius: 5px;
    font-size: 15px;
}
.review .fa{
    counter-reset: #fff;


}
.price{
    color: rgb(29,28,29);
    font-size: 26px;
    font-weight: bold;
    padding-top: 10px;
    padding-right: 10px;
}

.price-box{
    display:flex;
    align-items: center;
}

input{
    width: 30px;
    border:1px solid #ccc;
    font-weight: bold;
    text-align: center;
}

button{
    width:140px;
    color:#fff;
    font-size: 15px;
    outline: none;
    border: 0;
    border-radius: 5px;
    background-color: #fe980f;
    padding:10px 15px;
    box-sizing: border-box;
    cursor: pointer;
}
button .fa{
    margin-right: 10px;
}
.buy{
    background-color: rgb(201,97,57);
    margin-top: 10px;
}

@media only screen and (max-width:1200px){
    .wrapper{
        flex-direction: column;
        height: auto;
        padding: 5% 0;

    }
    .text{
        padding-top: 50px;
    }
}
@media only screen and (max-width:600px){
    .all-images{
        flex-direction: column;
        height: auto;

    }
    .small-images{
        flex-direction: row;
        justify-content: space-evenly;
        order:1;
    }
    .product-box{
        width: 100%;

    }
    .small-images img{
        width: 25%;
    }
    h2{
        font-size: 25px;
    }
}
</style>