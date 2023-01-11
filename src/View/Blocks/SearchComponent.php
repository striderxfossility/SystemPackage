<?php

namespace Jelle\Strider\View\Blocks;

use Illuminate\View\Component;

class SearchComponent extends Component
{
    public $url;

    public function __construct(string $url = null)
    {
        $this->url = $url;
    }

    public function render()
    {
        return view('blocks::search', ['url' => $this->url]);
    }
}
