@extends('admin.layout_admin.layout_admin')
@section('title', $title)
@section('content')
    @php
        $productType = $product->getProductModelName->ProductTypeId;
    @endphp
    @if (@session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 transition-opacity duration-500"
            role="alert">
            <p class="font-bold">THÀNH CÔNG</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if (@session('fail'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 transition-opacity duration-500" role="alert">
            <p class="font-bold">THẤT BẠI</p>
            <p>{{ session('fail') }}</p>
        </div>
    @endif
    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="mb-5">
                <button type="button"
                    class="w-full flex items-center justify-center px-5 py-2 text-sm text-blue-500 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                    <a href="{{ route('products.index') }}">Trở về trang trước</a>
                </button>
            </div>
            <div class="block md:flex w-full justify-between">
                <h1 class="text-2xl font-semibold mb-4">{{ $product->ProductName }}</h1>
                <div class="flex justify-end">
                    <a href="{{ route('products.edit', $product->ProductId) }}" class="text-blue-500 mt-2 mr-3">Chỉnh sửa</a>
                    <a href="{{ route('products.delete', $product->ProductId) }}" class="text-red-500 mt-2">Xóa</a>
                </div>
            </div>
            <div class="block lg:flex w-full">
                <div class="w-full lg:w-1/2 bg-white shadow sm:rounded-lg ">
                    <div class="w-full bg-white shadow sm:rounded-t-lg mb-3">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Hình ảnh sản phẩm</h3>
                        </div>
                        <div class="border-b border-t border-gray-200"></div>
                    </div>
                    
                </div>
                <div class="w-full lg:w-1/2 bg-white shadow sm:rounded-lg ml-3">
                    <div class="w-full bg-white shadow sm:rounded-lg mb-3">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Thông tin sản phẩm</h3>
                        </div>
                        <div class="border-b border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Dòng sản phẩm</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                        {{ $product->getProductModelName->ProductModelName }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Tên sản phẩm</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->ProductName }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Đơn giá</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm    :col-span-2">
                                        {{ number_format($product->UnitPrice) . '₫' }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Kích thước và trọng lượng</dt>
                                    <dd class="mt-1 w-sm text-gray-900 sm:col-span-2">{{ $product->DesignSizeAndWeight }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Thời gian bảo hành</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Warranty }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Kho</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Inventory }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="w-full bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Thông số kỹ thuật</h3>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    Bộ nhớ & Lưu trữ
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Dung lượng bộ nhớ</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Memory }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">RAM</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Ram }}</dd>
                                </div>
                                <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    Màn hình
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Công nghệ màn hình</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->MonitorTechnology }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Độ phân giải</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Resolution }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Màn hình rộng</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                        {{ Str::replace('"', '', $product->MonitorSize) }}</dd>
                                </div>
                                <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    Camera
                                </div>
                                @if ($productType == 1 || $productType == 1)
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Camera sau</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraBack }}</dd>
                                    </div>
                                @endif
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    @if ($productType == 3)
                                        <dt class="text-sm font-bold text-gray-500">Webcam</dt>
                                    @else
                                        <dt class="text-sm font-bold text-gray-500">Camera Front</dt>
                                    @endif
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraFront }}</dd>
                                </div>
                                <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    Hệ điều hành & CPU
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Hệ điều hành</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Os }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">CPU</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Cpu }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Tốc độ CPU</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CpuSpeed }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">GPU</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Gpu }}</dd>
                                </div>
                                <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    Kết nối
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Kết nối không dây</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{!! str_replace('#', '<br>', $product->Wireless) !!}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Cổng sạc</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Port }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Jack</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Jack }}</dd>
                                </div>
                                <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    Pin & Sạc
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    @if ($productType == 1 || $productType == 2)
                                        <dt class="text-sm font-bold text-gray-500">Dung lượng Pin</dt>
                                    @else
                                        <dt class="text-sm font-bold text-gray-500">Thời lượng Pin</dt>
                                    @endif
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryCapacity }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Loại Pin</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryType }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Công nghệ Pin</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{!! str_replace('#', '<br>', $product->BatteryTechnology) !!}</dd>
                                </div>
                                <!-- Các dòng còn lại cũng tương tự -->
    
                            </dl>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
