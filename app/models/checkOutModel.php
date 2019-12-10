<?php
require_once '../app/core/DB.php';

class checkOutModel extends DB{
            //| id | name | gender | email | address | phone
    public function insertCusto($name,$gender,$email, $address,$phone){
        $sql = " INSERT INTO customers ( name, gender,email, address, phone)
        VALUE ('$name','$gender','$email', '$address','$phone')
        ";
        $a = parent::getLastId($sql);
        // echo '<br>'.$a; die;
        return $a;
        
    }
            // id | id_customer | date_order | total | promt_price | payment_method |
            // note | token | token_date | status
    // when add the data to bill status = 0
    public function insertBill($id_customer,$date_order,$total,$promt_price,
    $payment_method,$note,$token,$token_date,$status){
        $sql = " INSERT INTO bills (id_customer, date_order ,total , promt_price , 
        payment_method,note , token , token_date , status)
        VALUE ($id_customer,'$date_order',$total,$promt_price,
            '$payment_method','$note','$token','$token_date',$status)";
        $a = parent::getLastId($sql);
        // echo '<br>'.$a; die;
        return $a;

    }

            //id  | id_bill | id_product | quantity | price | discount_price (p price with quantity)
    public function insertBillDetail($id_bill,$id_product,$quantity,$price,$discount_price){
        $sql = "INSERT INTO bill_detail (id_bill , id_product , quantity , price , discount_price)
            VALUE ($id_bill,$id_product,$quantity,$price,$discount_price)";
        $a = parent::getLastId($sql);
        // echo '<br>'.$a;die;
        return $a;
    }

    public function getIdBymailedToken($token){
        $sql = "SELECT b.id, b. token_date
        FROM bills b
        WHERE token = '$token'
        ";
        return $a= parent::getMultipleRow($sql);
        // print_r($a); die;
        // return $a;
    }
    public function updateStatus($idBill){
        $sql = "UPDATE bills p
        SET status = 1 
        WHERE p.id = $idBill";
        return $a =  parent::executeQuery($sql);
        // print_r($a);die;
    }

}
?>