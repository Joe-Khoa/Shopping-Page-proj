<?php 
require_once '../app/core/DB.php';

Class detailModel extends DB{

    public function getDetailPage($url){
        $sql = " SELECT p.*, u.url
        FROM products p
        INNER JOIN page_url u 
        ON u.id = p.id_url
        WHERE u.url = '$url'
        ";
        // echo '<pre>';print_r( parent::getOneRow($sql)); die; 

        return parent::getOneRow($sql);

    }

    public function getRelatedProduct($idType,$price){
        $sql = " SELECT ABS(p.price - $price) as dif_price,p.*, u.url
        FROM products p
        INNER JOIN page_url u
        ON p.id_url = u.id 
        WHERE p.id_type = $idType
        AND  ABS(p.price - $price) < 0.3*p.price
        ORDER BY (p.price - $price) ASC
        LIMIT 0,10
        ";
        // echo '<pre>';print_r( parent::getMultipleRow($sql)); die;
        return parent::getMultipleRow($sql);
        // echo '<pre>' ; print_r($a); die;
    }
}


?>