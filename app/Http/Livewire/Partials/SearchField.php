<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class SearchField extends Component
{
    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function mount($button = true, $results = true)
    {
        $this->button = $button;
        $this->results = $results;
    }

    public function render()
    {
        return view('livewire.partials.search-field');
    }
}
