<?php

namespace Jelle\Strider\View\Pages\Timesheets;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class TimesheetsTableComponent extends Component
{
    public $timesheets;

    public function __construct(Collection $timesheets)
    {
        $this->timesheets    = $timesheets;
    }

    public function render()
    {
        return view('pages::timesheets.table', [
            'timesheets' => $this->timesheets
        ]);
    }
}
