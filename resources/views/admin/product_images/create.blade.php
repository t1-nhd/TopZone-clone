@extends('admin.layout_admin.layout_admin')
@section('title', $title)
@section('content')
<form action="{{ route('product_images.index') }}" method="post" enctype="multipart/form-data">
    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <label for="product-thumbnail" class="text-sm font-bold text-gray-500">
            Hình ảnh chi tiết sản phẩm
        </label>
        <input name="ProductImgae" type="file" id="product-image" multiple
            class="w-full file:mr-3 h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2 file:h-full file:border-none file:bg-blue-500 file:text-white hover:file:bg-blue-700" />
    </div>
    <button type="submit"
        class="bg-blue-500 m-3 hover:bg-blue-700 text-white font-bold h-9 rounded w-full sm:w-32 mr-1">Sử dụng ảnh</button>
    <button>
</form>