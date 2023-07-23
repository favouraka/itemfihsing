<x-theme-layout >
    @section('title',"Buy Cheap Stuff Here")
    <section
        x-data
        style="background-image: url('{{ asset('/img/landing-banner.jpg') }}')"
        class="w-full bg-blue-50 h-[30rem] grid grid-cols-1 md:grid-cols-2 px-5 lg:px-12 bg-right md:bg-center gap-8 bg-opacity-90 bg-blend-overlay lg:bg-blend-normal">
        {{-- search --}}
        <div class="my-auto space-y-8 flex flex-col">
            <p class="text-4xl font-bold text-blue-900">Search for things to buy at <span class="decoration-yellow-400 px-2 transform underline ">best</span> prices</p>
            <livewire:partials.search-field />
        </div>
    </section>
    <section class="px-4 lg:px-12 flex lg:py-12 gap-4 lg:flex-row flex-col relative">
        {{-- categories panel --}}
        <aside class="w-1/4 hidden lg:block">
            <div class="flex flex-col divide-y gap-y-2  p-8 shadow-lg text-blue-600 border border-gray-300 rounded">
                <p class="uppercase text-gray-700 text-sm font-extrabold border-0 mb-2">categories</p>
                <a href="#" class="pt-2">Clothes</a>
                <a href="#" class="pt-2">Food</a>
                <a href="#" class="pt-2">Equipment</a>
                <a href="#" class="pt-2">Office</a>
                <a href="#" class="pt-2">Utensils</a>
                <a href="#" class="pt-2">Household items</a>
                <a href="#" class="pt-2">Toys</a>
            </div>
        </aside>

        {{-- categories mobile --}}
        <div class="relative">
            <article class="p-3 bg-white rounded lg:hidden shadow relative -top-6">
                {{-- row of categories --}}
                <div class="flex overflow-x-auto snap-x snap-mandatory divide-x">
                    @foreach([1,2,3,4,5,6] as $i)
                        <div class="whitespace-nowrap snap-center flex flex-col gap-4 justify-center items-center p-3">
                            {{-- category image --}}
                            <div class="aspect-square w-12 bg-gray-400"></div>
                           <p class="text-sm font-light"> lorem ipsum</p>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>
        <livewire:listing.product-grid/>
    </section>
</x-theme-layout>