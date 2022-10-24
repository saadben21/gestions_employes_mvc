<?php
session_start();
session_regenerate_id();


require_once('./bootstrap.php');

spl_autoload_register('autoload');

function autoload($class_name){
    $array_paths = array(
        'database/',
        'app/classes/',
        'models/',
        'controllers/',
    );
    //change antislach
    $parts = explode('\\',$class_name);
    //supprimer dernier elements
    $name = array_pop($parts);

    foreach($array_paths as $path) {
        $file = sprintf($path.'%s.php',$name);
        if(is_file($file)){
            include_once $file;
            
        }
    }


}
/*spl_autoload_register(function($class){

    require 'classes/'.$class.'.php';
});
$var = new test();
print_r($var);
*/

?>

