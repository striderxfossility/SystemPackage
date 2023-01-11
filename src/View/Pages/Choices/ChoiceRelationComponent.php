<?php

namespace Jelle\Strider\View\Pages\Choices;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ChoiceRelationComponent extends Component
{
    public $choices;

    public function __construct(Collection $choices)
    {
        $this->choices = $choices;
    }

    public function render()
    {
        return view('components.layout.pages.choices.relation', [
            'choices' => $this->choices,
        ]);
    }
}
