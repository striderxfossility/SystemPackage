<?php

namespace Jelle\Strider\View\Table;

use Illuminate\View\Component;

class TableHeadComponent extends Component
{
    public function render()
    {
        return view('components.layout.table.head');
    }
}
