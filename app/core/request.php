<?php

namespace App\Core;
class request
{

    public static function uri()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace('php-basics', '', $uri); 
        return trim($uri, '/'); 
    }




public static function get($key, $default = null)
{
return $_GET[$key] ?? $_POST[$key] ?? $default;
}


public static function method()
{
return strtolower($_SERVER['REQUEST_METHOD']); //get or post 
}



}
