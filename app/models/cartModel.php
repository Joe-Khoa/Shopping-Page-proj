<?php

require_once '../app/core/DB.php';

class cartModel extends DB{

    public function getProdById($id){
        // echo $id; die;
        $sql = " SELECT p.*, u.url
        FROM products p
        INNER JOIN page_url u
        ON p.id_url =  u.id
        WHERE p.id = $id
        ";
        $test = parent::getOneRow($sql);
        return $test;
        // echo '<pre>';print_r($test); die;
    }
}



?>