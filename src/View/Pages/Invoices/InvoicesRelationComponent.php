<?php

namespace Jelle\Strider\View\Pages\Invoices;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class InvoicesRelationComponent extends Component
{
    public $invoices;

    public function __construct(Collection $invoices)
    {
        $this->invoices           = $invoices;
    }

    public function render()
    {
        return view('pages::invoices.relation', [
            'invoices'        => $this->invoices,
        ]);
    }
}
