<?php 

$items =isset($_SESSION['cart']) ? $_SESSION['cart']->items:'';
$cart = isset($_SESSION['cart']) ? $_SESSION['cart']:'';
// echo '<pre>';print_r($cart); die;

?>


  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Product</th>
                      <th>Description</th>
                      <th>Avail.</th>
                      <th>Unit price</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th  class="action"><i class="fa fa-trash-alt" style = ' cursor: pointer;'  ></i></th>
                    </tr> 
                  </thead>
                  <tbody class="body-Purchased">

                    <?php  if (isset($_SESSION['cart']) && $_SESSION['cart']->totalQty > 0) :?>
                      <?php foreach ($items as $item) :?>
                        <tr class ='tr-pro-id-<?=$item['item']->id?>'>
                          <td class="cart_product"><a href="#"><img src="../public/source/images/products-images/<?=$item['item']->image?>" alt="Product"></a></td>
                          <td class="cart_description"><p class="product-name"><a href="#"><?=$item['item']->name?></a></p>
                            <small>
                                <?=$item['item']->detail?>
                            </small><br>
                          <td class="availability in-stock"><span class="label">In stock</span></td>
                          <td class="price"><span>
                            <span >
                                  <?= number_format($item['item']->promotion_price != 0 ? $item['item']->promotion_price : $item['item']->price,0,',','.').' ₫' ?>
                              </span>
                              <p  style="text-decoration: line-through; color : grey; font-size : 11px ;">
                                  <?= $item['item']->promotion_price != $item['item']->price ?  number_format($item['item']->price,0,',','.').' ₫':''; ?>
                              </p>                            
                            </span>
                          </td>
                          <td class="qty d-flex justify-content-center">
                            <input class="form-control input-sm" id ="input-<?=$item['item']->id;?>" type="text" value="<?=$item['qty']?>">
                            <i id ="<?=$item['item']->id;?>" class="fas fa-edit" style = ' cursor: pointer;'></i>
                          </td>
                          <td class="price">
                            <span class = 'promtPrice-<?=$item['item']->id?>'>
                                <?= number_format($item['promotionPrice'] != 0 ? $item['promotionPrice'] : $item['price'],0,',','.').' ₫' ?>
                            </span>
                            <p class = "price-<?=$item['item']->id?>" style="text-decoration: line-through; color : grey; font-size : 11px ;">
                                <?= ($item['promotionPrice'] != $item['price']) ?  number_format($item['price'],0,',','.').' ₫':''; ?>
                            </p>
                          </td>
                          <td class="action"><i id-del = "<?=$item['item']->id?>" style = ' cursor: pointer;' class="icon-close delProd" style ></i></td>
                        </tr>
                      <?php endforeach;?>
                    <?php  endif;?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3" >Total price </td>
                      <td colspan="2" style="text-decoration: line-through; color : grey;">
                        <b class ="totalPrice">
                            <?php echo isset($_SESSION['cart'])? number_format($cart->totalPrice,0,',','.').' ₫':'';?> 
                        </b>
                    </td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong >Total Promotion Price</strong></td>
                      <td colspan="2"><strong class ="totalPromtPrice">
                        <?php echo isset($_SESSION['cart'])? number_format($cart->promtPrice,0,',','.').' ₫':'';?> 

                    </strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="#"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a>
              <a class="checkout-btn" href="http://localhost/shopping-page/public/checkOutController/getCheckOutPage"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



<!-- <script  type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('.add-to-cart-mt, .button-cart').click(function(){
      let id = ($(this).attr('data-id'));
      console.log(id);
        $.ajax({
          url: 'http://localhost/shopping-page/public/CartController/chooseAction',
          type: 'POST',
          data : {
            id : id,
            quantity : 1,
            action : 'addCart'
            // action : 'delCart'
            // action : 'editCart'

          },
          dataType : 'JSON',
          success : function(response){
            console.log(response);
            // if(response.success{
            //     // $('<div class=""></div>addToCart-tille').text(response.)
            // })
          }
        })
    });
  
    jQuery('.delProd').click(function(){
      let idDel = $(this).attr('id-del');
      // alert('idDel');
      $.ajax({
          url: 'http://localhost/shopping-page/public/CartController/chooseAction',
          type : 'POST',
          data : {
                  id : idDel,
                  action : 'delCart'                 
          },
          dataType : 'JSON',
          success : function(response){
            console.log(response);
          }
      })

      
    })

    jQuery('.fa-trash-alt').click(function(){
      $.ajax({
          url : 'http://localhost/shopping-page/public/CartController/chooseAction',
          type :'POST',
          data :{
            action :'deleteAllCart'
          },
          dataType : 'JSON',
          success : function(response){
              console.log(response)
          }

      })
    })
    jQuery('.fa-edit').click(function(){
      let idEdit = $(this).attr('id');
      // let quantity = $(this).siblings('input').val();
      let quantity = $(this).prev('input').val();
      console.log(idEdit);
      console.log(quantity);
      $.ajax({
        url : 'http://localhost/shopping-page/public/CartController/chooseAction',
        type : 'POST',
        data : {
          id : idEdit, 
          qty : quantity,
          action : 'updateCart'
        },
        dataType : 'JSON',
        success : function(response){
          console.log(response)
        }
      })
    })
  })
</script> -->