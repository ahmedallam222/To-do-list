<?php



namespace App\Core;


class router
{

    private $get = [];
    private $post = [];



    public static function make() //انتبه للوسيط هنا
    {
        $router = new self; // إنشاء غرض جديد من الصنف

        return $router; // إعادة الكائن وهو يحوي المسارات بعد التهيئة
    }



    public function get($uri, $action)
    {
        $this->get[$uri] = $action;
        return $this;
    }


    public function post($uri, $action)
    {
        $this->post[$uri] = $action;
        return $this;
    }


    public function resolve($uri, $method)
    {

        if (array_key_exists($uri, $this->{$method})) {

            $action = $this->{$method}[$uri];
            $controller = new $action[0]; // create controller object
            $method = $action[1];
            $controller->{$method}();
        } else {
            throw new \Exception('PAGE NOT FOUND!');
        }
    }
}
