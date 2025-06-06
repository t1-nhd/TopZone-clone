@extends('layout.layout_product_show')
@section('title', $title)
@section('content')
    <div class="flex justify-center items-center py-10 sm:py-5 lg:py-10">
        <div class="w-full px-2 sm:px-0 sm:w-4/5 md:w-full lg:w-4/5 block md:flex mt-10 pb-10">
            <input type="hidden" id="product-name" value="{{ $product->ProductName }}">
            {{-- Image --}}
            <div class="w-full md:w-1/2">
                <div class="block">
                    <div class="relative">
                        <div class="new-arrows flex absolute w-full z-10 items-center my-auto h-full justify-between px-2">
                            <button
                                class="prev-arr rounded-full bg-[#D2D2D2] bg-opacity-60 hover:bg-gray-400 hover:transition-all delay-[50ms] h-12 w-12">
                                <i class="fa-solid fa-arrow-left text-white text-xl"></i>
                            </button>
                            <button
                                class="next-arr rounded-full bg-[#D2D2D2] bg-opacity-60 hover:bg-gray-400 hover:transition-all delay-[50ms] h-12 w-12">
                                <i class="fa-solid fa-arrow-right text-white text-xl"></i>
                            </button>
                        </div>
                        <div class="slider-for w-full">
                            @foreach ($images as $image)
                                <img class="mx-auto "
                                    src="{{ URL('images/Details/' . $product->ProductName . '/' . $image->ProductImage) }}"
                                    width="100%" alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="slider-nav mt-3 w-full">
                        @foreach ($images as $image)
                            <img class="mx-auto rounded-md bg-white"
                                src="{{ URL('images/Details/' . $product->ProductName . '/' . $image->ProductImage) }}"
                                width="15%" alt="">
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Infomation --}}
            <div class="w-full md:w-1/2 text-white px-1 lg:px-7 flex flex-col h-auto justify-between">
                {{-- Product name --}}
                <div class="text-4xl font-semibold mt-2">
                    {{ $product->ProductName . ' ' . $product->Memory }}
                </div>
                {{-- Memory selection --}}
                <div class="">
                    Dung lượng
                    <div class="flex my-3">
                        @foreach ($memories as $memory)
                            @if ($memory->Memory == $product->Memory)
                                <button class="rounded-md py-2 px-4 mr-3 bg-[#1C1C1D]">
                                    {{ $memory->Memory }}
                                </button>
                            @else
                                <button class="rounded-md py-2 px-4 mr-3 bg-[#2F3033]">
                                    <a
                                        href="{{ route('show', [$product->ProductName, $memory->Memory]) }}">{{ $memory->Memory }}</a>
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{-- Price --}}
                <div class="text-3xl font-semibold mb-5">
                    {{ number_format($product->UnitPrice) . '₫' }}
                </div>
                {{-- Sale --}}
                <div class="w-full py-1">
                    <div class=" text-white rounded-lg bg-[#2F3033] p-5">
                        <div class="font-bold">
                            Khuyến mãi
                        </div>
                        <div>
                            Giá và khuyến mãi dự kiến áp dụng đến 23:00 | 31/05
                        </div>
                        <hr class="my-3">
                        <div>
                            • Bảo Hành 24 tháng (12 tháng chính hãng + 12 tháng tại TopCare) <a href=""
                                class="text-blue-500">Xem chi tiết</a>
                            <br>
                            • Thu cũ Đổi mới: Giảm đến 2 triệu (Tuỳ model máy cũ, Không kèm thanh toán qua cổng online, mua
                            kèm)
                            <a href="" class="text-blue-500">Xem chi tiết</a>
                            <br>
                            • Cơ hội trúng 10 xe máy Yamaha Sirius mỗi tháng, tổng giải thưởng lên đến 390 Triệu <a
                                href="" class="text-blue-500">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                {{-- Add to cart button --}}
                @if (!Auth::check() || (Auth::check() && Auth::user()->account_type == 0))
                    <div class="w-full">
                        <div class="italic text-white">({{ $product->Inventory }} sản phẩm có sẵn)</div>
                        <form action="{{ route('carts.add') }}" method="post" class="w-full">
                            @csrf
                            <input type="hidden" name="ProductId" value="{{ $product->ProductId }}">
                            <input type="hidden" name="Quantity" value=1>
                            <button
                                class="border border-blue-500 h-14 text-white font-bold text-xl bg-blue-500 rounded-lg px-3 w-full">Thêm
                                vào giỏ hàng</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <section class="bg-white pb-20 flex justify-center items-center w-full">
        <div class="w-full px-2 sm:px-0 sm:w-4/5 md:w-3/5 lg:w-1/2 md:mx-5 h-full">
            <div class="flex-wrap flex justify-center items-center py-10">
                <button class="h-10 px-3 mx-2 rounded-md border border-gray-300 font-bold">Mô tả</button>
                <button class="h-10 px-3 mx-2 rounded-md border border-gray-600 font-bold">Thông số kỹ thuật</button>
                <button class="h-10 px-3 mt-3 sm:mt-0 mx-2 rounded-md border border-gray-300 font-bold">Đánh giá sản
                    phẩm</button>
            </div>
            {{-- System information --}}
            <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                <div class="font-bold">Màn hình</div>
                <div class="plusminus font-thin"></div>
            </button>
            <div class="hidden bg-slate-400 w-full">
                <dl>
                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-gray-500">Công nghệ màn hình:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->MonitorTechnology }}</dd>
                    </div>
                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-gray-500">Độ phân giải:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Resolution }}</dd>
                    </div>
                    <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-gray-500">Màn hình rộng:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->MonitorSize }}</dd>
                    </div>
                </dl>
            </div>
            {{-- iPhone --}}
            <div style="display: none;" id="iphone">
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Camera sau</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Độ phân giải:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraBack }}</dd>
                        </div>
                    </dl>
                </div>

                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Camera trước</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Độ phân giải:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraFront }}</dd>
                        </div>
                    </dl>
                </div>

                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
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

                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
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

                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Kết nối</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Mạng di động:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">Hỗ trợ {{ $product->Cellular }}</dd>
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

                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Pin & Sạc</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Dung lượng Pin:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryCapacity }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Loại Pin:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryType }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Hỗ trợ sạc tối đa:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->MaximumChargable }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Công nghệ Pin:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{!! str_replace('#', '<br>', $product->BatteryTechnology) !!}</dd>
                        </div>
                    </dl>
                </div>
                {{-- Apple --}}
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Tiện ích</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="iphone bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Kháng nước, bụi:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->WaterResistant }}</dd>
                        </div>
                    </dl>
                </div>

                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Thông tin chung</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Kích thước, khối lượng:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->DesignSizeAndWeight }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
            {{-- iPad --}}
            <div style="display: none;" id="ipad">
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
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
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
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
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Camera sau</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Độ phân giải:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraBack }}</dd>
                        </div>
                    </dl>
                </div>
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Camera trước</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Độ phân giải:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraFront }}</dd>
                        </div>
                    </dl>
                </div>
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
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
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Tiện ích</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Tính năng đặc biệt:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->SpecialFeature }}</dd>
                        </div>
                    </dl>
                </div>
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Pin & Sạc</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Dung lượng pin:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryCapacity }}</dd>
                        </div>
                    </dl>
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Loại pin:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryType }}</dd>
                        </div>
                    </dl>
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Công nghệ pin:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryTechnology }}</dd>
                        </div>
                    </dl>
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Hỗ trợ sạc tối đa:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->MaximumChargable }}</dd>
                        </div>
                    </dl>
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Sạc kèm theo máy:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->ChargerIncluded }}</dd>
                        </div>
                    </dl>
                </div>
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Thông tin chung</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Kích thước, khối lượng:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->DesignSizeAndWeight }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
            {{-- Mac --}}
            <div style="display: none;" id="mac">
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
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
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->NumberOfCore }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Số luồng:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->NumberOfThread }}</dd>
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
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
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
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Khả năng nâng cấp RAM tối đa:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->MaximumRamUpgraded }}</dd>
                        </div>
                    </dl>
                </div>
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
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
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CameraFront }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Tính năng khác:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->SpecialFeature }}</dd>
                        </div>
                    </dl>
                </div>
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Kích thước & khối lượng:</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Kích thước, khối lượng:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->DesignSizeAndWeight }}</dd>
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
                            <dt class="text-sm font-bold text-gray-500">Cổng giao tiếp:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Port }}</dd>
                        </div>
                    </dl>
                </div>
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Thông tin khác:</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Thông tin Pin:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryCapacity }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Công suất bộ sạc:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->ChargerIncluded }}</dd>
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
                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Thiết kế:</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Chất liệu mặt:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->MonitorMaterials }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Chất liệu khung viền:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BorderMaterials }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Chất liệu dây:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->StrapMaterials }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Độ rộng dây:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->StrapWidth }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Độ dài dây:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->StrapHeight }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Khả năng thay dây:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->StrapReplaceable }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Kích thước, khối lượng:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->DesignSizeAndWeight }}</dd>
                        </div>
                    </dl>
                </div>

                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Tiện ích</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Môn thể thao:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->SportSupport }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Hỗ trợ nghe gọi:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->CallingSupport }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Tiện ích đặc biệt:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->SpecialFeature }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Chống nước/ Kháng nước:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->WaterResistant }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Theo dõi sức khỏe:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->Healthcare }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Hiển thị thông báo:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->DisplayNotification }}</dd>
                        </div>
                    </dl>
                </div>

                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
                    <div class="font-bold">Pin</div>
                    <div class="plusminus font-thin"></div>
                </button>
                <div class="hidden bg-slate-400 w-full">
                    <dl>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Thời gian sử dụng:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->BatteryCapacity }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Thời gian sạc:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->ChargingTime }}</dd>
                        </div>
                    </dl>
                </div>

                <button class="collapsible flex items-center justify-between px-3 w-full h-12 py-3 bg-gray-100 mt-5 ">
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
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->OsConnectable }}</dd>
                        </div>
                        <div class="bg-white border-t px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold text-gray-500">Ứng dụng quản lý:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $product->ManagermentApplication }}
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
    </section>



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
        var iphone = document.getElementById('iphone');
        var ipad = document.getElementById('ipad');
        var mac = document.getElementById('mac');
        var watch = document.getElementById('watch');
        var productName = document.getElementById("product-name").value;

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

        $(document).ready(function() {
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                asNavFor: '.slider-nav',
                appendArrows: $('.new-arrows'),
                prevArrow: $('.prev-arr'),
                nextArrow: $('.next-arr'),
            });
            $('.slider-nav').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                focusOnSelect: true,
                arrows: false,
            });
        });

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
