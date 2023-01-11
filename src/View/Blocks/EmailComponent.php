<?php

namespace Jelle\Strider\View\Blocks;

use Illuminate\View\Component;

class EmailComponent extends Component
{
    public function render()
    {
        return view('blocks::email');
    }
}
