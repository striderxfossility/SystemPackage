<?php

namespace Jelle\Strider\View\Pages\Workorders;

use Illuminate\View\Component;

class WorkordersTableComponent extends Component
{
    public $workorders;

    public function __construct($workorders)
    {
        $this->workorders           = $workorders;
    }

    public function render()
    {
        return view('pages::workorders.table', [
            'workorders' => $this->workorders,
        ]);
    }
}
