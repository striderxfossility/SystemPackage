<?php

namespace Jelle\Strider\View\Forms;

use Illuminate\View\Component;

class FormSelectComponent extends Component
{
    public $name;
    public $changeLayout;
    public $label;

    public function __construct(string $name, string $label, ?bool $changeLayout = false)
    {
        $this->name         = $name;
        $this->changeLayout = $changeLayout;
        $this->label        = $label;
    }

    public function render()
    {
        return view('components.layout.forms.select', [
            'name'          => $this->name,
            'changeLayout'  => $this->changeLayout,
            'label'         => $this->label
        ]);
    }
}
