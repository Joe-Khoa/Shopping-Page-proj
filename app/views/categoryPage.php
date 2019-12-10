

    <!-- Main Container -->
    <div class="main-container col2-left-layout">
      <div class="container">
        <div class="row">
          <div class="col-main col-xs-12">
            <div class="shop-inner">
              <div class="page-title">
                <h2>Apple</h2>
              </div>

              <div class="product-grid-area">
                <ul class="products-grid">
                  <?php foreach ($data['catePrduct'] as $catPro) : ?>
                      <li class="item col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <div class="product-item">
                          <div class="item-inner">
                            <div class="product-thumbnail">
                              <?php if ($catPro->promotion_price) :?>
                                  <div class="icon-sale-label sale-left">Sale</div>
                              <?php endif;?>
                              <?php if ($catPro->new) :?>
                                  <div class="icon-new-label new-right">New</div>
                              <?php endif;?>
                              <div class="pr-img-area">
                                <a title="Ipsums Dolors Untra" 
                                    href="http://localhost/shopping-page/public/detailController/detail/<?=$catPro->url;?>">
                                  <figure>
                                    <img class="first-img" src="../public/source/images/products-images/<?=$catPro->image?>" alt="">
                                    <img class="hover-img" src="../public/source/images/products-images/<?=$catPro->image?>" alt="">
                                  </figure>
                                </a>
                                <button type="button" class="add-to-cart-mt" data-id = "<?=$catPro->id?>">
                                  <i class="fa fa-shopping-cart"></i>
                                  <span> Add to Cart</span>
                                </button>
                              </div>

                            </div>
                            <div class="item-info">
                              <div class="info-inner">
                                <div class="item-title">
                                  <a title="Ipsums Dolors Untra" 
                                    href="http://localhost/shopping-page/public/detailController/detail/<?=$catPro->url;?>">
                                    <?=$catPro->name?></a>
                                </div>
                                <div class="item-content">

                                  <div class="item-price">
                                    <div class="price-box">
                                      <span class="regular-price">
                                        <span class="price">
                                          <?=number_format($catPro->promotion_price !=0?$catPro->promotion_price:$catPro->price,0,',','.').' ₫'?></span>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                  <?php endforeach ;?>

                </ul>
              </div>
              <div class="pagination-area ">
                  <?=$data['showPagination'];?>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Main Container End -->
    <!-- Footer -->

