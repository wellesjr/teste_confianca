<?php

namespace lib\helpers;

include 'lib/helpers/request.php';

use \Closure;
use Exception;
use lib\helpers\Request;


class Router
{
    private $url;
    private $prefix = '';
    private $routes = [];
    private $request;

    public function __construct($url)
    {
        $this->request = new Request;
        $this->url     = $url;
        $this->setPrefix();
    }

    private function addRoute($method, $route, $params = [])
    {
        foreach ($params as $key => $values) {
            if ($values instanceof Closure) {
                $params['controller'] = $values;
                unset($params[$key]);
                continue;
            }
        }
        $paternRoute = '/^' . str_replace('/', '\/', $route) . '$/';
        $this->routes[$paternRoute][$method] = $params;
    }

    private function setPrefix()
    {
        $parseUrl = parse_url($this->url);
        $this->prefix = $parseUrl['path'] ?? ' ';
    }
    public function get($routes, $params = [])
    {
        return $this->addRoute('GET', $routes, $params);
    }

    private function getUri()
    {
        $uri = $this->request->getUri();
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        return end($xUri);
    }

    private function getRoute()
    {
        $uri = $this->getUri();
        $httpMethod = $this->request->getHttpMethod();

        foreach ($this->routes as $paternRoute => $methods) {
            if (preg_match($paternRoute, $uri)) {
                if ($methods[$httpMethod]) {
                    return $methods[$httpMethod];
                }
                throw new Exception("Método não permitido", 405);
            }
        }

        throw new Exception("Página não encontrada!", 404);
    }

    public function run()
    {
        try {
            $route = $this->getRoute();

            if (!isset($route['controller'])) {
                throw new Exception("URL não pode ser processada!", 500);
            }

            $args = [];

            return call_user_func_array($route['controller'],$args);

        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}
