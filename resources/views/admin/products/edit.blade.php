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
                    <a href="{{route('products.show', $product->ProductId)}}">Hủy</a>
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
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ProductName" class="text-sm font-bold text-gray-500">Tên sản
                                            phẩm</label>
                                        <input name="ProductName" type="text" id="product-name"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"
                                            value="{{ $product->ProductName }}" />
                                    </div>
                                    <div class=" bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="UnitPrice" class="text-sm font-bold text-gray-500">Đơn giá</label>
                                        <div class="w-full sm:col-span-2 relative">
                                            <input name="UnitPrice" type="number" required
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900"
                                                value="{{ $product->UnitPrice }}" />
                                            <div class="absolute inset-y-0 end-10 flex items-center pointer-events-none">
                                                VNĐ
                                            </div>
                                        </div>

                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="DesignSizeAndWeight" class="text-sm font-bold text-gray-500">Kích thước
                                            và trọng lượng</label>
                                        <textarea type="text" rows="3" name="DesignSizeAndWeight"
                                            class="px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">{{ $product->DesignSizeAndWeight }}</textarea>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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
                                        <input name="Inventory" type="number" readonly
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2 read-only:text-gray-400"
                                            value="{{ $product->Inventory }}" />
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="is-new" class="text-sm font-bold text-gray-500">Mới ra mắt?</label>
                                        <select name="isNew" id="is-new"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                            <option {{ $product->isNew == 1 ? 'selected' : '' }} value=1>Đúng</option>
                                            <option {{ $product->isNew == 0 ? 'selected' : '' }} value=0>Sai</option>
                                        </select>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ShowOnHomePage" class="text-sm font-bold text-gray-500">Hiện lên trang
                                            chủ?</label>
                                        <select name="ShowOnHomePage" id="ShowOnHomePage"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                            <option {{ $product->ShowOnHomePage == 1 ? 'selected' : '' }} value=1>Hiện</option>
                                            <option {{ $product->ShowOnHomePage == 0 ? 'selected' : '' }} value=0>Không hiện
                                            </option>
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
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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
                                    <div style="display: none;"
                                        class="mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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
                                    <div style="display:none;"
                                        class="mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MaximumRamUpgraded" class="text-sm font-bold text-gray-500">Dung lượng
                                            RAM tối đa có thể nâng cấp</label>
                                        <input value="{{$product->MaximumRamUpgraded}}" name="MaximumRamUpgraded" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-gray-200 px-4 font-bold py-2 w-full">
                                        Màn hình
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MonitorTechnology" class="text-sm font-bold text-gray-500">Công nghệ
                                            màn
                                            hình</label>
                                        <input value="{{$product->MonitorTechnology}}" name="MonitorTechnology" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Resolution" class="text-sm font-bold text-gray-500">Độ phân
                                            giải</label>
                                        <input value="{{$product->Resolution}}" name="Resolution" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MonitorSize" class="text-sm font-bold text-gray-500">Màn hình
                                            rộng</label>
                                        <input value="{{$product->MonitorSize}}" name="MonitorSize" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac bg-gray-200 px-4 font-bold py-2 w-full">
                                        Camera
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="CameraBack" class="text-sm font-bold text-gray-500">Camera
                                            sau</label>
                                        <input value="{{$product->CameraBack}}" name="CameraBack" type="text" id='camera-back'
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="CameraFront" class="text-sm font-bold text-gray-500"
                                            id="label-camera-front">Camera
                                            trước</label>
                                        <input value="{{$product->CameraFront}}" name="CameraFront" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-gray-200 px-4 font-bold py-2 w-full">
                                        Hệ điều hành & CPU
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Os" class="text-sm font-bold text-gray-500">Hệ điều hành</label>
                                        <input value="{{$product->Os}}" name="Os" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Cpu" class="text-sm font-bold text-gray-500">CPU</label>
                                        <input value="{{$product->Cpu}}" name="Cpu" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="CpuSpeed" class="text-sm font-bold text-gray-500">Tốc độ CPU</label>
                                        <input value="{{$product->CpuSpeed}}" name="CpuSpeed" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Gpu" class="text-sm font-bold text-gray-500">GPU</label>
                                        <input value="{{$product->Gpu}}" name="Gpu" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="NumberOfCore" class="text-sm font-bold text-gray-500">Số lõi
                                            CPU</label>
                                        <input value="{{$product->NumberOfCore}}" name="NumberOfCore" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="NumberOfThread" class="text-sm font-bold text-gray-500">Số luồng
                                            CPU</label>
                                        <input value="{{$product->NumberOfThread}}" name="NumberOfThread" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MaximumCpuSpeed" class="text-sm font-bold text-gray-500">Tốc độ CPU
                                            tối đa</label>
                                        <input value="{{$product->MaximumCpuSpeed}}" name="MaximumCpuSpeed" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-gray-200 px-4 font-bold py-2 w-full">
                                        Kết nối
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Cellular" class="text-sm font-bold text-gray-500">Mạng di động</label>
                                        <input value="{{$product->Cellular}}" name="Cellular" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Sim" class="text-sm font-bold text-gray-500">SIM</label>
                                        <input value="{{$product->Sim}}" name="Sim" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Wireless" class="text-sm font-bold text-gray-500">Kết nối không
                                            dây</label>
                                        <textarea name="Wireless" rows="3"
                                            class="py-1 px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">{{$product->Wireless}}</textarea>
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Port" class="text-sm font-bold text-gray-500">Cổng kết nối / sạc</label>
                                        <input value="{{$product->Port}}" name="Port" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Jack" class="text-sm font-bold text-gray-500">Jack</label>
                                        <input value="{{$product->Jack}}" name="Jack" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-gray-200 px-4 font-bold py-2 w-full">
                                        Pin & Sạc
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad mac watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="BatteryCapacity" class="text-sm font-bold text-gray-500">Dung
                                            lượng
                                            Pin</label>
                                        <input value="{{$product->BatteryCapacity}}" name="BatteryCapacity" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ChargingTime" class="text-sm font-bold text-gray-500">Thời gian
                                            sạc</label>
                                        <input value="{{$product->ChargingTime}}" name="ChargingTime" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="BatteryType" class="text-sm font-bold text-gray-500">Loại Pin</label>
                                        <input value="{{$product->BatteryType}}" name="BatteryType" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="iphone ipad bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="BatteryTechnology" class="text-sm font-bold text-gray-500">Công nghệ
                                            Pin</label>
                                        <textarea name="BatteryTechnology" rows="3"
                                            class="py-1 px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">{{$product->BatteryTechnology}}</textarea>
                                    </div>
                                    <div style="display:none;"
                                        class="ipad mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MaximumChargable" class="text-sm font-bold text-gray-500">Hỗ trợ sạc
                                            tối đa</label>
                                        <input value="{{$product->MaximumChargable}}" name="MaximumChargable" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div style="display:none;"
                                        class="ipad mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ChargerIncluded" class="text-sm font-bold text-gray-500">Bộ sạc đi
                                            kèm</label>
                                        <input value="{{$product->ChargerIncluded}}" name="ChargerIncluded" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div style="display:none;"
                                        class="mac bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MaximumChargable" class="text-sm font-bold text-gray-500">Hỗ trợ sạc
                                            tối đa</label>
                                        <input value="{{$product->MaximumChargable}}" name="MaximumChargable" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div>
                                        <div style="display:none;"
                                            class="watch bg-gray-200 px-4 font-bold py-2 w-full">
                                            Thiết kế
                                        </div>
                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="MonitorMaterials" class="text-sm font-bold text-gray-500">Chất
                                                liệu
                                                mặt</label>
                                            <input value="{{$product->MonitorMaterials}}" name="MonitorMaterials" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>

                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="BorderMaterials" class="text-sm font-bold text-gray-500">Chất liệu
                                                khung viền</label>
                                            <input value="{{$product->BorderMaterials}}" name="BorderMaterials" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>

                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="StrapMaterials" class="text-sm font-bold text-gray-500">Chất liệu
                                                dây
                                                đeo</label>
                                            <input value="{{$product->StrapMaterials}}" name="StrapMaterials" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>

                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="StrapWidth" class="text-sm font-bold text-gray-500">Chiều rộng dây
                                                đeo</label>
                                            <input value="{{$product->StrapWidth}}" name="StrapWidth" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>
                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="StrapHeight" class="text-sm font-bold text-gray-500">Chiều cao dây
                                                đeo</label>
                                            <input value="{{$product->StrapHeight}}" name="StrapHeight" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>

                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="StrapReplaceable" class="text-sm font-bold text-gray-500">Có thể
                                                thay
                                                thế dây đeo</label>
                                            <select name="StrapReplaceable" id="strap-replaceable"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                                <option value=1 {{$product->StrapReplaceable==1?"selected":""}}>Có thể</option>
                                                <option value=0 {{$product->StrapReplaceable==0?"selected":""}}>Không thể</option>
                                            </select>
                                        </div>
                                        <div style="display:none;"
                                            class="ipad mac watch bg-gray-200 px-4 font-bold py-2 w-full">
                                            Tiện ích
                                        </div>
                                        <div style="display:none;"
                                            class="ipad mac watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="SpecialFeature" class="text-sm font-bold text-gray-500"
                                                id="label-special-feature">Tính năng đặc
                                                biệt</label>
                                            <textarea name="SpecialFeature" id="" rows="3"
                                                class="py-1 px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">{{$product->SpecialFeature}}</textarea>
                                        </div>
                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="SportSupport" class="text-sm font-bold text-gray-500">Hỗ trợ môn
                                                thể
                                                thao</label>
                                            <input value="{{$product->SportSupport}}" name="SportSupport" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>
                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="CallingSupport" class="text-sm font-bold text-gray-500">Hỗ trợ
                                                nghe
                                                gọi</label>
                                            <input value="{{$product->CallingSupport}}" name="CallingSupport" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>
                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="WaterResistant" class="text-sm font-bold text-gray-500">Chống
                                                nước</label>
                                            <input value="{{$product->WaterResistant}}" name="WaterResistant" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>

                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="Healthcare" class="text-sm font-bold text-gray-500">Chăm sóc sức
                                                khỏe</label>
                                            <input value="{{$product->Healthcare}}" name="Healthcare" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>

                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="DisplayNotification" class="text-sm font-bold text-gray-500">Hiển
                                                thị
                                                thông báo</label>
                                            <input value="{{$product->DisplayNotification}}" name="DisplayNotification" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>
                                        <div style="display:none;"
                                            class="watch bg-gray-200 px-4 font-bold py-2 w-full">
                                            Cấu hình & Kết nối
                                        </div>
                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="OsConnectable" class="text-sm font-bold text-gray-500">Kết nối hệ
                                                điều
                                                hành</label>
                                            <input value="{{$product->OsConnectable}}" name="OsConnectable" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>

                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="ManagermentApplication"
                                                class="text-sm font-bold text-gray-500">Ứng
                                                dụng quản lý</label>
                                            <input value="{{$product->ManagermentApplication}}" name="ManagermentApplication" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>

                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="Sensor" class="text-sm font-bold text-gray-500">Cảm biến</label>
                                            <input value="{{$product->Sensor}}" name="Sensor" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>

                                        <div style="display:none;"
                                            class="watch bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <label for="Locater" class="text-sm font-bold text-gray-500">Định vị</label>
                                            <input value="{{$product->Locater}}" name="Locater" type="text"
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                        </div>
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
                    <button type="button"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold h-9 rounded w-full mt-3 sm:mt-0 sm:w-20 sm:ml-1">
                        <a href="{{ route('products.show', $product->ProductId) }}">
                            Hủy
                        </a>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var iphone = document.getElementsByClassName('iphone');
        var ipad = document.getElementsByClassName('ipad');
        var mac = document.getElementsByClassName('mac');
        var watch = document.getElementsByClassName('watch');
        var productName = document.getElementById("product-name").value;

        if (productName.toLowerCase().includes('mac')) {
            for(let i=0;i<mac.length;i++){
                mac[i].style.display = "";
            }
        }
        if (productName.toLowerCase().includes('watch')) {
            for(let i=0;i<watch.length;i++){
                watch[i].style.display = "";
            }
        }
        if (productName.toLowerCase().includes('iphone')) {
            for(let i=0;i<iphone.length;i++){
                iphone[i].style.display = "";
            }
        }
        if (productName.toLowerCase().includes('ipad')) {
            for(let i=0;i<ipad.length;i++){
                ipad[i].style.display = "";
            }
        }
    </script>
@endsection
