<?php 

require_once '../app/core/DB.php';


class loginModel extends DB {

    public function checkMailPass( $arr ){
        $email = $arr['lgnEmail'];
        // $pass = md5($arr['lgnPassword']);
        $pass = $arr['lgnPassword'];
        $sql = "SELECT * FROM users
        WHERE email = '$email'
        AND password = '$pass'
        ";
        $a = parent::getOneRow($sql);
 
        return $a;
        // echo '16-lgmodel';
        // echo '<br>'.'<hr>';
        // var_dump($a);
        // echo '<pre>'.'<br>'.'<hr>';
        // print_r($a);
        // die;
    }   

}
?>