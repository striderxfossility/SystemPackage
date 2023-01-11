<?php

namespace Jelle\Strider\View\Basics;

use Illuminate\View\Component;

class SearchButtonComponent extends Component
{
    public $submit;
    public $name;

    public function __construct(?bool $submit = true, ?string $name = "")
    {
        $this->submit   = $submit;
        $this->name     = $name;
    }


    public function render()
    {
        return view('basics::search-button', [
            'submit'    => $this->submit,
            'name'      => $this->name
        ]);
    }
}
