<!DOCTYPE html>
<html lang="en">

<script type="text/javascript" src="../public/source/js/jquery.min.js"></script>


<head>
  <base href="http://localhost/shopping-page/public/">
  <!-- <base href="http://shopping0205.dx.am/public/"> -->
  <!-- Basic page needs -->
  <meta charset="utf-8">
  <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MyStore premium HTML5 &amp; CSS3 template</title>
  <meta name="description"
    content="best template, template free, responsive theme, fashion store, responsive theme, responsive html theme, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template">
  <meta name="keywords"
    content="bootstrap, ecommerce, fashion, layout, responsive, responsive template, responsive template download, responsive theme, retail, shop, shopping, store, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template" />
  <!-- Mobile specific metas  , -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon  -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700italic,700,400italic' rel='stylesheet'
    type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet'
    type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Dosis:400,300,200,500,600,700,800' rel='stylesheet'
    type='text/css'>



  <!-- JS-style -->
  <!-- jquery js -->
  <script type="text/javascript" src="../public/source/js/jquery.min.js"></script>

  <script type="text/javascript" src="../public/source/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../public/source/js/jquery-ui.js"></script>



  <!-- CSS Style -->
  <link rel="stylesheet" type="text/css" href="../public/source/css/style.css" media="all">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="../public/source/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../public/source/css/bootstrap.css">


  <!-- <link rel="stylesheet" href="../public/source/bootstrap-4.3.1-dist/css/bootstrap.css" media="all"> -->
  <!-- <link rel="stylesheet" href="../public/source/bootstrap-4.3.1-dist/css/bootstrap.min.css"  > -->
  <!-- <link rel="stylesheet" href="../public/source/bootstrap-4.3.1-dist/css/bootstrap.js" media="all"> -->
  <!-- <link rel="stylesheet" href="../public/source/bootstrap-4.3.1-dist/css/bootstrap.bundle.js" media="all">
  <link rel="stylesheet" href="../public/source/bootstrap-4.3.1-dist/css/bootstrap.bundle.min.js" media="all">
  <link rel="stylesheet" href="../public/source/bootstrap-4.3.1-dist/css/popper.min.js" media="all"> -->

  <!-- <link href="../../"> -->
  <!-- <a href=""></a> -->


  <!-- font-awesome & simple line icons CSS -->
  <link rel="stylesheet" type="text/css" href="../public/source/css/font-awesome.css" media="all">
  <link rel="stylesheet" type="text/css" href="../public/source/css/simple-line-icons.css" media="all">
  <link rel="stylesheet" type="text/css" href="../public/source/font-awesome/css/fontawesome-all.min.css" media="all">


  <!-- owl.carousel CSS -->
  <link rel="stylesheet" type="text/css" href="../public/source/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="../public/source/css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="../public/source/css/owl.transitions.css">

  <!-- animate CSS  -->
  <link rel="stylesheet" type="text/css" href="../public/source/css/animate.css" media="all">

  <!-- flexslider CSS -->
  <link rel="stylesheet" type="text/css" href="../public/source/css/flexslider.css">

  <!-- jquery-ui.min CSS  -->
  <link rel="stylesheet" type="text/css" href="../public/source/css/jquery-ui.css">

  <!-- Revolution Slider CSS -->
  <link href="../public/source/css/revolution-slider.css" rel="stylesheet">

  <!-- style CSS -->

  <!-- 


<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('.mega-menu-category').hide();
  })
</script>  -->
  <!-- 
<script>
  $(document).ready(function(){
    $('.mega-menu-category').hide();
    
  })
</script> -->



</head>

<?php 
$s = '';
if (isset($_SESSION['cart'])){
$s= $_SESSION['cart'];
}

?>

<body class="cms-index-index cms-home-page">
  <div id="page">

    <!-- Header -->
    <header>
      <div class="header-container">
        <div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-sm-4 hidden-xs">
                <!-- Default Welcome Message -->
                <div class="welcome-msg ">Welcome to MyStore! </div>
                <span class="phone hidden-sm">Call Us: +123.456.789</span>
              </div>

              <!-- top links -->
              <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
                <div class="links">
                  <div class="myaccount">
                    <a title="My Account" href="LoginController/getloginpage">
                      <i class="fa fa-user"></i>
                      <span class="hidden-xs">My Account</span>
                    </a>
                    <span style="background-color: #f5f79b;"
                      class="text-primary"><?=isset($_SESSION['name'])?$_SESSION['name']:'';?></span>

                  </div>

                  <div class="login">
                    <a
                      href="LoginController/<?=isset($_SESSION['name'])?'logOutProcess':'loginProcessing';?> ">
                      <i class="fa fa-unlock-alt"></i>
                      <span class="hidden-xs"><?=isset($_SESSION['name'])?'Log Out':'Log In';?></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-12">
              <!-- Header Logo -->
              <div class="logo">
                <a title="e-commerce" href="index.html">
                  <img alt="responsive theme logo" src="../public/source/images/logo.png">
                </a>
              </div>
              <!-- End Header Logo -->
            </div>
            <div class="col-xs-9 col-sm-6 col-md-6">
              <!-- Search -->

              <div class="top-search">
                <div id="search">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" name="search">
                      <button class="btn-search" type="button">
                        <i class="fa fa-search"></i>
                      </button>
                      <div class="showSearchData">
                        
                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>



              <style>
               

              </style>
              <!-- End Search -->
            </div>
            <!-- top cart -->
            <div class="col-lg-3 col-xs-3 top-cart">
              <div class="top-cart-contain">
                <div class="mini-cart">
                  <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                    <a href="Cartcontroller/getCartpage">
                      <div style="cursor:pointer;" class="cart-icon">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                      <div class="shoppingcart-inner hidden-xs">
                        <span class="cart-title">Shopping Cart</span>
                        <span class="cart-total">
                          <span class="cartTotalShow ">
                            <div class="totalNo"></div>
                          </span>
                          <span>
                            <!-- ?=isset($_SESSION['cart'])?(' item(s)'.number_format($_SESSION['cart']->promtPrice,0,',','.').' ₫'):''?> -->
                          </span>
                        </span>
                        <p class="addToCart-tille"></p>

                      </div>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->

    <!-- Navbar -->
    <nav>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-4">
            <div class="mm-toggle-wrap">
              <div class="mm-toggle">
                <i class="fa fa-align-justify"></i>
              </div>
              <span class="mm-label">Categories</span>
            </div>
            <div class="mega-container visible-lg visible-md visible-sm">
              <div class="navleft-container">
                <div class="mega-menu-title" style="cursor:pointer;">
                  <h3 class="h3-cate">Categories</h3>
                </div>
                <div class="mega-menu-category" id="mega-menu-category-only">
                  <ul class="nav">
                    <?php foreach ($categories as $cateName ) :?>
                    <li class="nosub">
                      <a
                        href="categorycontroller/getcategoryPage/<?=$cateName->id?>/1">
                        <i class="icon fa <?=$cateName->icon?>"></i> <?=$cateName->name?></a>
                    </li>
                    <?php endforeach; ?>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-8">
            <div class="mtmegamenu">
              <ul>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item">
                    <a href="index.html">
                      <div class="title title_font">
                        <span class="title-text">Home</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="indexcontroller/contactus">
                      <div class="title title_font">
                        <span class="title-text">Contact Us</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="indexcontroller/aboutUs">
                      <div class="title title_font">
                        <span class="title-text">about us</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item">
                    <a href="" id="blog-id">
                      <div class="title title_font">
                        <span class="title-text">Blog</span>
                      </div>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- end nav -->

    <!-- main container ADD the sub-HTML to this place  -->

    <?php require_once $data["detail"].'.php' ?>

    <!-- Footer -->




    <!-- popUP -->




    <!-- model -->
    <footer>
      <div class="footer-newsletter">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-7">
              <form id="newsletter-validate-detail" method="post" action="#">
                <h3 class="hidden-sm">Sign up for newsletter</h3>
                <div class="newsletter-inner">
                  <input class="newsletter-email" name='Email' placeholder='Enter Your Email' />
                  <button class="button subscribe" type="submit" title="Subscribe">Subscribe</button>
                </div>
              </form>
            </div>
            <div class="social col-md-4 col-sm-5">
              <ul class="inline-mode">
                <li class="social-network fb">
                  <a title="Connect us on Facebook" target="_blank" href="https://www.facebook.com/">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="social-network googleplus">
                  <a title="Connect us on Google+" target="_blank" href="https://plus.google.com/">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </li>
                <li class="social-network tw">
                  <a title="Connect us on Twitter" target="_blank" href="https://twitter.com/">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="social-network linkedin">
                  <a title="Connect us on Linkedin" target="_blank" href="https://www.pinterest.com/">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
                <li class="social-network rss">
                  <a title="Connect us on Instagram" target="_blank" href="https://instagram.com/">
                    <i class="fa fa-rss"></i>
                  </a>
                </li>
                <li class="social-network instagram">
                  <a title="Connect us on Instagram" target="_blank" href="https://instagram.com/">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-coppyright">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-xs-12 coppyright"> Copyright © 2018 MyStore. Edit by
              <a href="https://www.facebook.com/huongnguyen.nh"> Huong </a>. All Rights Reserved. </div>
            <div class="col-sm-6 col-xs-12">
              <div class="payment">
                <ul>
                  <li>
                    <a href="#">
                      <img title="Visa" alt="Visa" src="../public/source/images/visa.png">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img title="Paypal" alt="Paypal" src="../public/source/images/paypal.png">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img title="Discover" alt="Discover" src="../public/source/images/discover.png">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img title="Master Card" alt="Master Card" src="../public/source/images/master-card.png">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <a href="#" class="totop"> </a>
    <!-- End Footer -->

    <!-- Modal -->




  </div>

  <!-- Modal -->

  <!-- end Modal -->


  <!-- JS -->

  <!-- jquery js -->
  <script type="text/javascript" src="../public/source/js/jquery.min.js"></script>

  <script type="text/javascript" src="../public/source/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../public/source/js/jquery-ui.js"></script>



  <!-- bootstrap js -->
  <script type="text/javascript" src="../public/source/js/bootstrap.min.js"></script>


  <!-- owl.carousel.min js -->
  <script type="text/javascript" src="../public/source/js/owl.carousel.min.js"></script>

  <!-- bxslider js -->
  <script type="text/javascript" src="../public/source/js/jquery.bxslider.js"></script>

  <!-- Slider Js -->
  <script type="text/javascript" src="../public/source/js/revolution-slider.js"></script>

  <!-- megamenu js -->
  <script type="text/javascript" src="../public/source/js/megamenu.js"></script>
  <script type="text/javascript">
    /* <![CDATA[ */
    var mega_menu = '0';

    /* ]]> */
  </script>

  <!-- jquery.mobile-menu js -->
  <script type="text/javascript" src="../public/source/js/mobile-menu.js"></script>

  <!--jquery-ui.min js -->
  <script type="text/javascript" src="../public/source/js/jquery-ui.js"></script>

  <!-- main js -->
  <script type="text/javascript" src="../public/source/js/main.js"></script>

  <!-- countdown js -->
  <script type="text/javascript" src="../public/source/js/countdown.js"></script>

  <!-- Revolution Slider -->
  <script type="text/javascript">
    jQuery(document).ready(function () {
      jQuery('.tp-banner').revolution(
        {
          delay: 9000,
          startwidth: 1170,
          startheight: 530,
          hideThumbs: 10,

          navigationType: "bullet",
          navigationStyle: "preview1",

          hideArrowsOnMobile: "on",

          touchenabled: "on",
          onHoverStop: "on",
          spinner: "spinner4"
        });
      jQuery('.cart-icon, .cart-title, .totalNo').click(function () {
        window.location = 'cartcontroller/getcartpage';
      })
    });
  </script>




  <div id="wrapper">
    <div id="modal">
      <i id="close" class="far fa-window-close"></i>
      <p> You have added
        <b class="modalProdName text-success"> &nbsp </b>
        to cart!</p>
      <a href="Cartcontroller/getCartpage">Click here</a>
      <p>to go to shopping cart.</p>
    </div>
  </div>



</body>

</html>