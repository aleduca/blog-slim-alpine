<?php

namespace app\controllers\api;

use app\database\models\Post as ModelsPost;

class Post
{
    private $posts;

    public function __construct()
    {
        $this->posts = new ModelsPost;
    }

    public function index($request, $response)
    {
        $posts = $this->posts->latest(10);

        echo json_encode($posts);
        return $response;
    }
}
