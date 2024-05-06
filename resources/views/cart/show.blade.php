@extends('layout.layout')
@section('title', 'Xác nhận thanh toán')
@section('content')
    @php
        $count = $cartItems->count();
        $totalQuantity = 0;
        $tongTien = 0;
    @endphp
    <div class="w-full flex justify-center">
        <div class="w-1/3 h-full my-3 text-md">
            <div class="text-white text-center text-lg mb-3">
                XÁC NHẬN ĐƠN HÀNG CỦA BẠN
            </div>
            {{-- cart --}}
            <form action="{{ route('carts.payment') }}" method="POST">
                @csrf
                <input type="hidden" name="CartId" value="{{$cartItems[0]->CartId}}">
                <input type="hidden" name="CustomerId" value="{{$customer->CustomerId}}">

                <div class="w-full my-1 rounded-t-lg bg-white block p-3">
                    @foreach ($cartItems as $index => $item)
                        @php
                            $totalQuantity += $item->Quantity;
                            $thanhTien = $item->Quantity * $item->UnitPrice;
                            $tongTien += $thanhTien;
                        @endphp
                         <input type="hidden" name="cartItems[{{ $index }}][ProductId]" value="{{ $item->ProductId }}">
                        <input type="hidden" name="cartItems[{{ $index }}][Quantity]" value="{{ $item->Quantity }}">
                        <div class="h-3/4 grid grid-cols-6 border-b">
                            <div class="h-full col-span-1 p-2">
                                <img src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}" alt="">
                            </div>
                            <div class="h-full col-span-3 ms-3">
                                <div class="h-1/2 w-full flex items-center">{{ $item->ProductName . ' ' . $item->Memory }}
                                </div>
                                <div class="h-1/2 w-full">SL: <r class="font-bold">{{ $item->Quantity }}</r>
                                </div>
                            </div>
                            <div class="h-full col-span-2">
                                <div class="h-1/2 w-full flex px-7 justify-end items-center font-bold">
                                    <div>{{ number_format($thanhTien) . '₫' }}</div>
                                </div>
                                <div class="h-1/2"></div>
                            </div>
                        </div>
                    @endforeach
                    <div class="h-1/4 flex justify-between px-7 items-center mt-1">
                        <div class="w-1/2"><b>Tạm tính</b> <i>({{ $totalQuantity }} sản phẩm):</i></div>
                        <div class="w-1/2 text-end font-bold">{{ number_format($tongTien) . '₫' }}</div>
                    </div>
                </div>
                {{-- customer information --}}
                <div class="w-full p-4 my-1 bg-white">
                    <div class="w-full pb-3 font-bold">Thông tin người nhận</div>
                    <div class="px-3 space-y-2">
                        <div>
                            @if (isset($customer->Gender))
                                @if ($customer->Gender == 1)
                                    <div>
                                        Anh: <b
                                            class="font-semibold">{{ $customer->LastName . ' ' . $customer->FirstName }}</b>
                                    </div>
                                @else
                                    <div>
                                        Chị: <b
                                            class="font-semibold">{{ $customer->LastName . ' ' . $customer->FirstName }}</b>
                                    </div>
                                @endif
                            @else
                                <div>
                                    Khách hàng: <b
                                        class="font-semibold">{{ $customer->LastName . ' ' . $customer->FirstName }}</b>
                                </div>
                            @endif
                        </div>
                        <div class="w-full flex items-center">
                            <div class="pr-2 w-fit text-nowrap">Số điện thoại nhận hàng:</div>
                            <input type="text" name="Address" placeholder="Thay đổi địa chỉ giao hàng"
                                class="rounded-md w-full" value="{{ $customer->Phone }}">
                        </div>
                    </div>
                </div>
                {{-- way to receive --}}
                <div class="w-full my-1 bg-white p-4 pb-7">
                    <div class="w-full pb-3 font-bold">Hình thức nhận hàng</div>
                    <div class="px-3 space-y-3">
                        <div class="flex items-center">
                            <div class="mr-3 flex items-center">
                                <input type="radio" name="delivery" onchange="onChange()" checked id="delivery"
                                    class="mr-1" >
                                <label for="delivery">
                                    Giao tận nơi
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="delivery" onchange="onChange()" id="at-store" class="mr-1">
                                <label for="at-store">
                                    Nhận tại cửa hàng
                                </label>
                            </div>
                        </div>
                        <div id="address">
                            <div class="w-full">
                                <div class="flex justify-between">
                                    <div>Địa chỉ nhận:</div>
                                    <e class="text-red-600 font-bold">(*)</e>
                                </div>
                                <input required type="text" name="Address" placeholder="Thêm địa chỉ giao hàng"
                                    class="w-full rounded-md" value="{{ $customer->Address }}">
                            </div>
                        </div>
                        <div>
                            Ghi chú (nếu có):
                            <input type="text" name="Note" class="w-full rounded-md"
                                placeholder="Thêm ghi chú cho đơn hàng">
                        </div>
                    </div>
                </div>
                {{-- way to payment --}}
                <div class="w-full my-1 bg-white p-4 space-y-2">
                    <div class="w-full pb-3 font-bold">Hình thức thanh toán</div>
                    <div class="flex items-center space-x-3">
                        <input type="radio" name="payment" checked id="vnpay" value="vnpay">
                        <label for="vnpay" class="flex">
                            Thanh toán bằng <img
                                src="https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-VNPAY-QR-1.png" width="15%"
                                class="ml-1 pointer-events-none">
                        </label>
                    </div>
                    <div class="flex items-center space-x-3">
                        <input type="radio" name="payment" id="on-delivery" value="ondelivery">
                        <label for="on-delivery">
                            Thanh toán khi nhận hàng
                        </label>
                    </div>
                </div>
                {{-- total bill & sale --}}
                <div class="w-full my-1 rounded-b-lg bg-white p-4">
                    <div class="w-full pb-3 font-bold flex justify-between">
                        <div class="">Tổng tiền:</div>
                        <div class="text-red-600">{{ number_format($tongTien) . '₫' }}</div>
                    </div>
                    <hr>
                    <div class="flex items-center my-3">
                        <input type="checkbox" id="agree-checkbox" checked onchange="isCheck()" class="mr-1" >
                        <label for="agree-checkbox">
                            Tôi đồng ý với Chính sách xử lý dữ liệu cá nhân của TopZone
                        </label>
                    </div>
                    <button id="payment-bt" type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 h-12 rounded-xl text-white text-md font-bold mt-2 disabled:bg-blue-400 disabled:pointer-events-none">
                        Thanh toán
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var address = document.getElementById('address');
        var paymentBt = document.getElementById('payment-bt');

        function onChange() {
            if (document.getElementById('delivery').checked) {
                address.style.display = "";
            } else address.style.display = "none";
        }
    </script>
@endsection
