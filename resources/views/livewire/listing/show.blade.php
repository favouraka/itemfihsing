<div class="p-4 lg:px-12 py-8">
    @section('title', 'Buy '.$this->listing->name)
    <div class="flex divide-x border-gray-200">
        <a href="{{route('index')}}" class="inline-flex text-blue-700 underline pr-2">Home</a>
        <a href="#shop" class="inline-flex text-blue-700 underline px-2">Shop</a>
        <p class="text-gray-400 capitalize px-2">{{$this->listing->name}}</p>
    </div>
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 lg:gap-8 mt-4">
        {{-- main image --}}
        <div class="w-full aspect-square bg-gray-300"></div>
        {{-- name & description --}}
        <div class=" divide-y border-gray-400 space-y-2">
            <p class="text-3xl font-semibold text-gray-700">{{$this->listing->name}}</p>
            <div class="p pt-2 text-3xl text-slate-700">₦{{$this->listing->price}}</div>
            <div class="pt-10">
                <p class="font-bold">About this listing</p>
                <p class="text-gray-400 font-semibold">{{$this->listing->description}}</p>
            </div>
        </div>
        {{-- shopping info --}}
        <div class="border border-gray-300 rounded p-8 space-y-4 bg-white h-fit ">
            <div class="pt-2 text-3xl text-slate-700">₦{{$this->listing->price}}</div>
            <hr>
                {{-- buttons --}}
                @if ($this->cart_quantity)
                    {{-- adjust quantity --}}
                    <div class="flex text-center">
                        <button wire:click="decrease" class="p-3 py-2 border border-blue-300 bg-blue-100 hover:bg-blue-200 rounded">&minus;</button>
                        <div class="grow p-3 py-2">{{ $this->cart_quantity }}</div>
                        <button wire:click="increase" class=" p-3 py-2 border border-blue-300 bg-blue-100 hover:bg-blue-200 rounded">&plus;</button>
                    </div>
                @else
                    {{-- checkout --}}
                    <div class="flex flex-col gap-4">
                        <button class="bg-gradient-to-b from-gray-100 to-gray-300 rounded p-3 text-lg">Add to cart</button>
                    </div>
                @endif
                {{-- checkout --}}
                <div class="flex flex-col gap-4">
                    <button class="bg-gradient-to-b from-yellow-300 to-yellow-500 rounded p-3 text-lg">Checkout</button>
                </div>
        </div>
    </div>
</div>
