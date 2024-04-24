<nav class="sm:h-14 w-full bg-black z-50 top-0 fixed">
    <div class="flex w-full h-full justify-center sm:justify-around">
        <div class="w-[88px] h-[32px] mt-3">
            <a href="{{route('index')}}" class="">
                <img src="{{ URL('images/logo-video.png') }}" class="h-8" alt="TopZone logo" />
            </a>
        </div>
        <div class="hidden sm:visible sm:flex sm:my-auto h-14">
            <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{route('products.list', ['iPhone'])}}">iPhone</a>
            </div>
            <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{route('products.list', ['iPad'])}}">iPad</a>
            </div>
            <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{route('products.list', ['Mac'])}}">Mac</a>
            </div>
            <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{route('products.list', ['Watch'])}}">Watch</a>
            </div>
        </div>
        <div class="invisible sm:visible my-auto">
            <div>
                <a href=""><i class="fa-solid fa-cart-shopping text-white text-xl"></i></a>
            </div>
        </div>
    </div>
    <div class="visible sm:hidden w-full flex justify-around sm:my-auto py-3 bg-black z-50">
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{route('products.list', ['iPhone'])}}">iPhone</a>
        </div>
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{route('products.list', ['iPad'])}}">iPad</a>
        </div>
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{route('products.list', ['Mac'])}}">Mac</a>
        </div>
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{route('products.list', ['Watch'])}}">Watch</a>
        </div>
    </div>
</nav>