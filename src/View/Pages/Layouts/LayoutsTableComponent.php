<?php

namespace Jelle\Strider\View\Pages\Layouts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class LayoutsTableComponent extends Component
{
    public $layouts;

    public function __construct(LengthAwarePaginator $layouts)
    {
        $this->layouts           = $layouts;
    }

    public function render()
    {
        return view('pages::layouts.table', [
            'layouts'  => $this->layouts,
        ]);
    }
}
