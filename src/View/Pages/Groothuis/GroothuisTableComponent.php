<?php

namespace Jelle\Strider\View\Pages\Groothuis;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class GroothuisTableComponent extends Component
{
    public $apis;

    public function __construct(LengthAwarePaginator $apis)
    {
        $this->apis           = $apis;
    }

    public function render()
    {
        return view('components.layout.pages.groothuis.table', [
            'apis'  => $this->apis,
        ]);
    }
}
