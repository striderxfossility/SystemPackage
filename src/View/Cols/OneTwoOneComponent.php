<?php

namespace Jelle\Strider\View\Cols;

use Illuminate\View\Component;

class OneTwoOneComponent extends Component
{
    public function render()
    {
        return view($_SERVER['DOCUMENT_ROOT'].'/resources/components/cols/one-two-one');
    }
}
