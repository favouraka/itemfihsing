<div class="p-4 lg:px-12" 
    x-data="{

    }">
   <x-slot name="header">My listings</x-slot>

   {{-- search bar & sorting panel--}}
   <div class="py-8 grid grid-cols-1 md:grid-cols-2 gap-8">
       <div class=" flex flex-col">
           <label for="" class="block">Search </label>
           <input type="search" wire:model.debounce.350ms="search" class="focus:ring focus:ring-blue-600 focus:ring-offset-2 rounded-lg ">
       </div>

       <div  class="flex flex-col justify-between h-full">
            <label for="">Showing</label>
            <select class="rounded-lg" wire:model="is_listed">
                <option value="">Show all listings</option>
                <option value="1">Only listed</option>
                <option value="0">Only unlisted</option>
            </select>
        </div>       
   </div>

   <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach ($this->listings as $item)
            <div wire:click="$set('viewing', {{$item->id}})"
                class="border bg-white rounded-lg flex flex-col overflow-hidden group hover:border-blue-400 shadow-sm hover:shadow-lg">
                {{-- main-image --}}
                <x-listings.card-image :item="$item" />
                <div class="p-4 ">
                    <p class="capitalize group-hover:text-blue-600 group-hover:underline inline-block">{{$item->name}}</p>
                    @if (true)
                        <svg class="w-4 h-4 inline-block" viewBox="0 0 19.5 19.5" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 9.75C0 4.37012 4.36499 0 9.75 0C15.135 0 19.5 4.37012 19.5 9.75C19.5 15.1299 15.135 19.5 9.75 19.5C4.36499 19.5 0 15.1299 0 9.75L0 9.75ZM13.3599 7.93994C13.6011 7.6001 13.5229 7.12988 13.186 6.88989C12.8491 6.6499 12.3799 6.72998 12.1401 7.06006L8.90405 11.5901L7.28003 9.96997C6.98706 9.67993 6.51294 9.67993 6.21997 9.96997C5.927 10.26 5.927 10.74 6.21997 11.03L8.46997 13.28C8.62598 13.4399 8.84204 13.52 9.06201 13.5C9.28198 13.48 9.48193 13.3701 9.60986 13.1899L13.3599 7.93994L13.3599 7.93994Z" id="Shape" fill="#2A65F3" fill-rule="evenodd" stroke="none" />
                        </svg>
                    @else
                        <svg class="w-4 h-4 inline-block" viewBox="0 0 21.54004 19.495117" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <g id="Group-3">
                            <path d="M2.30005 0.217529C2.01001 -0.0725098 1.53003 -0.0725098 1.23999 0.217529C0.950073 0.507568 0.950073 0.987549 1.23999 1.27759L19.24 19.2776C19.53 19.5676 20.01 19.5676 20.3 19.2776C20.59 18.9875 20.59 18.5076 20.3 18.2175L2.30005 0.217529L2.30005 0.217529Z" id="Shape" fill="#A7AAAF" stroke="none" />
                            <path d="M21.4501 10.2976C20.9 11.9375 19.99 13.4075 18.8101 14.6077L15.72 11.5076C15.91 10.9575 16.02 10.3677 16.02 9.74756C16.02 6.84766 13.67 4.49756 10.77 4.49756C10.15 4.49756 9.56006 4.60767 9.01001 4.79761L6.53003 2.32764C7.83997 1.7876 9.27002 1.49756 10.77 1.49756C15.74 1.49756 19.96 4.71753 21.4501 9.1875C21.5701 9.54761 21.5701 9.9375 21.4501 10.2976L21.4501 10.2976Z" id="Shape" fill="#A7AAAF" stroke="none" />
                            <path d="M14.52 9.74756C14.52 9.92749 14.51 10.1077 14.48 10.2776L10.24 6.0376C10.41 6.00757 10.59 5.99756 10.77 5.99756C12.84 5.99756 14.52 7.67749 14.52 9.74756L14.52 9.74756Z" id="Shape" fill="#A7AAAF" stroke="none" />
                            <path d="M11.3 13.4575L7.06006 9.21753C7.03003 9.38745 7.02002 9.56763 7.02002 9.74756C7.02002 11.8176 8.70007 13.4976 10.77 13.4976C10.9501 13.4976 11.13 13.4875 11.3 13.4575L11.3 13.4575Z" id="Shape" fill="#A7AAAF" stroke="none" />
                            <path d="M5.52002 9.74756C5.52002 9.12744 5.63 8.5376 5.82007 7.98755L2.71997 4.88745C1.55005 6.08765 0.640015 7.55762 0.0899658 9.19751C-0.0300293 9.55762 -0.0300293 9.94751 0.0899658 10.3076C1.58008 14.7776 5.80005 17.9976 10.77 17.9976C12.27 17.9976 13.7001 17.7075 15.01 17.1675L12.53 14.6975C11.98 14.8875 11.39 14.9976 10.77 14.9976C7.86999 14.9976 5.52002 12.6475 5.52002 9.74756L5.52002 9.74756Z" id="Shape" fill="#A7AAAF" stroke="none" />
                        </g>
                        </svg>
                    @endif
                    <p class="block text-lg font-bold">₦{{$item->price}}</p>
                </div>
            </div>
        @endforeach
   </div>

   <div class="py-8">
       {{$this->listings->links()}}
   </div>
   {{-- modal to view information --}}
   @if ($this->viewing)       
    <div class="inset-0 p-4 flex overflow-y-auto fixed bg-gray-500/[0.4] backdrop-blur">
        <div class="min-h-2/3 rounded-lg drop-shadow-2xl bg-white m-auto w-full lg:w-2/3 overflow-hidden">
            <div class="border-b p-4">
                <p class="text-lg font-semibold">Listing information</p>
            </div>
            {{-- details --}}
            <div class="p-4 overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                    {{-- image --}}
                    <x-listings.card-image :item="$this->viewItem()" />
                    {{-- body --}}
                    <div class="lg:col-span-3 col-span-1">
                        <p class="text-lg font-semibold">{{$this->viewItem()->name}}</p>
                    </div>
                </div>
            </div>
            {{-- controls --}}
            <div class="border-t p-4 text-sm">
                <a href="#" class="p-2 px-3 inline-block text-white bg-blue-600 rounded-lg drop-shadow-sm">Edit Listing</a>
                <button wire:click="$set('viewing', null )" class="p-2 px-3 text-blue-600 border border-blue-600 rounded-lg focus:opacity-20">Cancel</button>
            </div>
        </div>
    </div>
   @endif
</div>
