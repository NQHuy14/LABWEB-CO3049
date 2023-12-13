<?php include "includes/db.php" ?>

<!-- <?php include "includes/header.php"?> -->

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
        <?php
    
          $start=0;
          $row_per_page=9;
    
            
          if(isset($_GET['page-nr'])){
            $number_pages=$_GET['page-nr'] - 1;
            $start= $number_pages*$row_per_page;
          }
         

            $query="SELECT * FROM products LIMIT $start, $row_per_page";
            $result_select_product=mysqli_query($connection,$query);

            $record="SELECT * FROM products";
            $get_row=mysqli_query($connection,$record);
            $number_of_row=mysqli_num_rows($get_row);
            $number_pages=ceil($number_of_row/$row_per_page);

       



       
            checkLoadQuery($result_select_product);

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
          <img src="" data-src="img/<?php echo $image ?>"
            class="card-img-top" alt="Laptop" />
          <div class="card-body">
           
            <div class="d-flex justify-content-between mb-3">
              <h5 class="mb-0"><?php echo $productName?></h5>
              <h5 class="text-dark mb-0"><?php echo $prices ?></h5>
            </div>

            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted mb-0">Available: <span class="fw-bold"> <?php echo $number_of_product ?></span></p>
            </div>
                <!-- <a class="btn btn-outline-primary btn-sm" href="" data-abc="true">View Products</a>  -->
                <?php echo '<a class="btn btn-outline-primary btn-sm" href="index.php?page=detailProduct&price='.$row['prices'].'&image='.$row['image'].'&productName='.$row['productName'].'" data-abc="true">View Products</a> '
                 ?>
          </div>
        </div>
      </div>
    <?php } ?>


     
    </div>

<nav aria-label="Page navigation example" class="pt-5">
   <ul class="pagination">
  <?php if(isset($_GET['page-nr']) && $_GET['page-nr']>1){ ?>
    <li class="page-item"><a class="page-link" href="index.php?page=product&page-rn=<?php echo $_GET['page-nr']-1; ?>">Previous</a></li>


    <?php } else{ ?>

      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <?php }?>
      <?php
          for($counter=1;$counter<=$number_pages;$counter++){
      ?>
          <li class="page-item"><a class="page-link" href="index.php?page=product&page-nr=<?php echo $counter; ?>"><?php echo $counter; ?></a></li>
      <?php }?>

    
<!--     
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li> -->
    <?php if(!isset($_GET['page-nr'])){ ?>
        <li class="page-item"><a class="page-link" href="index.php?page=product&page-nr=2">Next</a></li>

    <?php }else {?>
        <?php if($_GET['page-nr']>=$number_pages){?>

          <li class="page-item"><a class="page-link" href="#">Next</a></li>
          <?php }else {?>

              <li class="page-item"><a class="page-link" href="index.php?page=product&page-nr=<?php echo $_GET['page-nr']+1;?>">Next</a></li>
              
            <?php }?>

      <?php }?>
  </ul>
</nav>

</section>


<?php include "includes/footer.php"?>


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