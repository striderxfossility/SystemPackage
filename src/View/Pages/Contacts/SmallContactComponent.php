<?php

namespace Jelle\Strider\View\Pages\Contacts;

use App\Models\Contact;
use Illuminate\View\Component;

class SmallContactComponent extends Component
{
    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function render()
    {
        return view('components.layout.pages.contacts.small', ['contact' => $this->contact]);
    }
}
