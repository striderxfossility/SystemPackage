<?php

namespace Jelle\Strider\View\Blocks;

use Illuminate\View\Component;

class BlockSmallComponent extends Component
{
    public $class;
    public $color;
    public $handle;

    public function __construct(?string $class = '', ?string $color = 'slate', ?string $handle = '')
    {
        $this->class        = $class;
        $this->color        = $color;
        $this->handle       = $handle;
    }

    public function render()
    {
        return view('components.layout.blocks.block-small', [
            'class'         => $this->class,
            'color'         => $this->color,
            'handle'        => $this->handle
        ]);
    }
}
