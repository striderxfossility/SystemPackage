<?php

namespace Jelle\Strider\View\Pages\Suppliers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class SuppliersTableComponent extends Component
{
    public $suppliers;

    public function __construct(LengthAwarePaginator $suppliers)
    {
        $this->suppliers           = $suppliers;
    }

    public function render()
    {
        return view('pages::suppliers.table', [
            'suppliers'  => $this->suppliers,
        ]);
    }
}
