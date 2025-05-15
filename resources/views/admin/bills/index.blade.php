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
                            <select name="Year" id="filter-year" class="px-3 w-full h-8 border-0"
                                onchange="yearOnChange()">
                                <option selected disabled hidden value="">Năm</option>
                                <option value=""></option>
                                @foreach ($year as $i)
                                    @if ($selected['year'] == $i->bill_year)
                                        <option value="{{ $i->bill_year }}" selected>{{ $i->bill_year }}
                                        </option>
                                    @else
                                        <option value="{{ $i->bill_year }}">{{ $i->bill_year }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-1 mb-1">
                            <select name="Month" id="filter-month" class="px-3 w-full h-8 border-0" disabled
                                onchange="monthOnChange()">
                                <option selected disabled hidden value="">Tháng</option>
                                <option value=""></option>
                                @foreach ($month as $i)
                                    @if ($selected['month'] == $i->bill_month)
                                        <option value="{{ $i->bill_month }}" selected>{{ $i->bill_month }}
                                        </option>
                                    @else
                                        <option value="{{ $i->bill_month }}">{{ $i->bill_month }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-1 mb-1">
                            <select name="Day" id="filter-day" class="px-3 w-full h-8 border-0" disabled>
                                <option selected disabled hidden value="">Ngày</option>
                                <option value=""></option>
                                @foreach ($day as $i)
                                    @if ($selected['day'] == $i->bill_day)
                                        <option value="{{ $i->bill_day }}" selected>{{ $i->bill_day }}
                                        </option>
                                    @else
                                        <option value="{{ $i->bill_day }}">{{ $i->bill_day }}</option>
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
                        <th scope="col" class="py-3 text-center w-2/12">
                            Địa điểm giao
                        </th>
                        <th scope="col" class="py-3 text-center w-2/12">
                            Ghi chú
                        </th>
                        <th scope="col" class="py-3 text-center w-1/12">
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
                                {{ $dt->Note }}
                            </td>
                            <td class="py-4 text-center">
                                {{ $status }}
                            </td>
                            <td class="py-4 text-center flex justify-center">
                                @if ($dt->Status == 'Pending')
                                    <form action="{{ route('bills.update') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="BillId" value="{{ $dt->BillId }}">
                                        <input type="hidden" name="Status" value="Approve">
                                        <button class="rounded-md text-white p-2 border bg-green-500 hover:bg-green-700">Xác nhận</button>
                                    </form>
                                    <form action="{{ route('bills.update') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="BillId" value="{{ $dt->BillId }}">
                                        <input type="hidden" name="Status" value="Reject">
                                        <button class="rounded-md text-white p-2 border bg-red-500 hover:bg-red-700">Từ chối</button>
                                    </form>
                                @endif

                                @if ($dt->Status == 'Approve')
                                    <form action="{{ route('bills.update') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="BillId" value="{{ $dt->BillId }}">
                                        <input type="hidden" name="Status" value="Shipping">
                                        <button class="rounded-md text-white p-2 border bg-blue-500 hover:bg-blue-700">Giao hàng</button>
                                    </form>
                                @endif

                                @if ($dt->Status == 'Shipping' && $dt->Shipped == 0)
                                    <form action="{{ route('bills.update') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="BillId" value="{{ $dt->BillId }}">
                                        <input type="hidden" name="Shipped" value="1">
                                        <button class="rounded-md text-white p-2 border bg-green-500 hover:bg-green-700">Đã giao</button>
                                    </form>
                                @endif

                            </td>
                            <td class="py-4 text-center font-bold text-red-600">
                                {{ number_format($dt->TotalBill) . '₫' }}
                            </td>
                        </tr>
                        <tr class="hidden border-b">
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
                </tbody>
            </table>
        </div>
    </div>

    <script>
        var coll = document.getElementsByClassName("collapsible");

        for (var i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "table-row") {
                    content.style.display = "none";
                } else {
                    content.style.display = "table-row";
                }
            });
        }

        var yearInput = document.getElementById('filter-year');
        var monthInput = document.getElementById('filter-month');
        var dayInput = document.getElementById('filter-day')

        if (yearInput.value != "") {
            monthInput.disabled = false;
        }

        if (monthInput.value != "") {
            dayInput.disabled = false;
        }

        function yearOnChange() {
            if (yearInput.value === "") {
                monthInput.disabled = true;
                monthInput.value = "";
            } else {
                monthInput.disabled = false;
            }
        }

        function monthOnChange() {
            if (monthInput.value === "") {
                dayInput.disabled = true;
                dayInput.value = "";
            } else {
                dayInput.disabled = false;
            }
        }
    </script>
@endsection
