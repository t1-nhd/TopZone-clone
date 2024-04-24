@extends('admin.layout_admin.layout_admin')
@section('title', $title)
@section('content')
    <div class="sm:container mx-auto px-4">
        <div class="py-8">
            <div class="mb-5 invisible sm:visible">
                <button type="button"
                    class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                    <a href="{{ route('product_images.index') }}">Trở về</a>
                </button>
            </div>
            <div class="flex w-full justify-center sm:justify-between">
                <h1 class="text-2xl font-semibold mb-4">{{ $productName }}</h1>
            </div>
            @if (@session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 transition-opacity duration-500"
                    role="alert">
                    <p class="font-bold">THÀNH CÔNG</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if (@session('fail'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 transition-opacity duration-500"
                    role="alert">
                    <p class="font-bold">THẤT BẠI</p>
                    <p>{{ session('fail') }}</p>
                </div>
            @endif
            <div class="block w-full">
                <div class="w-full bg-white shadow overflow-hidden sm:rounded-lg ">
                    <div class="w-full bg-white shadow sm:rounded-lg mb-3">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Hình ảnh sản phẩm</h3>
                        </div>
                    </div>
                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        Thêm ảnh
                    </div>
                    <form action="{{ route('product_images.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-4">
                            <div class="block sm:flex">
                                <input type="hidden" name="ProductName" value="{{ $productName }}">
                                <input name="ProductImage[]" type="file" multiple id="product-image" required
                                    class="form-control w-full file:pr-3 file:mr-3 h-10 mb-1 border border-black rounded-lg sm:rounded-e-none text-sm text-gray-900 sm:col-span-2 file:h-full file:border-none file:bg-blue-500 file:text-white hover:file:bg-blue-700" />
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-full sm:w-32 h-10 px-3 rounded-lg sm:rounded-s-none">Thêm</button>
                            </div>
                        </div>
                    </form>
                    <div class="flex justify-between bg-gray-200 px-4 py-2">
                        <div class="font-bold">
                            Hình ảnh chi tiết
                        </div>
                        @if ($productImages->count() != 0)
                            <div>
                                <a href="{{ route('product_images.delete', $productName) }}"
                                    class="text-red-500 hover:text-red-600">Xóa ảnh</a>
                            </div>
                        @endif

                    </div>
                    <div class="your-class bg-white grid sm:grid-cols-3 lg:grid-cols-5 gap-4 px-4 py-5 sm:px-6">
                        @if ($productImages->count() == 0)
                            <div class="py-8 text-2xl font-medium text-gray-400 whitespace-nowrap">
                                Chưa có ảnh cho mục này
                            </div>
                        @endif
                        @foreach ($productImages as $item)
                            <div>
                                <img src="{{ URL('images/Details/' . $productName . '/' . $item->ProductImage) }}"
                                    class="w-full lg:w-full sm:min-w-20" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script></script>
@endsection
