<?php

namespace Jelle\Strider\View\Pages\Tegelzetters;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use App\Models\Offer;

class TegezettersRelationComponent extends Component
{
    public $tegelzetters;
    public $offer;

    public function __construct(Collection $tegelzetters, ?Offer $offer = null)
    {
        $this->tegelzetters = $tegelzetters;
        $this->offer        = $offer;
    }

    public function render()
    {
        return view('pages::tegelzetters.relation', [
            'tegelzetters'  => $this->tegelzetters,
            'offer'         => $this->offer
        ]);
    }
}
