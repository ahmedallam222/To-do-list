<?php

namespace App\Database;

class APP {
    private static $entries = [];

        // SET
     public static function set($key,$value )
    {
        static::$entries[$key]=$value;
    }

    // GET
    public static function get($key, $default = null )
{
   return static::$entries[$key] ?? $default;
}

}