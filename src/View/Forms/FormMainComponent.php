<?php

namespace Jelle\Strider\View\Forms;

use Illuminate\View\Component;
use Illuminate\Support\ViewErrorBag;

class FormMainComponent extends Component
{
    public $method;
    public $action;
    public $errors;

    public function __construct(string $method, string $action, ?ViewErrorBag $errors)
    {
        $this->method   = $method;
        $this->action   = $action;
        $this->errors   = $errors;
    }

    public function render()
    {
        return view('components.layout.forms.main', [
            'method'    => $this->method,
            'action'    => $this->action,
            'errors'    => $this->errors
        ]);
    }
}
