<?php

namespace Jelle\Strider\View\Pages\Orders;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class OrdersTableComponent extends Component
{
    public $orders;

    public function __construct(LengthAwarePaginator $orders)
    {
        $this->orders = $orders;
    }

    public function render()
    {
        return view('pages::orders.table', [
            'orders' => $this->orders
        ]);
    }
}
