<?php

namespace Jelle\Strider\View\Blocks;

use Illuminate\View\Component;
use Illuminate\Support\ViewErrorBag;

class ImportComponent extends Component
{
    public $action;
    public $errors;

    public function __construct(string $action, ?ViewErrorBag $errors)
    {
        $this->action   = $action;
        $this->errors   = $errors;
    }

    public function render()
    {
        return view('components.layout.blocks.import', [
            'action'    => $this->action,
            'errors'    => $this->errors
        ]);
    }
}
