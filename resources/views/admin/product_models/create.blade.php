@extends('admin.layout_admin.layout_admin')
@section('title', 'Thêm dòng sản phẩm')

@section('content')
<div>
    <div class="relative overflow-x-auto m-10">
        <button type="button" class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
            <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
            </svg>
            <a href="javascript:window.history.back()">Go back</a>
        </button>
        <h1 class="w-full text-4xl text-center mb-3">THÊM DÒNG SẢN PHẨM</h1>
    </div>
    <form method="POST" action="{{ route('product_models.store') }}">
        @csrf
        <div class="w-1/3 ml-20">
            <div class="mt-3">
                <label for="product-type-id" class="block">Sản phẩm loại:</label>
                    <select name="ProductTypeId" id="product-type-id" class="px-3 w-full h-10 border border-black rounded-lg">
                        <option selected disabled>Chọn loại</option>
                        @foreach ($types as $type)
                            <option value="{{$type->ProductTypeId}}">{{$type->ProductTypeName}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="mt-3">
                <label for="product-model-name" class="block">Tên sản phẩm</label>
                <input type="text" id="product-model-name" name="ProductModelName" value="" required class="px-3 w-full h-10 border border-black rounded-lg">
            </div>
            <div class="absolute bottom-10">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-20">Thêm</button>
            </div>
    </form>
</div>
@endsection