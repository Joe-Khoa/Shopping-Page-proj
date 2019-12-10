  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      
        
        <div class="page-content">
          
            <div class="account-login">
              
            <div class=" <?=isset($_SESSION['crPassSuccess'])?'alert alert-success':'';?> 
                        <?=isset($_SESSION['crPassErr'])?'alert alert-danger':'';?>" role="alert">
                        <?=isset($_SESSION['crPassSuccess'])? $_SESSION['crPassSuccess']:null; unset($_SESSION['crPassSuccess']);?>
                        <?=isset($_SESSION['crPassErr'])? $_SESSION['crPassErr']:null; unset($_SESSION['crPassErr']);?>

            </div>
              
              <div class="" style='text-align :center'>
                <h4><b>Create Password </b> </h4>

               <form action="http://localhost/shopping-page/public/RegisterController/createPassWord" method="POST">
                    <div class="mt-3">
                      <label for="emmail_login">Password<span class="required">*</span></label>
                      <div class="col-12">
                            <input style="height:25px;" class="col-6" id="emmail_login" type="password" name="regPassword" class="form-control">
                      </div>
                    </div>

                    <div class="mt-3">
                        <label for="password_login">Re-Password<span class="required">*</span></label>
                        <div class="col-12">
                            <input style="height:25px;" class="col-6" id="password_login" type="password" name="Re-regPassword" class="form-control">
                        </div>
                        <button class="button mt-4" type="submit"><i class="fa fa-lock"></i>&nbsp; <span>Submit</span></button>
                    </div>
                </form> 
              </div>

   
    
        </div>
      </div>

    </div>
  </section>
  <!-- Main Container End --> 