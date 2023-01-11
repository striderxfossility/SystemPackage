<?php

namespace Jelle\Strider\View\Forms;

use Illuminate\View\Component;

class FormAttachmentComponent extends Component
{
    public $label;

    public function __construct(?string $label = 'Bijlage')
    {
        $this->label = $label;
    }

    public function render()
    {
        return view('forms::attachment', [
            'label' => $this->label
        ]);
    }
}
