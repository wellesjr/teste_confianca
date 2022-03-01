<?php

namespace lib\helpers;

include 'lib/helpers/request.php';

use \Closure;
use \Exception;
use \ReflectionFunction;
use lib\helpers\Request;

class Router
{
    private $url;
    private $prefix = '';
    private $routes = [];
    private $request;



    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por iniciar a classe
--------------------------------------------------------------------------------------------------------------------------------*/
    public function __construct($url)
    {
        $this->request = new Request($this);
        $this->url     = $url;
        $this->setPrefix();
    }



    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por definir o prefixo das rotas
--------------------------------------------------------------------------------------------------------------------------------*/
    private function addRoute($method, $route, $params = [])
    {
        foreach ($params as $key => $values) {
            if ($values instanceof Closure) {
                $params['controller'] = $values;
                unset($params[$key]);
                continue;
            }
        }

        $params['variables'] = [];

        $patternVariable = '/{(.*?)}/';
        if (preg_match_all($patternVariable, $route, $matches)) {
            $route = preg_replace($patternVariable, '(.*?)', $route);
            $params['variables'] = $matches[1];
        }

        $paternRoute = '/^' . str_replace('/', '\/', $route) . '$/';

        $this->routes[$paternRoute][$method] = $params;
    }


    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por definir prefixo nas rotas
--------------------------------------------------------------------------------------------------------------------------------*/
    private function setPrefix()
    {
        $parseUrl = parse_url($this->url);
        $this->prefix = $parseUrl['path'] ?? ' ';
    }


    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por retornar uma rota GET
--------------------------------------------------------------------------------------------------------------------------------*/
    public function get($routes, $params = [])
    {
        return $this->addRoute('GET', $routes, $params);
    }

    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por retornar uma rota POST
--------------------------------------------------------------------------------------------------------------------------------*/
    public function post($routes, $params = [])
    {
        return $this->addRoute('POST', $routes, $params);
    }

    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por retornar uma rota PUT
--------------------------------------------------------------------------------------------------------------------------------*/
    public function put($routes, $params = [])
    {
        return $this->addRoute('PUT', $routes, $params);
    }

    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por retornar uma rota DELETE
--------------------------------------------------------------------------------------------------------------------------------*/
    public function delete($routes, $params = [])
    {
        return $this->addRoute('DELETE', $routes, $params);
    }


    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por retornar uma a URI sem prefixo
-------------------------------------------------------------------------------------------------------------------------------*/
    private function getUri()
    {
        $uri = $this->request->getUri();
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        return end($xUri);
    }


    /* --------------------------------------------------------------------------------------------------------------------------------
*                     Método responsavel por retornar os dados da rota atual
--------------------------------------------------------------------------------------------------------------------------------*/
    private function getRoute()
    {
        $uri = $this->getUri();
        $httpMethod = $this->request->getHttpMethod();

        foreach ($this->routes as $paternRoute => $methods) {
            if (preg_match($paternRoute, $uri, $matches)) {
                if (isset($methods[$httpMethod])) {
                    unset($matches[0]);
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys, $matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;
                    return $methods[$httpMethod];
                }
                throw new Exception("Método não permitido", 405);
            }
        }

        throw new Exception("Página não encontrada!", 404);
    }


    /* ------------------------------------------------------------------------------------------------------------------------------------
 *          Método responsavel por executar a rota atual
 --------------------------------------------------------------------------------------------------------------------------------------*/
    public function run()
    {
        try {
            $route = $this->getRoute();
            if (!isset($route['controller'])) {
                throw new Exception("URL não pode ser processada!", 500);
            }

            $args = [];
            $reflection = new ReflectionFunction($route['controller']);
            foreach ($reflection->getParameters() as $parameter) {
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }

            return call_user_func_array($route['controller'], $args);
        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}
