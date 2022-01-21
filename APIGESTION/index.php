<?php
require 'controller/apiController.php';
require 'vendor/autoload.php';
$initController = new apiController();


try 
{
    if (!empty($_GET['request'])) {
        $url = explode("/", filter_var($_GET['request'], FILTER_SANITIZE_URL));
        switch($url[1]){
            case 'allProperty':$all = $initController->obtainAll();
                break;
            
            case 'deleteProperty':
                if (!empty($url[2])) {
                    $all = $initController->unset($url[2]);
                    header("Location:/Testperso1/APIGESTION/view/allProperty.php");
                }
                else
                {
                    throw new Exception ("Fail to GET ID");
                }
                break;
            
                case 'showProperty':
                    if (!empty($url[2])) {
                        $call=$initController->cibleId($url[2]);
                    }
                    else {
                        throw new Exception ("id missed");
                    }
                    break;
                
                case 'updateProperty':
                    if (!empty($url[2])) {
                        $call=$initController->cibleId($url[2]);
                    }
                    else {
                        throw new Exception ("id missed");
                    }
                    break;
            
            default:throw new Exception ("Fail to GET Request URL");
                # code...
                break;
        }
    }
    else {
        require 'view/home.php';
    }
} 
catch (Exception $e) 
{
    $error =[
        "message" =>$e->getMessage(),
        "code" =>$e->getCode(),
    ];
    print_r($error);
}

/*
$router = new AltoRouter();

$router->map('GET','/Testperso1/APIGESTION/','home');
$router->map('GET','/Testperso1/APIGESTION/allProperty','allProperty');
$match = $router->match();

if ($match !== null ) {
    if (is_callable($match['target'])) {
        call_user_func_array($match['target'],$match['params']);
    }
    else {
        $params = $match['params'];
        require "view/{$match['target']}.php";
    }
}
else {
    echo "no Match";
}
*/