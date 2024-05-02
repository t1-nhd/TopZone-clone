@extends('admin.layout_admin.layout_admin')
@section('title', $title)
@section('content')
    @php
        $productType = $product->getProductModelName->ProductTypeId;
    @endphp

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
                <h1 class="text-2xl font-semibold mb-4">{{ $product->ProductName }}</h1>
            </div>
            <form action="{{ route('products.update', $product->ProductId) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="lg:flex block w-full">
                    <div class="w-full lg:w-1/2 bg-white shadow overflow-hidden sm:rounded-lg ">
                        <div class="w-full bg-white shadow sm:rounded-lg mb-3">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg font-semibold leading-6 text-gray-900">Chỉnh sửa hình ảnh sản phẩm</h3>
                            </div>
                            <div class="border-t bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <label for="product-thumbnail" class="text-sm font-bold text-gray-500">Thumbnail sản
                                    phẩm</label>
                                <input name="ProductThumbnail" type="file" id="product-thumbnail"
                                    class="w-full file:pr-3 file:mr-3 h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2 file:h-full file:border-none file:bg-blue-500 file:text-white hover:file:bg-blue-700" />
                                <img src="" alt="">
                            </div>
                            
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 bg-white shadow sm:rounded-lg lg:ml-3">
                        <div class="w-full bg-white shadow sm:rounded-lg mb-3">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg font-semibold leading-6 text-gray-900">Chỉnh sửa thông tin sản phẩm</h3>
                            </div>
                            <div class="border-t border-gray-200">
                                <dl>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="" class="text-sm font-bold text-gray-500">Dòng sản phẩm</label>
                                        <select name="ProductModelName" id="product-model-name" disabled
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                            @foreach ($models as $model)
                                                @if ($product->getProductModelName->ProductModelName == $model->ProductModelName)
                                                    <option value="{{ $model->ProductModelId }}" selected>
                                                        {{ $model->ProductModelName }}</option>
                                                @else
                                                    <option value="{{ $model->ProductModelId }}">
                                                        {{ $model->ProductModelName }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ProductName" class="text-sm font-bold text-gray-500">Tên sản
                                            phẩm</label>
                                        <input name="ProductName" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->ProductName }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="UnitPrice" class="text-sm font-bold text-gray-500">Đơn giá</label>
                                        <input name="UnitPrice" type="number"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->UnitPrice }}" />
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="DesignSizeAndWeight" class="text-sm font-bold text-gray-500">Kích thước
                                            và trọng lượng</label>
                                        <textarea type="text" rows="3" name="DesignSizeAndWeight"
                                            class="px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">{{ $product->DesignSizeAndWeight }}</textarea>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="warranty" class="text-sm font-bold text-gray-500">Thời gian bảo
                                            hành</label>
                                        <select name="Warranty" id="warranty"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                            @foreach ($warrantyList as $item)
                                                @if ($product->Warrenty == $item)
                                                    <option value="{{ $item }}" selected>{{ $item }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Inventory" class="text-sm font-bold text-gray-500">Kho</label>
                                        <input name="Inventory" type="number"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->Inventory }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="is-new" class="text-sm font-bold text-gray-500">Mới ra mắt?</label>
                                        <select name="isNew" id="is-new"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                            <option {{$product->isNew == 1?'Selected':''}} value=1>Đúng</option>
                                            <option {{$product->isNew == 0?'Selected':''}} value=2>Sai</option>
                                        </select>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow sm:rounded-lg mb-3">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg font-semibold leading-6 text-gray-900">Chỉnh sửa thông số kỹ thuật</h3>
                            </div>
                            <div class="border-t border-gray-200">
                                <dl>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Bộ nhớ & Lưu trữ
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Memory" class="text-sm font-bold text-gray-500">Dung lượng bộ
                                            nhớ</label>
                                        <select name="Memory" id="memory"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            disabled>
                                            @foreach ($memoryList as $item)
                                                @if ($product->Memory == $item)
                                                    <option value="{{ $item }}" selected>{{ $item }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Ram" class="text-sm font-bold text-gray-500">RAM</label>
                                        <select name="Ram" id="ram"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                            @foreach ($ramList as $item)
                                                @if ($product->Ram == $item)
                                                    <option value="{{ $item }}" selected>{{ $item }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Màn hình
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MonitorTechnology" class="text-sm font-bold text-gray-500">Công nghệ
                                            màn
                                            hình</label>
                                        <input name="MonitorTechnology" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->MonitorTechnology }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Resolution" class="text-sm font-bold text-gray-500">Độ phân
                                            giải</label>
                                        <input name="Resolution" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->Resolution }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MonitorSize" class="text-sm font-bold text-gray-500">Màn hình
                                            rộng</label>
                                        <input name="MonitorSize" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ Str::replace('"', '', $product->MonitorSize) }}" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Camera
                                    </div>
                                    @if ($productType == 1 || $productType == 2)
                                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="CameraBack" class="text-sm font-bold text-gray-500">Camera
                                                sau</label>
                                            <input name="CameraBack" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                                value="{{ $product->CameraBack }}" />
                                        </div>
                                    @endif
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        @if ($productType == 3)
                                            <label for="CameraFront"
                                                class="text-sm font-bold text-gray-500">Webcam</label>
                                        @else
                                            <label for="CameraFront" class="text-sm font-bold text-gray-500">Camera
                                                Front</label>
                                        @endif
                                        <input name="CameraFront" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->CameraFront }}" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Hệ điều hành & CPU
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Os" class="text-sm font-bold text-gray-500">Hệ điều hành</label>
                                        <input name="Os" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->Os }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Cpu" class="text-sm font-bold text-gray-500">CPU</label>
                                        <input name="Cpu" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->Cpu }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="CpuSpeed" class="text-sm font-bold text-gray-500">Tốc độ CPU</label>
                                        <input name="CpuSpeed" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->CpuSpeed }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Gpu" class="text-sm font-bold text-gray-500">GPU</label>
                                        <input name="Gpu" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->Gpu }}" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Kết nối
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Wireless" class="text-sm font-bold text-gray-500">Kết nối không
                                            dây</label>
                                        <textarea name="Wireless" rows="3"
                                            class="px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">{{ $product->Wireless }}</textarea>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Port" class="text-sm font-bold text-gray-500">Cổng sạc</label>
                                        <input name="Port" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->Port }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Jack" class="text-sm font-bold text-gray-500">Jack</label>
                                        <input name="Jack" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->Jack }}" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Pin & Sạc
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        @if ($productType == 1 || $productType == 2)
                                            <label for="BatteryCapacity" class="text-sm font-bold text-gray-500">Dung
                                                lượng
                                                Pin</label>
                                        @else
                                            <label for="BatteryCapacity" class="text-sm font-bold text-gray-500">Thời
                                                lượng
                                                Pin</label>
                                        @endif
                                        <input name="BatteryCapacity" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->BatteryCapacity }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="BatteryType" class="text-sm font-bold text-gray-500">Loại Pin</label>
                                        <input name="BatteryType" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->BatteryType }}" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="BatteryTechnology" class="text-sm font-bold text-gray-500">Công nghệ
                                            Pin</label>
                                        <textarea name="BatteryTechnology" rows="3"
                                            class="px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryTechnology }}</textarea>
                                    </div>

                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="z-10 sticky bottom-0 w-full bg-white pt-3 pb-3 block sm:flex justify-center lg:justify-end">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-full sm:w-32 mr-1">Cập
                        nhật</button>
                    <button
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold h-9 rounded w-full mt-3 sm:mt-0 sm:w-20 sm:ml-1">
                        <a href="{{ route('products.index') }}">
                            Hủy
                        </a>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('ram').addEventListener('change', function() {
            var ramSelection = document.getElementById('ram');
            console.log(ramSelection.value);
        });
    </script>
@endsection
