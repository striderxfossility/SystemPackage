<?php

namespace Jelle\Strider\View\Blocks;

use Illuminate\View\Component;

class BlockTitleComponent extends Component
{
    public $extra;

    public function __construct(?string $extra = null)
    {
        $this->extra = $extra;
    }

    public function render()
    {
        return view('blocks::title', ['extra' => $this->extra]);
    }
}
