<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Listing;

class Shop extends Component
{
    public $page = 1;
    public $search = '';
    public $category = '';
    public $sort = '';
    
    protected $queryString = [
        'page' => ['except' => 1],
        'category' => ['except' => ''],
        'search' => ['except' => ''],
        'sort' => ['except' => ''],
    ];

    public function render()
    {
        return view('livewire.pages.shop')->layout('layouts.theme');
    }
}
