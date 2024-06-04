<header class="w-full bg-black absolute z-50">
    <div class="flex w-full h-full justify-center sm:justify-around">
        <div class="w-[88px] mt-3">
            <a href="{{ route('index') }}" class="">
                <img src="{{ URL('images/logo-video.png') }}" class="h-8" alt="TopZone logo" />
            </a>
        </div>
        <ul class="hidden sm:flex sm:my-auto h-14">
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{ route('list', 'iPhone') }}">iPhone</a>
            </li>
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{ route('list', 'iPad') }}">iPad</a>
            </li>
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{ route('list', 'Mac') }}">Mac</a>
            </li>
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{ route('list', 'Watch') }}">Watch</a>
            </li>
        </ul>
        <div class="hidden my-auto sm:flex sm:items-center hover:bg-[#333] h-14">
            @if (Auth::check())
                @if (Auth::user()->account_type == 0)
                    <div class="group">
                        <div class="px-3">
                            <a href="{{ route('profile') }}"
                                class="block py-2 px-3 text-gray-50 rounded hover:bg-[#333] md:hover:bg-transparent md:border-0 md:p-0 ">
                                Xin chào, {{ Auth::user()->name }} <i class="fa-solid fa-user mrl-1"></i></a>
                        </div>
                        <div
                            class="invisible absolute z-50 flex w-auto flex-col bg-gray-100 border rounded-sm text-gray-800 group-hover:visible text-start">
                            <div class="hover:bg-slate-300 w-full px-3 h-full">
                                <a href="{{ route('carts.index', Auth::user()->email) }}"
                                    class="my-2 block border-gray-100 font-semibold hover:text-black md:mx-2">
                                    <i class="fa-solid fa-cart-shopping mr-1"></i>Giỏ hàng</a>
                            </div>
                            <div class="hover:bg-slate-300 w-full px-3 h-full">
                                <a href="{{ route('logout') }}"
                                    class="my-2 block border-gray-100 font-semibold hover:text-black md:mx-2"><i
                                        class="fa-solid fa-arrow-right-from-bracket mr-1"></i>Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="px-7">
                        <a href="{{ route('logout') }}"
                            class="block py-2 px-3 text-gray-50 rounded hover:bg-[#333] md:hover:bg-transparent md:border-0 md:p-0 ">
                            Đăng xuất</a>
                    </div>
                @endif
            @else
                <div class="px-7">
                    <a href="{{ route('show-login') }}" class="text-white">Đăng nhập</a>
                </div>
            @endif
        </div>
    </div>
    <div class="sm:hidden w-full flex justify-around sm:my-auto py-2 bg-black">
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{ route('list', 'iPhone') }}">iPhone</a>
        </div>
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{ route('list', 'iPad') }}">iPad</a>
        </div>
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{ route('list', 'Mac') }}">Mac</a>
        </div>
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <a href="{{ route('list', 'Watch') }}">Watch</a>
        </div>
    </div>
</header>
