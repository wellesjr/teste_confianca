<?php

namespace lib\helpers;

class Request
{
    private $httpMethod;
    private $uri;
    private $queriParams = [];
    private $postVars = [];
    private $headers = [];

    public function __construct()
    {
        $this->queriParams = $_GET ?? [];
        $this->postVars    = $_POST ?? [];
        $this->headers     = getallheaders();
        $this->httpMethod  = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri         = $_SERVER['REQUEST_URI'] ?? '';
    }

    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getheaders()
    {
        return $this->header;
    }
    public function getQueryParams()
    {
        return $this->queriParams;
    }
    public function getPostVars()
    {
        return $this->postVars;
    }
}
