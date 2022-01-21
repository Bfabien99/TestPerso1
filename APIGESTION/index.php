<?php
require 'vendor/autoload.php';



// try 
// {
//     // var_dump(explode("/", filter_var($_GET['request'], FILTER_SANITIZE_URL)));
//     if (!empty($_GET['request'])) {
//         $url = explode("/", filter_var($_GET['request'], FILTER_SANITIZE_URL));
//         switch($url[0]){
//             case 'allProperty':
//                 $all = $initController->obtainAll();
//                 echo $all;
//                 break;
//             case 'deleteProperty':
//                 if (!empty($url[2])) {
//                     $all = $initController->unset($url[2]);
//                     header("Location:/Testperso1/APIGESTION/view/allProperty.php");
//                 }
//                 else
//                 {
//                     throw new Exception ("Fail to GET ID");
//                 }
//                 break;
            
//                 case 'showProperty':
//                     if (!empty($url[2])) {
//                         $call=$initController->cibleId($url[2]);
//                     }
//                     else {
//                         throw new Exception ("id missed");
//                     }
//                     break;
                
//                 case 'updateProperty':
//                     if (!empty($url[2])) {
//                         $call=$initController->cibleId($url[2]);
//                     }
//                     else {
//                         throw new Exception ("id missed");
//                     }
//                     break;
            
//             default:throw new Exception ("Fail to GET Request URL");
//                 # code...
//                 break;
//         }
//     }
//     else {
//         require 'view/home.php';
//     }
// } 
// catch (Exception $e) 
// {
//     $error =[
//         "message" =>$e->getMessage(),
//         "code" =>$e->getCode(),
//     ];
//     print_r($error);
// }


$router = new AltoRouter();

//Route vers la page d'accueil
$router->map('GET','/TestPerso1/APIGESTION/',function(){
    require 'view/home.php'; 
});

//Route vers toutes les propriétés
$router->map('GET','/TestPerso1/APIGESTION/property',function(){
    require_once 'controller/apiController.php';
    $initController = new apiController;
    $Call = $initController->obtainAll();
    echo $Call; 
});

//Route pour voir une propriété
$router->map('GET','/TestPerso1/APIGESTION/property/[i:id]/',function($id){
    require_once 'controller/apiController.php';
    $initController = new apiController;
    $Call = $initController->cibleId($id);
    echo $Call; 
});

//Route pour supprimer une propriété
$router->map('GET','/TestPerso1/APIGESTION/property/delete/[i:id]/',function($id){
    require_once 'controller/apiController.php';
    $initController = new apiController;
    $Call = $initController->unset($id);
    echo $Call; 
});

$match = $router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}



