@extends('layout.layout')
@section('title', $title)
@section('content')

    <div class="w-full">
        <div class="text-center py-20 md:pt-20">
            <a href="{{ route('products.index', $title) }}" class="text-white text-5xl"><i class="fa-brands fa-apple"></i>
                {{ $title }}</a>
        </div>
        <div class="hidden md:flex justify-end mt-2 pr-10 pb-20">
            <input type="text" name="search" id="search"
                class="h-12 rounded-lg md:w-full lg:w-1/4 p-4 border-white bg-[#333] text-white focus:bg-white focus:text-black"
                placeholder="Tìm kiếm sản phẩm" onkeyup="liveSearch()">
        </div>
        <div class="hidden sm:flex justify-center">
            <div class="container sm:px-10 text-gray-300 text-md">
                <a href="" class="mx-5 text-white sm:pb-3 border-b">
                    Tất cả
                </a>
                @foreach ($models as $model)
                    <a href="{{ route('filter', $model->ProductModelName) }}"
                        class="mx-5 hover:text-white hover:transition-all delay-100 pb-3 hover:border-b">
                        {{ $model->ProductModelName }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex justify-center">
            <div class="container py-10 px-10 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 md:gap-2 xl:gap-5 place-items-center">
                @foreach ($data as $item)
                    <div
                        class="bg-[#323232] hover:shadow-sm-light hover:shadow-gray-500  hover:transition-all delay-[50ms] min-w-[380px] max-w-[380px] h-[470px] rounded-2xl place-content-center relative search-item">
                        <a href="{{ route('show', [$item->ProductName, $item->Memory]) }}"
                            class="text-center text-white flex flex-col gap-7">
                            <div>
                                <img class="mx-auto " src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}"
                                    width="70%" alt="">
                            </div>
                            <div class="text-md">
                                {{ $item->ProductName . ' ' . $item->Memory }}
                            </div>
                            <div class="text-lg font-bold">
                                {{ number_format($item->UnitPrice) . '₫' }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function liveSearch() {
            var searchText = document.getElementById("search").value.toLowerCase();
            var items = document.getElementsByClassName("search-item");
            for (var i = 0; i < items.length; i++) {
                var item = items[i];
                var itemName = item.innerText.toLowerCase();
                if (itemName.includes(searchText)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            }
        }
    </script>
@endsection
