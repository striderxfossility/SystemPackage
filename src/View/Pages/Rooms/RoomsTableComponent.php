<?php

namespace Jelle\Strider\View\Pages\Rooms;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use App\Models\Offer;

class RoomsTableComponent extends Component
{
    public $rooms;
    public $offer;

    public function __construct(LengthAwarePaginator $rooms, ?Offer $offer = null)
    {
        $this->rooms = $rooms;
        $this->offer = $offer;
    }

    public function render()
    {
        return view('pages::rooms.table', [
            'rooms' => $this->rooms,
            'offer' => $this->offer,
        ]);
    }
}
