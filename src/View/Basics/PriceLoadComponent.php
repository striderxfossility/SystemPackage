<?php

namespace Jelle\Strider\View\Basics;

use App\Models\Offer;
use Illuminate\View\Component;

class PriceLoadComponent extends Component
{
    public $offer;

    public function __construct(?Offer $offer = null)
    {
        $this->offer = $offer;
    }


    public function render()
    {
        return view('basics::check-priceload', [
            'offer'      => $this->offer
        ]);
    }
}
