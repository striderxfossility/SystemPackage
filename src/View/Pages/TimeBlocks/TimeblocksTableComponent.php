<?php

namespace Jelle\Strider\View\Pages\Timeblocks;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class TimeblocksTableComponent extends Component
{
    public $timeblocks;

    public function __construct(LengthAwarePaginator $timeblocks)
    {
        $this->timeblocks    = $timeblocks;
    }

    public function render()
    {
        return view('pages::timeblocks.table', [
            'timeblocks' => $this->timeblocks,
        ]);
    }
}
