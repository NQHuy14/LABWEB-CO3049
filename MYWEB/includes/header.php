<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>




    <!-- Custom CSS -->
    <link rel="stylesheet" href="app.css" />
   

    <title>SALE</title>
  </head>

  <body>
    <header>
      <nav
        id="mainNavbar"
        class="navbar navbar-dark navbar-expand-lg py-0 fixed-top"
      >
        <div class="container-fluid">
          <a href="#" class="navbar-brand"
            ><img src="img/apple-logo.jpg" alt="LOGO" id="logo"
          /></a>
          <button
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navLinks"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navLinks">
            <ul class="navbar-nav">
            
              <li class="nav-item">
                <a href="index.php?page=home" class="nav-link">HOME</a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=product" class="nav-link">PRODUCT</a>
              </li>   
              <?php
                if(!isset($_SESSION['name'])){
              
              
              ?>

                <li class="nav-item">
                  <a href="index.php?page=login" class="nav-link">LOGIN</a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=register" class="nav-link">REGISTER</a>
                 </li>


                 <?php  }?>
                
             
              <li class="nav-item  dropdown" style="margin-left: auto;"> <!-- Add dropdown class to the list item -->
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo isset($_SESSION['name'])? $_SESSION['name']:"GUESS";?></a>
                <div class="dropdown-menu"> <!-- Dropdown menu content -->
                  <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> userLevel:<?php echo isset($_SESSION['userLevel'])? $_SESSION['userLevel']:"N/A";?></a>
                  <a class="dropdown-item" href="index.php?page=payment">  <i class="fa fa-credit-card"></i> Deposit</a>
                  <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
  <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
</svg> Amount: $ <?php echo isset($_SESSION['amount'])? $_SESSION['amount']:0.00; ?> </a>
                  <a class="dropdown-item" href="index.php?page=logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> LOG OUT</a>
                </div>
              </li>             
            </ul>
            <link rel="stylesheet" href="app.css" />
          <form class="d-flex ms-auto" action="search.php" method="post" id="form-search">
                <input type="search" class="form-control me-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="search" id="search-input"  autocomplete="off"/>
                <input type="submit" role="button" value="search" class="btn btn-outline-light" name="submitSearch">     
                <ul class="drop" id="drop"> 
                </ul>
          </form>

          </div>
        </div>
        
      </nav>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

      <script>
      
      $(document).ready(function(){
        $("#search-input").keyup(function(){
          var value = $(this).val();
          if(value!=""){
            $.ajax({
              url:"action.php",
              method:"POST",
              data:{ value: value},
              success:function(data){
                $("#drop").html(data);
                $("#drop").show();

              }


            });
          }
          $("body").on('click', () => {
            $('#drop').css('display', 'none');
          });
        });
          
        
      });
</script>





<style>

#drop {
  display: none; 
  background: #fff;
  position: absolute;
  width: 100%;
  top: 47px;
  border-radius: 30px;
  padding: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.05), 0 0 2px rgba(0, 0, 0, 0.05),
    0 0 3px rgba(0, 0, 0, 0.05), 0 0 4px rgba(0, 0, 0, 0.05),
    0 0 5px rgba(0, 0, 0, 0.05), 0 0 4px rgba(0, 0, 0, 0.05),
    0 0 5px rgba(0, 0, 0, 0.05);
}
#drop li {
  list-style: none;
  text-align: left;
}
#drop li a {
  display: block;
  padding: 8px;
  text-decoration: none;
  color: #222;
  font-size: 18px;
  font-weight: bold;
}
#drop li a:hover {
  background: #eee;
}

  </style>
    </header>

    


    <main>
