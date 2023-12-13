<?php include"includes/db.php"?>
<?php

if(isset($_POST['signup'])) {
  $username = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm= $_POST['confirm'];

  if(!empty($username)&&!empty($password)&&!empty($email)&&!empty($confirm)){

          // escaping string 
          $username = mysqli_real_escape_string($connection,$username);
          $email = mysqli_real_escape_string($connection,$email);
          $password = mysqli_real_escape_string($connection,$password);
          $confirm= mysqli_real_escape_string($connection,$confirm); 
          if($password!==$confirm){
            $message="Your confirm password is difference with password";
           
          }else{

            $hashFormat= "$2y$10$";
            $salt="iusesomecrazystrings22";
            $hashF_and_salt=$hashFormat . $salt;
            $password=crypt($password,$hashF_and_salt);
            
  
  
  
  
  
            $query = "INSERT INTO users(userName,email,password,userLevel,amout) VALUES ('$username', '$email', '$password','Bronze Member',0.00)";
            $result = mysqli_query($connection, $query);
            if(!$result){
              die("QUERY FAILED ".mysqli_error($connection).' '. mysqli_errno($connection));
            }else{
              $message="Your registration has been submitted";
            }
          }
         
          


  }else{
          $message="Fields cannot be empty";

  }
 

}else{
  $message=" ";
}


?>

<?php include "includes/header.php"?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" >
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form action="register.php" method="post">
                  <h6 class="text-center"><?php echo $message ?></h6>
                  <div class="form-row justify-content-center">
                    <div class="form-group col-8 col-md-10">
                      <label for="username">User name</label>
                      <input type="text" name="name" id="username" placeholder="user name" class="form-control">
                    </div>
                  </div>
                  <div class="form-row justify-content-center">
                    <div class="form-group col-8 col-md-10">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" placeholder="email" class="form-control">
                    </div>
                  </div>

                  <div class="form-row justify-content-center">
                    <div class="form-group col-8 col-md-10">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="loginPassword" placeholder="password" class="form-control">
                      <p id="errorPassMessage" style="color: red; display:none; ">*Your password must be greater than 8 characters</p>
                    </div>
                  </div>

                  <div class="form-row justify-content-center">
                    <div class="form-group col-8 col-md-10">
                      <label for="confirm">Confirm password</label>
                      <input type="password" name="confirm" id="confirm" placeholder="confirm password" class="form-control">
                    </div>
                  </div>

                  <!-- <div class="form-row justify-content-center">
                    <div class="form-group col-8 col-md-10">
                      <select id="Country" size="1" class="form-select">
                          <option value="" selected="selected">-- Select Country --</option>
                      </select> 
      
                    </div>

                    <div class="form-group col-8 col-md-10">
                      <select id="City" size="1" class="form-select">
                          <option value="" selected="selected">-- Select Province --</option>
                      </select> 
      
                    </div>

                    
                    <div class="form-group col-8 col-md-10">
                      <select id="District" size="1" class="form-select">
                          <option value="" selected="selected">-- Select District --</option>
                      </select> 
      
                    </div>
                  </div>

                   -->
                  <div class="d-flex justify-content-center mb-5 mx-1 mx-md-4 mt-4">
                    <p class="lead" style="font-size: small;" >By clicking Sign Up, you agree to our <a href="#"> Terms, Privacy Policy and Cookies Policy.</a> You may receive SMS notifications from us and can opt out at any time.</p>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" value="Sign up" name="signup" class="btn btn-success">
                  </div>

                </form>

              

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="img/registerv2.jpg"
                  class="img-fluid mt-lg-5" alt="Sample image" style="margin-bottom: 150px;">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- <?php include "includes/footer.php"?> -->
<!-- <script>
  var countryStateInfo = {
  "Việt Nam": {
    "thành phố Hồ Chí Minh": [
      "10",
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      "11",
      "12",
      "Bình Thạnh",
      "Phú Nhuận",
      "Bình Tân",
      "Tân Bình",
    ],
    "Thủ đô Hà Nội": [
      "Đan Phượng",
      "Gia Lâm",
      "Đông Anh",
      "Hoài Đức",
      "Ba Vì",
    ],
  },
  "United States": {

  },
  "Japan": {

   },
   "Lao": {

   }

};


window.onload = function () {
  //todo: Get all input html elements from the DOM

    const countrySelection = document.querySelector("#Country"),
    citySelection = document.querySelector("#City"),
    DistricSelection = document.querySelector("#District");

  
  citySelection.disabled = true; 
  DistricSelection.disabled = true; 


  for (let country in countryStateInfo) {
    countrySelection.options[countrySelection.options.length] = new Option(
      country,
      country
    );
  }

  countrySelection.onchange = (e) => {
    citySelection.disabled = false;
    // todo: Clear all options from State Selection
    citySelection.length = 1; // remove all options bar first
    DistricSelection.length = 1; // remove all options bar first

    // if (e.target.selectedIndex < 1) return; // done

    // todo: Load states by looping over countryStateInfo
    for (let City in countryStateInfo[e.target.value]) {
      citySelection.options[citySelection.options.length] = new Option(
        City,
        City
      );
    }
  };

  citySelection.onchange = (e) => {
   DistricSelection.disabled = false;
   DistricSelection.length = 1; // remove all options bar first

  // Get the selected country and city
  const selectedCountry = countrySelection.value;
  const selectedCity = e.target.value;

  // Check if the selected city is not empty
  if (selectedCity) {
    // Load districts by looping over the array in countryStateInfo
    for (let district of countryStateInfo[selectedCountry][selectedCity]) {
      DistricSelection.options[DistricSelection.options.length] = new Option(
        district,
        district
      );
    }
  }
};





  
}

</script> -->