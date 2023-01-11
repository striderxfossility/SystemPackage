<?php

namespace Jelle\Strider\View\Pages\Tiles;

use Illuminate\View\Component;
use App\Models\Order;

class TilesOpenstaandRelationComponent extends Component
{
    public $tiles;
    public $order;

    public function __construct(array $tiles, Order $order)
    {
        $this->tiles = $tiles;
        $this->order = $order;
    }

    public function render()
    {
        return view('pages::tiles.relation-openstaand', [
            'tiles'  => $this->tiles,
            'order'  => $this->order,
        ]);
    }
}
