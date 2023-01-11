<?php

namespace Jelle\Strider\View\Pages\Packages;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class PackageRelationComponent extends Component
{
    public $packages;

    public function __construct(Collection $packages)
    {
        $this->packages = $packages;
    }

    public function render()
    {
        return view('pages::packages.relation', [
            'packages' => $this->packages,
        ]);
    }
}
