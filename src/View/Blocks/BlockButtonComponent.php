<?php

namespace Jelle\Strider\View\Blocks;

use Illuminate\View\Component;

class BlockButtonComponent extends Component
{
    public $url;
    public $color;
    public $active;
    public $confirm;
    public $bottom;

    public function __construct(string $url, ?string $color = 'slate', ?bool $active = false, ?string $confirm = '', ?bool $bottom = false)
    {
        $this->url      = $url;
        $this->color    = $color;
        $this->active   = $active;
        $this->bottom  = $bottom;
        $this->confirm  = $confirm;
    }

    public function render()
    {
        return view('components.layout.blocks.button', [
            'url'       => $this->url, 
            'color'     => $this->color, 
            'active'    => $this->active, 
            'bottom'    => $this->bottom, 
            'confirm'   => $this->confirm
        ]);
    }
}
