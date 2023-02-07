<?php

namespace Jelle\Strider\View\Pages\Showrooms;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class ShowroomsTableComponent extends Component
{
    public $showrooms;

    public function __construct(LengthAwarePaginator $showrooms)
    {
        $this->showrooms = $showrooms;
    }

    public function render()
    {
        return view('pages::showrooms.table', [
            'showrooms' => $this->showrooms,
        ]);
    }
}
