<?php

namespace Jelle\Strider\View\Pages\Emails;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class EmailsTableComponent extends Component
{
    public $emails;

    public function __construct(LengthAwarePaginator $emails)
    {
        $this->emails = $emails;
    }

    public function render()
    {
        return view('components.layout.pages.emails.table', [
            'emails' => $this->emails
        ]);
    }
}
