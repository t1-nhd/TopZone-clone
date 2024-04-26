@extends('admin.layout_admin.layout_admin')
@section('title', 'Thêm sản phẩm')
@section('content')

    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="flex w-full justify-between mb-5">
                <button type="button"
                    class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                    <a href="{{ route('products.index') }}">Hủy</a>
                </button>
                <h1 class="text-2xl font-semibold mb-4">THÊM MỚI SẢN PHẨM</h1>
                <div class="invisible"></div>
            </div>
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="lg:flex block w-full">
                    <div class="w-full lg:w-1/2 bg-white shadow overflow-hidden sm:rounded-lg ">
                        <div class="w-full bg-white shadow sm:rounded-lg mb-3">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg font-semibold leading-6 text-gray-900">Thông tin sản phẩm mới</h3>
                            </div>
                            <div class="border-t border-gray-200">
                                <dl>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ProductModelName" class="text-sm font-bold text-gray-500">Dòng sản
                                            phẩm</label>
                                        <div class="w-full flex sm:col-span-2">
                                            <select name="ProductModelName" id="product-model-name"
                                                class="px-3 h-10 mb-1 w-full border border-black rounded-l-lg text-sm text-gray-900">
                                                <option selected disabled>Chọn model máy</option>
                                                @foreach ($models as $model)
                                                    <option value="{{ $model->ProductModelName }}">
                                                        {{ $model->ProductModelName }}</option>
                                                @endforeach
                                            </select>
                                            <button
                                                class="bg-green-500 rounded-tr-lg border border-green-500 rounded-br-lg hover:bg-green-600 text-white font-bold h-10 w-36 px-2">
                                                <a href="{{ route('product_models.create') }}">Thêm
                                                    mẫu</a>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ProductName" class="text-sm font-bold text-gray-500">Tên sản
                                            phẩm</label>
                                        <input name="ProductName" type="text" id="product-name" required
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="UnitPrice" class="text-sm font-bold text-gray-500">Đơn giá</label>
                                        <div class="w-full sm:col-span-2 relative">
                                            <input name="UnitPrice" type="number" required
                                                class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900" />
                                            <div
                                                class="absolute inset-y-0 end-10 flex items-center ps-3 pointer-events-none">
                                                VNĐ
                                            </div>
                                        </div>

                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="DesignSizeAndWeight" class="text-sm font-bold text-gray-500">Kích thước
                                            và trọng lượng</label>
                                        <textarea type="text" rows="3" name="DesignSizeAndWeight" required
                                            class="px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"></textarea>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="warranty" class="text-sm font-bold text-gray-500">Thời gian bảo
                                            hành</label>
                                        <select name="Warranty" id="warranty" required
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                        </select>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Inventory" class="text-sm font-bold text-gray-500">Kho</label>
                                        <input name="Inventory" type="number" required
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="is-new" class="text-sm font-bold text-gray-500">Mới ra mắt?</label>
                                        <select name="isNew" id="is-new" required
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                            <option value=1>Đúng</option>
                                            <option value=2>Sai</option>
                                        </select>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <div class="w-full bg-white shadow sm:rounded-lg mb-3">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg font-semibold leading-6 text-gray-900">Hình ảnh sản phẩm</h3>
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
                                <h3 class="text-lg font-semibold leading-6 text-gray-900">Thông số kỹ thuật</h3>
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
                                            required>
                                            <option selected disabled>Chọn dung lượng bộ nhớ</option>
                                            <option value="64 GB">64 GB</option>
                                            <option value="128 GB">128 GB</option>
                                            <option value="256 GB">256 GB</option>
                                            <option value="512 GB">512 GB</option>
                                            <option value="1 TB">1 TB</option>
                                        </select>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Ram" class="text-sm font-bold text-gray-500">RAM</label>
                                        <select name="Ram" id="ram"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                            <option selected disabled>Chọn dung lượng RAM</option>
                                            <option value="4 GB">4 GB</option>
                                            <option value="6 GB">6 GB</option>
                                            <option value="8 GB">8 GB</option>
                                            <option value="16 GB">16 GB</option>
                                            <option value="18 GB">18 GB</option>
                                            <option value="36 GB">36 GB</option>
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
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Resolution" class="text-sm font-bold text-gray-500">Độ phân
                                            giải</label>
                                        <input name="Resolution" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MonitorSize" class="text-sm font-bold text-gray-500">Màn hình
                                            rộng</label>
                                        <input name="MonitorSize" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Camera
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="CameraBack" class="text-sm font-bold text-gray-500">Camera
                                            sau</label>
                                        <input name="CameraBack" type="text" id='camera-back'
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="CameraFront" class="text-sm font-bold text-gray-500"
                                            id="label-camera-front">Camera
                                            trước</label>
                                        <input name="CameraFront" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Hệ điều hành & CPU
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Os" class="text-sm font-bold text-gray-500">Hệ điều hành</label>
                                        <input name="Os" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Cpu" class="text-sm font-bold text-gray-500">CPU</label>
                                        <input name="Cpu" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="CpuSpeed" class="text-sm font-bold text-gray-500">Tốc độ CPU</label>
                                        <input name="CpuSpeed" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Gpu" class="text-sm font-bold text-gray-500">GPU</label>
                                        <input name="Gpu" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-100 px-4 font-bold py-2 text-center">
                                        Mac
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="NumberOfCore" class="text-sm font-bold text-gray-500">Số lõi
                                            CPU</label>
                                        <input name="NumberOfCore" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="NumberOfThread" class="text-sm font-bold text-gray-500">Số luồng
                                            CPU</label>
                                        <input name="NumberOfThread" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MaximumCpuSpeed" class="text-sm font-bold text-gray-500">Tốc độ CPU
                                            tối đa</label>
                                        <input name="MaximumCpuSpeed" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Kết nối
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Wireless" class="text-sm font-bold text-gray-500">Kết nối không
                                            dây</label>
                                        <textarea name="Wireless" rows="3"
                                            class="px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"></textarea>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Port" class="text-sm font-bold text-gray-500">Cổng sạc</label>
                                        <input name="Port" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Jack" class="text-sm font-bold text-gray-500">Jack</label>
                                        <input name="Jack" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Pin & Sạc
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="BatteryCapacity" class="text-sm font-bold text-gray-500">Dung
                                            lượng
                                            Pin</label>
                                        <input name="BatteryCapacity" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="BatteryType" class="text-sm font-bold text-gray-500">Loại Pin</label>
                                        <input name="BatteryType" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="BatteryTechnology" class="text-sm font-bold text-gray-500">Công nghệ
                                            Pin</label>
                                        <textarea name="BatteryTechnology" rows="3"
                                            class="px-3 w-full mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2"></textarea>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="SpecialFeature" class="text-sm font-bold text-gray-500">Tính năng đặc
                                            biệt</label>
                                        <input name="SpecialFeature" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ChargerIncluded" class="text-sm font-bold text-gray-500">Bộ sạc đi
                                            kèm</label>
                                        <input name="ChargerIncluded" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MaximumChargable" class="text-sm font-bold text-gray-500">Dung lượng
                                            sạc tối đa</label>
                                        <input name="MaximumChargable" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MaximumRamUpgraded" class="text-sm font-bold text-gray-500">Dung lượng
                                            RAM tối đa có thể nâng cấp</label>
                                        <input name="MaximumRamUpgraded" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    {{-- Apple Watch --}}
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Apple Watch - Thiết kế
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="MonitorMaterials" class="text-sm font-bold text-gray-500">Chất liệu
                                            mặt</label>
                                        <input name="MonitorMaterials" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="BorderMaterials" class="text-sm font-bold text-gray-500">Chất liệu
                                            khung viền</label>
                                        <input name="BorderMaterials" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="StrapMaterials" class="text-sm font-bold text-gray-500">Chất liệu dây
                                            đeo</label>
                                        <input name="StrapMaterials" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="StrapWidth" class="text-sm font-bold text-gray-500">Chiều rộng dây
                                            đeo</label>
                                        <input name="StrapWidth" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="StrapHeight" class="text-sm font-bold text-gray-500">Chiều cao dây
                                            đeo</label>
                                        <input name="StrapHeight" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="StrapReplaceable" class="text-sm font-bold text-gray-500">Có thể thay
                                            thế dây đeo</label>
                                        <select name="StrapReplaceable" id="strap-replaceable"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2">
                                            <option disabled hidden selected></option>
                                            <option value=1>Có thể</option>
                                            <option value=2>Không thể</option>
                                        </select>
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Apple Watch - Tiện ích
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="SportSupport" class="text-sm font-bold text-gray-500">Hỗ trợ môn thể
                                            thao</label>
                                        <input name="SportSupport" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="CallingSupport" class="text-sm font-bold text-gray-500">Hỗ trợ nghe
                                            gọi</label>
                                        <input name="CallingSupport" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="WaterResistant" class="text-sm font-bold text-gray-500">Chống
                                            nước</label>
                                        <input name="WaterResistant" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Healthcare" class="text-sm font-bold text-gray-500">Chăm sóc sức
                                            khỏe</label>
                                        <input name="Healthcare" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="DisplayNotification" class="text-sm font-bold text-gray-500">Hiển thị
                                            thông báo</label>
                                        <input name="DisplayNotification" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Apple Watch - Pin
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ChargingTime" class="text-sm font-bold text-gray-500">Thời gian
                                            sạc</label>
                                        <input name="ChargingTime" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                    <div class="bg-gray-200 px-4 font-bold py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        Apple Watch - Cấu hình & Kết nối
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="OsConnectable" class="text-sm font-bold text-gray-500">Kết nối hệ điều
                                            hành</label>
                                        <input name="OsConnectable" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="ManagermentApplication" class="text-sm font-bold text-gray-500">Ứng
                                            dụng quản lý</label>
                                        <input name="ManagermentApplication" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Sensor" class="text-sm font-bold text-gray-500">Cảm biến</label>
                                        <input name="Sensor" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <label for="Locater" class="text-sm font-bold text-gray-500">Định vị</label>
                                        <input name="Locater" type="text"
                                            class="px-3 w-full h-10 mb-1 border border-black rounded-lg text-sm text-gray-900 sm:col-span-2" />
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 pb-3 block sm:flex justify-center lg:justify-end">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-full sm:w-32 mr-1">Thêm</button>
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
        document.getElementById('product-model-name').addEventListener('change', function() {
            var ramSelection = document.getElementById('ram');
            var productName = document.getElementById('product-name');
            var label_camera_front = document.getElementById('label-camera-front');
            var camera_back = document.getElementById('camera-back');

            productName.value = this.value + " ";

            if (this.value.includes('Watch')) {
                camera_back.disabled = true;
                ramSelection.disabled = true;
            } else {
                ramSelection.disabled = false;
            }

            if (this.value.includes('Mac')) {
                label_camera_front.innerHTML = "Webcam";
            }
        });
    </script>
@endsection



{{-- @extends('admin.layout_admin.layout_admin')
@section('title', 'Thêm sản phẩm')

@section('content')
    <div class="overflow-x-auto m-10">
        <button type="button"
            class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
            <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
            </svg>
            <a href="{{ route('products.index') }}">Go back</a>
        </button>
        <h1 class="w-full text-4xl text-center mb-3">THÊM SẢN PHẨM</h1>
    </div>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="block lg:flex px-10">
            <div class="w-full md:w-1/2 lg:mr-10">
                <div class="mt-3">
                    <label for="product-model-name" class="block">Model thiết bị</label>
                    <div class="w-full flex">
                        <select name="ProductModelName" id="product-model-name"
                            class="px-3 w-full h-10 border border-black rounded-tl-lg rounded-bl-lg">
                        </select>
                        <button type="button"
                            class="bg-green-500 rounded-tr-lg border border-green-500 rounded-br-lg hover:bg-green-600 text-white font-bold h-10 w-36 px-2"
                            data-modal-target="product-model-create-modal" data-modal-toggle="product-model-create-modal">
                            <a href="{{ route('product_models.create') }}">Thêm mẫu</a>
                        </button>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="product-name" class="block">Tên sản phẩm</label>
                    <input type="text" id="product-name" name="ProductName" value="" required
                        class="px-3 w-full h-10 border border-black rounded-lg">
                </div>
                <div class="mt-3">
                    <label for="product-thumbnail" class="block">Thumbnail sản phẩm</label>
                    <input name="ProductThumbnail" type="file" id="product-thumbnail"
                        class="px-3 w-full h-10 border border-black rounded-lg" />
                </div>
                <div class="mt-3 flex">
                    <div class="w-1/2 mr-1">
                        <label for="memory" class="block">Bộ nhớ trong:</label>
                        <select name="Memory" id="memory" class="px-3 w-full h-10 border border-black rounded-lg"
                            required>
                            <option selected disabled>Chọn dung lượng bộ nhớ</option>
                            <option value="64 GB">64 GB</option>
                            <option value="128 GB">128 GB</option>
                            <option value="256 GB">256 GB</option>
                            <option value="512 GB">512 GB</option>
                            <option value="1 TB">1 TB</option>
                        </select>
                    </div>
                    <div class="w-1/2 ml-1">
                        <label for="ram" class="block">RAM:</label>
                        <select name="Ram" id="ram" class="px-3 w-full h-10 border border-black rounded-lg"
                            required>
                            <option selected disabled>Chọn dung lượng RAM</option>
                            <option value="4 GB">4 GB</option>
                            <option value="6 GB">6 GB</option>
                            <option value="8 GB">8 GB</option>
                            <option value="16 GB">16 GB</option>
                            <option value="18 GB">18 GB</option>
                            <option value="36 GB">36 GB</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="unit-price" class="block">Đơn giá:</label>
                    <div class="w-full relative">
                        <input type="number" id="unit-price" name="UnitPrice" min="0"
                            class="block px-3 w-full h-10 border border-black rounded-lg" placeholder="" required />
                        <div class="absolute inset-y-0 end-10 flex items-center ps-3 pointer-events-none">
                            VNĐ
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="design-size-and-weight" class="block">Kích thước và trọng lượng:</label>
                    <textarea name="DesignSizeAndWeight" id="design-size-and-weight" rows="3"
                        class="pt-1 px-3 w-full border border-black rounded-lg" required></textarea>
                </div>

                <div class="mt-3">
                    <label for="warranty" class="block">Bảo hành:</label>
                    <select name="Warranty" id="warranty" class="px-3 w-full h-10 border border-black rounded-lg" required>
                        <option value="3 tháng">3 tháng</option>
                        <option value="6 tháng">6 tháng</option>
                        <option value="12 tháng">12 tháng</option>
                        <option value="24 tháng">24 tháng</option>
                    </select>
                </div>

                <div class="mt-3">
                    <label for="inventory" class="block">Nhập kho:</label>
                    <input type="number" id="inventory" name="Inventory" value="1" min="1" required
                        class="px-3 w-full h-10 border border-black rounded-lg">
                </div>

                <div class="mt-3">
                    <label for="is-new" class="flex">Mới ra mắt:</label>
                    <select name="isNew" id="is-new" class="px-3 w-full h-10 border border-black rounded-lg">
                        <option value=1>Đúng</option>
                        <option value=0>Sai</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-3 pb-3 block sm:flex justify-center lg:justify-end px-5">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-9 rounded w-full sm:w-32 mr-1">
                Thêm
            </button>
            <button
                class="bg-orange-600 hover:bg-orange-700 text-white font-bold h-9 rounded w-full mt-3 sm:mt-0 sm:w-20 sm:ml-1">
                <a href="{{ route('products.index') }}">
                    Hủy
                </a>
            </button>
        </div>
    </form>
    
@endsection --}}
