<?php

namespace Jelle\Strider\View\Pages\Montageprijzen;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class MontageprijzenTableComponent extends Component
{
    public $montageprijzen;

    public function __construct(LengthAwarePaginator $montageprijzen)
    {
        $this->montageprijzen           = $montageprijzen;
    }

    public function render()
    {
        return view('components.layout.pages.montageprijzen.table', [
            'montageprijzen'  => $this->montageprijzen,
        ]);
    }
}
