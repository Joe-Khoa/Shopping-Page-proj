<?php 
require_once '../app/models/detailModel.php';
require_once '../app/core/Controller.php';
// require_once '../app/controllers/IndexController.php';
session_start();
class DetailController extends Controller{

    public function detail($id){
        // echo 'detailController/ detail-method'.'<br>';
        $model = new DetailModel();

        // echo $id; die;

        $detail = $model->getDetailPage($id);
        // echo  '<pre>';print_r($_SESSION['cart']); die;
        $id_type = $detail->id_type;
        $price = $detail->price;
        // echo $id_type;
        // echo $price;

        $relatedProducts = $model->getRelatedProduct($id_type,$price);
        // print_r($relatedProducts);
        // die;

        parent::view('MasterLayout',[
            'detail'=>'detail',
            'detailData' => $detail,
            'relatedProduct' => $relatedProducts
        ]);
    }




}



?>