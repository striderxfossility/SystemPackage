<?php

namespace Jelle\Strider\View\Pages\Tiles;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use App\Models\Order;

class TilesRelationComponent extends Component
{
    public $tiles;
    public $order;

    public function __construct(Collection $tiles, ?Order $order = null)
    {
        $this->tiles = $tiles;
        $this->order = $order;
    }

    public function render()
    {
        return view('components.layout.pages.tiles.relation', [
            'tiles' => $this->tiles,
            'order' => $this->order
        ]);
    }
}
