<?php

namespace Jelle\Strider\View\Pages\Products;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use App\Models\Room;
use App\Models\Package;
use App\Models\Choice;

class ProductsTableComponent extends Component
{
    public $products;
    public $room;
    public $package;
    public $choice;

    public function __construct(LengthAwarePaginator $products, ?Room $room = null, ?Package $package = null, ?Choice $choice = null)
    {
        $this->products = $products;
        $this->room     = $room;
        $this->package  = $package;
        $this->choice   = $choice;
    }

    public function render()
    {
        return view('components.layout.pages.products.table', [
            'products'  => $this->products,
            'room'      => $this->room,
            'package'   => $this->package,
            'choice'    => $this->choice
        ]);
    }
}
