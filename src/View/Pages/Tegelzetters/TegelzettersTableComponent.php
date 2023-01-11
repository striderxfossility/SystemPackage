<?php

namespace Jelle\Strider\View\Pages\Tegelzetters;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use App\Models\Offer;

class TegelzettersTableComponent extends Component
{
    public $tegelzetters;
    public $offer;

    public function __construct(LengthAwarePaginator $tegelzetters, ?Offer $offer = null)
    {
        $this->tegelzetters = $tegelzetters;
        $this->offer        = $offer;
    }

    public function render()
    {
        return view('pages::tegelzetters.table', [
            'tegelzetters'  => $this->tegelzetters,
            'offer'         => $this->offer
        ]);
    }
}
