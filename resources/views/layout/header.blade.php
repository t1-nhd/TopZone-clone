<header class="w-full bg-black z-10 top-0 sticky">
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
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{ route('list', 'Watch') }}">Tai nghe, loa</a>
            </li>
            <li class="text-white text-l flex items-center hover:bg-[#333] px-7">
                <a href="{{ route('list', 'Watch') }}">Phụ kiện</a>
            </li>
        </ul>
        <div class="hidden my-auto sm:flex sm:items-center h-14">
            @if (Auth::check())
                @if (Auth::user()->account_type == 0)
                    <div class="group">
                        <div class="px-3">
                            <a href="{{ route('profile') }}"
                                class="block py-2 px-3 text-gray-50 rounded hover:bg-[#333] md:hover:bg-transparent md:border-0 md:p-0">
                                Xin chào, {{ Auth::user()->name }} <i class="fa-solid fa-user ml-1"></i>
                            </a>
                        </div>
                        <div
                            class="invisible absolute z-50 flex w-auto flex-col bg-gray-100 border rounded-sm text-gray-800 group-hover:visible group-hover:transition-all text-start">
                            <div class="hover:bg-slate-300 w-full px-3 h-full">
                                <a href="{{ route('carts.index', Auth::user()->email) }}"
                                    class="my-2 block border-gray-100 font-semibold hover:text-black md:mx-2">
                                    <i class="fa-solid fa-cart-shopping mr-1"></i>Giỏ hàng
                                </a>
                            </div>
                            <div class="hover:bg-slate-300 w-full px-3 h-full">
                                <a href="{{ route('logout') }}"
                                    class="my-2 block border-gray-100 font-semibold hover:text-black md:mx-2">
                                    <i class="fa-solid fa-arrow-right-from-bracket mr-1"></i>Đăng xuất
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="px-7">
                        <a href="{{ route('logout') }}"
                            class="block py-2 px-3 text-gray-50 rounded hover:bg-[#333] md:hover:bg-transparent md:border-0 md:p-0">
                            Đăng xuất
                        </a>
                    </div>
                @endif
            @else
                <div class="px-7">
                    <a href="{{ route('show-login') }}" class="text-white">Đăng nhập</a>
                </div>
            @endif
            <!-- Search Icon -->
           <!-- <div class="px-3 flex items-center hover:bg-[#333] h-full">
                <button id="toggle-search" class="text-white">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            -->
            
        </div>
    </div>
    <!-- Search Bar (hidden by default) -->
    <div id="search-bar" class="hidden w-full bg-[#1a1a1a] px-5 py-3">
        <div class="max-w-3xl mx-auto flex items-center gap-4">
            <input type="text" id="header-search-input"
                class="w-full p-3 rounded-lg bg-[#323232] text-white border border-gray-600 focus:outline-none focus:border-amber-500"
                placeholder="Tìm kiếm iPhone, iPad, Mac, Watch...">
            <button id="header-search-button"
                class="p-3 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-colors">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>
    <!-- Mobile Menu -->
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
        <!-- Mobile Search Icon -->
        <div class="text-white text-l flex items-center hover:bg-[#333] px-7">
            <button id="toggle-search-mobile" class="text-white">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>
</header>