<?php

namespace Jelle\Strider\View\Pages\Packages;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use App\Models\Room;

class PackageTableComponent extends Component
{
    public $packages;
    public $room;

    public function __construct(LengthAwarePaginator $packages, ?Room $room = null)
    {
        $this->packages = $packages;
        $this->room     = $room;
    }

    public function render()
    {
        return view('components.layout.pages.packages.table', [
            'packages'  => $this->packages,
            'room'      => $this->room
        ]);
    }
}
