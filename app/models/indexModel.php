<?php

require_once '../app/core/DB.php';


Class IndexModel extends DB{

    public function getSlide(string $string = null ){
        $sql = " SELECT image as image , id as id ,title as title
        FROM slide WHERE status = 1";
        return $a = $this->getMultipleRow($sql);
        // echo '<pre>'; print_r($a ); die;

    }
    public function getFeatureProucts(){
        // echo '<pre>';
        // echo 'run feature';
        $sql = "SELECT p.*, u.url
            FROM products p
            INNER JOIN page_url u
            WHERE p.id_url = u.id
            AND p.status = 1
            AND p.deleted = 0
            ORDER BY id
            LIMIT 0,10
        ";
    // echo '<pre>';print_r($this->getMultipleRow($sql)); die;
    return $this->getMultipleRow($sql);
    }

    public function getBestSellerProducts(){
        $sql = " SELECT p.*, u.url, sum(quantity) as tongSL
            FROM products  p
            INNER JOIN page_url u 
            ON p.id_url = u.id
            INNER JOIN bill_detail b
            ON p.id = b.id_product
            WHERE p.deleted = 0
            GROUP BY p.id
            ORDER BY tongSL DESC
            LIMIT 0,10
        ";
        return $this->getMultipleRow($sql);

    }
    public function getOnSaleProducts(){
        //get the proudct ONSALE + ORDER by %sale 
        $sql = "SELECT p.* , ( 100*(p.price - p.promotion_price)/p.price) as  sale_rate, u.url
        FROM products p
        INNER JOIN page_url u
        ON p.id_url = u.id
        WHERE p.promotion_price !=0
        GROUP BY p.id
        ORDER BY sale_rate DESC
        LIMIT 0,3
        ";
        // echo '<pre>';
        return $this->getMultipleRow($sql);
        // print_r($a); die;
    }   

    public function searchProduct($data){
        $sql = "SELECT p.*,page.url
        FROM products p
        INNER JOIN page_url page
        ON p.id_url  = page.id
        WHERE name LIKE '%$data%'
        ORDER BY id";
        $r = parent::getMultipleRow($sql);
        // echo '<pre>';print_r($r); die;
        return $r;
    }
}

?>