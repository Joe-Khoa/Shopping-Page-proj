
<?php
require_once '../app/core/Controller.php';
require_once '../app/core/extension/PHPMailer/sendmail.php';
require_once '../app/core/extension/functions.php';

session_start();


class RegisterController extends Controller{

    public function getRegisterPage(){
        parent::view('MasterLayout', ['detail' => 'account_page']);
    }
    public function registerProcessing(){
        // echo 're-process'; die;
        if ($_POST['regEmail'] ==''){
            $_SESSION['regErr'] = 'No email is found, Plz try again';
            header('location:http://localhost/shopping-page/public/RegisterController/getRegisterPage');
            return false;
        }
        

            // send mail
            // function sendMail($emailReceiver, $nameReceiver, $body, $subject){
        $email = $_POST['regEmail'];
        
        // check whether email have registered ( already member of website ?)

        $model = parent::model('registerModel');
        $already = $model->checkResgiteredMail($email);
        if($already != null ){
            $_SESSION['regErr'] = 'email is already used, Plz try another one !';
            header('location:http://localhost/shopping-page/public/RegisterController/getRegisterPage');
            return false;
        }
        $nameReceiver = "Client";
        $subject = " Almost complete to register an account ! ";
        $token = createToken();// 40 save tempory to DB compare ??? if they do not click to add pass after 10mins -> remove it !!!
        $_SESSION['regMailTkn'] = $token; // SMARTER use SEsSION  to hold token
        $_SESSION['regEmail'] = $email;
        $link = "http://localhost/shopping-page/public/RegisterController/verifyRegmail/$token";
        echo $body = "
        <h2> Hello Mr(Mrs). $nameReceiver </h2>
        <p> Thank you for send us email to register </p>
        <p> Please click on this link to continue register : <a href='$link'><u>Link to register</u></a>  </p>
        ";
        sendMail($email, $nameReceiver, $body, $subject);
        $_SESSION['regSuccess'] = ' an email have sent to your mail box, plz check this mail to continue register ';
        header('location:http://localhost/shopping-page/public/RegisterController/getRegisterPage');
        return false;
    }
    public function verifyRegmail(){
        $orginToken  = $_SESSION['regMailTkn'];
        unset($_SESSION['regMailTkn']);
        // echo ' <pre> <hr>';
        $url = explode('/',trim($_GET['url']));
        if (!isset($url[2])){
            $_SESSION['regErr'] = 'No token was found, Plz try again';
            unset($_SESSION['regEmail']);
            header('location:http://localhost/shopping-page/public/RegisterController/getRegisterPage');
            return false;
        }
        $mailedToken = $url[2];

        if( $orginToken != $mailedToken){
            $_SESSION['regErr'] = 'Token was wrong, Plz try again';
            unset($_SESSION['regEmail']);
            header('location:http://localhost/shopping-page/public/RegisterController/getRegisterPage');
            return false;
        }
        // echo  $_SESSION['regMailTkn'];
        header('location:http://localhost/shopping-page/public/RegisterController/passWordPage');
        return false;    
    }

    public function passWordPage(){
        parent::view('MasterLayout', ['detail' => 'passWordPage']);
    }

    public function createPassWord(){

        if (!isset($_SESSION['regEmail'])){
            $_SESSION['regErr'] = "You have not submit the email, Plz try again";
            header('location:http://localhost/shopping-page/public/Registercontroller/getRegisterPage');
            return false;
        }

        if(!($_POST['regPassword'] != '' && $_POST['Re-regPassword'] != '' 
            && $_POST['regPassword'] == $_POST['Re-regPassword']) ){

            $_SESSION['crPassErr'] = "Re-password doensn't match, Plz try again";
            header('location:http://localhost/shopping-page/public/Registercontroller/passWordPage');
            return false;
        }
        else{
            $mail = $_SESSION['regEmail'];
            $password = $_POST['regPassword'];
            $model = parent::model('registerModel');
            $username = explode('@',trim($mail))[0];

            $a  = $model->insertAccount($username,$mail,$password,);
            
            
            if($a = ''){
                // same user
                $_SESSION['crPassErr'] = "There 's some err, may your email has been used ";
                header('location:http://localhost/shopping-page/public/RegisterController/getRegisterPage');
                return false;
                
            }

            session_destroy();
            session_start();    
            $_SESSION['crPassSuccess'] = "password are match, an account have register with use email : <u>$mail</u> and temporary username : <u>$username</u>, you can change it later in your profile !".
            " <p> click on this link for going to : <a href='http://localhost/shopping-page/public/logincontroller/getloginpage'><u>login-page</u></a>  </p>";
            header('location:http://localhost/shopping-page/public/Registercontroller/passWordPage');
            return false;
        }
 

    }


    // how to get the mail in next ??? 
    //pl-A: isset DB + Oringin token -> update this after confirm
    // pl-B: create Session['email'] -> hidden in form  intput value = Session['email']Session['email'] ( delete before send form)
    // NOTE plane B session delete after specific-time or after MAIN login in session ???
}

?>
