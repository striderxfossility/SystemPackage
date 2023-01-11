<?php

namespace Jelle\Strider\View\Forms;

use Illuminate\View\Component;

class FormTextareaComponent extends Component
{
    public $name;
    public $value;
    public $label;
    public $fakeTextarea;

    public function __construct(string $name, string $label, ?string $value = '', ?bool $fakeTextarea = false)
    {
        $this->name         = $name;
        $this->value        = $value;
        $this->label        = $label;
        $this->fakeTextarea = $fakeTextarea;
    }

    public function render()
    {
        return view('forms::textarea', [
            'name'          => $this->name,
            'value'         => $this->value,
            'label'         => $this->label,
            'fakeTextarea'  => $this->fakeTextarea
        ]);
    }
}
