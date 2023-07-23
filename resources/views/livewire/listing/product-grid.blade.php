<main class="grid lg:grid-cols-5 grid-cols-2 md:grid-cols-3 gap-4 w-full">            
    @foreach ($this->listings as $item)
        <div 
            wire:key="product-card-{{$item->id}}" 
            class="border border-gray-200 rounded flex flex-col hover:border 
                hover:border-blue-500 text-gray-500 shadow-sm 
                hover:shadow-lg group bg-white/70">
            {{-- image --}}
            <x-listings.card-image :item="$item" />
            <div class="p-2 lg:p-4 space-y-2">
                <div class="">
                    <a href="{{route('listing',[ 'listing' => $item->id ])}}" 
                    class="text-base tracking-wider text-blue-700 font-semibold group-hover:underline ">{{$item->name}}</a>
                    <p class="text-xs">3 <span class=" text-yellow-600 text-xl">&star;</span></p>
                    <p class="text-lg">₦{{number_format($item->price)}}</p>
                </div>
                {{-- show count or add to cart --}}
                @if ($this->showCount($item))
                    <div
                        x-data="{
                            count: @js($this->showCount($item)),
                            disabled: false,
                            updateQuantity: function($event){
                                this.disabled = true;
                                this.$wire.updateQuantity(@js($item->id), $event.target.value)
                                            .then(() => {
                                                this.disabled = false;
                                                this.count = $event.target.value;
                                            });
                            }
                        }" 
                        class="gap-1 flex text-sm font-bold justify-around">
                        <button 
                            type="button"
                            wire:click="decrease({{$item->id}})" 
                            x-bind:disabled="disabled"
                            class="p-2 px-4 bg-blue-50 border border-blue-200 hover:bg-blue-200 rounded disabled:bg-gray-300"
                            >&minus;</button>
                        {{-- <div class="p-2 text-center grow"> {{$this->showCount($item)}} </div> --}}
                        {{-- inpu  --}}
                        <input
                            style="
                                input::-webkit-outer-spin-button,
                                input::-webkit-inner-spin-button {
                                    -webkit-appearance: none;
                                    margin: 0;
                                }

                                /* Firefox */
                                input[type=number] {
                                    -moz-appearance: textfield;
                                }
                            "
                            value="{{$this->showCount($item)}}"
                            x-on:blur="$event => {
                                if(count !== $event.target.value) {
                                    ($event.target.value == '') ? ($event.target.value = 0)  : true;
                                    updateQuantity($event);
                                }
                            }"
                            min="0" 
                            max="99" 
                            type="number"
                            x-on:keydown.enter="$event => {
                                $event.target.blur();
                            }"
                            title="Enter desire quantity"
                            x-bind:disabled="disabled"
                            class="p-1 border border-blue-100/70 focus:border-blue-100 grow text-center disabled:bg-yellow-100 disabled:text-yellow-400">
                        <button 
                            type="button"
                            wire:click="increment({{$item->id}})" 
                            class="p-2 px-4 bg-blue-50 border border-blue-200 hover:bg-blue-200 rounded disabled:bg-gray-300"
                            x-bind:disabled="disabled"
                            >&plus;</button>
                    </div>
                @else
                    <button 
                        wire:click="addProduct({{$item->id}})"
                        wire:loading.class="disabled"
                        class="hover:bg-gradient-to-t hover:from-yellow-300 hover:to-yellow-200  
                        bg-gradient-to-b block w-full border border-gray-200 p-2 rounded 
                        from-gray-100 to-gray-300 text-gray-700 text-sm capitalize 
                        disabled:text-gray-300">
                        add to cart
                    </button>
                @endif
            </div>
        </div>
    @endforeach
</main>