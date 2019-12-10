<?php
require_once '../app/core/extension/cart.php';
require_once '../app/core/Controller.php';
require_once '../app/models/cartModel.php';
session_start();
class CartController extends Controller {
    public function chooseAction(){
        $arrToAdd ='';
        if ( (isset($_POST['action'])) && ($_POST['action'] === 'addCart')){
            $arrToAdd = $_POST;
            // unset($_POST);
            return $this->addToCart($arrToAdd);
        }
        if ( (isset($_POST['action'])) && ($_POST['action'] === 'delCart')){
            $arrToAdd = $_POST;
            // unset($_POST);
            return $this->deleteCart($arrToAdd);
        }
        if ( (isset($_POST['action'])) && ($_POST['action'] === 'updateCart')){
            $arrToAdd = $_POST;
            // unset($_POST);
            return $this->updateCart($arrToAdd);
        }
        if ( (isset($_POST['action'])) && ($_POST['action'] === 'deleteAllCart')){
            $arrToAdd = $_POST;
            // unset($_POST);
            return $this->deleteAllCart($arrToAdd);
        }
        if ( (isset($_POST['action'])) && ($_POST['action'] === 'refresh')){
            $arrToAdd = $_POST; 
            // echo 'refresh'; die;
            // unset($_POST);
            return $this->refreshPage();
        }
        return $this->getCartPage();
    }

    public function refreshPage(){
        
        $totalQty = isset($_SESSION['cart'])?$_SESSION['cart']->totalQty:0 ;
        echo json_encode([
            'success' => true,
            'totalqty' => $totalQty
        ]);
        return false;
    }
    public function getCartPage(){   

        parent::view('MasterLayout',
        ['detail' => 'shopping_cart']);
    }
    public function addToCart($arrToAdd = null ){
        $model = parent::model('cartModel');
        $quantity = isset($arrToAdd->quantity)?$arrToAdd->quantity:1;
        $id = $arrToAdd['id'];
        $product = $model->getProdById($id);
        if(!$product){
            echo json_encode([
                'success' => false,
                'message' => 'missing product',
                'data' => null
            ]);
            return false ; // get out of func   
        }
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart']: null;
        $cart = new Cart($oldCart);
        $cart->add($product,$quantity);
        $_SESSION['cart'] = $cart;
        echo json_encode([
            'success' => true,
            'message' => 'add prod successfully',
            'totalqty' => $cart->totalQty,
            'prod' => $cart->items[$id]['item']->name

        ]);
        return false;
    }
    public function deleteCart($arrToAdd){
        // echo 'delete to cart func' .'<pre>'; print_r($arrToAdd);  die;
        $id = $arrToAdd['id'];
        $oldCart = isset($_SESSION['cart'])?$_SESSION['cart']:null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        $_SESSION['cart'] = $cart;
        echo json_encode([
            'success' => true,
            'totalPrice' => $cart->totalPrice,
            'totalPromtPrice'=> $cart->promtPrice,
            'totalqty' => $cart->totalQty
        ]); 
        return false;
    }
    public function updateCart($arrToAdd = null){
        $id = $arrToAdd['id'];
        $qty = $arrToAdd['qty'];
        $model = parent::model('cartModel');
        $item = $model->getProdById($id);
        $oldCart = isset($_SESSION['cart'])? $_SESSION['cart']:'';
        $cart  = new Cart($oldCart);
        $cart->update($item,$qty);
        $_SESSION['cart'] = $cart;
        echo json_encode([
            'sucess' => true,
            'prodPrice' => number_format($cart->items[$id]['price'],0,',','.'),
            'prodPromtPrice' => number_format($cart->items[$id]['promotionPrice'],0,',','.') ,
            'totalPrice' => number_format($cart->totalPrice,0,',','.'),
            'totalPromtPrice' => number_format($cart->promtPrice,0,',','.'),
            'totalqty' => $cart->totalQty
        ]);
        return false;
    }
    public function deleteAllCart($arrToAdd){
        if($arrToAdd['action'] == 'deleteAllCart'){
            unset($_SESSION['cart']);
        }
        echo json_encode([
            'success' => true,
            'message' => 'remove item sucessfully'
        ]);
    }
}


?>