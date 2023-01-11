<?php

namespace Jelle\Strider\View\Pages\Products;

use Illuminate\View\Component;
use App\Models\Order;

class ProductsOpenstaandRelationComponent extends Component
{
    public $products;
    public $order;

    public function __construct(array $products, Order $order)
    {
        $this->products = $products;
        $this->order = $order;
    }

    public function render()
    {
        return view('components.layout.pages.products.relation-openstaand', [
            'products'  => $this->products,
            'order'  => $this->order,
        ]);
    }
}
