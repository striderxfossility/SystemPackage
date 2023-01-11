<?php

namespace Jelle\Strider\View\Pages\Voegen;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class VoegenTableComponent extends Component
{
    public $voegen;

    public function __construct(LengthAwarePaginator $voegen)
    {
        $this->voegen           = $voegen;
    }

    public function render()
    {
        return view('pages::voegen.table', [
            'voegen'  => $this->voegen,
        ]);
    }
}
