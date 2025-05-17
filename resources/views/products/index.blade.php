@extends('layout.layout_product_show')
@section('title', $title)
@section('content')
    <div class="w-full pb-20">
        <div class="text-center py-20 md:pt-20">
            <a href="{{ route('list', $title) }}" class="text-white text-5xl"><i class="fa-brands fa-apple"></i>
                {{ $title }}</a>
        </div>
        <div class="flex justify-end mt-2 px-10 md:pr-10 mb-2">
            <input type="text" name="search" id="search"
                class="h-12 rounded-lg w-full lg:w-1/4 p-4 border-gray-600 bg-[#333] text-white focus:bg-white focus:text-black focus:border-gray-900"
                placeholder="Tìm kiếm sản phẩm" onkeyup="liveSearch()">
        </div>
        <div class="flex">
            <div class="px-10 text-gray-300 text-md">
                <a href="" class="mx-1 md:mx-5 text-white pb-3 border-b">
                    Tất cả
                </a>
                @foreach ($models as $model)
                    <a href="{{ route('filter', $model->ProductModelName) }}"
                        class="mx-1 md:mx-5 hover:text-white hover:transition-all delay-100 pb-3 hover:border-b">
                        {{ $model->ProductModelName }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex justify-center">
            <div class="py-10 px-10 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-2 xl:gap-5 place-items-center">
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
    <!-- Modal -->
    <div id="loadingModal" class="fixed w-full h-full inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="p-6 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg text-center">
            <div class="animate-spin rounded-full h-10 w-10 border-t-2 border-gray-500 mx-auto"></div>
        </div>
    </div>

    <script>
        function liveSearch() {
            var searchText = document.getElementById("search").value.toLowerCase();
            var items = document.getElementsByClassName("search-item");
            var loading = document.getElementById("loadingModal");

            loading.style.display = "block";


            setTimeout(()=>{
                for (var i = 0; i < items.length; i++) {
                    var item = items[i];
                    var itemName = item.innerText.toLowerCase();
                    if (itemName.includes(searchText)) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                }
                loading.style.display = "none";
            }, 1000)
        }
    </script>
@endsection
