<?php

namespace Jelle\Strider\View\Forms;

use Illuminate\View\Component;

class FormSubmitComponent extends Component
{
    public $name;
    public $full;
    public $bottom;
    public $color;

    public function __construct(?string $name = 'Volgende', ?bool $full = false, ?bool $bottom = false, ?string $color = 'slate',)
    {
        $this->name     = $name;
        $this->full     = $full;
        $this->bottom   = $bottom;
        $this->color    = $color;
    }

    public function render()
    {
        return view('components.layout.forms.submit', [
            'name'      => $this->name,
            'full'      => $this->full,
            'bottom'    => $this->bottom,
            'color'     => $this->color,
        ]);
    }
}
