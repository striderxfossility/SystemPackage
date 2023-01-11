<?php

namespace Jelle\Strider\View\Forms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\Component;

class FormSearchComponent extends Component
{
    public $name;
    public $value;
    public $label;
    public $table;
    public $columns;

    public function __construct(string $name, string $label, string $table, ?string $value = '')
    {
        $this->name     = $name;
        $this->value    = $value;
        $this->label    = $label;
        $this->table    = DB::table($table)->latest()->get()->toArray();
        $this->columns  = Schema::getColumnListing($table);
    }

    public function render()
    {
        return view('forms::search', [
            'name'      => $this->name,
            'value'     => $this->value,
            'label'     => $this->label,
            'table'     => $this->table,
            'columns'   => $this->columns
        ]);
    }
}
