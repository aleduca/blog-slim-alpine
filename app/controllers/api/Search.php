<?php

namespace app\controllers\api;

use app\database\models\Post;

class Search
{
    private $search;

    public function __construct()
    {
        $this->search = new Post;
    }

    public function index($request, $response)
    {
        $searched = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);

        $posts = $this->search->searchPost($searched);

        echo json_encode($posts);

        return $response;
    }
}
