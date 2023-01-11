<?php

namespace Jelle\Strider\View\Pages\Colors;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class ColorsTableComponent extends Component
{
    public $colors;

    public function __construct(LengthAwarePaginator $colors)
    {
        $this->colors           = $colors;
    }

    public function render()
    {
        return view('pages::colors.table', [
            'colors'  => $this->colors,
        ]);
    }
}
