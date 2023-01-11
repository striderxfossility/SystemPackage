<?php

namespace Jelle\Strider\View\Pages\Notes;

use Illuminate\View\Component;
use Illuminate\Support\Collection;

class NotesGridComponent extends Component
{
    public $notes;

    public function __construct(Collection $notes)
    {
        $this->notes           = $notes;
    }

    public function render()
    {
        return view('pages::notes.grid', [
            'notes' => $this->notes
        ]);
    }
}
