<?php

namespace Jelle\Strider\View\Pages\Workorders;

use Illuminate\View\Component;

class WorkordersGraftableComponent extends Component
{
    public $workorders;

    public function __construct($workorders)
    {
        $this->workorders           = $workorders;
    }

    public function render()
    {
        return view('pages::workorders.graftable', [
            'workorders' => $this->workorders,
        ]);
    }
}
