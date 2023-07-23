<?php

namespace App\Http\Livewire\Dashboard\Listings;

use Livewire\Component;
use Livewire\WithPagination;

class AllListings extends Component
{
    use WithPagination;

    public $search;
    public $page = 1;
    public $is_listed;

    public $viewing;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'is_listed' => ['except' => ''],
    ];

    public function render()
    {
        return view('livewire.dashboard.listings.all-listings');
    }

    public function viewItem()
    {
        $item = \App\Models\Listing::find($this->viewing)->firstOrFail();

        return $item;
    }

    public function getListingsProperty()
    {
        return auth()->user()->listings()->when($this->search, function($query, $search){
            $query->where('name','like','%'.$search.'%')
                    ->orWhere('description','like', '%'.$search.'%')
                    ->orWhere('properties','like', '%'.$search.'%');
        })->when($this->is_listed, function($query, $is_listed){
            $query->where('is_listed', $is_listed );
        })->latest()->paginate(12);
    }
}
