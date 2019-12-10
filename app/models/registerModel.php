<?php 
require_once '../app/core/DB.php';

class registerModel extends DB{

    public function insertAccount($username,$email, $password){
        $sql = "INSERT INTO users (username,email , password, fullname)
        VALUE ('$username','$email','$password','$username')";
        $a =parent::getLastId($sql);
        return $a;
    }

    public function  checkResgiteredMail($email){
    $sql = "SELECT id 
    FROM users 
    WHERE  email = '$email'";
    return parent::getOneRow($sql);
    }
}
?>