<?php

namespace Jelle\Strider\View\Pages\Inkopen;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class InkopenRelationComponent extends Component
{
    public $orders;

    public function __construct(Collection $orders)
    {
        $this->orders = $orders;
    }

    public function render()
    {
        return view('pages::inkopen.relation', [
            'orders' => $this->orders,
        ]);
    }
}
