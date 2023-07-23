<header x-data="{
    mobile_search: false,
    mobile_nav: false,
    openSideNav: false,
    scrollToSearch: function(){
        const yOffset = -300; 
        const element = document.getElementById('search_input');
        const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

        window.scrollTo({top: y, behavior: 'smooth'});
        
        element.focus();
    },
    searchProducts: function(){
        if( @js(request()->routeIs('index') || request()->routeIs('shop')) ){   
            this.scrollToSearch();
        } else {
           this.mobile_search = !this.mobile_search;
        }
    }
}" class="sticky top-0 w-full lg:px-12 p-4 shadow-lg text-white bg-blue-400 justify-between items-center flex flex-col lg:flex-row gap-x-4 z-20">
    {{-- home --}}
    <div class="flex justify-between items-center lg:w-2/3 w-full">        
        <!-- menu -->
        <button @click="openSideNav = !openSideNav" class="p-2 pl-0 lg:hidden ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        {{-- logo --}}
        <a href="{{route('index')}}" class="text-2xl lg:text-3xl font-semibold flex-shrink-0"> {{config('app.name')}} </a>

        {{-- icons --}}
        <div class="flex gap-4 lg:hidden">            
            <!-- search -->
            <button
                x-on:click="searchProducts" 
                class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>            
            {{-- cart --}}
            <a href="{{route('cart')}}" class="p-2 rounded bg-white/30 hover:bg-white/70 hover:text-blue-600 flex items-center gap-2 hover:fill-blue-500 fill-white">
                <svg class="w-4 h-4  " viewBox="0 0 20.891357 19.5" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.75 0C0.340088 0 0 0.339966 0 0.75C0 1.16003 0.340088 1.5 0.75 1.5L2.13989 1.5C2.31006 1.5 2.44995 1.60999 2.5 1.78003L5.06006 11.37C3.43994 11.79 2.25 13.26 2.25 15C2.25 15.41 2.59009 15.75 3 15.75L18.75 15.75C19.1599 15.75 19.5 15.41 19.5 15C19.5 14.59 19.1599 14.25 18.75 14.25L3.87988 14.25C4.18994 13.38 5.02002 12.75 6 12.75L17.22 12.75C17.51 12.75 17.77 12.59 17.8899 12.33C19.03 10 20.02 7.58997 20.8501 5.09998C20.9199 4.90002 20.8999 4.68994 20.8 4.5C20.7 4.31995 20.53 4.18994 20.3301 4.14002C15.51 2.90002 10.45 2.25 5.25 2.25C4.88989 2.25 4.54004 2.25 4.17993 2.26001L3.94995 1.39001C3.72998 0.569946 2.98999 0 2.13989 0L0.75 0L0.75 0Z" id="Shape" stroke="none" />
                    <path d="M2.25 18C2.25 17.17 2.91992 16.5 3.75 16.5C4.58008 16.5 5.25 17.17 5.25 18C5.25 18.83 4.58008 19.5 3.75 19.5C2.91992 19.5 2.25 18.83 2.25 18L2.25 18Z" id="Shape" stroke="none" />
                    <path d="M15 18C15 17.17 15.6699 16.5 16.5 16.5C17.3301 16.5 18 17.17 18 18C18 18.83 17.3301 19.5 16.5 19.5C15.6699 19.5 15 18.83 15 18L15 18Z" id="Shape" stroke="none" />
                </svg> {{$this->cart_count}} 
            </a>
        </div>
    </div>
    
    {{-- search box --}}
    <div  class="w-full"
        wire:ignore
        x-cloak
        x-data="{
            
        }"
        x-bind:class="{
            'hidden lg:flex': !mobile_search
        }">
        @if (request()->routeIs('index') )
            <input 
                x-on:click="scrollToSearch" 
                value="Search for products..."
                type="button" 
                class="py-2 px-3 flex-1  text-black/40 text-left border-blue-300 w-full border rounded bg-white " >
        @elseif( !request()->routeIs('shop'))
            <livewire:partials.search-field :button="false" />
        @endif
    </div>

    {{-- Links --}}
    <nav class="lg:flex gap-x-8 items-center hidden z-50">
        <a href="{{route('shop')}}" class="hover:bg-blue-200/[0.4] p-2 px-3 rounded">Shop </a>
        {{-- categories with sub menu --}}
        <div class="flex gap-x-8 items-center">
            <div x-data="{
                show: false,
            }"
            x-on:mouseover="show = true" x-on:mouseover.away="show = false"
            class="">
                <a href="#" class="hover:bg-blue-200/[0.4] p-2 px-3 rounded">Categories </a>
                {{-- menu --}}
                <div x-show="show" x-cloak class="bg-white p-4 fixed top-12 shadow-lg border z-50
                border-neutral-50 space-y-2 text-sm rounded flex flex-col divide-y text-blue-600">
                    <a href="#" class="pt-2">Clothes</a>
                    <a href="#" class="pt-2">Food</a>
                    <a href="#" class="pt-2">Equipment</a>
                    <a href="#" class="pt-2">Office</a>
                    <a href="#" class="pt-2">Utensils</a>
                    <a href="#" class="pt-2">Household items</a>
                    <a href="#" class="pt-2">Toys</a>
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{route('login')}}" 
                    class="p-2 px-3 bg-gradient-to-b from-gray-100 to-gray-300 
                    text-gray-800 rounded"
                    >Login</a>
    
                <a href="{{route('register')}}" 
                    class="p-2 px-3 bg-gradient-to-b from-yellow-400 to-yellow-600 
                    rounded text-white"
                    >Register</a>
            </div>
        </div>
        {{-- cart --}}
        <a href="{{route('cart')}}" class="p-2 rounded bg-white/30 hover:bg-white/90 hover:text-blue-600 flex items-center gap-2 hover:fill-blue-500 fill-white">
            <svg class="w-4 h-4  " viewBox="0 0 20.891357 19.5" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.75 0C0.340088 0 0 0.339966 0 0.75C0 1.16003 0.340088 1.5 0.75 1.5L2.13989 1.5C2.31006 1.5 2.44995 1.60999 2.5 1.78003L5.06006 11.37C3.43994 11.79 2.25 13.26 2.25 15C2.25 15.41 2.59009 15.75 3 15.75L18.75 15.75C19.1599 15.75 19.5 15.41 19.5 15C19.5 14.59 19.1599 14.25 18.75 14.25L3.87988 14.25C4.18994 13.38 5.02002 12.75 6 12.75L17.22 12.75C17.51 12.75 17.77 12.59 17.8899 12.33C19.03 10 20.02 7.58997 20.8501 5.09998C20.9199 4.90002 20.8999 4.68994 20.8 4.5C20.7 4.31995 20.53 4.18994 20.3301 4.14002C15.51 2.90002 10.45 2.25 5.25 2.25C4.88989 2.25 4.54004 2.25 4.17993 2.26001L3.94995 1.39001C3.72998 0.569946 2.98999 0 2.13989 0L0.75 0L0.75 0Z" id="Shape" stroke="none" />
                <path d="M2.25 18C2.25 17.17 2.91992 16.5 3.75 16.5C4.58008 16.5 5.25 17.17 5.25 18C5.25 18.83 4.58008 19.5 3.75 19.5C2.91992 19.5 2.25 18.83 2.25 18L2.25 18Z" id="Shape" stroke="none" />
                <path d="M15 18C15 17.17 15.6699 16.5 16.5 16.5C17.3301 16.5 18 17.17 18 18C18 18.83 17.3301 19.5 16.5 19.5C15.6699 19.5 15 18.83 15 18L15 18Z" id="Shape" stroke="none" />
            </svg> {{$this->cart_count}} </a>
    </nav>
    <x-sidenav/>
</header>