@props(['item'])
@if ($item->photos->first())
    <img class="w-full aspect-square" src="{{route('show-asset', ['path' => $item->path])}}" alt="image for {{$item->name}}"> 
@else                
    <div class="h-36 bg-gray-300 aspect-square p-4 flex flex-col justify-around items-center">
        <p class="text-white text-xs">Sorry, no image to show</p>
        <svg class="w-8" viewBox="0 0 21 18" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
        <g id="Group-2" transform="translate(0.75 0.75)">
            <path d="M4.57703 2.42004C4.216 3 3.61102 3.38 2.93597 3.47998C2.55701 3.53003 2.17902 3.58997 1.802 3.65002C0.749023 3.82996 0 4.76001 0 5.81995L0 14.25C0 15.49 1.00702 16.5 2.25 16.5L17.25 16.5C18.493 16.5 19.5 15.49 19.5 14.25L19.5 5.81995C19.5 4.76001 18.751 3.82996 17.698 3.65002C17.321 3.58997 16.943 3.53003 16.564 3.47998C15.889 3.38 15.284 3 14.923 2.42004L14.102 1.10999C13.723 0.5 13.079 0.109985 12.365 0.0699463C11.5 0.0200195 10.628 0 9.75 0C8.87201 0 8 0.0200195 7.13501 0.0699463C6.42102 0.109985 5.77698 0.5 5.39801 1.10999L4.57703 2.42004L4.57703 2.42004Z" id="Shape" fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M14.25 9C14.25 11.49 12.235 13.5 9.75 13.5C7.26501 13.5 5.25 11.49 5.25 9C5.25 6.51001 7.26501 4.5 9.75 4.5C12.235 4.5 14.25 6.51001 14.25 9L14.25 9Z" id="Shape" fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M16.5 6.75L17.5 6.75L17.5 7.75L16.5 7.75L16.5 6.75L16.5 6.75Z" id="Shape" fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </g>
        </svg>
    </div>
@endif