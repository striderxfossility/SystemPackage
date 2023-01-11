<?php

namespace Jelle\Strider\View\Pages\Sills;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class SillsTableComponent extends Component
{
    public $sills;

    public function __construct(LengthAwarePaginator $sills)
    {
        $this->sills           = $sills;
    }

    public function render()
    {
        return view('components.layout.pages.sills.table', [
            'sills'  => $this->sills,
        ]);
    }
}
