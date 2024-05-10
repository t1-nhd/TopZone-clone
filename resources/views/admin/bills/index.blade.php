@extends('admin.layout_admin.layout_admin')
@section('title', 'Hóa đơn')
@section('content')
    @php
        $stt = 0;
        $thanhTien = 0;
    @endphp
    <div class="overflow-x-auto m-10">
        <div class="mb-3">
            <h1 class="w-full text-4xl text-center mb-3">HOẠT ĐỘNG CỦA CỬA HÀNG</h1>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10">
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
                        <th scope="col" class="py-3 text-center w-3/12">
                            Ghi chú
                        </th>
                        <th scope="col" class="py-3 text-center w-2/12">
                            Trạng thái
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
    </script>
@endsection
