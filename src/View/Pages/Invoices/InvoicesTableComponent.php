<?php

namespace Jelle\Strider\View\Pages\Invoices;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class InvoicesTableComponent extends Component
{
    public $invoices;

    public function __construct(LengthAwarePaginator $invoices)
    {
        $this->invoices = $invoices;
    }

    public function render()
    {
        return view('pages::invoices.table', [
            'invoices'        => $this->invoices
        ]);
    }
}
