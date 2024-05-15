@extends('admin.layout_admin.layout_admin')
@section('title', 'Sản phẩm')

@section('content')
    <div class="container py-8 mx-auto">
        <h3 class="text-3xl font-medium text-gray-700">THƯ VIỆN ẢNH</h3>
        <div class="flex items-center py-7">
            <hr class="flex-grow border-t border-gray-300">
            <span class="px-3 text-gray-500 font-bold text-xl">
                Ảnh sản phẩm
            </span>
            <hr class="flex-grow border-t border-gray-300">
        </div>
        <div class="w-full grid grid-cols-4 gap-5">
            @foreach ($data as $item)
                @php
                    $count = App\Models\ProductImage::where('ProductName', $item->ProductName)->count();
                @endphp
                <div class="w-full">
                    <a href="{{ route('product_images.edit', $item->ProductName) }}">
                        <div class="flex items-center px-5 bg-white rounded-md shadow-md">
                            <div
                                class="p-3 bg-black bg-opacity-75 flex items-center justify-center w-10 h-10 rounded-full my-4">
                                <h4 class="text-2xl font-semibold text-white">{{ $count }}</h4>
                            </div>
                            <div class="mx-5 h-24 flex items-center">
                                <div class="text-gray-500 overflow-hidden"><b>{{ $item->ProductName }}</b></div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
