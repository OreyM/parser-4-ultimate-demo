<?php


namespace App\Core\Traits;


trait Singleton
{
    protected static $instance = null;

    public static function instance() : self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    protected function __clone()
    {
    }

    protected function __construct()
    {
    }
}
