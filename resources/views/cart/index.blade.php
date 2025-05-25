@extends('layout.layout_cart')
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
    <div class="w-full px-1 xl:px-0 xl:w-2/3">
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
                    <a href="{{ route('profile') }}" class="text-blue-500 hover:text-blue-700">
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
                        @if ($item->Inventory == 0)
                        <tr class="py-3 bg-white opacity-20">
                            <td class="w-2/12 py-3">
                                <img src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}"
                                    alt="">
                            </td>
                            <td class="w-6/12 py-3 pl-5 font-bold hover:text-gray-500">
                                <a class=""
                                    href="{{ route('show', [$item->ProductName, $item->Memory]) }}">{{ $item->ProductName . ' ' . $item->Memory }}</a>
                            </td>
                            <td class="w-2/12 py-3 text-center">
                                <div class="flex justify-center items-center">
                                    <div class="cart-item-quantity mx-2">{{ $item->Quantity }}</div>
                                </div>
                            </td>
                            <td class="w-2/12 py-3 font-bold text-center cart-item-total-price">
                                {{ number_format($thanhTien) . '₫' }}
                            </td>
                            <td class="w-1/12 py-3 text-center">
                                <form action="{{ route('carts.destroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="ProductId" value="{{ $item->ProductId }}">
                                    <button class="h-9 w-9 font-bold">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        @else
                        <tr class="py-3 cart-item-group">
                            <td class="w-2/12 py-3">
                                <img src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}"
                                    alt="">
                            </td>
                            <td class="w-6/12 py-3 pl-5">
                                <a
                                    href="{{ route('show', [$item->ProductName, $item->Memory]) }}">{{ $item->ProductName . ' ' . $item->Memory }}</a>
                            </td>
                            <td class="w-2/12 py-3 text-center">
                                <div class="update-cart-block flex justify-center items-center">
                                    <input type="hidden" class="cartId" value="{{ $item->CartId }}">
                                    <input type="hidden" class="productId" value="{{ $item->ProductId }}">
                                    <div>
                                        <button class="minus-bt h-9 w-9 rounded-lg border font-bold">-</button>
                                    </div>
                                    <div class="cart-item-quantity mx-2">{{ $item->Quantity }}</div>
                                    <div>
                                        <button class="plus-bt h-9 w-9 rounded-lg border font-bold">+</button>
                                    </div>
                                </div>
                            </td>
                            <td class="w-2/12 py-3 font-bold text-center cart-item-total-price">
                                {{ number_format($thanhTien) . '₫' }}
                            </td>
                            <td class="w-1/12 py-3">
                                <button class="delete-button h-9 w-9 font-bold text-center flex items-center">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="rounded-b-lg mt-1 bg-white p-3 flex py-3 place-items-center space-x-1">
                <div class=""></div>
                <div class="font-bold w-full text-end">TỔNG GIỎ HÀNG <i
                        class="font-normal">({{ $totalQuantity }} sản phẩm)</i></div>
                <div class="font-bold text-red-600 text-lg total-cart-price">{{ number_format($tongTien) . '₫' }}</div>
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

<div id="notification" class="fixed w-full h-full z-50 inset-0 flex items-center justify-center bg-black bg-opacity-70 hidden">
    <div id="notification-content" class="p-6 absolute top-1/4 left-1/2 transform -translate-x-1/2 rounded-lg text-center w-[500px] bg-white">
        <span class="text-red-500 uppercase font-bold text-center text-xl">Cảnh báo!</span> <br>
        <span class="text-center">Hành động của bạn sẽ <span class="text-red-500">xóa sản phẩm</span> này khỏi giỏ hàng</span> <br>
        <span class="text-center">Bạn có chắc chắn muốn thực hiện?</span>
        <div class="flex justify-center items-center space-x-3 mt-4">
            <button id="confirm-delete" class="h-9 w-24 bg-red-500 hover:bg-red-400 rounded-lg text-white font-bold">Xóa</button>
            <button id="cancel-delete" class="h-9 w-24 bg-gray-300 hover:bg-gray-400 rounded-lg text-gray-700 font-bold">Hủy</button>
        </div>
    </div>
</div>

<div id="loadingModal" class="fixed w-full h-full inset-0 flex items-center justify-center bg-black bg-opacity-10 hidden">
    <div class="p-6 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg text-center">
        <div class="animate-spin rounded-full h-10 w-10 border-t-2 border-gray-500 mx-auto"></div>
    </div>
</div>

{{-- JavaScript for sliders --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $plus_bt = $(".plus-bt");
        $minus_bt = $(".minus-bt");
        $notification = $("#notification");
        $loadingModal = $("#loadingModal");
        $deleteButton = $(".delete-button");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', function(e) {
            if (!$notification.hasClass("hidden") && !$notification.is(e.target) && !$notification.has(e.target).length > 0) {
                $notification.addClass("hidden");
            }
        });

        $plus_bt.on('click', function() {
            var parentDiv = $(this).closest(".update-cart-block");
            var cartItemBlock = $(this).closest(".cart-item-group");

            $cartId = parentDiv.find(".cartId").val();
            $productId = parentDiv.find(".productId").val();

            $loadingModal.removeClass("hidden");
            setTimeout(function() {
                $.ajax({
                    url: "{{ route('carts.update') }}",
                    type: "POST",
                    data: {
                        cartId: $cartId,
                        productId: $productId,
                        add: 1,
                    },
                    success: function(res) {
                        console.log(res.data[1]);
                        displayCartItem(res.data[1], parentDiv, cartItemBlock);
                        $loadingModal.addClass("hidden");
                    },
                    error: function(res) {
                        console.log(res);
                        $loadingModal.addClass("hidden");
                    }

                });
            });
        });

        $minus_bt.on('click', function(e) {
            e.preventDefault();
            var parentDiv = $(this).closest(".update-cart-block");
            var cartItemBlock = $(this).closest(".cart-item-group");

            $quantity = Number(parentDiv.find(".cart-item-quantity").text());
            if ($quantity === 1) {
                $notification.removeClass("hidden");
                $notification.data("product-id", parentDiv.find(".productId").val());
                $notification.data("cart-id", parentDiv.find(".cartId").val());
                return false;
            }

            $cartId = parentDiv.find(".cartId").val();
            $productId = parentDiv.find(".productId").val();

            $loadingModal.removeClass("hidden");
            setTimeout(function() {
                $.ajax({
                    url: "{{ route('carts.update') }}",
                    type: "POST",
                    data: {
                        cartId: $cartId,
                        productId: $productId,
                        add: 0,
                    },
                    success: function(res) {
                        console.log(res.data[1]);
                        displayCartItem(res.data[1], parentDiv, cartItemBlock);
                        $loadingModal.addClass("hidden");
                    },
                    error: function(res) {
                        console.log(res);
                        $loadingModal.addClass("hidden");
                    }

                });
            });
        });

        $deleteButton.on('click', function(e) {
            e.preventDefault();
            $notification.removeClass("hidden");
            $notification.data("product-id", $(this).closest(".cart-item-group").find(".productId").val());
            $notification.data("cart-id", $(this).closest(".cart-item-group").find(".cartId").val());

            console.log($notification.data("product-id"));
            console.log($notification.data("cart-id"));
            return false;
        });
        
        $("#cancel-delete").on("click", function() {
            $notification.addClass("hidden");
        });

        $("#confirm-delete").on("click", function() {
            $loadingModal.removeClass("hidden");
            $productId = $notification.data("product-id");
            $cartId = $notification.data("cart-id");

            $.ajax({
                url: "{{ route('carts.destroy') }}",
                type: "DELETE",
                data: {
                    ProductId: $productId,
                    CartId: $cartId,
                },
                success: function(res) {
                    console.log(res);
                    $loadingModal.addClass("hidden");
                    location.reload();
                },
                error: function(res) {
                    console.log(res);
                    $loadingModal.addClass("hidden");
                }
            });
        });

        function displayCartItem(cartItem, parentDiv, cartItemBlock) {
            parentDiv.find(".cart-item-quantity").text(cartItem['Quantity']);
            $totalPrice = cartItem['UnitPrice'] * cartItem['Quantity'];
            cartItemBlock.find(".cart-item-total-price").text($totalPrice.toLocaleString('vi-VN') + '₫');
            $(".total-cart-price").text($totalPrice.toLocaleString('vi-VN') + '₫');
        }
    });
</script>
@endsection