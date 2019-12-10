<?php
    // what is "init.php" is used for ?
        // -> to hide the task of call FILE in core directively 
    //echo 'app/init';
        // in init file, that require: all FILE IN APP\CORE 
        // use App for congif class = Controller
        //        Called by Controller ____ method Model( func Controller_superClass ) - >  require :  MODEL ( extended )
        //                                   MODEL is also a Class with func(( ask for input data ) to return to Controller
        //        Called by Controller ____ method View ( func in Controller_superClass) - > require: View  = just HTML + input_data_to_show (return from model)
        //                                   VIEW is just only a file

        //        *** essense ( bản chất) is CONFIG URL to call Url(1)=class/Url(2)=method/Url(3)=param/url_4= pram(2)

        require_once 'core/App.php';        // CONFIG URL
        require_once 'core/Controller.php'; // CONTROL THREAD of program: call MODEL / VIEW
        require_once 'core/DB.php';         // CONNECT DATABASE
        $app = new App;

?>

