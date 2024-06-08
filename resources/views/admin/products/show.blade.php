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
                    <a href="{{ route('products.edit', $product->ProductId) }}" class="text-blue-500 mt-2 mr-3">Chỉnh
                        sửa</a>
                    <a href="{{ route('products.delete', $product->ProductId) }}" class="text-red-500 mt-2">Xóa</a>
                </div>
            </div>
            <div class="block lg:flex w-full">
                <div class="w-full lg:w-1/2 bg-white shadow sm:rounded-lg ">
                    <div class="w-full bg-white shadow sm:rounded-t-lg mb-3">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Hình ảnh sản phẩm</h3>
                        </div>
                        <div class="border-b border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-200 px-4 font-bold py-2  sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                                    Thumbnail sản phẩm
                                </div>
                                <div class="bg-white px-4 py-5 flex justify-center sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                                    <img src="{{ URL('images/Thumbnails/' . $product->ProductThumbnail) }}"
                                        class="w-1/2 lg:w-2/3 sm:min-w-20" alt="">
                                </div>
                                <div class="bg-gray-200 px-4 py-2 sm:px-6 block  sm:flex justify-between">
                                    <div class="font-bold">Hình ảnh chi tiết sản phẩm</div>
                                    <div class="text-end">
                                        <a href="{{ route('product_images.edit', $product->ProductName) }}"
                                            class="text-blue-500 hover:text-blue-700">Chỉnh sửa ảnh chi tiết</a>
                                    </div>
                                </div>
                                <div class="your-class bg-white px-4 py-5 sm:px-6">
                                    @foreach ($productImages as $item)
                                        <div>
                                            <img src="{{ URL('images/Details/' . $product->ProductName . '/' . $item->ProductImage) }}"
                                                class="w-full lg:w-full sm:min-w-20" alt="">
                                        </div>
                                    @endforeach
                                </div>

                            </dl>
                        </div>
                    </div>

                </div>
                <div class="w-full lg:w-1/2 bg-white shadow sm:rounded-lg lg:ml-3">
                    <div class="w-full bg-white shadow sm:rounded-lg mb-3">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Thông tin sản phẩm</h3>
                        </div>
                        <div class="border-b border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Dòng sản phẩm</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">
                                        {{ $product->getProductModelName->ProductModelName }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Tên sản phẩm</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2" id="product-name">{{ $product->ProductName }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Đơn giá</dt>
                                    <dd class="text-sm text-gray-900 sm    :col-span-2">
                                        {{ number_format($product->UnitPrice) . '₫' }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Kích thước và trọng lượng</dt>
                                    <dd class="w-sm text-gray-900 sm:col-span-2">{{ $product->DesignSizeAndWeight }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Thời gian bảo hành</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $product->Warranty }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Kho</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $product->Inventory }}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-bold text-gray-500">Hiện trên trang chủ?</dt>
                                    <dd class=" text-sm text-gray-900 sm:col-span-2">
                                        {{ $product->ShowOnHomePage == 1 ? 'Hiện' : 'Không hiện' }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="w-full bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Thông số kỹ thuật</h3>
                        </div>
                        {{-- iPhone --}}
                        <div style="display: none;" id="iphone">
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Camera sau</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Độ phân giải:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraBack }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Camera trước</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Độ phân giải:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraFront }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div id="label-os-cpu" class="font-bold">Hệ điều hành & CPU</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Hệ điều hành:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Os }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Chip xử lý (CPU):</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Cpu }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Tốc độ CPU:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CpuSpeed }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt id="label-gpu" class="text-sm font-bold text-gray-500">Chip đồ họa (GPU):</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Gpu }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Bộ nhớ & Lưu trữ</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">RAM:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Ram }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Dung lượng lưu trữ:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Memory }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Kết nối</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Mạng di động:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">Hỗ trợ
                                            {{ $product->Cellular }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">SIM:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Sim }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Không dây:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{!! str_replace('#', '<br>', $product->Wireless) !!}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Cổng kết nối/sạc:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Port }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Jack tai nghe:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Jack }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Pin & Sạc</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Dung lượng Pin:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->BatteryCapacity }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Loại Pin:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryType }}
                                        </dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Hỗ trợ sạc tối đa:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->MaximumChargable }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Công nghệ Pin:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{!! str_replace('#', '<br>', $product->BatteryTechnology) !!}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Tiện ích</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div
                                        class="iphone bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kháng nước, bụi:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->WaterResistant }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Thông tin chung</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kích thước, khối lượng:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->DesignSizeAndWeight }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        {{-- iPad --}}
                        <div style="display: none;" id="ipad">
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Hệ điều hành & CPU</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Hệ điều hành:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Os }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Chip xử lý (CPU):
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Cpu }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Tốc độ CPU:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CpuSpeed }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Chip đồ họa (GPU):</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Gpu }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Bộ nhớ & Lưu trữ</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">RAM:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Ram }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Dung lượng lưu trữ:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Memory }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Camera sau</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Độ phân giải:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraBack }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Camera trước</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Độ phân giải:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraFront }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Kết nối</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Mạng di động:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Cellular }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">SIM:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Sim }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kết nối không dây:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Wireless }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Cổng kết nối/sạc:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Port }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Jack tai nghe:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Jack }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Tiện ích</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Tính năng đặc biệt:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->SpecialFeature }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Pin & Sạc</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Dung lượng pin:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->BatteryCapacity }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Loại pin:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryType }}
                                        </dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Công nghệ pin:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->BatteryTechnology }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Sạc kèm theo máy:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->ChargerIncluded }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Thông tin chung</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kích thước, khối lượng:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->DesignSizeAndWeight }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        {{-- Mac --}}
                        <div style="display: none;" id="mac">
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Bộ xử lý:</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Công nghệ CPU:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Cpu }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Số nhân:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->NumberOfCore }}
                                        </dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Số luồng:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->NumberOfThread }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Tốc độ CPU:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CpuSpeed }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Card màn hình:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Gpu }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Bộ nhớ RAM, ổ cứng:</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">RAM:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Ram }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Ổ cứng:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Memory }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Cổng kết nối & tính năng mở rộng:</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Cổng giao tiếp:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Port }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kết nối không dây:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Wireless }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Webcam:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraFront }}
                                        </dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Tính năng khác:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->SpecialFeature }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Kích thước & khối lượng:</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kích thước, khối lượng:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->DesignSizeAndWeight }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kết nối không dây:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Wireless }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Cổng kết nối/sạc:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Port }}</dd>
                                    </div>
                                </dl>
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Jack tai nghe:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Jack }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Thông tin khác:</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Thông tin Pin:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->BatteryCapacity }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Công suất bộ sạc:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->ChargerIncluded }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Hệ điều hành:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Os }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        {{-- Watch --}}
                        <div style="display: none;" id="watch">
                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Thiết kế:</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Chất liệu mặt:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->MonitorMaterials }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Chất liệu khung viền:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->BorderMaterials }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Chất liệu dây:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->StrapMaterials }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Độ rộng dây:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->StrapWidth }}
                                        </dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Độ dài dây:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->StrapHeight }}
                                        </dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Khả năng thay dây:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->StrapReplaceable }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kích thước, khối lượng:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->DesignSizeAndWeight }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Tiện ích</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Môn thể thao:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->SportSupport }}
                                        </dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Hỗ trợ nghe gọi:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->CallingSupport }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Tiện ích đặc biệt:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->SpecialFeature }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Chống nước/ Kháng nước:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->WaterResistant }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Theo dõi sức khỏe:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Healthcare }}
                                        </dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Hiển thị thông báo:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->DisplayNotification }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Pin</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Thời gian sử dụng:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->BatteryCapacity }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Thời gian sạc:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->ChargingTime }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <button
                                class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                                <div class="font-bold">Cấu hình & Kết nối</div>
                                <div class="plusminus font-thin"></div>
                            </button>
                            <div class="hidden bg-slate-400 w-full">
                                <dl>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">CPU:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Cpu }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Bộ nhớ trong:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Memory }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Hệ điều hành:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Os }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kết nối được với hệ điều hành:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->OsConnectable }}
                                        </dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Ứng dụng quản lý:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                            {{ $product->ManagermentApplication }}
                                        </dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Kết nối:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Wireless }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Cảm biến:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Sensor }}</dd>
                                    </div>
                                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-500">Định vị:</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Locater }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.min.js"
        integrity="sha512-KgffulL3mxrOsDicgQWA11O6q6oKeWcV00VxgfJw4TcM8XRQT8Df9EsrYxDf7tpVpfl3qcYD96BpyPvA4d1FDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.your-class').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: true,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerPadding: '40px',
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            arrows: false,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });


        var iphone = document.getElementById('iphone');
        var ipad = document.getElementById('ipad');
        var mac = document.getElementById('mac');
        var watch = document.getElementById('watch');
        var productName = document.getElementById("product-name").textContent;
        console.log(productName);

        if (productName.toLowerCase().includes('mac')) {
            mac.style.display = "";
        }
        if (productName.toLowerCase().includes('watch')) {
            watch.style.display = "";
        }
        if (productName.toLowerCase().includes('iphone')) {
            iphone.style.display = "";
        }
        if (productName.toLowerCase().includes('ipad')) {
            ipad.style.display = "";
        }


        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                this.querySelector(".plusminus").classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
@endsection
