@extends('admin.layout_admin.layout_admin')
@section('title', 'Xóa sản phẩm')
@section('content')
    @php
        $productType = $product->getProductModelName->ProductTypeId;
    @endphp

    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="w-full">
                <div class="w-fit mx-auto bg-white shadow overflow-hidden sm:rounded-lg ">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg text-center font-semibold leading-6 text-red-600">BẠN CHẮC CHẮN MUỐN XÓA SẢN PHẨM
                            NÀY?</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-bold text-gray-500">Dòng sản phẩm</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                    {{ $product->getProductModelName->ProductModelName }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-bold text-gray-500">Tên sản phẩm</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->ProductName }}</dd>
                            </div>

                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-bold text-gray-500">Dung lượng bộ nhớ</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Memory }}</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-bold text-gray-500">RAM</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Ram }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-bold text-gray-500">Đơn giá</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                    {{ number_format($product->UnitPrice) . '₫' }}</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-bold text-gray-500">Kích thước và trọng lượng</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->DesignSizeAndWeight }}
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-bold text-gray-500">Thời gian bảo hành</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Warrenty }}</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-bold text-gray-500">Kho</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Inventory }}</dd>
                            </div>
                        </dl>
                    </div>
                    <hr>
                    <div class="flex my-3 justify-center">
                        <form action="{{ route('products.destroy', $product->ProductId) }}" method="post"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold h-9 rounded w-20" value="Xóa"/>
                        </form>
                        <button type="button" class="mx-2 bg-amber-400 hover:bg-amber-500 text-white font-bold h-9 rounded w-20">
                            <a href="javascript:window.history.back()">Hủy</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
