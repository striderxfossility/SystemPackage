<?php

namespace Jelle\Strider\View\Pages\Rows;

use Illuminate\View\Component;
use App\Models\Row;

class RowComponent extends Component
{
    public $row;

    public function __construct(Row $row,)
    {
        $this->row = $row;
    }

    public function render()
    {
        return view('components.layout.pages.rows.normal', [
            'row' => $this->row
        ]);
    }
}
