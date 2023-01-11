<?php

namespace Jelle\Strider\View\Pages\Products;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use App\Models\Choice;

class ProductsRelationComponent extends Component
{
    public $products;
    public $choice;

    public function __construct(Collection $products, ?Choice $choice = null)
    {
        $this->products = $products;
        $this->choice   = $choice;
    }

    public function render()
    {
        return view('components.layout.pages.products.relation', [
            'products'  => $this->products,
            'choice'    => $this->choice
        ]);
    }
}
