<?php

use app\controllers\blog\Home;
use app\controllers\blog\Login;
use app\controllers\blog\Post;

$app->get('/', Home::class . ':index');
$app->get('/login', Login::class . ':index');
$app->post('/login', Login::class . ':store');
$app->get('/logout', Login::class . ':destroy');
$app->get('/post/{slug}', Post::class . ':show');
