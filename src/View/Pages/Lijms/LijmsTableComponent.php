<?php

namespace Jelle\Strider\View\Pages\Lijms;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class LijmsTableComponent extends Component
{
    public $lijms;

    public function __construct(LengthAwarePaginator $lijms)
    {
        $this->lijms           = $lijms;
    }

    public function render()
    {
        return view('pages::lijms.table', [
            'lijms'  => $this->lijms,
        ]);
    }
}
