<?php

namespace Jelle\Strider\View\Blocks;

use Illuminate\View\Component;

class SendedComponent extends Component
{
    public $date;

    public function __construct(string $date)
    {
        $this->date     = $date;
    }

    public function render()
    {
        return view('components.layout.blocks.sended', [
            'date'  => $this->date
        ]);
    }
}
