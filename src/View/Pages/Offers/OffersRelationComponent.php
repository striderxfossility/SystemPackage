<?php

namespace Jelle\Strider\View\Pages\Offers;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use App\Models\Offer;

class OffersRelationComponent extends Component
{
    public $offers;

    public function __construct(Collection $offers)
    {
        $this->offers           = $offers;
    }

    public function render()
    {
        return view('pages::offers.relation', [
            'offers'        => $this->offers,
        ]);
    }
}
