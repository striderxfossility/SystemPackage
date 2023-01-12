<?php

namespace Jelle\Strider\View\Pages\Materialproducts;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class MaterialproductsRelationComponent extends Component
{
    public $materialproducts;

    public function __construct(Collection $materialproducts)
    {
        $this->materialproducts = $materialproducts;
    }

    public function render()
    {
        return view('pages::materialproducts.relation', [
            'materialproducts' => $this->materialproducts,
        ]);
    }
}
