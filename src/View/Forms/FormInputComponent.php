<?php

namespace Jelle\Strider\View\Forms;

use Illuminate\View\Component;

class FormInputComponent extends Component
{
    public $name;
    public $value;
    public $label;
    public $class;

    public function __construct(string $name, string $label, ?string $value = '', ?string $class = '')
    {
        $this->name     = $name;
        $this->value    = $value;
        $this->label    = $label;
        $this->class    = $class;
    }

    public function render()
    {
        return view('forms::input', [
            'name'  => $this->name,
            'value' => $this->value,
            'label' => $this->label,
            'class' => $this->class
        ]);
    }
}
