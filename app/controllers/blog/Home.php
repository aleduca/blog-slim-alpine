<?php

namespace app\controllers\blog;

use app\classes\Flash;
use app\database\models\Post;

class Home extends Base
{
    private $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index($request, $response)
    {
        $message = Flash::get('message');

        $posts = $this->post->latest(10);

        return $this->getTwig()->render($response, $this->setView('blog/home'), [
            'title' => 'Home',
            'posts' => $posts
        ]);
    }
}
