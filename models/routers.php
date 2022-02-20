<?php

namespace models\routers;


use \Closure;
use \Exception;
use models\request\Request;
use models\response\Response;

class Router
{
    private $url = '';
    private $prefix = '';
    private $routes = [];
    private $request;
    private $params;

    public function __construct($url)
    {
        $this->request = new Request();
        $this->url     = $url;
        $this->setPrefix();
    }

    private function setPrefix()
    {
        $parseUrl = parse_url($this->url);
        $this->prefix = $parseUrl['path'] ?? '';
    }
    private function addRoute($method, $routes, $params = [])
    {
        foreach ($params as $key => $value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        $patternRoute = '/^' . str_replace('/', '\/', $routes) . '$';
        $this->routes[$patternRoute][$method] = $params;
    }

    public function get($routes, $params = [])
    {
        return $this->addRoute('GET', $routes, $params);
    }
    public function post($routes, $params = [])
    {
        return $this->addRoute('POST', $routes, $params);
    }
    public function put($routes, $params = [])
    {
        return $this->addRoute('PUT', $routes, $params);
    }
    public function delete($routes, $params = [])
    {
        return $this->addRoute('Delete', $routes, $params);
    }

    private function getUri()
    {
        $uri = $this->request->getUri();
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        return end($xUri);

        $httpMethod = $this->request->getHttpMethod();
        foreach ($this->routes as $patternRoute => $method) {
            if (preg_match($patternRoute, $uri)) {
                if ($method[$httpMethod]) {
                    return $method[$httpMethod];
                }
                throw new Exception("Método não permitido", 405);
            }
        }
        throw new Exception("Página não encontrada", 404);
    }

    private function getRoute()
    {
        $uri = $this->getUri();
    }

    public function run()
    {
        try {
            $routes = $this->getRoute();
            if (!isset($routes['controller'])) {
                throw new Exception("Url não pode ser processada", 500);
            }

            $args = [];

            return call_user_func_array($routes['controller'], $args);
        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}
