<?php

namespace src\controllers;
use src\controllers\get;
use src\controllers\post;
use src\controllers\put;
use src\controllers\delete;

class router {
    public function run(){
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':             
                new get;
                break;
            case 'POST':
                new post;
                break;
            case 'PUT':
                new put;
                break;
            case 'DELETE':
                new delete;    
                break;
            
            default:
                echo "DIFERENTE";
                break;
        }
    }
    public  function request($url, $closure) {
        $route = $_SERVER['REQUEST_URI'];
        if (strpos($route, '?')) {
            $route = strstr($route, '?', true);
        }
    
        $urlRule = preg_replace('/:([^\/]+)/', '(?<\1>[^/]+)', $url);
        $urlRule = str_replace('/', '\/', $urlRule);
    
        preg_match_all('/:([^\/]+)/', $url, $parameterNames);
    
    
        if (preg_match('/^' . $urlRule . '\/*$/s', $route, $matches)) {
    
            $parameters = array_intersect_key($matches, array_flip($parameterNames[1]));
            call_user_func_array($closure, $parameters);
        }
    }
}