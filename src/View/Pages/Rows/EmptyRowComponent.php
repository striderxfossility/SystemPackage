<?php

namespace Jelle\Strider\View\Pages\Rows;

use Illuminate\View\Component;

class EmptyRowComponent extends Component
{
    public function render()
    {
        return view('components.layout.pages.rows.empty');
    }
}
