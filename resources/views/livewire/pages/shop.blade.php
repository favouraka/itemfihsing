@section('title','Shop')
<div 
    class="grid md:grid-cols-12 grid-cols-1">
    {{-- large screen sorting side-bar --}}
    <div class="lg:col-span-2 hidden md:block md:col-span-2 p-4">
        <div 
            class="">
            <div class="p-4  w-full">
                <p class="font-extrabold text-blue-800 pb-4">Categories</p>
                <aside class="pl-3">
                    <div class="flex flex-col gap-y-2 text-xs">
                        <a href="#" class="pt-2">Clothes</a>
                        <a href="#" class="pt-2">Food</a>
                        <a href="#" class="pt-2">Equipment</a>
                        <a href="#" class="pt-2">Office</a>
                        <a href="#" class="pt-2">Utensils</a>
                        <a href="#" class="pt-2">Household items</a>
                        <a href="#" class="pt-2">Toys</a>
                        <a href="#" class="pt-2">Clothes</a>
                        <a href="#" class="pt-2">Food</a>
                        <a href="#" class="pt-2">Equipment</a>
                        <a href="#" class="pt-2">Office</a>
                        <a href="#" class="pt-2">Utensils</a>
                        <a href="#" class="pt-2">Household items</a>
                        <a href="#" class="pt-2">Toys</a>
                        <a href="#" class="pt-2">Clothes</a>
                        <a href="#" class="pt-2">Food</a>
                        <a href="#" class="pt-2">Equipment</a>
                        <a href="#" class="pt-2">Office</a>
                        <a href="#" class="pt-2">Utensils</a>
                        <a href="#" class="pt-2">Household items</a>
                        <a href="#" class="pt-2">Toys</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    {{-- product search and grid --}}
    <div class="px-4 lg:px-8 lg:col-span-10 md:col-span-10">
        {{-- sort by search --}}
        <div class="w-full flex">
            <input 
            required 
            id="search_input"
            type="search" 
            name="search_products"
            title="Search for products"
            placeholder="Search for products..."
            wire:model="search"
            class="py-2 px-3 flex-1  text-black border-blue-300 rounded-l border-r-0 w-3/4 lg:w-full ">
        <button class="rounded-r bg-gradient-to-b from-yellow-300 to-yellow-600 text-gray-700 px-3 py-2"
            >Search</button>
        </div>
        {{-- list of products --}}
        <livewire:listing.product-grid />
    </div>
</div>
