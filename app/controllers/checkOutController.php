<?php
require_once '../app/core/Controller.php';
require_once '../app/core/extension/functions.php';
require_once '../app/core/extension/cart.php';
require_once '../app/core/extension/PHPMailer/sendmail.php';

session_start();

class checkOutController extends Controller{
    public function getCheckOutPage(){
        // echo 'checkOutPage';
        parent::view("MasterLayout",['detail' => 'checkout'
        ]);
    }
    public function orderConfirm(){
        if($_POST['name'] =='' or $_POST['email'] =='' or $_POST['addr'] =='' 
        && $_POST['gender'] =='' or $_POST['phone'] == '' or $_POST['payMed'] ==''){
            header("location:http://localhost/shopping-page/public/checkOutController/getCheckOutPage");
            return;
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $addr   = $_POST['addr'];
        $gender   = $_POST['gender'];
        $phone = $_POST['phone'];
        $payMed = $_POST['payMed'];
        $note = isset($_POST['note'])?$_POST['note']:'';
        $token = createToken(30);
            // insert  Customer  Table ( // MANAGE CUSTOMER )
                    //| id | name | gender | email | address | phone
        $model = parent::model('checkOutModel');
        $idCusto = $model->insertCusto($name,$gender,$email,$addr,$phone);
            // insert Bill ( GENERAL +customer Bill NOT SHOW ANY PRODUCT just MONEY AND ...)
                    // id | id_customer | date_order | total | promt_price | payment_method | note | token | token_date | status
        $cart = isset($_SESSION['cart'])?$_SESSION['cart']:null;
        // $cart = new Cart($oldCart);
    
        if (isset($_SESSION['cart']) == null){
            $_SESSION['err'] = 'No products are bought yet, please by products     <a href="http://localhost/shopping-page/public/index.html">click here to gome to home page</a>
            !' ;
            header('location: http://localhost/shopping-page/public/checkOutController/getCheckOutPage');
            return; 
        }
        $promptPrice = $cart->promtPrice;
        $totalPrice = $cart->totalPrice;
        $total = $cart->totalQty;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        date_default_timezone_get();
        $currentTimeInSecond = time();
        $tokenDay = date('Y-m-d H:i:s',$currentTimeInSecond);
   
        $currentDay = date('Y-m-d',$currentTimeInSecond);
        $idBill = $model->insertBill($idCusto,$currentDay,$total,$promptPrice,$payMed,$note,$token,$tokenDay,$status = 0); // when add the data to bill status = 0
        // $currentTimeInSecond+=86400/8; // expire time( 3 hr)
        // echo $currentDay = date('H:i:s d-m-Y',$currentTimeInSecond);

            // insert Bill ( Which product is DETAIL SOLD PRODUCTS-Bill) Whole $cart -> A PRODUCT
                    //id  | id_bill | id_product | quantity | price | discount_price (p price with quantity)
            /* READ THIS FOR INCOMPLETE OBJECT 
            https://stackoverflow.com/questions/28450125/how-to-access-bean-objects-in-session-php-incomplete-class-object */
        echo '<pre>';       
        // print_r($_SESSION['cart']);
        $items = $cart->items;
        foreach ( $items as $prodId => $prodItem){
           $idProd =  $prodId;
           $qty = $prodItem['qty'];
           $price = $prodItem['price'];
           $ptPrice = $prodItem['promotionPrice'];
           $idDetailBill = $model->insertBillDetail($idBill,$idProd,$qty,$price,$ptPrice);
        }
        //send-mail
        $promptPriceNoFrmat = number_format($promptPrice,'0',',','.');
        $subject = "Order confirmation email";
        $link = "http://localhost/shopping-page/public/checkOutController/VerifyToken/$token";
        $body = " <h2> Order confirmation email </h2>
        <p> Thank Mr(Mrs): $name for order products from our company</p>
        <p> Order detail total products :</p>
        <p> Total products : $qty items</p>
        <p> Total_price: $$promptPriceNoFrmat </p>
        <p> Please click on this link to confirm your order : <a href='$link'>link</a>  </p>";

        sendMail($email, $name, $body, $subject);
        $_SESSION['success'] = ' An email have sent to your mailbox, please click on the atteched link to confirm order';
        header('location: http://localhost/shopping-page/public/checkOutController/getCheckOutPage');
    }
    
    public function VerifyToken(){
        // echo '<pre>';print_r( $_GET['url'] );
        
        $url = isset($_GET['url']) ? explode('/',trim($_GET['url'])) : [];
        if ( $url[2]  == null ){
            $_SESSION['err'] = " Token is not sent, please check out again";
            header('location: http://localhost/shopping-page/public/checkOutController/getCheckOutPage');
            return false;   
        }
        $mailTokn = $url[2];
        $model = parent::model('checkOutModel');
        //check token 
        $id_dateByTkn = $model->getIdBymailedToken($mailTokn);
        // $id_dateByTkn = $model->getIdBymailedToken('sfdsfdsfgdd');
        // if ($id_dateByTkn == null){
        //     echo 'a';
        // }  ;
        // die;

        if( $id_dateByTkn == null){
            $_SESSION['err'] = " Token is not found in DB, please fill form again";
            // echo 'die here'; die;
            header('location: http://localhost/shopping-page/public/checkOutController/getCheckOutPage');
            return false;            
        };
        // echo 'found Token-id, verify succeed !'; 
        // print_r($id_dateByTkn) ; die;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $toknDate = $id_dateByTkn[0]->token_date;
        $idBill = $id_dateByTkn[0]->id;
        $now = date('Y-m-d H:i:s' );
        $diff = (time() - strtotime($toknDate))/60 ;
        $_SESSION['timeIn'] = time() +2*60 ; // Session 2 mins
        // die;
    
        if( 10 - $diff >= 0 ){
            $status = $model->updateStatus($idBill);
            // $status = null;
            if ($status != 0 && $status != null){
                $_SESSION['success'] =' order confirm sucesfully !  <a href="http://localhost/shopping-page/public/index.html">click here for going to home page</a>
                !' ;
                unset($_SESSION['cart']);
                header('location: http://localhost/shopping-page/public/checkOutController/getCheckOutPage');
                return false;
            }
            else{
                $_SESSION['err'] = "there is an err, Plz try again";
                header('location: http://localhost/shopping-page/public/checkOutController/getCheckOutPage');
                //http://shopping0205.dx.am/public/categorycontroller/getcategoryPage/5/1
                return false;

            }
        }
        else{
            $_SESSION['err'] = ' Session is out of time, please try again ';
            unset($_SESSION['cart']);
            header('location: http://localhost/shopping-page/public/checkOutController/getCheckOutPage');
            return false;

        }
    }
}
?>
