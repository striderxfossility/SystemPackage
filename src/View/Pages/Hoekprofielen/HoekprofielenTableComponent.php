<?php

namespace Jelle\Strider\View\Pages\Hoekprofielen;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class HoekprofielenTableComponent extends Component
{
    public $hoekprofielen;

    public function __construct(LengthAwarePaginator $hoekprofielen)
    {
        $this->hoekprofielen           = $hoekprofielen;
    }

    public function render()
    {
        return view('pages::hoekprofielen.table', [
            'hoekprofielen'  => $this->hoekprofielen,
        ]);
    }
}
