@php
use Illuminate\Http\Request;

function hasCategoriesQueryString()
{
    $request = Request::capture();

    return collect([
            'exists' => $request->has('categories'), 
            'value' => $request->input('categories') 
        ]);
}
@endphp

<div>
    <div 
        x-cloak @click="openSideNav = !openSideNav" 
        x-show="openSideNav"
        class="fixed h-screen inset-0 z-30 duration-500 bg-gray-800 opacity-40"></div>
    <nav :class="{
        'translate-x-0 ease-in opacity-100 w-56': openSideNav === true,
        'w-56 -translate-x-full ease-out opacity-0': openSideNav === false
    }"
        x-cloak
        x-show="true"
        {{--  --}}
        class="fixed inset-0 z-40 h-screen overflow-y-scroll duration-200 transformtransform bg-white shadow">
        <div class="flex flex-col p-3 bg-blue-500 justify-center h-40">
            <h4 class="text-base tracking-wider text-white">Buy 'n' Sell</h4>
        </div>

        <div class="pb-3 p-2 space-y-3 capitalize">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('shop')" :active="request()->routeIs('shop')">
                {{ __('Shop') }}
            </x-responsive-nav-link>
            {{-- categories drop down --}}
            <div x-data="{
                openCategories: @js(hasCategoriesQueryString()['exists']),
                queryString: @js(hasCategoriesQueryString()['value']),
                }"
            >
                <div class="flex justify-between items-center capitalize text-gray-600 pl-4">
                    <span class="flex-1">categories</span>
                    {{-- svg button --}}
                    <button x-on:click="openCategories = !openCategories" class="p-2 rounded-sm bg-gray-200"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                            :class="{
                                'rotate-180': openCategories == true
                            }"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>
    
                <div class="pl-8" x-show="openCategories">
                    <form action="" method="GET">
                        <div class="flex flex-col py-4 space-y-2 text-gray-600 text-left text-sm">
                            <input hidden x-ref="category" value="" >
                            <button type="button" value="Clothes" class="text-left p-2">Clothes</button>
                            <button type="button" value="Food"
                                @class([
                                    'text-left p-2',
                                    'bg-yellow-50 font-extrabold text-yellow-700' => (hasCategoriesQueryString()['value'] == "Food")
                                ])
                            >Food</button>
                            <button type="button" value="Equipment" class="text-left text-sm p-2">Equipment</button>
                            <button type="button" value="Office" class="text-left text-sm p-2">Office</button>
                            <button type="button" value="Household items" class="text-left text-sm p-2">Household</button>
                            <button type="button" value="Toys" class="text-left text-sm p-2">Toys</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <hr class="block">
            @if (auth()->check())
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-responsive-nav-link>
                </form>
            @else
                <a href="{{route('login')}}" class="p-3 py-2 bg-gradient-to-b rounded text-center text-black from-gray-200 to-gray-300 mx-2 block">Login</a>
                <a href="{{route('register')}}" class="p-3 py-2 bg-gradient-to-b rounded text-center from-yellow-400 to-yellow-600 mx-2 block">register</a>
            @endif
        </div>
    </nav>

</div>
