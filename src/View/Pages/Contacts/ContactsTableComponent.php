<?php

namespace Jelle\Strider\View\Pages\Contacts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class ContactsTableComponent extends Component
{
    public $contacts;

    public function __construct(LengthAwarePaginator $contacts)
    {
        $this->contacts           = $contacts;
    }

    public function render()
    {
        return view('pages::contacts.table', [
            'contacts'  => $this->contacts,
        ]);
    }
}
