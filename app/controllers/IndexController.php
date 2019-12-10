<?php

require_once '../app/models/indexModel.php';
require_once "../app/core/Controller.php";
session_start();

    class IndexController extends Controller {

        public function index(){
            // print_r($_POST); die;
            // $a = $_SESSION['cart'];
            // echo '<pre>';print_r($_SESSION['cart']); die; 
            // echo '----------------------';
            // echo '<pre>';echo ($a->items); die;
            $model = new IndexModel();
            $slide = $model->getSlide();
            $feature = $model->getFeatureProucts();
            $bestSeller = $model->getBestSellerProducts();
            $onSale = $model->getOnSaleProducts();
            parent::view('MasterLayout',[
                'detail'=>'index',
                'jsonData' =>$slide,
                'feature' =>$feature,
                'bestSeller' => $bestSeller,
                'onSale' => $onSale
            ]);
        }
        public function error404(){
            parent::view('MasterLayout',
            ['detail' =>'404error']);
        }
        public function contactUs(){
            parent::view('MasterLayout',
            ['detail' => 'contactUs']);
        }
        public function aboutUs(){
            parent::view('MasterLayout',
            ['detail' => 'aboutUs']);
        }


    }


?>