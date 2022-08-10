<?php

namespace Romeritocampos\Auth\App;

class Application 
{

    protected static $home = '/homepage';

    public function __construct(protected Router $router)
    {
        $this->router = $router;
    }

    public function send () {
        $this->router->send();
    }

    public static function home () {
        return self::$home;
    }
    
}
