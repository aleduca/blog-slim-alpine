<?php

namespace app\controllers\blog;

use app\database\models\Post as PostModel;

class Post extends Base
{
    private $post;

    public function __construct()
    {
        $this->post = new PostModel;
    }

    public function show($request, $response, $args)
    {
        $slug = filter_var($args['slug'], FILTER_SANITIZE_STRING);

        $post = $this->post->findPostBy('slug', $slug);

        if (!$post) {
            return redirect($response, '/');
        }

        return $this->getTwig()->render($response, $this->setView('blog/post'), [
            'title' => 'Blog ' . $post->slug,
            'post' => $post
        ]);
    }
}
