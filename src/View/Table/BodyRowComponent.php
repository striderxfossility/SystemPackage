<?php

namespace Jelle\Strider\View\Table;

use Illuminate\View\Component;

class BodyRowComponent extends Component
{
    public $link;

    public function __construct(?string $link = null)
    {
        $this->link = $link;
    }

    public function render()
    {
        return view('table::body-row', ['link' => $this->link]);
    }
}
