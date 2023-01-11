<?php

namespace Jelle\Strider\View\Pages\Rooms;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class RoomsRelationComponent extends Component
{
    public $rooms;

    public function __construct(Collection $rooms)
    {
        $this->rooms = $rooms;
    }

    public function render()
    {
        return view('components.layout.pages.rooms.relation', [
            'rooms' => $this->rooms,
        ]);
    }
}
