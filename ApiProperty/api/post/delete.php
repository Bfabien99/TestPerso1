<?php
    //Header
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/Database.php');
    include_once('../../model/Post.php');

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate Post
    $post = new Post($db);

    //
    $data = json_decode(file_get_contents("php://input"));
    $post->id = $data->id;

    if ($post->delete()) 
    {
        echo json_encode(
            ['message' => 'Deleted Succesfully']
        );
    }
    else 
    {
        echo json_encode(
            ['message' => 'Oops not Deleted']
        );
    }