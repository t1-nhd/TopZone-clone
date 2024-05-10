@extends('layout.layout')
@section('title', 'Giỏ hàng của bạn')
@section('content')
    @php
        $count = $cartItems->count();
        $totalQuantity = 0;
        $tongTien = 0;
    @endphp
    {{-- @if (session('add-to-cart-successfully'))
        <div id="alert" class="absolute z-10 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 transition-opacity duration-500"
            role="alert">
            <p>{{ session('add-to-cart-successfully') }}</p>
        </div>
    @endif --}}
    <div class="flex justify-center w-full pb-5">
        <div class="w-2/3">
            <div class="flex justify-between text-gray-300 py-2 mx-3">
                @if ($count > 0)
                    <div>
                        <a href="{{ route('index') }}"><i class="fa-solid fa-angle-left"></i></i> Trở về mua sắm</a>
                    </div>
                @else
                    <div></div>
                @endif
                <div class="pointer-events-none">
                    Giỏ hàng của bạn
                </div>
            </div>
            @if (@session('payment-success'))
                <div class="rounded-lg bg-green-100 h-36 p-3 flex justify-center items-center relative">
                    <button class="absolute top-1 right-2" onclick="this.parentElement.style.display='none';">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <div class="text-2xl text-green-600 text-center space-y-3">
                        <div class="pointer-events-none flex justify-center items-center font-bold uppercase"><i
                                class="fa-solid fa-check rounded-full flex justify-center items-center h-8 w-8 border-green-600 border-4 mr-2"></i>{{ @session('payment-success') }}
                        </div>
                        <div class="text-center">
                            <a href="{{route('profile')}}" class="text-blue-500 hover:text-blue-700">
                                xem hóa đơn của bạn
                            </a>
                            <e class="mx-1">hoặc</e>
                            <a href="{{ route('index') }}" class="text-blue-500 hover:text-blue-700">
                                trở về mua sắm
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($count > 0)
                <div class="">
                    <div class="rounded-t-lg bg-white p-3">
                        <table class="w-full">
                            <tbody>
                                @foreach ($cartItems as $item)
                                    @php
                                        $totalQuantity += $item->Quantity;
                                        $thanhTien = $item->Quantity * $item->UnitPrice;
                                        $tongTien += $thanhTien;
                                    @endphp
                                    <tr class="py-3">
                                        <td class="w-2/12 py-3">
                                            <img src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}"
                                                alt="">
                                        </td>
                                        <td class="w-6/12 py-3 pl-5">
                                            <a
                                                href="{{ route('show', [$item->ProductName, $item->Memory]) }}">{{ $item->ProductName . ' ' . $item->Memory }}</a>
                                        </td>
                                        <td class="w-2/12 py-3 text-center">
                                            <div class="flex justify-center items-center">
                                                <div>
                                                    <form action="{{ route('carts.update') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ProductId"
                                                            value="{{ $item->ProductId }}">
                                                        <input type="hidden" name="update" value="decrement">
                                                        <button class="h-9 w-9 rounded-lg border font-bold">-</button>
                                                    </form>
                                                </div>
                                                <div class="mx-2">{{ $item->Quantity }}</div>
                                                <div>
                                                    <form action="{{ route('carts.update') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ProductId"
                                                            value="{{ $item->ProductId }}">
                                                        <input type="hidden" name="update" value="increment">
                                                        <button class="h-9 w-9 rounded-lg border font-bold">+</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="w-2/12 py-3 font-bold text-center">
                                            {{ number_format($thanhTien) . '₫' }}
                                        </td>
                                        <td class="w-1/12 py-3 text-center">
                                            <form action="{{ route('carts.destroy') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="ProductId" value="{{ $item->ProductId }}">
                                                <button class="h-9 w-9 font-bold">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 12V17" stroke="#000000" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M14 12V17" stroke="#000000" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M4 7H20" stroke="#000000" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="rounded-b-lg mt-1 bg-white p-3 grid grid-cols-6 py-3 place-items-center">
                        <div class="col-span-2"></div>
                        <div class="col-span-2 font-bold w-full text-end">TỔNG GIỎ HÀNG <i
                                class="font-normal">({{ $totalQuantity }} sản phẩm)</i></div>
                        <div class="font-bold text-red-600 text-lg">{{ number_format($tongTien) . '₫' }}</div>
                        <button class="h-9 w-32 bg-blue-500 rounded-lg text-white font-bold">
                            <a href="{{ route('carts.show') }}">Đặt hàng</a>
                        </button>
                    </div>
                </div>
            @else
                <div class="rounded-lg bg-white h-36 p-3">
                    <div class="text-2xl text-gray-400 text-center">
                        <div class="pointer-events-none">BẠN CHƯA THÊM SẢN PHẨM NÀO VÀO GIỎ HÀNG.</div>
                        <a href="{{ route('index') }}" class="hover:text-blue-700">
                            TRỞ VỀ MUA SẮM
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
