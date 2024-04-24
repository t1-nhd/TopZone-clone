@extends('admin.layout_admin.layout_admin')
@section('title', $title)
@section('content')
    <div class="sm:container mx-auto px-4">
        <div class="py-8">
            <div class="mb-5">
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
                    <div class="flex justify-between bg-gray-200 px-4 py-2">
                        <div class="font-bold">
                            Hình ảnh chi tiết
                        </div>
                        <div>
                            <a href="{{ route('product_images.edit', $productName) }}">Xong</a>
                        </div>
                    </div>
                    <div class="bg-white grid sm:grid-cols-3 lg:grid-cols-5 gap-4 px-4 py-5 sm:px-6">
                        @if ($productImages->count() == 0)
                            <div class="py-8 text-2xl font-medium text-gray-400 whitespace-nowrap">
                                Chưa có ảnh cho mục này
                            </div>
                        @endif
                        @foreach ($productImages as $item)
                            <div class="relative">
                                <div class="relative">
                                    <img src="{{ URL('images/Details/' . $productName . '/' . $item->ProductImage) }}"
                                        class="w-full lg:w-full sm:min-w-20" alt="">
                                </div>
                                <form action="{{ route('product_images.destroy', $item->ProductImageId) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div
                                        class="absolute top-1 right-1 bg-gray-500 text-white flex items-center justify-center w-7 h-7 rounded-full">
                                        <button type="submit">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script></script>
@endsection
