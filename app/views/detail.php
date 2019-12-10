
    <!-- Main Container -->
    <div class="main-container col1-layout">
      <div class="container">
        <div class="row">
          <div class="col-main">
            <?php $detail = $data['detailData'];?>
                <div class="product-view-area">
                  <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                    <!-- <div class="icon-sale-label sale-left">Sale</div> -->
                    
                      <?php if($detail->promotion_price != 0 ) echo "<div class='icon-sale-label sale-left'>Sale</div>" ;?>
                      <?php if($detail->new !=0 )  echo "<div class='icon-new-label new-right'>New</div>" ;?>      


                    <div class="large-image">
                      <a href="../public/source/images/products-images/<?=$detail->image?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                        <img class="zoom-img" src="../public/source/images/products-images/<?=$detail->image?>" alt="products"> </a>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

                    <div class="product-name">
                      <h1><?=$detail->name;?></h1>
                    </div>
                    <div class="price-box">
                      <p class="special-price">
                        <span class="price-label">Special Price</span>
                        <span class="price"> <?=number_format(($detail->promotion_price != 0 ? $detail->promotion_price: $detail->price),0,',','.').' ₫' ;?> </span>
                      </p>
                      <p class="old-price">
                        <span class="price-label">Regular Price:</span>
                        <span class="price"><?=$detail->promotion_price != 0 ? number_format($detail->price).' ₫'  : '';?> </span>
                      </p>
                    </div>

                    <div class="short-description">
                      <h2>Quick Overview</h2>
                      <p> <?=$detail->detail?></p>

                    </div>

                    <div class="product-variation">
                      <form action="#" method="post">
                        <div class="cart-plus-minus">
                          <label for="qty">Quantity:</label>
                          <div class="numbers-row">
                            <div   class="dec qtybutton">
                              <i class="fa fa-minus">&nbsp;</i>
                            </div>
                            <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                            <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                              class="inc qtybutton">
                              <i class="fa fa-plus">&nbsp;</i>
                            </div>
                          </div>
                        </div>
                        <button class="button pro-add-to-cart" data-id="<?=$detail->id?>" title="Add to Cart" type="button">
                          <span>
                            <i class="fa fa-shopping-cart"></i> Add to Cart</span>
                        </button>
                      </form>
                    </div>

                  </div>
                </div>

          </div>

        </div>
      </div>
    </div>

    <!-- Main Container End -->
    <!-- Related Product Slider -->
    <section class="upsell-product-area">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

            <div class="page-header">
              <h2>Related Products</h2>
            </div>
            <div class="slider-items-products">
              <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
                <?php foreach( $data['relatedProduct'] as $reProduct ): ?>  
                    <div class="product-item">
                      <div class="item-inner fadeInUp">
                        <div class="product-thumbnail">
                        <?php if($reProduct->promotion_price != 0 ) echo "<div class='icon-sale-label sale-left'>Sale</div>" ;?>
                        <?php if($reProduct->new !=0 )  echo "<div class='icon-new-label new-right'>New</div>" ;?>                            
                        <a href="http://localhost/shopping-page/public/detailController/detail/<?=$reProduct->url;?>">
                            <div class="pr-img-area">
                                <img class="first-img" src="../public/source/images/products-images/<?=$reProduct->image?>" alt="">
                                <img class="hover-img" src="../public/source/images/products-images/<?=$reProduct->image?>" alt="">
                                <button type="button" data-id="<?=$reProduct->id?>" class="add-to-cart-mt">
                                  <i class="fa fa-shopping-cart"></i>
                                  <span> Add to Cart</span>
                                </button>
                              </div>
                            </div>
                        </a>


                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title">
                              <a title="Ipsums Dolors Untra"
                               href="http://localhost/shopping-page/public/detailController/detail/<?=$reProduct->url;?>">
                                <?=$reProduct->name?></a>
                            </div>
                            <div class="item-content">

                              <div class="item-price">
                                <div class="price-box">
                                  <span class="regular-price">
                                    <span class="price">
                                    <?=number_format(($reProduct->promotion_price != 0 ? $reProduct->promotion_price: $reProduct->price),0,',','.').' ₫' ;?>
                                    </span>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php endforeach ;?>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Related Product Slider End -->



 