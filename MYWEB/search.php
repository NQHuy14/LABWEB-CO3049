<?php include "includes/header.php"; ?>
<?php include "includes/db.php";?>
<?php include "function.php"?>


<?php   if(isset($_POST['submitSearch'])){ ?>


<section style="background-color: #eee;">
<div class="container py-5">
<div class="row">
<?php

    $search=strtoupper($_POST['search']);


  
    $query="SELECT * FROM `products` WHERE productID LIKE '%$search%' or productName LIKE '%$search%'";
    $result_select_product=mysqli_query($connection,$query);
    checkLoadQuery($result_select_product);

    $num=mysqli_num_rows($result_select_product);

    if($num>0){





   

    while($row=mysqli_fetch_assoc($result_select_product)){
        $productName=$row['productName'];
        $prices=$row['prices'];
        $number_of_product=$row['number_of_product'];
        $image=$row['image'];
        
        
        ?>


<div class="col-md-12 col-lg-4 mb-4 mb-lg-0" style="margin-top: 2rem; " >
<div class="card">
  <div class="d-flex justify-content-between p-3">
   
  </div>
  <img src=""  data-src="img/<?php echo $image ?>"
    class="card-img-top" alt="Laptop" />
  <div class="card-body">
   
    <div class="d-flex justify-content-between mb-3">
      <h5 class="mb-0"><?php echo $productName?></h5>
      <h5 class="text-dark mb-0"><?php echo $prices ?></h5>
    </div>

    <div class="d-flex justify-content-between mb-2">
      <p class="text-muted mb-0">Available: <span class="fw-bold"> <?php echo $number_of_product ?></span></p>
      <?php echo '<a class="btn btn-outline-primary btn-sm" href="index.php?page=detailProduct&price='.$row['prices'].'&image='.$row['image'].'&productName='.$row['productName'].'" data-abc="true">View Products</a>'; ?>
    </div>
  
  </div>
</div>
</div>

<?php } ?>
<?php } else{
    echo "<h1 class='text-danger text-center'> These products are unavailable</h1>";
} 
?>





</div>
</div>
</section>



<?php } ?>



<?php include "includes/footer.php"; ?>




<style>
      .card {
        /* padding: 12px 16px;
        border-radius: 8px;
        display: block;
        border: 1px solid #000; */
        opacity: 0;
        transition: all 0.1s;
        /* margin-bottom: 16px;
        max-width: 300px; */
        transform: translate3d(-50px, 0, 0);
      }
      .card.active {
        opacity: 1;
        transform: translate3d(0, 0, 0);
      }
      img[data-src] {
        min-height: 300px;
        display: block;
        /* background: #ccc; */
        opacity: 0;
        transition: all 1s;
      }
      img {
        max-width: 100%;
        height: auto;
      }
    </style>


<script>

const cards = document.querySelectorAll('.card')
const images = document.querySelectorAll('img[data-src]')

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const { target } = entry;
        target.classList.toggle('active', entry.isIntersecting)
    })
}, {})

cards.forEach(card => {
    observer.observe(card)
})

const imageObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const { target } = entry; // ES6
        const src = target.getAttribute('data-src')
        if (src && entry.isIntersecting) {
            target.setAttribute('src', src)
            target.style.minHeight = 'auto'
            target.style.opacity = 1
            imageObserver.unobserve(target)
        }
    })
}, {
    rootMargin: "-150px"
})

images.forEach(image => {
    imageObserver.observe(image)
})

</script>