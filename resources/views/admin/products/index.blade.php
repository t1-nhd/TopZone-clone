@extends('admin.layout_admin.layout_admin')
@section('title', 'Sản phẩm')
@section('content')

<div class="overflow-x-auto m-10">
    <div class="mb-3">
        <h1 class="w-full text-4xl text-center mb-3">SẢN PHẨM</h1>
        <div class="block sm:flex justify-between">
            <div class="sm:w-1/3 px-3">
                @if (Auth::user()->account_type == 2)
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded text-nowrap px-3">
                    <a href="{{ route('products.create') }}">Thêm sản phẩm</a>
                </button>
                @endif
                {{-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded px-3">
                        <a href="{{ route('products.show-import') }}">Nhập kho</a>
                </button> --}}
            </div>
            <div class="w-full sm:w-1/3 px-3 sm:pt-0 pt-1">
                <form action="{{ route('products.index') }}" method="get">
                    <div class="relative w-full">
                        <input name="search" type="search" id="search-box"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Nhập tên sản phẩm" value="{{ $selected['search'] }}" />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    @if (@session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 transition-opacity duration-500"
        role="alert">
        <p class="font-bold">THÀNH CÔNG</p>
        <p>{{ session('success') }}</p>
    </div>
    @endif
    @if ($errors->any())
    <div class="bg-red-100 border-l-4 border-amber-500 text-amber-700 p-4 transition-opacity duration-500"
        role="alert">
        <p class="font-bold">CHÚ Ý</p>
        @foreach ($errors->all() as $error)
        <p class="">{{ $error }}</p>
        @endforeach
    </div>
    @endif
    <form action="{{ route('products.index') }}" method="get" class="my-5">
        <div class="w-full block sm:flex justify-end px-3">
            @if ($isFilter)
            <a href="{{ route('products.index') }}"
                class="flex justify-center items-center mt-1 h-6 px-3 rounded-full bg-gray-300 mr-1"><i
                    class="fa-solid fa-xmark mr-1 mt-1"></i>Bỏ lọc</a>
            @endif
            <div class="mr-1 mb-1">
                <select name="FilterDisplay" id="filter-display" class="px-3 w-full h-8 border-0">
                    <option selected disabled hidden>Trạng thái</option>
                    <option value="" class="text-gray-400">Tất cả</option>
                    <option value="1" {{ $isShowOnHomePage == 1 ? 'seleted' : '' }}>Hiển thị</option>
                    <option value="0" {{ $isShowOnHomePage == 0 ? 'seleted' : '' }}>Ẩn</option>
                </select>
            </div>
            <div class="mr-1 mb-1">
                <select name="FilterProductModel" id="filter-model" class="px-3 w-full h-8 border-0">
                    <option selected disabled hidden>Dòng sản phẩm</option>
                    <option value="" class="text-gray-400">Tất cả</option>
                    @foreach ($models as $model)
                    @if ($selected['model'] == $model->ProductModelId)
                    <option value="{{ $model->ProductModelId }}" selected>
                        {{ $model->ProductModelName }}
                    </option>
                    @else
                    <option value="{{ $model->ProductModelId }}">
                        {{ $model->ProductModelName }}
                    </option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mr-1 mb-1">
                <select name="FilterRam" id="filter-ram" class="px-3 w-full h-8 border-0">
                    <option selected disabled hidden>Ram</option>
                    <option value="" class="text-gray-400">Tất cả</option>
                    @foreach ($ramList as $item)
                    @if ($selected['ram'] == $item)
                    <option value="{{ $item }}" selected>{{ $item }}
                    </option>
                    @else
                    <option value="{{ $item }}">{{ $item }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mr-1 mb-1">
                <select name="FilterMemory" id="filter-memory" class="px-3 w-full h-8 border-0">
                    <option selected disabled hidden>Dung lượng</option>
                    <option value="" class="text-gray-400">Tất cả</option>
                    @foreach ($memoryList as $item)
                    @if ($selected['memory'] == $item)
                    <option value="{{ $item }}" selected>{{ $item }}
                    </option>
                    @else
                    <option value="{{ $item }}">{{ $item }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mr-1 mb-1 sm:mr-3">
                <select name="SortUnitPrice" id="filter-unit-price" class="px-3 w-full h-8 border-0">
                    <option selected disabled hidden>Đơn giá</option>
                    <option value="" class="text-gray-400">Tất cả</option>
                    <option value="desc" {{ $selected['unit-price' ?? ''] == 'desc' ? 'selected' : '' }}>↓ Giảm dần
                    </option>
                    <option value="asc" {{ $selected['unit-price' ?? ''] == 'asc' ? 'selected' : '' }}>↑ Tăng dần
                    </option>

                </select>
            </div>
            <div class="">
                <button
                    class="px-3 w-full h-8 border text-white bg-blue-700 border-blue-700 rounded-lg hover:bg-blue-800">
                    Lọc sản phẩm
                </button>
            </div>
        </div>
    </form>
    <hr>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 w-3/12">
                </th>
                <th scope="col" class="py-3 text-center w-3/12">
                    Tên sản phẩm
                </th>
                <th scope="col" class="py-3 hidden xl:table-cell text-center w-1/12">
                    Ram
                </th>
                <th scope="col" class="py-3 hidden sm:table-cell text-center w-1/12 text-nowrap">
                    Dung lượng
                </th>
                <th scope="col" class="py-3 hidden lg:table-cell text-center w-1/12">
                    Đơn giá
                </th>
                <th scope="col" class="py-3 hidden lg:table-cell text-center w-1/12">
                    Trong kho
                </th>
                <th scope="col" class="py-3 text-center w-2/12">

                </th>
            </tr>
        </thead>
        <tbody>
            @if ($data->count() == 0)
            <tr>
                <td colspan="7" class="py-8 text-2xl font-medium text-gray-400 whitespace-nowrap text-center">
                    không có sản phẩm nào phù hợp
                </td>
            </tr>
            @endif
            @foreach ($data as $dt)
            <tr class="bg-white border-b">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                    <img src="{{ URL('images/Thumbnails/' . $dt->ProductThumbnail) }}"
                        class="w-20 lg:w-1/2 sm:min-w-20" alt="">
                </th>
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $dt->ProductName . ' ' . $dt->Memory }}
                </th>
                <td class="py-4 text-center hidden xl:table-cell">
                    {{ $dt->Ram }}
                </td>
                <td class="py-4 text-center hidden lg:table-cell">
                    {{ $dt->Memory }}
                </td>
                <td class="py-4 text-center hidden sm:table-cell">
                    {{ number_format($dt->UnitPrice) . '₫' }}
                </td>
                <td class="py-4 text-center hidden sm:table-cell">
                    {{ $dt->Inventory }}
                </td>
                <td class="text-center">
                    <button>
                        <a href="{{ route('products.show', $dt->ProductId) }}">
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 96 96"
                                xmlns="http://www.w3.org/2000/svg">
                                <title />
                                <g>
                                    <path d="M18,24H78a6,6,0,0,0,0-12H18a6,6,0,0,0,0,12Z" />
                                    <path d="M78,42H18a6,6,0,0,0,0,12H78a6,6,0,0,0,0-12Z" />
                                    <path d="M78,72H18a6,6,0,0,0,0,12H78a6,6,0,0,0,0-12Z" />
                                </g>
                            </svg>
                        </a>
                    </button>
                    @if (Auth::user()->account_type == 2)
                    <button>
                        <a href="{{ route('products.edit', $dt->ProductId) }}" class="w-1">
                            <svg width="20px" height="20px" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title />
                                <g id="Complete">
                                    <g id="edit">
                                        <g>
                                            <path d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8"
                                                fill="none" stroke="#000000" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" />
                                            <polygon fill="none"
                                                points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8"
                                                stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </button>
                    <button>
                        <a href="{{ route('products.delete', $dt->ProductId) }}" class="w-1">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M14 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{-- <div class="mt-2 px-2 text-center">
        </div> --}}
</div>
<script>
    var ram = document.getElementById("filter-ram").value;
    var memory = document.getElementById("filter-memory").value;
    var unit_price = document.getElementById("filter-unit-price").value;
</script>
@endsection