@extends('admin.layout_admin.layout_admin')
@section('title', 'Hóa đơn')
@section('content')
@php
$stt = 0;
$thanhTien = 0;
@endphp
<div class="overflow-x-auto m-10">
    <div class="mb-3">
        <h1 class="w-full text-4xl text-center mb-3">HOẠT ĐỘNG CỦA CỬA HÀNG {{ $header }}</h1>
        <div class="w-full">
            <form action="" method="get" class="my-5 mt-10">
                <div class="w-full block sm:flex justify-end px-3">
                    @if ($isFilter)
                    <a href="{{ route('bills.index') }}"
                        class="flex justify-center items-center mt-1 h-6 px-3 rounded-full bg-gray-300 mr-1"><i
                            class="fa-solid fa-xmark mr-1 mt-1"></i>Bỏ lọc</a>
                    @endif
                    <div class="mr-1 mb-1">
                        <select name="Year" id="filter-year" class="px-3 w-full h-8 border-0">
                            <option selected disabled hidden value="">Năm</option>
                            <option class="text-gray-400" value="">Tất cả</option>
                            @foreach ($years as $i)
                            @if ($selected['year'] == $i)
                            <option value="{{ $i }}" selected>{{ $i }}
                            </option>
                            @else
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mr-1 mb-1">
                        <select name="Month" id="filter-month" class="px-3 w-full h-8 border-0" disabled>
                            <option selected disabled hidden value="">Tháng</option>
                            <option class="text-gray-400" value="">Tất cả</option>
                            @foreach ($months as $i)
                            @if ($selected['month'] == $i)
                            <option value="{{ $i }}" selected>{{ $i }}
                            </option>
                            @else
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mr-1 mb-1">
                        <select name="Day" id="filter-day" class="px-3 w-full h-8 border-0" disabled>
                            <option selected disabled hidden value="">Ngày</option>
                            <option class="text-gray-400" value="">Tất cả</option>
                            @foreach ($days as $i)
                            @if ($selected['day'] == $i)
                            <option value="{{ $i }}" selected>{{ $i }}
                            </option>
                            @else
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mr-1 mb-1 sm:mr-3">
                        <select name="SortDateTime" id="filter-date-time" class="px-3 w-full h-8 border-0">
                            <option value="desc" selected>↓ Trễ nhất
                            </option>
                            <option value="asc" {{ $selected['sortByDate'] == 'asc' ? 'selected' : '' }}>↑ Sớm nhất
                            </option>

                        </select>
                    </div>
                    <div class="mr-1 mb-1 sm:mr-3">
                        <select name="StatusFilter" class="px-3 w-full h-8 border-0">
                            <option selected disabled hidden value="">Trạng thái</option>
                            @foreach ($status as $item)
                            @php
                            $status = '';
                            switch ($item) {
                            case 'Approve':
                            $status = 'Đã xác nhận';
                            break;
                            case 'Reject':
                            $status = 'Đã từ chối';
                            break;
                            case 'Cancel':
                            $status = 'Bị khách hủy';
                            break;
                            case 'Shipping':
                            $status = 'Đang giao hàng';
                            break;
                            case 'Done':
                            $status = 'Hoàn thành';
                            break;
                            default:
                            $status = 'Chờ xử lý';
                            break;
                            }
                            @endphp
                            @if ($selected['status'] == $item)
                            <option value="{{ $item }}" selected>
                                {{ $status }}
                            </option>
                            @else
                            <option value="{{ $item }}">
                                {{ $status }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <button
                            class="px-3 w-full h-8 border text-white bg-blue-700 border-blue-700 rounded-lg hover:bg-blue-800">
                            Lọc hóa đơn
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead>
                <tr class="text-xs text-gray-700 uppercase bg-gray-200">
                    <th scope="col" class="py-3 text-center w-1/12">
                        Số hóa đơn
                    </th>
                    <th scope="col" class="py-3 text-center w-1/12">
                        Khách hàng
                    </th>
                    <th scope="col" class="py-3 text-center w-2/12">
                        Thời điểm thanh toán
                    </th>
                    <th scope="col" class="py-3 text-center w-3/12">
                        Địa điểm giao
                    </th>
                    <th scope="col" class="py-3 text-center w-2/12">
                        Trạng thái
                    </th>
                    <th scope="col" class="py-3 text-center w-2/12">
                        Hành động
                    </th>
                    <th scope="col" class="py-3 text-center w-1/12">
                        Giá trị đơn hàng
                    </th>
                </tr>
            </thead>
            <tbody class="w-full">
                @if (count($data) > 0)
                    @foreach ($data as $dt)
                    @php
                    $status = '';
                    // 'Pending','Approve','Reject','Cancel','Shipping','Done'
                        switch ($dt->Status) {
                            case 'Approve':
                                $status = 'Đã xác nhận';
                                break;
                            case 'Reject':
                                $status = 'Đã từ chối';
                                break;
                            case 'Cancel':
                                $status = 'Bị khách hủy';
                                break;
                            case 'Shipping':
                                if($dt->Shipped == 0) {
                                    $status = 'Đang giao hàng';
                                } else {
                                    $status = 'Đã giao';
                                }
                                break;
                            case 'Done':
                                $status = 'Hoàn thành';
                                break;
                            default:
                                $status = 'Chờ xử lý';
                                break;
                        }
                    @endphp
                    <tr class="collapsible cursor-pointer border-b bg-gray-100">
                        <td class="py-4 font-medium text-center text-blue-500 hover:text-blue-700">
                            <a href="{{ route('bills.show', $dt->BillId) }}">
                                {{ $dt->BillId }}
                            </a>
                        </td>
                        <td class="py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                            <a class="text-blue-500 hover:text-blue-700"
                                href="{{ route('customers.show', $dt->CustomerId) }}">{{ $dt->CustomerId }}</a>
                        </td>
                        <td class="py-4 text-center">
                                {{ Carbon\Carbon::parse($dt->created_at)->format('H:i:s d/m/Y') }}
                        </td>
                        <td class="py-4">
                            {{ $dt->Address }}
                        </td>
                        <td class="py-4 text-center">
                            {{ $status }}
                        </td>
                        <td class="py-4 text-center flex justify-center">
                            @if ($dt->Status == 'Pending')
                            <form action="{{ route('bills.update') }}" method="post" class="statusUpdateForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="BillId" value="{{ $dt->BillId }}">
                                <input type="hidden" name="Status" value="Approve">
                                <button
                                    class="update-stt-bt rounded-md text-white p-2 border bg-green-500 hover:bg-green-700">Xác
                                    nhận</button>
                            </form>
                            <form action="{{ route('bills.update') }}" method="post" class="statusUpdateForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="BillId" value="{{ $dt->BillId }}">
                                <input type="hidden" name="Status" value="Reject">
                                <button
                                    class="update-stt-bt rounded-md text-white p-2 border bg-red-500 hover:bg-red-700">Từ
                                    chối</button>
                            </form>
                            @endif

                            @if ($dt->Status == 'Approve')
                            <form action="{{ route('bills.update') }}" method="post" class="statusUpdateForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="BillId" value="{{ $dt->BillId }}">
                                <input type="hidden" name="Status" value="Shipping">
                                <button
                                    class="update-stt-bt rounded-md text-white p-2 border bg-blue-500 hover:bg-blue-700">Giao
                                    hàng</button>
                            </form>
                            @endif

                            @if ($dt->Status == 'Shipping' && $dt->Shipped == 0)
                            <form action="{{ route('bills.update') }}" method="post" class="statusUpdateForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="BillId" value="{{ $dt->BillId }}">
                                <input type="hidden" name="Shipped" value="1">
                                <button
                                    class="update-stt-bt rounded-md text-white p-2 border bg-green-500 hover:bg-green-700">Đã
                                    giao</button>
                            </form>
                            @endif

                        </td>
                        <td class="py-4 text-center font-bold text-red-600">
                            {{ number_format($dt->TotalBill) . '₫' }}
                        </td>
                    </tr>
                    <tr class="collapsible-content hidden border-b">
                        <td colspan="8">
                            @php
                            $details = Illuminate\Support\Facades\DB::table('bill_details')
                            ->join('products', 'bill_details.ProductId', '=', 'products.ProductId')
                            ->where('BillId', $dt->BillId)
                            ->get();
                            @endphp
                            @foreach ($details as $detail)
                            @php
                            $thanhTien += $detail->Quantity * $detail->UnitPrice;
                            @endphp
                            <div class="flex w-full py-2">
                                <div class="text-center w-1/12">{{ ++$stt }}</div>
                                <div class="w-3/12 font-bold">
                                    {{ $detail->ProductName }}
                                </div>
                                <div class="text-center w-2/12">
                                    {{ $detail->Memory }}
                                </div>
                                <div class="text-center w-3/12">
                                    ×{{ $detail->Quantity }}
                                </div>
                                <div class="text-center w-2/12">{{ number_format($detail->UnitPrice) . '₫' }}
                                </div>
                                <div class="text-center w-1/12 font-bold text-red-500">
                                    {{ number_format($thanhTien) . '₫' }}
                                </div>
                            </div>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function() {
    // Collapsible rows
    $(".collapsible").on("click", function() {
        $(".collapsible-content").not($(this).next()).css("display", "none");
        $(this).toggleClass("active");
        var $content = $(this).next();
        if ($content.css("display") === "table-row") {
            $content.css("display", "none");
        } else {
            $content.css("display", "table-row");
        }
    });

    $(".collapsible").find('a').on("click", function(e) {
        e.stopPropagation();
    });

    $(".update-stt-bt").on("click", function(e) {
        e.stopPropagation();
        $(this).closest('.statusUpdateForm').submit();
    });

    var $yearInput = $('#filter-year');
    var $monthInput = $('#filter-month');
    var $dayInput = $('#filter-day');

    if ($yearInput.val() === "") {
        $monthInput.prop('disabled', true);
        $dayInput.prop('disabled', true);
    }

    if ($monthInput.val() !== "") {
        $dayInput.prop('disabled', true);
    }

    $yearInput.on('change', function() {
        if ($(this).val() === "") {
            $monthInput.prop('disabled', true).val("");
            $dayInput.prop('disabled', true).val("");
        } else {
            $monthInput.prop('disabled', false);
            $dayInput.prop('disabled', true).val("");
        }
    });

    $monthInput.on('change', function() {
        if ($(this).val() === "") {
            $dayInput.prop('disabled', true).val("");
        } else {
            $dayInput.prop('disabled', false);
        }
    });
});
</script>
@endsection