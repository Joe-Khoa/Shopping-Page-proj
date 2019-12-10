<?php 
require_once '../app/models/categoryModel.php';

class Controller {
    public $test = 'test-Controller';
    
    public function model($model){ 
        // $this->checkSession();
        require_once  "../app/models/".$model.".php";
        return new $model;
    }

     function view($view, $data = [],$data2=[]){
        $this->checkSession();
    // static function view($view, $data = [],$data2=[]){
        $a = new categoryModel;
        $categories = $a->getCategoryBar();
        require_once "../app/views/".$view.".php";
    }

    function checkSession(){
        // echo 'time in :  '.$_SESSION['timeIn'];
        // echo '<br>'.'now____'. time(); 
        // if ( $_SESSION['timeIn'] - time () <= 0 ) echo 'over time';
        // die;

        
        if( isset($_SESSION['timeIn'])){
            if ( $_SESSION['timeIn'] - time () >= 0 ) return;
            else{
                // echo 'here'; die;
                unset($_SESSION['timeIn']);
                $_SESSION['lgnErr'] = "Session Time Out, Plz login again";
                header('location: http://localhost/shopping-page/public/logincontroller/logOutProcess');
                return false;
            }
        }
        else return;
      
    }


}

?>