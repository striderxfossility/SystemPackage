<?php

namespace Jelle\Strider\View\Forms;

use Illuminate\View\Component;

class FormAttachmentComponent extends Component
{
    public $label;
    public $name;
    public $value;

    public function __construct(?string $label = 'Bijlage', ?string $name = 'src', ?string $value = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }

    public function render()
    {
        return view('forms::attachment', [
            'label' => $this->label,
            'name' => $this->name,
            'value' => $this->value
        ]);
    }
}
