<?php
define('ROOT', dirname(__DIR__));
// On importe l'autoloader de composer
require_once ROOT . '/vendor/autoload.php';

use App\Router\Router;

// ON instancie notre routeur
$router = new Router(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$router->get('/', "Index#show");

$router->get('/index', "Index#show");

/*
$router->get('/posts', function () {
    echo 'Tous les article';
});

$router->get('/posts/:id', function ($id) {
    echo 'afficher l\'article' . $id;
});

$router->post('/posts/:id', function ($id) {
    echo 'poster pour l\'article' . $id;
});

$router->post('/posts/:id-:slug', function ($id, $slug) {
    echo "poster pour l\'article $slug : $id";
})->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');
*/

$router->run();
