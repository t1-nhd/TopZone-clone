@extends('admin.layout_admin.layout_admin')
@section('title', 'Nhập sản phẩm')
@section('content')

    <div class="overflow-x-auto m-10">
        <div class="mb-3">
            <h1 class="w-full text-4xl text-center mb-3">NHẬP SẢN PHẨM</h1>
            <div class="block sm:flex justify-between">
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
                    <select name="FilterProductModel" id="filter-model" class="px-3 w-full h-8 border-0">
                        <option selected disabled hidden>Dòng sản phẩm</option>
                        <option value=""></option>
                        @foreach ($models as $model)
                            @if ($selected == $model->ProductModelId)
                                <option value="{{ $model->ProductModelId }}" selected>
                                    {{ $model->ProductModelName }}</option>
                            @else
                                <option value="{{ $model->ProductModelId }}">
                                    {{ $model->ProductModelName }}</option>
                            @endif
                        @endforeach
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
                    <th scope="col" class="py-3 text-center w-1/12">
                        Trong kho
                    </th>
                    <th scope="col" class="py-3 text-center w-5/12">

                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($data->count() == 0)
                    <th scope="row" colspan="6"
                        class="py-8 text-2xl font-medium text-gray-400 whitespace-nowrap text-center">
                        không có sản phẩm nào phù hợp
                    </th>
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
                        <td class="py-4 text-center">
                            {{ $dt->Inventory }}
                        </td>
                        <td class="py-4 text-center">
                            <form action="" method="post">
                                <input type="hidden" name="ProductId" value="{{$dt->ProductId}}">
                                <input type="number" name="InventoryImport">
                                <button></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- <div class="mt-2 px-2 text-center">
        </div> --}}
    </div>
@endsection
