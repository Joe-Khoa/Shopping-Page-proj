<?php
require_once '../app/core/DB.php';

class categoryModel extends DB{
    public function getCategoryBar(){
        $sql = " SELECT *
        FROM categories ";
        // echo '<pre>'; print_r( parent::getMultipleRow($sql));
        return parent::getMultipleRow($sql);

    }

    public function getCategoryPage($id_type){
        // $sql = "SELECT c.*,p.*,u.url, count(c.id) as totalProd
        $sql = "SELECT c.*,p.*,u.url
        FROM categories c 
        INNER JOIN products p 
        ON  p.id_type = c.id
        INNER JOIN page_url u
        ON p.id_url = u.id
        WHERE c.id = $id_type
        -- GROUP BY c.id
        ORDER BY p.price";
        $test = parent::getMultipleRow($sql);
        // echo '<pre>'; print_r($test); die;
        return $test;
    }
    public function getProductForAPage($id_type,$positionStart,$nItemOnPage){
        $sql = " SELECT c.*, p.*,u.url
        FROM categories c 
        INNER JOIN products p
        ON p.id_type = c.id
        INNER JOIN page_url u
        ON p.id_url =u.id
        WHERE p.id_type = $id_type
        ORDER BY p.price
        LIMIT $positionStart,$nItemOnPage
        ";
        $test = parent::getMultipleRow($sql);
        // echo '<pre>';print_r($test); die;
        return $test;
    }
}

?>