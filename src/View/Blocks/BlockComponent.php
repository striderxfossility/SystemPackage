<?php

namespace Jelle\Strider\View\Blocks;

use Illuminate\View\Component;

class BlockComponent extends Component
{
    public $class;

    public function __construct(?string $class = '')
    {
        $this->class   = $class;
    }

    public function render()
    {
        return view('components.layout.blocks.block', ['class' => $this->class]);
    }
}
