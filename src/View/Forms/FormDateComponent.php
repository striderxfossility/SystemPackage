<?php

namespace Jelle\Strider\View\Forms;

use Illuminate\View\Component;

class FormDateComponent extends Component
{
    public $name;
    public $value;
    public $label;

    public function __construct(string $name, string $label, ?string $value = '')
    {
        $this->name     = $name;
        $this->value    = $value;
        $this->label    = $label;
    }

    public function render()
    {
        return view('components.layout.forms.date', [
            'name'  => $this->name,
            'value' => $this->value,
            'label' => $this->label
        ]);
    }
}
