<?php
namespace Jelle\Strider\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/components/blocks',    'blocks');
        $this->loadViewsFrom(__DIR__.'/../resources/components/cols',      'cols');
        $this->loadViewsFrom(__DIR__.'/resources/components/forms',     'forms');
        $this->loadViewsFrom(__DIR__.'/resources/components/pages',     'pages');
        $this->loadViewsFrom(__DIR__.'/resources/components/table',     'table');
        $this->loadViewsFrom(__DIR__.'/resources/components/basics',    'basics');
    }
}