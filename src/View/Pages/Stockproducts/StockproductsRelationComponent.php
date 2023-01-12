<?php

namespace Jelle\Strider\View\Pages\Stockproducts;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class StockproductsRelationComponent extends Component
{
    public $stockproducts;

    public function __construct(Collection $stockproducts)
    {
        $this->stockproducts = $stockproducts;
    }

    public function render()
    {
        return view('pages::stockproducts.relation', [
            'stockproducts' => $this->stockproducts,
        ]);
    }
}
