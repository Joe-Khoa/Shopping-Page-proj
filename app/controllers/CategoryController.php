<?php
require_once '../app/core/Controller.php';
require_once '../app/core/extension/paging.php';
class CategoryController extends Controller {
    public function getCategoryBar(){
        $model = parent::model('categoryModel');
        $a = $model->getCategoryBar();
        return $a;
    }
    public function getCategoryPage($id_type){
        $model = parent::model('categoryModel');
        $products = $model->getCategoryPage($id_type);
        $totalItem = count($products);
        $OriginURL = 'http://localhost/shopping-page/public/categorycontroller/getcategoryPage/'."$id_type";
        
        $url = explode("/",filter_var(trim($_GET["url"])));
        // echo '<pre>';print_r($url); die;
        $currentPage = 1;
        if(isset($url[3])){
            $currentPage = $url[3];
        }
        $nItemOnPage = 8;
        $totalPage = ceil($totalItem/$nItemOnPage);
        if($currentPage > $totalPage){
            echo 'over-page';
        header('Location: http://localhost/shopping-page/public/indexController/error404');        }
        $positionStart = ($currentPage-1)*$nItemOnPage;
        // 0-7 / 8-16 / 16-23/ 24-.... 
        $products = $model->getProductForAPage($id_type,$positionStart,$nItemOnPage);
            
        $paging = new Pager( $totalItem, $currentPage ,$nItemOnPage,$nPageShow =3,$id_type,$OriginURL); // nPageShow ~ No. of page to show if n > n.pageShow
        $showPagination = $paging->showPagination();

        // echo '<pre>'; print_r($showPagination); die;

        $model = parent::view('MasterLayout',
        ['detail' =>'categoryPage',
        'catePrduct'=> $products,
        'currentPage' => $currentPage,
        'totalPage' => $totalPage,
        'showPagination' => $showPagination


        ]);
    }

}

?>