<?php

namespace Jelle\Strider\View\Pages\Offers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use App\Models\Offer;

class OffersTableComponent extends Component
{
    public $offers;
    public $offerOriginal;

    public function __construct(LengthAwarePaginator $offers, ?Offer $offerOriginal)
    {
        $this->offers           = $offers;
        $this->offerOriginal    = $offerOriginal;
    }

    public function render()
    {
        return view('components.layout.pages.offers.table', [
            'offers'        => $this->offers,
            'offerOriginal' => $this->offerOriginal
        ]);
    }
}
