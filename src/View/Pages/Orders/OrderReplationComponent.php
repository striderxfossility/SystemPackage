<?php

namespace Jelle\Strider\View\Pages\Orders;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use App\Models\Offer;

class OrderReplationComponent extends Component
{
    public $orders;

    public function __construct(Collection $orders)
    {
        $this->orders = $orders;
    }

    public function render()
    {
        return view('components.layout.pages.orders.relation', [
            'orders' => $this->orders,
        ]);
    }
}
