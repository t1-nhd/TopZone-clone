<header class="w-full bg-black z-10 top-0 sticky">
    <div class="flex w-full h-full justify-center sm:justify-around">
        <div class="w-[88px] mt-3">
            <a href="{{route('index')}}" class="">
                <img src="{{ URL('images/logo-video.png') }}" class="h-8" alt="TopZone logo" />
            </a>
        </div>
        <ul class="hidden sm:visible sm:flex sm:my-auto h-14">
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{route('list', 'iPhone')}}">iPhone</a>
            </li>
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{route('list', 'iPad')}}">iPad</a>
            </li>
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{route('list', 'Mac')}}">Mac</a>
            </li>
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{route('list', 'Watch')}}">Watch</a>
            </li>
        </ul>
        <div class="invisible sm:visible my-auto flex">
            <div>
                <a href="{{route('carts.index', 'C000000001')}}"><i class="fa-solid fa-cart-shopping text-white text-xl mx-1"></i></a>
            </div>
        </div>
    </div>
    <div class="sm:hidden w-full flex justify-around sm:my-auto py-1 bg-black">
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{route('list', 'iPhone')}}">iPhone</a>
        </div>
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{route('list', 'iPad')}}">iPad</a>
        </div>
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{route('list', 'Mac')}}">Mac</a>
        </div>
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{route('list', 'Watch')}}">Watch</a>
        </div>
    </div>
</header>