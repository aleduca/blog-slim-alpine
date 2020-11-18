<?php

use app\controllers\api\Post;
use app\controllers\api\Search;

$app->get('/api/search', Search::class . ':index');
$app->get('/api/posts', Post::class . ':index');
