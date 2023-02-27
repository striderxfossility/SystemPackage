<?php

namespace Jelle\Strider\View\Pages\Maintenances;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class MaintenancesTableComponent extends Component
{
    public $maintenances;

    public function __construct(LengthAwarePaginator $maintenances)
    {
        $this->maintenances = $maintenances;
    }

    public function render()
    {
        return view('pages::maintenances.table', [
            'maintenances' => $this->maintenances,
        ]);
    }
}
