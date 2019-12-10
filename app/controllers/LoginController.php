<?php 

require_once '../app/core/Controller.php';
require_once '../app/models/loginModel.php';
session_start();

class LoginController extends Controller {

    public function getLoginPage(){
        parent::view('MasterLayout',['detail' =>'account_page']);
    }

    public function loginProcessing(){
        // var_dump($a = $_POST['lgnEmail']); 
        // if ($a === '') echo 'email Null';
        // else echo 'not null';
        // die;
        if ( $_POST['lgnEmail'] === '' || $_POST['lgnPassword'] === '' ){
            // echo 'notABC'; die;
            $_SESSION['lgnErr'] = 'Wtf, NOT YET FULL FILLED,  Plz fill BOTH email and password !' ;
            header('location: http://localhost/shopping-page/public/logincontroller/getloginpage');
            return false;
        }
        $arrLogin = $_POST;

    
        $model = parent::model('loginModel');
        $verifyReslt = $model->checkMailPass($arrLogin);
        // echo '<pre>'.'<br>'.'<hr>'; print_r($verifyReslt->email); die;

        if ($verifyReslt == null){
            $_SESSION['lgnErr'] = 'Wrong password or ID';
            header('location: http://localhost/shopping-page/public/logincontroller/getloginpage');
            return false;
        }
        // create some SESSION to manage
        $timeOut =  isset($_POST['lgnRememberme'])?60*0.5: 60*0.1;
        $_SESSION['timeIn'] = time() + $timeOut ; // Session 15 secs
        $_SESSION['name']  = $verifyReslt->fullname;
        $_SESSION['email']  = $verifyReslt->email;
        

        $mess = '<p> Please click <a href="http://localhost/shopping-page/public/index.html"><u>Home Page</u></a  > to go to home page </p>';
        $_SESSION['success'] = "Good boy(girl), You have logged in successfully ! $mess ";
        header('location: http://localhost/shopping-page/public/logincontroller/getloginpage');
        return false;
    }
    public function logOutProcess(){
        $a = isset($_SESSION['lgnErr'])? $_SESSION['lgnErr'] :1;
        session_destroy();
        session_start();
        $_SESSION['lgnErr'] = ($a !== 1) ? $a : 'hey guy. You have logged out ! ';
        header('location: http://localhost/shopping-page/public/logincontroller/getloginpage');
        return false;

    }   
    // public function keepUserLogin(){

    // }


}



?>