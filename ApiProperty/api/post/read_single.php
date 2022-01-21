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

    //Get Id
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();

    $post->read_single();

    $post_arr = [
        'id' => $post->id,
        'owner' => $post->owner,
        'tel' => $post->tel,
        'location' => $post->location,
        'area' => $post->area,
        'details' => $post->details,
        'price' => $post->price
    ];

    print_r(json_encode($post_arr,JSON_UNESCAPED_UNICODE));