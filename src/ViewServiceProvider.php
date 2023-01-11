<?php
namespace Jelle\Strider;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/components/blocks', 'blocks');
    }
}