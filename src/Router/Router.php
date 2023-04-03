<?php

namespace App\Router;

use App\Controllers\MainController;

/*
    require __DIR__ . '/controllers/recipe-controller.php';
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if ('/' === $urlPath || '/index' === $urlPath) {
        browseRecipes();
    } elseif ('/add' === $urlPath) {
        addRecipe();
    } elseif ('/show' === $urlPath && isset($_GET['id'])) {
        showOneRecipe($_GET['id']);
    } else {
        header('HTTP/1.1 404 Not Found'); 
    }
*/

/**
 * Routeut Principal
 */
class Router
{
    private string $uri;
    private $routes = [];
    private $namedRoutes = [];

    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }
    public function get(string $path, $callable, $name = null)
    {
        return $this->add(path: $path, callable: $callable, name: $name, method: 'GET');
    }
    public function post(string $path, $callable, $name = null): Route
    {
        return $this->add(path: $path, callable: $callable, name: $name, method: 'POST');
    }
    private function add(string $path, $callable, ?string $name, string $method = 'GET'): Route
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;

        if (is_string($callable) && empty($name)) {
            $name = $callable;
        }

        if ($name) {
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }
    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterException('REQUEST_METHOD does not exist !');
        }

        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->getUri())) {
                return $route->call();
            }
        }
        throw new RouterException('No matching routes !');
    }

    public function url($name, $params = [])
    {
        if (!isset($this->namedRoutes[$name])) {
            throw new RouterException('No route matches this name');
        }
        $this->namedRoutes[$name]->getUrl($params);
    }
    /**
     * Get the value of uri
     */
    public function getUri()
    {
        return $this->uri;
    }
}
