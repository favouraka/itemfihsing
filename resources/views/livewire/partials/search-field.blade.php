<form
    action="{{route('shop')}}" 
    method="get" class="flex w-full lg:w-3/4 m-0"
    >
    <input 
        required 
        id="search_input"
        type="search" 
        name="search_products"
        {{-- x-ref="searchInput" --}}
        title="Search for products"
        placeholder="Search for products..."
        wire:model.debounce.350ms="search"
        class="py-2 px-3 flex-1  text-black border-blue-300 {{ $this->button ? ' rounded-l border-r-0 w-3/4 lg:w-full ' : ' w-full border rounded ' }}">
    <button
        @if (!$this->button)
            hidden
        @endif 
        class="rounded-r bg-gradient-to-b from-yellow-300 to-yellow-600 text-gray-700 px-3 py-2"
        >Search</button>
</form>
