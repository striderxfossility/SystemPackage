<?php

namespace Jelle\Strider\View\Pages\Timesheets;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use App\Models\Room;

class TimesheetsTimelineComponent extends Component
{
    public $date;

    public function __construct($date)
    {
        $this->date    = $date;
    }

    public function render()
    {
        return view('pages::timesheets.timeline',[
            'date' => $this->date
        ]);
    }
}
