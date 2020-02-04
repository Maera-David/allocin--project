<?php

class Route
{
    private $path;
    private $callable = [];
    private $matches;
    private $params = [];

    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function with($param, $regex)
    {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    public function match($url)
    {
        $url = trim($url, '/');
        //cette ligne permet de décomposer les paramètres de l'url marqué par un :param, de plus dans les regew. Nous avons entre crochets [] est ce qu'on appelle une classe de caractères : cela signifie qu'une des lettres à l'intérieur peut convenir. Un ^ à l'intérieur d'une classe de caractère sert à dire qu'on ne veut PAS ce qui se trouve à l'intérieur de cette classe. Les parenthèses () désignent un sous-masque, c'est à dire localiser un ensemble de motif : cf => https://www.php.net/manual/fr/regexp.reference.subpatterns.php
        $path = preg_replace_callback('#:([\w]+)#', [$this, "paramMatch"], $this->path);
        $regex = "#^" . $path . "$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false; //404???
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    private function paramMatch($match)
    {
        if(isset($this->params[$match[1]]))
        {
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }

    public function call()
    {
        if(is_string($this->callable)){
            $params = explode('.', $this->callable);
            $controllerName = $params[0] . "Controller";
            $controller = new $controllerName;
            return call_user_func_array([$controller, $params[1]], $this->matches);
        }
        return call_user_func_array($this->callable, $this->matches);
    }

    public function getUrl($params)
    {
        $path = $this->path;
        foreach($params as $k => $v)
        {
            $path = str_replace(":$k", $v, $path);
        }
        return $path;
    }
}
