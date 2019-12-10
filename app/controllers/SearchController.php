<?php

class SearchController extends Controller{
    public function SearchProcess(){
        if( !isset($_POST['action']) || $_POST['action'] != 'searchProd' ){
            header('location:http://localhost/shopping-page/public/');
            return false;
        }
        $data = $_POST['data'];
        $model =  parent::model('indexModel');
        $responseData  = $model->searchProduct($data);
        $resultQty = count($responseData);
        // echo '<pre>';print_r($responseData);
        $prodNameArr = [];
        foreach ($responseData as  $prod ){
            $prodNameArr[$prod->name] = $prod->url;
        }
        // echo '<pre>';print_r($prodNameArr); die;
        echo json_encode([
            'name' => $data,
            'success' => true,
            'resData' => $responseData,
            'dataQty' => $resultQty
        ]);
    }
}
?>