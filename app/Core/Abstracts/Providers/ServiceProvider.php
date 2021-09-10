<?php


namespace App\Core\Abstracts\Providers;


use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

abstract class ServiceProvider extends LaravelServiceProvider
{
    abstract public function boot();
}
