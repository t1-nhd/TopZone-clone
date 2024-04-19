@extends('admin.layout_admin.layout_admin')
@section('title', $title)
@section('content')
    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="mb-5">
                <button type="button"
                    class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                    <a href="javascript:window.history.back()">Hủy</a>
                </button>
            </div>
            <div class="flex w-full justify-between">
                <h1 class="text-2xl font-semibold mb-4">{{ $model->ProductModelName }}</h1>
            </div>
            <form action="{{ route('product_models.update', $model->ProductModelId) }}" method="post">
                @csrf
                @method('PUT')
                <div class="lg:flex block w-full">
                    <div class="w-full lg:w-1/2 bg-white shadow overflow-hidden sm:rounded-lg ">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Chỉnh sửa thông tin dòng sản phẩm</h3>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <label for="" class="text-sm font-bold text-gray-500">Tên loại sản phẩm</label>
                                    <select name="ProductTypeId" id="product-model-name"
                                        class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                        @foreach ($types as $type)
                                            @if ($type->ProductTypeId == $model->ProductTypeId)
                                                <option value="{{ $type->ProductTypeId }}" selected>
                                                    {{ $type->ProductTypeName }}</option>
                                            @else
                                                <option value="{{ $type->ProductTypeId }}">
                                                    {{ $type->ProductTypeName }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <label for="ProductModelName" class="text-sm font-bold text-gray-500">Tên sản phẩm</label>
                                    <input name="ProductModelName" type="text"
                                        class="mb-1 w-full border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                        value="{{ $model->ProductModelName }}" />
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="mt-3 pb-3 block sm:flex justify-center lg:justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-full sm:w-32 mr-1">Cập nhật</button>
                    <button class="bg-orange-600 hover:bg-orange-700 text-white font-bold h-9 rounded w-full mt-3 sm:mt-0 sm:w-20 sm:ml-1">
                        <a href="{{route('products.index')}}">
                            Hủy
                        </a>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
