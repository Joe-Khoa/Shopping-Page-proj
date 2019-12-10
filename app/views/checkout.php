
  
<!-- Main Container -->
<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="page-content checkout-page"><div class="page-title">
          <h2>Checkout</h2>
        </div>
            <div class="box-border">
            <div class=" <?=isset($_SESSION['success'])?'alert alert-success':'';?> 
            <?=isset($_SESSION['err'])?'alert alert-danger':'';?>" role="alert">
                        <?=isset($_SESSION['success'])? $_SESSION['success']:null; unset($_SESSION['success']);?>
                        <?=isset($_SESSION['err'])? $_SESSION['err']:null; unset($_SESSION['err']);?>

            </div>
                <form action="http://localhost/shopping-page/public/checkOutController/orderConfirm" method="POST">
                        <div class="col-sm-6">
                            <label for="nameId" class="required"> Name</label>
                            <input type="text" class="input form-control" name="name" id="nameId">
                        </div>
                        <div class="col-sm-6">
                            <label for="emailId" class="required">Email Address</label>
                            <input type="text" class="input form-control" name="email" id="emailId">
                        </div>
                        <div class="col-sm-6">  
                            <label for="addressId" class="required">Address</label>
                            <input type="text" class="input form-control" name="addr" id="addressId">
                        </div>
                        <div class="col-sm-6" class ="divSelect">
                            <label for="genderdId" class = "col-12 pl-0">Gender</label>
                            <select class = "selectorInCekout col-12 form-control"  name="gender" id="genderdId">
                              <option value="male">Male</option>  
                              <option value="female">Female</option>  
                            </select>
                        </div>         
                        <div class="col-sm-6">
                            <label for="telephoneId" class="required">Telephone</label>
                            <input class="input form-control" type="text" name="phone" id="telephoneId">
                        </div>
                        <div class="col-sm-6" class ="divSelect">
                            <label for="payMedId" class = "col-12 pl-0">Payment method</label>
                            <select class = "selectorInCekout col-12 form-control"  name="payMed" id="payMedId">
                              <option value="cash">Cash</option>  
                              <option value="credit card">Credit card</option>  
                            </select>
                        </div>

                        <div class="divNote col-sm-12 pt-4">
                          <label for="col-12 noteId " >Add note for cart</label>
                          <textarea name="note" class="noteArea col-12 " id="nodeId" cols="30" rows="20"></textarea>
                        </div>
                      <div class = "col-sm-12">
                            <button class="button" type="submit"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Continue</span></button>
                      </div>
                    
                </form>

            </div>
        </div>
      </div>
      
    </div>
  </div>
  </section>
  <!-- Main Container End -->
  <!-- Footer -->
  