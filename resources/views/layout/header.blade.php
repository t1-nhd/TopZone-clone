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
            <div id="toggle-search" class="px-5 flex items-center hover:bg-[#333] h-full">
                <button class="text-white">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

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

<!-- Search Bar (hidden by default) -->
<div id="search-bar" class="fixed w-full h-full z-50 inset-0 flex items-center justify-center bg-black bg-opacity-70 hidden">
    <div id="header-search-input" class="p-6 absolute w-2/4 top-10 left-1/2 transform -translate-x-1/2 rounded-lg text-center">
        <input type="text" id="search-bar-input"
            class="w-full py-3 px-5 rounded-[30px] bg-white border border-gray-600 focus:outline-none focus:border-gray-500"
            placeholder="Tìm kiếm iPhone, iPad, Mac, Watch...">
        <div id="search-suggest-result" class="w-full bg-white border border-t-0 rounded-bl-[30px] rounded-br-[30px] border-gray-600 focus:outline-none focus:border-gray-500 hidden">
            
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $searchBar = $("#search-bar");
        $isSearchBarHidden = true;
        $suggestSearch = $("#search-suggest-result");
        var $inputField = $("#search-bar-input");

        $("#toggle-search").on('click', function(e) {
            e.stopPropagation();
            $searchBar.removeClass("hidden");
            $isSearchBarHidden = false;
            $inputField.focus();
            $inputField.val('');
        });

        $(document).on('click', function(e) {
            if (!$isSearchBarHidden) {
                if (!$inputField.is(e.target) && !$inputField.has(e.target).length > 0) {
                    $searchBar.addClass("hidden");
                    $suggestSearch.empty();
                    isEmptySearch(true);
                }
            }
        });

        $inputField.on('keyup', function() {
            isEmptyResult = false;
            if ($inputField.val().length === 0) {
                $suggestSearch.empty();
                isEmptyResult = true;
            } else {
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: {
                        productName: $inputField.val()
                    },
                    success: function(res) {
                        $suggestSearch.empty();

                        if (res.data.length === 0) {
                            let productHtml = `
                                <div class="w-full h-[100px] text-xl border-gray-200 flex items-center rounded-bl-[30px] rounded-br-[30px] justify-center text-gray-400 font-bold">
                                    Không tìm thấy sản phẩm
                                </div>
                                `;
                                $suggestSearch.append(productHtml);
                        } else {
                            isEmptyResult = false;
                            res.data.forEach((product, index) => {
                                let productHtml = `
                                <a href="/${product.ProductName}-${product.Memory}">
                                    <div class="w-full h-[100px] hover:bg-gray-100 border-gray-200 flex items-center ${index<res.data.length-1?'border-b':'rounded-bl-[30px] rounded-br-[30px]'}" }>
                                        <div class="w-2/12 h-full py-5">
                                            <img src="/images/Thumbnails/${product.ProductThumbnail}" alt="${product.ProductName}" class="w-full h-full object-contain">
                                        </div>
                                        <div class="w-10/12 text-start">${product.ProductName} ${product.Memory}</div>
                                    </div>
                                </a>
                                `;
                                $suggestSearch.append(productHtml);
                            });
                        }
                    }
                });
            }
            isEmptySearch(isEmptyResult);
        });

        function isEmptySearch(isEmpty) {
            if (isEmpty) {
                $suggestSearch.addClass("hidden");
                $inputField.addClass("rounded-[30px]");
                $inputField.removeClass("rounded-tl-[25px] rounded-tr-[25px]");
                $suggestSearch.empty();
            } else {
                $suggestSearch.removeClass("hidden");
                $inputField.addClass("rounded-tl-[25px] rounded-tr-[25px]");
                $inputField.removeClass("rounded-[30px]");
            }
        }
    });
</script>