<?php

namespace Jelle\Strider\View\Pages\Orderproducts;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use App\Models\Order;

class OrderproductRelationComponent extends Component
{
    public $orderproducts;
    public $order;

    public function __construct(Collection $orderproducts, ?Order $order = null)
    {
        $this->orderproducts    = $orderproducts;
        $this->order            = $order;
    }

    public function render()
    {
        return view('components.layout.pages.orderproducts.relation', [
            'orderproducts' => $this->orderproducts,
            'order'         => $this->order
        ]);
    }
}
