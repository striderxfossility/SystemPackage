<?php

namespace Jelle\Strider\View\Pages\Shadowtegels;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ShadowtegelsRelationComponent extends Component
{
    public $shadowtegels;

    public function __construct(Collection $shadowtegels)
    {
        $this->shadowtegels = $shadowtegels;
    }

    public function render()
    {
        return view('components.layout.pages.shadowtegels.relation', [
            'shadowtegels' => $this->shadowtegels,
        ]);
    }
}
