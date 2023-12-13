<?php include"includes/db.php"; ?>
<?php include"includes/header.php"; ?>

 

  
<div class="container" style="background-color: white; border-radius:5px;">
    <div class="row ">
        <div class="col-lg-12 d-flex justify-content-center">
            <!-- Pills navs -->
            <div class="card " style="width: 25rem;">
          <div class="card-body  ">

<!-- Pills content -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form action="login_processing.php" method="post">
       
        
    <h1 class="justify-content-center text-center" style="margin: 50px;">Login</h1>
    

      <!-- Email input -->
      
      <div class="form-outline mb-4">
      <h6 class="text-center"><?php
       if(isset($_SESSION['message'])){
         echo $_SESSION['message'];
         unset($_SESSION['message']);
       } ?></h6>
      <label class="form-label" for="loginName">Email</label>
        <input type="email" id="loginName" class="form-control" name="email" value="<?php if($_SESSION['checkRetain']){ echo $_SESSION['retainEmail'];} ?>" >
      </div>
      


      <!-- Password input -->
      <div class="form-outline mb-4">
      <label class="form-label" for="loginPassword">Password</label>
        <input type="password" id="loginPassword" class="form-control" name="password" />
        <p id="errorPassMessage" style="color: red; display:none; ">*Your password must be greater than 8 characters</p>
      </div>
     

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#!">Forgot password?</a>
        </div>
      </div>

      <!-- Submit button -->
    
      <input type="submit" role="button"  class="btn btn-primary btn-block mb-4" value="Sign in" name="signin">

      <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a href="index.php?page=register">Register</a></p>
      </div>
    </form>
  </div>
  <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
    <form >
      <div class="text-center mb-3">
        <p>Sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

      <p class="text-center">or:</p>

      <!-- Name input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerName" class="form-control" />
        <label class="form-label" for="registerName">Name</label>
      </div>

      <!-- Username input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerUsername" class="form-control" />
        <label class="form-label" for="registerUsername">Username</label>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="registerEmail" class="form-control" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerPassword" class="form-control" />
        <label class="form-label" for="registerPassword">Password</label>
      </div>

      <!-- Repeat Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerRepeatPassword" class="form-control" />
        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
      </div>

      <!-- Checkbox -->
      <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
          aria-describedby="registerCheckHelpText" />
        <label class="form-check-label" for="registerCheck">
          I have read and agree to the terms
        </label>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
    </form>
  </div>
</div>
<!-- Pills content -->
        </div>
    </div>
</div>

</div>
</div>

<?php include"includes/footer.php"; ?>