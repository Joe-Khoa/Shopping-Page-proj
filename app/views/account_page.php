  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      
        
        <div class="page-content">
          
            <div class="account-login">
              
   
              
              <div class="box-authentication">
                <h4>Login</h4>
               <p class="before-login-text">Welcome back! Sign in to your account</p>
                        <div class="<?=isset($_SESSION['success'])?'alert alert-success':'';?> 
                              <?=isset($_SESSION['lgnErr'])?'alert alert-danger':'';?>" role="alert">
                                <?=isset($_SESSION['success'])? $_SESSION['success']:null; unset($_SESSION['success']);?>
                                <?=isset($_SESSION['lgnErr'])? $_SESSION['lgnErr']:null; unset($_SESSION['lgnErr']);?>
                        </div>
               <form action="http://localhost/shopping-page/public/logincontroller/loginProcessing" method="POST">

                  <label for="emmail_login">Email address<span class="required">*</span></label>
                  <input id="emmail_login" type="text" name="lgnEmail" class="form-control">
                  <label for="password_login">Password<span class="required">*</span></label>
                  <input id="password_login" type="password" name="lgnPassword" class="form-control">
                  <p class="forgot-pass"><a href="#">Lost your password?</a></p>
                  <button class="button" type="submit"><i class="fa fa-lock"></i>&nbsp; <span>Login</span></button>
                  <label class="inline" for="rememberme">
                      <input type="checkbox" value="forever" id="rememberme" name="lgnRememberme"> Remember me
                  </label>
                </form> 
              </div>
              <div class="box-authentication">

              <div class="<?=isset($_SESSION['regSuccess'])?'alert alert-success':'';?> 
                        <?=isset($_SESSION['regErr'])?'alert alert-danger':'';?>" role="alert">
                        <?=isset($_SESSION['regSuccess'])? $_SESSION['regSuccess']:null; unset($_SESSION['regSuccess']);?>
                        <?=isset($_SESSION['regErr'])? $_SESSION['regErr']:null; unset($_SESSION['regErr']);?>
              </div>

                <h4>Register</h4><p>Create your very own account</p> 											
                <form action="http://localhost/shopping-page/public/RegisterController/registerProcessing" method="POST">
                    <label for="emmail_register">Email address<span class="required">*</span></label>
                    <input id="emmail_register"  name= "regEmail" type="text" class="form-control">
                    <button type = "submit" class="button"><i class="fa fa-user"></i>&nbsp; <span>Register</span></button>
                </form>
                <div class="register-benefits">
												<h5>Sign up today and you will be able to :</h5>
												<ul>
													<li>Speed your way through checkout</li>
													<li>Track your orders easily</li>
													<li>Keep a record of all your purchases</li>
												</ul>
											</div>
              </div>
   
    
        </div>
      </div>

    </div>
  </section>
  <!-- Main Container End --> 