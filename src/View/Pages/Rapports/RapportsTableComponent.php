<?php

namespace Jelle\Strider\View\Pages\Rapports;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class RapportsTableComponent extends Component
{
    public $rapports;

    public function __construct(LengthAwarePaginator $rapports)
    {
        $this->rapports           = $rapports;
    }

    public function render()
    {
        return view('pages::rapports.table', [
            'rapports'  => $this->rapports,
        ]);
    }
}
