<?php

namespace Jelle\Strider\View\Pages\Voorstrijks;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class VoorstrijksTableComponent extends Component
{
    public $voorstrijks;

    public function __construct(LengthAwarePaginator $voorstrijks)
    {
        $this->voorstrijks           = $voorstrijks;
    }

    public function render()
    {
        return view('components.layout.pages.voorstrijks.table', [
            'voorstrijks'  => $this->voorstrijks,
        ]);
    }
}
