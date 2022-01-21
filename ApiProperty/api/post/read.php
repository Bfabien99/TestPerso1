<?php
    //Header
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../../config/Database.php');
    include_once('../../model/Post.php');

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate Post
    $post = new Post($db);
    $result = $post->read();

    $num = $result->rowCount();

    //Vérifier qu'il y a des éléments existant
    if ($num > 0) 
    {
        
        $post_arr = [];
        $post_arr['data'] = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $post_item = [
                'id' => $id,
                'owner' => $owner,
                'tel' => $tel,
                'location' => $location,
                'area' => $area,
                'details' => $details,
                'price' => $price,
            ];

            array_push($post_arr['data'], $post_item);
        }

        //Turn to Json
        echo json_encode($post_arr,JSON_UNESCAPED_UNICODE);

    }
    else 
    {
        echo json_encode(
            ['message' => 'No Posts Found']
        );
    }
?>