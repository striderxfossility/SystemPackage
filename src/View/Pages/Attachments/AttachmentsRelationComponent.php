<?php

namespace Jelle\Strider\View\Pages\Attachments;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class AttachmentsRelationComponent extends Component
{
    public $attachments;

    public function __construct(Collection $attachments)
    {
        $this->attachments = $attachments;
    }

    public function render()
    {
        return view('pages::attachments.relation', [
            'attachments' => $this->attachments,
        ]);
    }
}
