<?php 
    // echo 'core/App.php';

class App{
    protected $controller = 'IndexController';
    protected $method = 'index';
    protected $param = [];
    public  $test = 'test-App';

    public function __construct(){
        // echo '<pre>';
        // echo '<br>'."core/App (class )";
            $url = $this->checkUrl();
            // print_r($url); die;


        if( file_exists("../app/controllers/".$url[0].".php")){
            $this->controller = $url[0];
            unset($url[0]);
            // echo $url[0];
            //echo 'unset-URL when checking exists class'.'<br>';
            // clear the array_stack -> method -> url[0]


        }
        // echo 'line-22 core/app';
        
        require_once "../app/controllers/".$this->controller.".php";
        $this->controller = new $this->controller; // create class functional-Controller -> find METHOD-url[1] in this Controller"
        //$this->controller->index();
        
        if( isset($url[1])){
            if( method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);  // clear the array_stack -> param = url[0]
            }
        }
        // note THAT : $url must be go inside TWO IF ( "EXIST" 2 atrr( class + method))
        // so then array clear to just ONLY value key[0] = param !
        $this->param = $url? array_values($url):[];
        // $this->param = $url?$url:[];

    
        
        // print_r($_GET['url']);
        // // echo '<pre>';
        // print_r($url);
        // // die;    

    
            
        
        //     echo '<pre>'.'url-full';
        //     print_r($url);
        //     echo '<br>';
        //     print_r($this->param);
        //     echo '<br>'.'$this->params : ';
        //     print_r($this->param); 
        //     die;

        // $method = $this->method;
        // $this->controller->$this->method(); better is use call_user_function_array
        call_user_func_array([$this->controller,$this->method],$this->param);

    }



    public function checkUrl(){
        if(isset($_GET["url"])){
            return explode("/",filter_var(trim($_GET["url"])));
        }
    }
}
?> 