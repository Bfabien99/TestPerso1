<?php
require 'controller/apiController.php';
$initController = new apiController();
try 
{
    if (!empty($_GET['search'])) 
    {
        $url = explode("/", filter_var($_GET['search']), FILTER_SANITIZE_URL);
        switch($url[0]){
            case 'formations':$call=$initController->All()
                ;
                break;
            
            case 'formation':
                if (!empty($url[1])) {
                    $call=$initController->byId($url[1]);
                }
                else {
                    throw new Exception ("id missed");
                }
                break;
            
            default: throw new Exception ("Fail to GET Request URL");
        }
    }
    else 
    {
        header("Location:/Testperso1/API/home".".php");
    }
}
catch (Exception $e) 
{
    $erreur = [
        "message" => $e->getMessage(),
        "code" => $e->getCode(),
    ];
    print_r($erreur);
}