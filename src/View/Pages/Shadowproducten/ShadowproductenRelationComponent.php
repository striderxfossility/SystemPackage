<?php

namespace Jelle\Strider\View\Pages\Shadowproducten;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ShadowproductenRelationComponent extends Component
{
    public $shadowproducten;

    public function __construct(Collection $shadowproducten)
    {
        $this->shadowproducten = $shadowproducten;
    }

    public function render()
    {
        return view('components.layout.pages.shadowproducten.relation', [
            'shadowproducten' => $this->shadowproducten,
        ]);
    }
}
