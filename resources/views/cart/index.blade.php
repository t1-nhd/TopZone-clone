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
<div id="cart-show"></div>
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
                        @php
                        $totalQuantity = count($cartItems);
                        @endphp
                        @foreach ($cartItems as $item)
                        @php
                        $thanhTien = $item->Quantity * $item->UnitPrice;
                        $tongTien += $thanhTien;
                        @endphp
                        @if ($item->Inventory == 0)
                        <tr class="py-3 bg-white opacity-20">
                            <td class="w-[20px] py-3">
                            </td>
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
                            <td class="w-1/12 py-3 text-end">
                                <button class="delete-button h-9 w-9 font-bold text-end flex items-center">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                        @else
                        <tr class="py-3 cart-item-group">
                            <td class="w-[20px] py-3">
                                <input type="checkbox" class="cart-checkbox w-[20px] h-[20px] rounded-md accent-amber-800">
                            </td>
                            <td class="w-2/12 py-3">
                                <img src="{{ URL('images/Thumbnails/' . $item->ProductThumbnail) }}"
                                    alt="">
                            </td>
                            <td class="w-6/12 py-3 pl-5">
                                <a
                                    href="{{ route('show', [$item->ProductName, $item->Memory]) }}">{{ $item->ProductName . ' ' . $item->Memory }}</a>
                            </td>
                            <td class="w-2/12 py-3 text-center">
                                <div class="cart-item-information flex justify-center items-center">
                                    <input type="hidden" class="cartId" value="{{ $item->CartId }}">
                                    <input type="hidden" class="productId" value="{{ $item->ProductId }}">
                                    <input type="hidden" class="totalPrice" value="{{ $thanhTien }}">
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
                            <td class="py-3">
                                <button class="delete-button flex text-red-500 items-center">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="rounded-b-lg mt-1 bg-white p-3 flex py-3 place-items-center space-x-1 w-full">
                <div class="w-[20px] flex items-center">
                    <input type="checkbox" class="check-all-checkbox w-[20px] h-[20px] rounded-md accent-amber-800">
                </div>
                <div class="w-4/12">
                    <span class="ms-2 text-gray-500" id="check-all-checkbox-label">
                        Chọn tất cả
                    </span>
                </div>
                <div class="w-4/12 font-bold text-end">
                    TỔNG GIỎ HÀNG <i class="font-normal">({{ $totalQuantity }} sản phẩm)</i>
                </div>
                <div class="w-4/12 flex justify-end items-center">
                    <div class="font-bold text-red-600 text-lg text-end me-2" id="total-cart-price">
                        {{ number_format($tongTien) . '₫' }}
                    </div>
                    <form action="{{ route('carts.show') }}" method="get" id="order-form">
                        <button id="order-button" type="submit" class="h-9 w-32 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-bold">
                            Đặt hàng
                        </button>
                    </form>
                </div>
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

<div id="custom-alert" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
    <div class="bg-white rounded-lg p-6 text-center min-w-[300px]">
        <div class="font-bold text-lg mb-2 text-red-600">Thông báo</div>
        <div class="mb-4">Vui lòng chọn sản phẩm để đặt hàng.</div>
        <button id="close-custom-alert" class="px-4 py-2 bg-blue-600 text-white rounded">Đóng</button>
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

        updateCartTotalPrice();

        $("#order-form").find("input").remove();

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
            var cartItemInformation = $(this).closest(".cart-item-information");
            var cartItemGroup = $(this).closest(".cart-item-group");

            $cartId = cartItemInformation.find(".cartId").val();
            $productId = cartItemInformation.find(".productId").val();

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
                        cartItemInformation.find(".cart-item-quantity").text(res.data['Quantity']);
                        $totalPrice = res.data['UnitPrice'] * res.data['Quantity'];
                        cartItemInformation.find(".totalPrice").val($totalPrice);
                        cartItemGroup.find(".cart-item-total-price").text($totalPrice.toLocaleString('vi-VN') + '₫');
                        updateCartTotalPrice();
                    },
                    error: function(res) {
                        console.log(res);
                    }

                });
            });
        });

        $minus_bt.on('click', function(e) {
            e.preventDefault();
            var cartItemInformation = $(this).closest(".cart-item-information");
            var cartItemGroup = $(this).closest(".cart-item-group");

            $quantity = Number(cartItemInformation.find(".cart-item-quantity").text());
            if ($quantity === 1) {
                $notification.removeClass("hidden");
                $notification.data("product-id", cartItemInformation.find(".productId").val());
                $notification.data("cart-id", cartItemInformation.find(".cartId").val());
                return false;
            }

            $cartId = cartItemInformation.find(".cartId").val();
            $productId = cartItemInformation.find(".productId").val();

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
                        cartItemInformation.find(".cart-item-quantity").text(res.data['Quantity']);
                        $totalPrice = res.data['UnitPrice'] * res.data['Quantity'];
                        cartItemInformation.find(".totalPrice").val($totalPrice);
                        cartItemGroup.find(".cart-item-total-price").text($totalPrice.toLocaleString('vi-VN') + '₫');
                        console.log(cartItemGroup.find(".totalPrice").val());
                        updateCartTotalPrice();
                    },
                    error: function(res) {
                        console.log(res);
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
                    updateCartTotalPrice();
                    location.reload();
                },
                error: function(res) {
                    console.log(res);
                    $loadingModal.addClass("hidden");
                }
            });
        })

        $(".check-all-checkbox").on("change", function() {
            if ($(this).is(":checked")) {
                $(".cart-checkbox").prop("checked", true);
            } else {
                $(".cart-checkbox").prop("checked", false);
            }
            isCheckAllCheckboxChecked();

        });

        $(".cart-checkbox").on("change", function() {
            if ($(".cart-checkbox:checked").length === $(".cart-checkbox").length) {
                $(".check-all-checkbox").prop("checked", true);
            } else {
                $(".check-all-checkbox").prop("checked", false);
            }
            isCheckAllCheckboxChecked();
        });

        $("#order-button").on("click", function(e) {
            e.preventDefault();
            if ($(".cart-checkbox:checked").length === 0) {
                $("#custom-alert").removeClass("hidden").hide().fadeIn(200, function() {
                    $("#custom-alert-content").css({
                        opacity: 1,
                        transform: "scale(1)"
                    });
                });
                return false;
            }
            // $loadingModal.removeClass("hidden");
            $index = 0;
            $(".cart-checkbox:checked").each(function() {
                cartId = $(this).closest(".cart-item-group").find(".cartId").val();
                productId = $(this).closest(".cart-item-group").find(".productId").val();

                $newHiddenCartIdInput = $('<input>', {
                    type: 'hidden',
                    name: 'cartItems[' + $index + '][CartId]',
                    value: cartId
                });
                $newHiddenProductIdInput = $('<input>', {
                    type: 'hidden',
                    name: 'cartItems[' + $index + '][ProductId]',
                    value: productId
                });
                $("#order-form").append($newHiddenCartIdInput, $newHiddenProductIdInput);
                $index++;
            });

            $("#order-form").submit();
        });

        $("#close-custom-alert").on("click", function() {
            $("#custom-alert-content").css({
                opacity: 0,
                transform: "scale(0.95)"
            });
            $("#custom-alert").fadeOut(200, function() {
                $(this).addClass("hidden");
            });
        });

        function isCheckAllCheckboxChecked() {
            $("#check-all-checkbox-label").fadeOut(150, function() {
                $(this)
                    .text($(".check-all-checkbox").is(":checked") ? "Bỏ chọn tất cả" : "Chọn tất cả")
                    .fadeIn(100);
            });
        }

        function updateCartTotalPrice() {
            let total = 0;
            console.log($(".totalPrice").length);
            $(".totalPrice").each(function() {
                console.log($(this).val());
                total += parseInt($(this).val());
            });
            $("#total-cart-price").text(total.toLocaleString('vi-VN') + '₫');
        }
    });
</script>
@endsection