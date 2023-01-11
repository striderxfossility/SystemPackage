<?php

namespace Jelle\Strider\View\Pages\Tiles;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use App\Models\Room;

class TilesTableComponent extends Component
{
    public $tiles;
    public $room;

    public function __construct(LengthAwarePaginator $tiles, ?Room $room)
    {
        $this->tiles    = $tiles;
        $this->room     = $room;
    }

    public function render()
    {
        return view('components.layout.pages.tiles.table', [
            'tiles' => $this->tiles,
            'room'  => $this->room
        ]);
    }
}
